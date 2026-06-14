<?php

namespace App\Http\Controllers;

use App\Models\Group;

class BalanceController extends Controller
{
    public function index(Group $group)
    {
        $group->load(
            'members.user',
            'expenses.splits'
        );

        $balances = [];

        foreach ($group->members as $member)
        {
            $balances[$member->user_id] = [
                'name' => $member->user->name,
                'paid' => 0,
                'share' => 0,
                'balance' => 0
            ];
        }

        foreach ($group->expenses as $expense)
        {
            $balances[
                $expense->paid_by
            ]['paid']
                += $expense->amount;

            foreach (
                $expense->splits
                as $split
            )
            {
                $balances[
                    $split->user_id
                ]['share']
                    += $split->share_amount;
            }
        }

        foreach ($balances as $id => $data)
        {
            $balances[$id]['balance']
                =
                $data['paid']
                -
                $data['share'];
        }
        $settlements = $group->settlements;

foreach ($settlements as $settlement)
{
    $balances[
        $settlement->payer_id
    ]['balance']
        += $settlement->amount;

    $balances[
        $settlement->receiver_id
    ]['balance']
        -= $settlement->amount;
}

        return view(
            'balances.index',
            compact(
                'group',
                'balances'
            )
        );
    }
}