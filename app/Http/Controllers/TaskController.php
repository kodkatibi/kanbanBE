<?php

namespace App\Http\Controllers;

use App\Services\BoardServices;
use App\Services\TaskServices;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected BoardServices $boardServices;
    protected TaskServices $taskServices;

    public function __construct()
    {
        $this->taskServices = new TaskServices();
    }

    public function index(Request $request)
    {

    }
}
