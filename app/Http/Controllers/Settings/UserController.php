<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);

        $query = User::query();

        return Inertia::render();
    }

    public function create()
    {
        $this->authorize('create', User::class);

        return Inertia::render();
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);

        $data = $request->validated();

        $user = User::query()->create($data);

        return Inertia::render();
    }

    public function edit(User $user)
    {
        $this->authorize('update', User::class);

        return Inertia::render();
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->authorize('update', User::class);

        $user->update($request->validated());

        return Inertia::render();
    }
}
