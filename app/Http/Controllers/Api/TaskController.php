<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::paginate();
        return response()->json(['status' => ['message' => 'success', 'code' => 200], 'tasks' => $tasks], 200);
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
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|between:2,200',
            'description' => 'required|string|between:2,250',
            'user_id' => 'required|numeric|exists:users,id',
            'due_date' => 'required|date',
            'status' => 'required|string|between:2,20',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        //return $validator->validated();

        $task = Task::create($validator->validated());
        return response()->json([
            'message' => 'Task successfully Created',
            'task' => $task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
