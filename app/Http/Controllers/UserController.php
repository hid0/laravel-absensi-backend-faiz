<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::where('name', 'like', '%' . request('name') . '%')->orderBy('created_at', 'desc')->paginate(10);
    return view('pages.users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('pages.users.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:8',
    ]);

    User::create([
      'id' => uuid_create(),
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'role' => $request->role,
      'password' => Hash::make($request->password),
    ]);

    return redirect()->route('users.index')->with('success', 'User created successfully');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    return view('pages.users.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required|email',
    ]);

    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'phone' => $request->phone,
      'role' => $request->role,
    ]);

    //if password filled
    if ($request->password) {
      $user->update([
        'password' => Hash::make($request->password),
      ]);
    }

    return redirect()->route('users.index')->with('success', 'User updated successfully');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully');
  }
}
