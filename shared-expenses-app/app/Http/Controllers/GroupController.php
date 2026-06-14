<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\User;
class GroupController extends Controller
{
   public function index()
{
    $groups = Group::latest()->get();

    return view('groups.index', compact('groups'));
}

public function create()
{
    return view('groups.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable'
    ]);

    Group::create([
        'name' => $request->name,
        'description' => $request->description,
        'created_by' => auth()->id()
    ]);

    return redirect()
        ->route('groups.index')
        ->with('success','Group created successfully');
}
public function show(Group $group)
{
    $group->load('members.user');

    $users = User::all();

    return view('groups.show', compact(
        'group',
        'users'
    ));
}
}
