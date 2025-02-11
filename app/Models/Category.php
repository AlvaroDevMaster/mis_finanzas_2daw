<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type'];
    
    public function incomes()

    {

        return $this->hasMany(Income::class);

    }


    public function expenses()

    {

        return $this->hasMany(Spending::class);

    }
}
