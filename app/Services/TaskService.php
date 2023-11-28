<?php

namespace App\Services;

use App\Contracts\TaskServiceInterface;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Carbon\Carbon;

class TaskService implements TaskServiceInterface
{
    public function update(UpdateTaskRequest $request, Task $task): void
    {
        $data = $request->validated();

        if ($request->status) {
            $data['completed_at'] = Carbon::now();
        }

        $task->update($data);
    }
}
