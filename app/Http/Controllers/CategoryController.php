<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heading = [
            'name' => 'Name',
            'type' => 'Type',
            'show' => 'Show'
        ];

        $data = Category::select('id', 'name', 'type')
            ->orderBy('name')
            ->paginate(10);

        $data->map(function ($category) {
            $category->show = route('categories.show', $category);
            return $category;
        });

        return view('category.index', [
            'title' => 'Categories',
            'tableData' => compact('heading', 'data')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $heading = [
            'description' => 'Description',
            'amount' => 'Amount',
            'date' => 'Date'
        ];
        
        $fields = array_keys($heading);
        array_push($fields, "id");
        
        // Get the relationship based on category type
        $data = $category->{$category->type}()
            ->select($fields)
            ->orderBy('date', 'desc')
            ->paginate(10);
    
        return view('category.show', [
            'title' => 'Category: ' . $category->name,
            'tableData' => compact('heading', 'data'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
