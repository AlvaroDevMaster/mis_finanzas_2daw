<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heading = ['description' => 'Description', 'amount' => 'Amount', 'category_id' => 'Category', 'date' => 'Date'];
        $data = Spending::select(array_keys($heading))->orderBy('date', 'desc')->paginate(10);
        
        //Aquí la lógica de negocio para el index
        return view('spending.index',['title' => 'My Spendings','tableData' => compact('heading','data')]);
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
    public function show(Spending $spending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spending $spending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spending $spending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spending $spending)
    {
        //
    }
}
