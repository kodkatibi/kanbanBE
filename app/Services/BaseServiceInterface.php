<?php

namespace App\Services;

use App\Models\User;

interface BaseServiceInterface
{
    public function get();
    public function list(User $user);

    public function store(array $data);

    public function update(array $data, int $id);

    public function destroy(int $id);

    public function getById(int $id);

    public function getBySlug(string $slug);
}
