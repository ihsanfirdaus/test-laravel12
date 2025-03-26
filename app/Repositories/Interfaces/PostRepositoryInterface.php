<?php

namespace App\Repositories\Interfaces;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function getAll();

    public function getById(string $id): Post;

    public function create(array $data);

    public function update(string $id, array $data);

    public function delete(string $id);
}