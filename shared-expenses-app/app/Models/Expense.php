<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    public function splits()
{
    return $this->hasMany(ExpenseSplit::class);
}

public function payer()
{
    return $this->belongsTo(User::class,'paid_by');
}
}
