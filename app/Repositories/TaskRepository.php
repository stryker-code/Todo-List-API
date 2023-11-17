<?php

namespace App\Repositories;

use App\Contracts\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function filter(Request $request): Collection
    {
        $search = $request->search;

        return Task::query()
            ->where('user_id', [$request->user()->id])
            ->when($request->search, function ($query) use ($search) {
                $query->whereFullText(['title', 'description'], $search);
            })->when($request->priority, function ($query) use ($request) {
                $query->where('priority', [$request->priority]);
            })->when($request->status, function ($query) use ($request) {
                $query->where('status', [$request->status]);
            })->orderby('created_at', $request->created_at)
            ->orderby('completed_at', $request->completed_at)->get();
    }
}
