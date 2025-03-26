<?php

namespace App\Services;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;    
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function getById(string $id)
    {
        return $this->postRepository->getById($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = 1;

        return $this->postRepository->create($data);
    }

    public function update(string $id, array $data)
    {
        return $this->postRepository->update($id, $data);
    }

    public function delete(string $id)
    {
        return $this->postRepository->delete($id);
    }
}