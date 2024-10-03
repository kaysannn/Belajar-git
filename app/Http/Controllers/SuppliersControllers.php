<?php

namespace App\Http\Controllers;

use App\Http\Resources\SuppliersResource;
use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersControllers extends Controller
{
   public function index()
    {
        $suppliers = Suppliers::all();
        return SuppliersResource::collection($suppliers->loadMissing('supplier_categories:id,name'));

    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'supplier_category_id' => 'required|exists:supplier_categories,id',
            'company_name' =>'required',
            'address' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',

        ]);
        
        $suppliers = Suppliers::create($request->all());

        return new SuppliersResource($suppliers);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'supplier_category_id' => 'required|exists:supplier_categories,id',
            'company_name' =>'required',
            'address' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
        ]);

        $suppliers = Suppliers::findOrFail($id);
        $suppliers->update($request->all());

        return new SuppliersResource($suppliers);
    }

    public function destroy($id)
    {   
        $suppliers = Suppliers::findOrFail($id);
        $suppliers->delete();

        return new SuppliersResource($suppliers);
    }
}
