<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryTable;
use App\Models\ProductsTable;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('product.index',[
            'category' => ProductCategoryTable::where('CategoryStatus',1)->get()
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
        $model = new ProductsTable();
        $model->ProductName = $request->ProductName;
        $model->ProductPrice = $request->ProductPrice;
        $model->ProductMaxRequest = $request->ProductMaxRequest;
        $model->ProductStatus = $request->has('status') ? 0 : 1;
        $model->category_id = $request->category_id;
        $model->save();

        return [
            'model' => $model,
            'status' => 'success'
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($id == 'all') {
            return DataTables::of(ProductsTable::with('categoryTable'))->toJson();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = ProductsTable::find($id);
        $model->ProductName = $request->ProductName;
        $model->ProductPrice = $request->ProductPrice;
        $model->ProductMaxRequest = $request->ProductMaxRequest;
        $model->ProductStatus = $request->has('status') ? 0 : 1;
        $model->category_id = $request->category_id;
        $model->save();

        return [
            'model' => $model,
            'status' => 'success'
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductsTable::destroy($id);
        return 'success';
    }
}
