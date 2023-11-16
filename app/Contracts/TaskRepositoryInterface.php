<?php

namespace App\Contracts;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


interface TaskRepositoryInterface
{
    public function filter(Request $request): Collection;
}
