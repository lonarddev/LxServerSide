<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gift extends Model
{
    //Campos que podem ser preenchidos através do Model
    protected $fillable = [
        'name',
        'expected_value',
        'user_id',
        'spent_value'
    ];

    // Relação entre prenda e user
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }
}
