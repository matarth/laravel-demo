@extends('base')
@section('content')

    <a
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            href="{{route('todo.add')}}">ADD NEW ITEM</a>

    <div class="pt-3 sm:pt-5">
        <h2 class="text-xl font-semibold text-black dark:text-white">Todo</h2>
    </div>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        @foreach ($notDoneItems as $listItem)
            @include('components.todoItem', [
                'item' => $listItem
            ])
        @endforeach
    </div>


    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        <div class="pt-3 sm:pt-5">
            <h2 class="text-xl font-semibold text-black dark:text-white">Finished items</h2>
        </div>
    </div>
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
        @foreach ($doneItems as $listItem)
            @include('components.todoItem', [
                'item' => $listItem
            ])
        @endforeach
    </div>
@endsection