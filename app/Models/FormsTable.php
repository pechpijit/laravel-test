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
        'description',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getCreateDateAttribute()
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }

    public function usersTable()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function formDetailTable()
    {
        return $this->hasMany(FormDetailTable::class, 'form_id');
    }
}
