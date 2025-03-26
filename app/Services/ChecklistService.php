<?php

namespace App\Services;

use App\Repositories\ChecklistItemRepository;
use App\Repositories\Interfaces\ChecklistRepositoryInterface;
use App\Services\Interfaces\ChecklistServiceInterface;

class ChecklistService implements ChecklistServiceInterface
{
    protected $checklistRepository;
    protected $checklistItemRepository;

    public function __construct(
        ChecklistRepositoryInterface $checklistRepository,
        ChecklistItemRepository $checklistItemRepository
    ) {
        $this->checklistRepository = $checklistRepository;    
        $this->checklistItemRepository = $checklistItemRepository;    
    }

    public function getAll()
    {
        return $this->checklistRepository->getAll();
    }

    public function getById(string $id, string $itemId = null)
    {
        return $this->checklistRepository->getById($id, $itemId);
    }

    public function create(array $data)
    {
        return $this->checklistRepository->create($data);
    }

    public function createItemById(string $id, array $data)
    {
        $data['checklist_id'] = $id;

        return $this->checklistItemRepository->create($data);
    }
    
    public function update(string $id, array $data)
    {
        return $this->checklistRepository->update($id, $data);
    }
   
    public function updateStatusByItemId(string $id, string $itemId)
    {
        $checklistItem = $this->checklistItemRepository->getById($itemId);

        $data['is_completed'] = !$checklistItem->is_completed;

        return $this->checklistItemRepository->update($itemId, $data);
    }
    
    public function renameItemByItemId(string $id, string $itemId, array $data)
    {
        // $checklistItem = $this->checklistItemRepository->getById($itemId);

        return $this->checklistItemRepository->update($itemId, $data);
    }

    public function delete(string $id)
    {
        return $this->checklistRepository->delete($id);
    }
    
    public function deleteItemByItemId(string $id, string $itemId)
    {
        return $this->checklistItemRepository->delete($itemId);
    }
}