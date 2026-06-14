<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Expense;
use App\Models\ExpenseSplit;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create(Group $group)
    {
        $group->load('members.user');

        return view(
            'expenses.create',
            compact('group')
        );
    }

    public function store(
        Request $request,
        Group $group
    )
    {
        $request->validate([
            'title' => 'required',
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
            'paid_by' => 'required',
            'split_type' => 'required'
        ]);

        $expense = Expense::create([
            'group_id' => $group->id,
            'title' => $request->title,
            'description' => $request->description,
            'amount' => $request->amount,
            'currency' => 'INR',
            'expense_date' => $request->expense_date,
            'paid_by' => $request->paid_by,
            'split_type' => $request->split_type
        ]);

        $memberCount =
            $group->members()->count();

        $share =
            $expense->amount / $memberCount;

        foreach(
            $group->members as $member
        )
        {
            ExpenseSplit::create([
                'expense_id' => $expense->id,
                'user_id' => $member->user_id,
                'share_amount' => $share
            ]);
        }

        return redirect()
            ->route('groups.show',$group->id)
            ->with(
                'success',
                'Expense Added'
            );
    }
}