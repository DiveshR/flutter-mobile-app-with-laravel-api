<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','transaction_date','amount','description'];


        protected $casts = [
        'transaction_date' => 'date',
        'created_at' => 'datetime',
    ];

    public function category(): BelongsTo
        {
            return $this->belongsTo(category::class);
        }
    
}
