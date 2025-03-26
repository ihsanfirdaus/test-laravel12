<?php

namespace App\Repositories;

use App\Models\Checklist;
use App\Repositories\Interfaces\ChecklistRepositoryInterface;

class ChecklistRepository implements ChecklistRepositoryInterface
{
    public function getAll()
    {
        return Checklist::all();
    }

    public function getById(string $id, string $itemId = null)
    {
        $query = Checklist::query();
        $query->where('id','=',$id);
        
        $query->with(['items' => function ($query) use ($itemId) {
            if ($itemId !== null) {
                $query->where('id', $itemId);
            }
        }]);

        return $query->firstOrFail();
    }

    public function create(array $data)
    {
        return Checklist::create($data);
    }

    public function update(string $id, array $data)
    {
        $checklist = Checklist::findOrFail($id);
        $checklist->update($data);

        return $checklist;
    }

    public function delete(string $id)
    {
        $checklist = Checklist::findOrFail($id);

        return $checklist->delete();
    }
}