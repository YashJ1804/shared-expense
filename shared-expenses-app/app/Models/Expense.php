<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'group_id',
        'title',
        'description',
        'amount',
        'currency',
        'expense_date',
        'paid_by',
        'split_type'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function payer()
    {
        return $this->belongsTo(User::class,'paid_by');
    }

    public function splits()
    {
        return $this->hasMany(ExpenseSplit::class);
    }
}