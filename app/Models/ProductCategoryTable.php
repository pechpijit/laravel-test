<?php

namespace App\Models;

use App\OrderTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryTable extends Model
{
    use HasFactory;

    protected $table = 'product_category_tables';

    protected $fillable = [
        'id',
        'CategoryName',
        'CategoryStatus',
        'CategoryMaxRequest',
    ];

    public function productsTable()
    {
        return $this->hasMany(ProductsTable::class);
    }
}
