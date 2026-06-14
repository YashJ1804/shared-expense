<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupMemberController extends Controller
{
    public function store(Request $request, Group $group)
    {
        $request->validate([
            'user_id' => 'required',
            'joined_at' => 'required|date'
        ]);

        GroupMember::create([
            'group_id' => $group->id,
            'user_id' => $request->user_id,
            'joined_at' => $request->joined_at,
            'status' => 'active'
        ]);

        return back()
            ->with('success','Member added');
    }

    public function destroy(Group $group, GroupMember $member)
    {
        $member->update([
            'left_at' => now(),
            'status' => 'left'
        ]);

        return back()
            ->with('success','Member removed');
    }
}