<?php

namespace App\Http\Controllers;

use App\Mail\CreateFormShipped;
use App\Models\FormDetailTable;
use App\Models\FormsTable;
use App\Models\ProductCategoryTable;
use App\Models\ProductsTable;
use App\Models\User;
use DB;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
                $formDetail->category_id = $val['category_id'];

                if ($val['type'] == 1 || $val['type'] == '1') {
                    $product = ProductsTable::find($val['product_id']);
                    $formDetail->product_id = $val['product_id'];
                    $formDetail->other_price = $product->ProductPrice;
                } else {
                    $formDetail->other_name = $val['other_name'];
                    $formDetail->other_price = $val['other_price'];
                }
                $formDetail->save();
            }
        } catch (\Exception $exception) {
            FormsTable::destroy($form->id);
            return back();
        }

        Mail::to('pechpijit@unixdev.co.th')->send(new CreateFormShipped($form));
        return redirect()->action([FormsController::class, 'show'],['form' => $form->id]);
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
            $model = FormsTable::with('usersTable')
                ->with('formDetailTable.productsTable.categoryTable')
                ->withSum('formDetailTable as sum_other_price', 'other_price')
                ->where('id', $id)->first()->append('create_date');
//            return $model;
            return view('form.show', [
                'data' => $model
            ]);
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
