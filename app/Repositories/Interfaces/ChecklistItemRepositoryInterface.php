<?php

namespace App\Repositories\Interfaces;

use App\Models\Checklist;

interface ChecklistItemRepositoryInterface
{
    public function getAll();

    public function getById(string $id);

    public function create(array $data);

    public function update(string $id, array $data);

    public function delete(string $id);
}