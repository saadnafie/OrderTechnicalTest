<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\TaskStatusEnum;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate();
        return TaskResource::collection($tasks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());
        return response()->json([
            'message' => 'Task successfully Created',
            'task' => new TaskResource($task)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findorFail($id);
        return new TaskResource($task);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, string $id)
    {
        Task::findOrFail($id)->update($request->all());
        $task = Task::findOrFail($id);
        return response()->json([
            'message' => 'Task successfully Updated',
            'task' => new TaskResource($task)
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::findOrFail($id)->delete();
        return response()->json(['message' => 'Task successfully Deleted'], 201);
    }
}
