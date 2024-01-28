<?php

namespace App\Services;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    public function create(StoreUserRequest $request): UserResource
    {
        return User::create($request->validated());
    }

    public function getUsersWithTasks(): LengthAwarePaginator
    {
        return User::with('tasks')->paginate();
    }
}
