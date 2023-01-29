<?php

namespace App\Http\Controllers;

use App\Http\Requests\BoardRequest;
use App\Services\BoardServices;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    protected BoardServices $boardServices;

    public function __construct()
    {
        $this->boardServices = new BoardServices();
    }

    public function index()
    {
        return $this->response((array)$this->boardServices->list(Auth::user()));
    }

    public function store(BoardRequest $request)
    {
        $result = $this->boardServices->store($request->all());
        return $this->response($result);
    }

    public function update($id, BoardRequest $request)
    {
        $result = $this->boardServices->update($request->all(), $id);
        return $this->response($result);
    }

    public function delete($id)
    {
        $result = $this->boardServices->destroy($id);
        return $this->response($result);
    }
}
