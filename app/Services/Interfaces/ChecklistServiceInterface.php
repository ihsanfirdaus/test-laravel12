<?php 

namespace App\Services\Interfaces;

interface ChecklistServiceInterface
{
    public function getAll();

    public function getById(string $id, string $itemId = null);

    public function create(array $data);

    public function createItemById(string $id, array $data);

    public function update(string $id, array $data);

    public function updateStatusByItemId(string $id, string $itemId);

    public function delete(string $id);

    public function deleteItemByItemId(string $id, string $itemId);

    public function renameItemByItemId(string $id, string $itemId, array $data);
}