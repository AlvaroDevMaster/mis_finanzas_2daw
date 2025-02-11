<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Spending extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'description', 'date', 'category_id'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public static function getFormInputs(){
        return [
            [
                'type' => 'text',
                'name' => 'description',
                'label' => 'Description',
                'placeholder' => 'Enter description',
                'required' => true,
                'gridClass' => 'sm:col-span-2'
            ],
            [
                'type' => 'select',
                'name' => 'category_id',
                'label' => 'Category',
                'options' => Category::where('type', 'expense')->pluck('name', 'id')->toArray(),
                'placeholder' => 'Select category',
                'required' => true
            ],
            [
                'type' => 'date',
                'name' => 'date',
                'label' => 'Date',
                'required' => true,
                'gridClass' => 'w-full'
            ],
            [
                'type' => 'number',
                'name' => 'amount',
                'label' => 'Amount',
                'placeholder' => 'Enter amount',
                'required' => true,
                'step' => '0.01',
                'min' => '0',
                'gridClass' => 'w-full'
            ]
        ];
    }
}
