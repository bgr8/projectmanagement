<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($projectId)
    {
        return Task::where('project_id', $projectId)->get();
    }

    public function store(Request $request, $projectId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:todo,in-progress,done',
        ]);

        $validated['project_id'] = $projectId;
        return Task::create($validated);
    }

    public function show($projectId, $taskId)
{
    return Task::where('project_id', $projectId)->findOrFail($taskId);
}

public function update(Request $request, $projectId, $taskId)
{
    $task = Task::where('project_id', $projectId)->findOrFail($taskId);
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'in:todo,in-progress,done',
    ]);

    $task->update($validated);
    return response()->json($task, 200);
}

public function destroy($projectId, $taskId)
{
    $task = Task::where('project_id', $projectId)->findOrFail($taskId);
    $task->delete();
    return response()->noContent();
}
}
