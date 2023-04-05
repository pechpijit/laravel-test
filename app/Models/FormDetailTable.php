<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDetailTable extends Model
{
    use HasFactory;

    protected $table = 'form_detail_tables';

    protected $fillable = [
        'id',
        'form_id',
        'product_id',
        'category_id',
        'description',
        'amount',
        'type',
        'other_name',
        'other_detail',
        'other_price',
    ];

    public function formsTable()
    {
        return $this->belongsTo(FormsTable::class,'form_id');
    }

    public function productsTable()
    {
        return $this->belongsTo(ProductsTable::class,'product_id');
    }

    public function categoryTable()
    {
        return $this->belongsTo(ProductCategoryTable::class,'category_id');
    }
}
