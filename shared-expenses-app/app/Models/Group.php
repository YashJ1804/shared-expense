<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    public function members()
{
    return $this->hasMany(GroupMember::class);
}

public function expenses()
{
    return $this->hasMany(Expense::class);
}
}
