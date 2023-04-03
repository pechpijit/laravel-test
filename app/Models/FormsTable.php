<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormsTable extends Model
{
    use HasFactory;

    protected $table = 'forms_tables';

    protected $fillable = [
        'id',
        'user_id',
    ];
}
