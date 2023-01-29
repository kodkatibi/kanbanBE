<?php

namespace App\Services;

use App\Models\Board;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BoardServices implements BaseServiceInterface
{
    public function get()
    {
        $board = Board::all();
        return $this->map($board);
    }

    public function list(User $user)
    {
        $board = Board::where('user_id', $user->id)->get();
        return $this->map($board);
    }

    public function getById(int $id)
    {
        // TODO: Implement getById() method.
    }

    public function getBySlug(string $slug)
    {
        $board = Board::where('slug', $slug)->first();
        return $this->map($board);
    }

    public function store(array $data)
    {
        $data['slug'] = $this->createSlug(Str::slug($data['name']));
        $data['user_id'] = Auth::id();
        if (!isset($data['statuses'])) {
            $data['statuses'] = Status::query()->orderBy('order')->pluck('id');;
        }
        return $this->map(Board::query()->create($data));
    }

    public function update(array $data, int $id)
    {

    }

    public function destroy(int $id)
    {

    }

    public function changeStatuses(array $statuses, Board $board): void
    {
        $board->statuses = $statuses;
        $board->save();
    }

    private function createSlug(string $slug): string
    {
        $check = Board::query()->where('slug', $slug)->exists();
        if ($check) {
            return Str::slug($slug . '-' . time());
        }
        return $slug;
    }

    private function map($board)
    {
        return $board->toArray();
    }

}
