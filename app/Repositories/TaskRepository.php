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
        return Task::query()
            ->where('user_id', [$request->user()->id])
            ->when($request->title, function ($query) use ($request) {
                $query->where('title', [$request->title]);
            })->when($request->description, function ($query) use ($request) {
                $query->where('description', [$request->description]);
            })->when($request->priority, function ($query) use ($request) {
                $query->where('priority', [$request->description]);
            })->when($request->status, function ($query) use ($request) {
                $query->where('status', [$request->status]);
            })->orderby('created_at', $request->created_at)
            ->orderby('completed_at', $request->completed_at)->get();
    }
}
