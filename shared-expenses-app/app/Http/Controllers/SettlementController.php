<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Settlement;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    public function create(Group $group)
    {
        $group->load('members.user');

        return view(
            'settlements.create',
            compact('group')
        );
    }

    public function store(
        Request $request,
        Group $group
    )
    {
        $request->validate([
            'payer_id' => 'required',
            'receiver_id' => 'required',
            'amount' => 'required|numeric|min:1'
        ]);

        Settlement::create([
            'group_id' => $group->id,
            'payer_id' => $request->payer_id,
            'receiver_id' => $request->receiver_id,
            'amount' => $request->amount,
            'settlement_date' => now(),
            'notes' => $request->notes
        ]);

        return redirect()
            ->route('groups.show',$group->id)
            ->with(
                'success',
                'Settlement recorded'
            );
    }
}