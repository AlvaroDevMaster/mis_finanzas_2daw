<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Category;
use Illuminate\Foundation\Validation\ValidatesRequests;

class IncomeController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heading = [

            'description' => 'Description', 
        
            'amount' => 'Amount', 
        
            'category_id' => 'Category',
        
            'date' => 'Date'
        
        ];
        
        
        $data = Income::select('id', 'description', 'amount', 'category_id', 'date')
        
            ->orderBy('date', 'desc')
        
            ->with('category')
        
            ->paginate(10);
        
        
        return view('income.index', [
        
            'title' => 'My incomes',
        
            'tableData' => compact('heading', 'data')
        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formInputs = Income::getFormInputs();
        
        return view('income.create', [
            'title' => 'Add income', 'formInputs' => $formInputs,
            'action' => route('incomes.store'), 'method' => 'POST'
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
        
        $income = Income::create($validatedData);
        return redirect()->route('incomes.index')->with('success', 'Income created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return '<p>Esta es la página del show de incomes</p>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $formInputs = Income::getFormInputs();
        $income = Income::select('description', 'amount', 'category_id', 'date')
            ->with('category')
            ->find($id);

        return view('income.edit', [
            'title' => 'Edit income', 
            'formInputs' => $formInputs,
            'action' => route('incomes.update', $id), 
            'method' => 'PUT',
            'model' => $income
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $this->validate($request, [
            'description' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0.01'
        ]);
        $income = Income::findOrFail($id);
        $income = $income->update($validatedData, ['id' => $id]);
        return redirect()->route('incomes.index')->with('alertType','success')->with('message','Income updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income = Income::destroy($id);
        return redirect()->route('incomes.index')->with('success','Income deleted successfully');
    }
}
