<?php

namespace App\Repositories\Interfaces;

use App\Models\Checklist;

interface ChecklistRepositoryInterface
{
    public function getAll();

    public function getById(string $id, string $itemId = null);

    public function create(array $data);

    public function update(string $id, array $data);

    public function delete(string $id);
}