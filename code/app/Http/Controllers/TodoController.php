<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Repository\Filters\TodoFilter;
use App\Repository\TodoRepository;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse as Response;

class TodoController extends Controller
{
    public function __construct(
        private readonly TodoRepository $todoRepository,
    ) {
    }

    public function list(Request $request): View
    {
        $todoFilter = new TodoFilter();

        $todoFilter->setDone(false);
        $notDone = $this->todoRepository->getFilteredResults($todoFilter);

        $todoFilter->setDone(true);
        $done = $this->todoRepository->getFilteredResults($todoFilter);
        return view('pages/todo', ['doneItems' => $done, 'notDoneItems' => $notDone]);
    }

    public function edit(Request $request, ?int $id = null): View
    {
        $todoFilter = new TodoFilter();

        if($id !== null) {
            $todoFilter->setId($id);
            $todoItem = $this->todoRepository->getSingleResult($todoFilter);
        } else {
            $todoItem = null;
        }

        return view('pages/todoEdit', ['item' => $todoItem, 'actionRoute' => $id ? 'todo.edit' : 'todo.create']);
    }

    public function create(Request $request): Response
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'comment' => 'required|string|max:255'
        ]);

        $data['user_id'] = $request->user()->id;

        Todo::create($data);
        return redirect()->route('todo.list');
    }

    public function update(Request $request, int $id): Response
    {
        $todoFilter = new TodoFilter();

        $todoFilter->setId($id);
        $todoItem = $this->todoRepository->getSingleResult($todoFilter);
        $data = $request->validate([
            'done' => 'boolean',
            'name' => 'string|max:100',
            'comment' => 'string|max:255'
        ]);

        $todoItem->update($data);
        return redirect()->route('todo.list');
    }

    public function finalizeItem(Request $request, int $id): Response
    {
        $todoFilter = new TodoFilter();

        $todoFilter->setId($id);
        $todoItem = $this->todoRepository->getSingleResult($todoFilter);

        $todoItem->update(['done' => true]);
        return redirect()->route('todo.list');
    }
}
