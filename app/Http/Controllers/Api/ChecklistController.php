<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\ChecklistServiceInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChecklistController extends Controller
{
    use ApiResponseTrait;

    protected $checklistService;

    public function __construct(ChecklistServiceInterface $checklistService)
    {
        $this->checklistService = $checklistService;
    }

    public function index()
    {
        try {
            $data = $this->checklistService->getAll();
            
            return $this->successReponse($data, 'Data berhasil ditemukan');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        try {
            $data = $this->checklistService->create($request->json()->all());

            return $this->successReponse($data, 'Data berhasil disimpan', 201);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        try {
            $this->checklistService->delete($id);
            
            return $this->successReponse(null, 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show(string $id)
    {
        try {
            $data = $this->checklistService->getById($id);
            
            return $this->successReponse($data, 'Data berhasil ditemukan');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function createItem(string $id, Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'item_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        try {
            $data = $this->checklistService->createItemById($id, $request->json()->all());

            return $this->successReponse($data, 'Data item berhasil disimpan', 201);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function showItem(string $id, string $itemId)
    {
        try {
            $data = $this->checklistService->getById($id, $itemId);
            
            return $this->successReponse($data, 'Data berhasil ditemukan');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
    
    public function updateItem(string $id, string $itemId)
    {
        try {
            $data = $this->checklistService->updateStatusByItemId($id, $itemId);
            
            return $this->successReponse($data, 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
    
    public function deleteItem(string $id, string $itemId)
    {
        try {
            $data = $this->checklistService->deleteItemByItemId($id, $itemId);
            
            return $this->successReponse(null, 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
   
    public function renameItem(Request $request, string $id, string $itemId)
    {
        $validator = Validator::make($request->json()->all(), [
            'item_name' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        try {
            $data = $this->checklistService->renameItemByItemId($id, $itemId, $validator->validated());
            
            return $this->successReponse($data, 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
