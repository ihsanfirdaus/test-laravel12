<?php

namespace App\Services;

use App\Repositories\Interfaces\ChecklistItemRepositoryInterface;
use App\Services\Interfaces\ChecklistItemServiceInterface;

class ChecklistItemService implements ChecklistItemServiceInterface
{
    protected $checklistItemRepository;

    public function __construct(ChecklistItemRepositoryInterface $checklistItemRepository)
    {
        $this->checklistItemRepository = $checklistItemRepository;    
    }

    public function getAll()
    {
        return $this->checklistItemRepository->getAll();
    }

    public function getById(string $id)
    {
        return $this->checklistItemRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->checklistItemRepository->create($data);
    }
    
    public function update(string $id, array $data)
    {
        return $this->checklistItemRepository->update($id, $data);
    }

    public function delete(string $id)
    {
        return $this->checklistItemRepository->delete($id);
    }
}