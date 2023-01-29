<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index()
    {
        $boards = Board::query()->where('user_id', Auth::id())->get()->toArray();
        return $this->response($boards);
    }
}
