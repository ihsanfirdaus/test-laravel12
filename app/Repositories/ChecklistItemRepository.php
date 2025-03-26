<?php

namespace App\Repositories;

use App\Models\ChecklistItem;
use App\Repositories\Interfaces\ChecklistItemRepositoryInterface;

class ChecklistItemRepository implements ChecklistItemRepositoryInterface
{
    public function getAll()
    {
        return ChecklistItem::all();
    }

    public function getById(string $id)
    {
        $query = ChecklistItem::query();
        $query->where('id','=',$id);

        return $query->firstOrFail();
    }

    public function create(array $data)
    {
        return ChecklistItem::create($data);
    }

    public function update(string $id, array $data)
    {
        $checklist = ChecklistItem::findOrFail($id);
        $checklist->update($data);

        return $checklist;
    }

    public function delete(string $id)
    {
        $checklist = ChecklistItem::findOrFail($id);

        return $checklist->delete();
    }
}