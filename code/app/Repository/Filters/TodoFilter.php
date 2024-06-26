<?php

namespace App\Repository\Filters;

class TodoFilter
{
	private ?bool $done = null;

	private ?int $id = null;

	public function getDone(): ?bool
	{
		return $this->done;
	}

	public function setDone(?bool $done): void
	{
		$this->done = $done;
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function setId(?int $id): void
	{
		$this->id = $id;
	}
}