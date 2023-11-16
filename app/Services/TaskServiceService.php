<?php

namespace App\Services;

use App\Contracts\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;

class TaskServiceService implements TaskServiceInterface
{
    use AuthorizesRequests;

    public function update(array $data, Task $task): JsonResponse
    {
        $this->authorize('update', $task);

        $task->update($data);
    }

}
