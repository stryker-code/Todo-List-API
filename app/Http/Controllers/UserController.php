<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function create(StoreUserRequest $request): UserResource
    {
        $user = User::create($request->validated());

        return UserResource::make($user);
    }

    public function index(): AnonymousResourceCollection
    {
        $users = User::with('tasks')->paginate();

        return UserResource::collection($users);
    }
}
