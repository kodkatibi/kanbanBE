<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Services\BoardServices;
use App\Services\TaskServices;

class TaskController extends Controller
{
    protected null|Board $board;
    protected string $boardSlug;
    protected TaskServices $taskServices;


    public function __construct()
    {
        $this->boardSlug = \request()->route()->parameter('board');
        $this->board = (new BoardServices())->getBySlug($this->boardSlug);
        $this->taskServices = new TaskServices();
    }

    public function index()
    {
        return $this->response($this->board->tasks()->with(['status','assigned'])->get()->toArray());
    }
}
