<?php

namespace App\Models;

use App\LogisticTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsTable extends Model
{
    use HasFactory;

    protected $table = 'products_tables';

    protected $fillable = [
        'id',
        'ProductName',
        'ProductPrice',
        'ProductMaxRequest',
        'ProductStatus',
        'category_id',
    ];

    public function categoryTable()
    {
        return $this->belongsTo(ProductCategoryTable::class,'category_id');
    }
}
