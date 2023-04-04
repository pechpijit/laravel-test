<?php

namespace App\Http\Controllers;

use App\LogisticTable;
use App\Models\ProductCategoryTable;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index');
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
        $model = new ProductCategoryTable();
        $model->CategoryName = $request->CategoryName;
        $model->CategoryMaxRequest = $request->CategoryMaxRequest;
        $model->CategoryStatus = $request->has('status') ? 0 : 1;
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
            return DataTables::of(ProductCategoryTable::all())->toJson();
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
        $model = ProductCategoryTable::find($id);
        $model->CategoryName = $request->CategoryName;
        $model->CategoryMaxRequest = $request->CategoryMaxRequest;
        $model->CategoryStatus = $request->has('status') ? 0 : 1;
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
        ProductCategoryTable::destroy($id);
        return 'success';
    }
}
