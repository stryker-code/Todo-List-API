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

        return Task::query()->with('subtasks')
            ->where('user_id', [$request->user()->id])
            ->where('parent_id', null)
            ->when($request->search, function ($query) use ($search) {
                $query->whereFullText(['title', 'description'], $search);
            })->when($request->priority, function ($query) use ($request) {
                $query->where('priority', [$request->priority]);
            })->when($request->status, function ($query) use ($request) {
                $query->where('status', [$request->status]);
            })->when($request->created_at, function ($query) use ($request) {
                $query->orderby('created_at', $request->created_at);
            })->when($request->completed_at, function ($query) use ($request) {
                $query->orderby('completed_at', $request->completed_at);
            })->get();
    }
}
