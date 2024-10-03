<?php

namespace App\Http\Controllers;

use App\Http\Resources\SupplierCategoriesResource;
use App\Models\supplier_categories;
use Illuminate\Http\Request;

class SupplierCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $categories = supplier_categories::all();
        return SupplierCategoriesResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' =>'required',
            'description' => 'required',

        ]);

        
        $categories = supplier_categories::create($request->all());

        return new SupplierCategoriesResource($categories);
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier_categories $supplier_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplier_categories $supplier_categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' =>'required',
            'description' => 'required',

        ]);

        $categories = supplier_categories::findOrFail($id);
        $categories->update($request->all());

        return new SupplierCategoriesResource($categories);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categories = Supplier_categories::findOrFail($id);
        $categories->delete();

        return new SupplierCategoriesResource($categories);

    }
}
