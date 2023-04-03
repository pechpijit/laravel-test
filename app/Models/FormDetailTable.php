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
        'product_id',
        'description',
        'amount',
        'type',
        'other_detail',
        'other_price',
    ];
}
