<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function ajax()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function index(): View
    {
        $users = User::all();
        return view('page.user.index', compact('users'));
    }

    public function create(): View
    {
        return view('page.user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            User::create($request->all());
            return redirect()->route('user.index')->with('success', 'user created successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to create user.');
        }
    }

    public function edit(User $user): View
    {
        return view('page.user.edit', compact('user'));
    }
    public function update(Request $request, User $user): RedirectResponse
    {
        try {
            $user->update($request->all());
            return redirect()->route('user.index')->with('success', 'user update successfully.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Failed to update user.');
        }
    }
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('user.index')->with('success', 'user Deleted successfully.');
    }
}
