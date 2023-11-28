<?php

namespace App\Contracts;

use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;

interface TaskServiceInterface
{
    public function update(UpdateTaskRequest $request, Task $task): void;
}
