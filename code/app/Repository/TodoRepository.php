<?php

namespace App\Repository;

use App\Models\Todo;
use App\Models\User;
use App\Repository\Filters\TodoFilter;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository
{
	protected function getQueryBuilder(TodoFilter $filter)
	{
		$qb = Todo::select();

		if($filter->getDone() !== null){
			$qb->where('done', $filter->getDone());
		}

		if($filter->getId() !== null){
			$qb->where('id', $filter->getId());
		}

		return $qb;
	}

	public function getSingleResult(TodoFilter $filter): Todo {
		$qb = $this->getQueryBuilder($filter);
		$qb->limit(1);
		return $qb->get()->first();
	}

	/**
	 * @return Collection<Todo>
	 */
	public function getFilteredResults(TodoFilter $filter): Collection {
		$qb = $this->getQueryBuilder($filter);
		return $qb->get();
	}

	public function getCount(TodoFilter $filter): int {
		$qb = $this->getQueryBuilder($filter);
		return $qb->count();
	}

}