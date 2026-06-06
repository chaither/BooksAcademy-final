<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show the main dashboard based on role.
     */
    public function index()
    {
        $currentUser = auth()->user();

        if ($currentUser->is_admin) {
            // Admin sees all regular users
            $users = User::where('is_admin', false)->latest()->get();
            return view('dashboard', [
                'users' => $users,
                'isAdmin' => true
            ]);
        }

        // Regular user sees their own dashboard details
        return view('dashboard', [
            'user' => $currentUser,
            'isAdmin' => false
        ]);
    }

    /**
     * Store new user credentials.
     */
    public function storeUser(Request $request)
    {
        // Check authorization
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dashboard_title' => 'My Bookshelf Workspace',
            'dashboard_content' => 'Welcome to Books Academy! Your account has been created by the administrator. Feel free to explore our Bookstore or consult with designers.',
        ]);

        return redirect()->route('dashboard')->with('status', 'user-created');
    }

    /**
     * Update target user's custom dashboard details.
     */
    public function updateUserDashboard(Request $request, User $user)
    {
        // Check authorization
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'dashboard_title' => ['required', 'string', 'max:255'],
            'dashboard_content' => ['required', 'string'],
        ]);

        $user->update([
            'dashboard_title' => $request->dashboard_title,
            'dashboard_content' => $request->dashboard_content,
        ]);

        return redirect()->route('dashboard')->with('status', 'dashboard-updated');
    }

    /**
     * Delete user credentials.
     */
    public function deleteUser(User $user)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $user->delete();

        return redirect()->route('dashboard')->with('status', 'user-deleted');
    }
}
