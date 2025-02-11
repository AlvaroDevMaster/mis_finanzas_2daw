<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Income extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'description', 'date', 'category_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
