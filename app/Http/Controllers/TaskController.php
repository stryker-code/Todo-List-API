<?php

namespace App\Http\Controllers;

use App\Contracts\TaskRepositoryInterface;
use App\Contracts\TaskServiceInterface;
use App\Http\Requests\Task\GetTasksRequest;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function __construct(protected TaskServiceInterface $taskService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(
        GetTasksRequest $request,
        TaskRepositoryInterface $repository
    ): AnonymousResourceCollection
    {
        return TaskResource::collection(
            $repository->filter($request)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = $request->user()->tasks()->create(
            $request->validated()
        );

        return response()->json(
            [
                'id' => $task->id,
                'message' => 'Task has been created'
            ],
            Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): TaskResource
    {
        return TaskResource::make($task);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $this->authorize('update', $task);

        $task->update($request->validated());

        return response()->json(
            ['message' => 'Task has been updated'],
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): JsonResponse
    {
        $this->authorize('delete', $task);

        $task->delete();

        return response()->json(
            ['message' => 'Task has been deleted'],
            Response::HTTP_NO_CONTENT
        );
    }
}
