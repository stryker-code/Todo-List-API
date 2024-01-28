<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    public function create(array $data): UserResource
    {
        return User::create($data);
    }

    public function getUsersWithTasks(): LengthAwarePaginator
    {
        return User::with('tasks')->paginate();
    }
}
