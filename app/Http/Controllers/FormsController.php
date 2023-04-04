<?php

namespace App\Http\Controllers;

use App\Models\FormDetailTable;
use App\Models\FormsTable;
use App\Models\ProductCategoryTable;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('form.create', [
            'category' => ProductCategoryTable::where('CategoryStatus', 1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form = new FormsTable();
        $form->user_id = \Auth::id();
        $form->description = $request->note;
        $form->save();

        try {
            foreach ($request->items as $key => $val) {
                $formDetail = new FormDetailTable();
                $formDetail->form_id = $form->id;
                $formDetail->type = $val['type'];
                $formDetail->description = $val['description'];
                if ($val['type'] == 1 || $val['type'] == '1') {
                    $formDetail->product_id = $val['product_id'];
                } else {
                    $formDetail->other_name = $val['other_name'];
                    $formDetail->other_price = $val['other_price'];
                }
                $formDetail->save();
            }
        } catch (\Exception $exception) {
            FormsTable::destroy($form->id);
            return dd([
                'request' => $request,
                'exception' => $exception
            ]);
        }

        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($id == 'all') {
            $model = FormsTable::with('usersTable');
            if (!\Auth::user()->isAdmin()) {
                $model = $model->where('user_id', \Auth::id());
            }
            $model = $model->get()->each(function ($items) {
                $items->append('create_date');
            });
            return DataTables::of($model)->toJson();
        } else {
            $model = FormsTable::with('formDetailTable.productsTable')->where('id', $id)->get()->each(function ($items) {
                $items->append('create_date');
            });
            return DataTables::of($model)->toJson();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
