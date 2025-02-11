<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SpendingController extends Controller
{
    use ValidatesRequests;
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
        $formInputs = [
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
        
        return view('spending.create', [
            'title' => 'Add income', 'formInputs' => $formInputs,
            'action' => route('spendings.store'), 'method' => 'POST'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'description' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0.01'
        ]);
        
        $income = Spending::create($validatedData);
        return redirect()->route('spendings.index')->with('success', 'Spending added successfully');
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
