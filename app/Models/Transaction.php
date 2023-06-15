<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Transaction extends Model
{
use HasFactory;

protected $fillable = ['category_id','transaction_date','amount','description','user_id'];


    protected $casts = [
    'transaction_date' => 'date',
    'created_at' => 'datetime',
];

public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

public function setAmountAttribute($value){
$this->attributes['amount'] = $value * 100;
}

public function setTransactionDateAttribute($value){
$this->attributes['transaction_date'] = Carbon::createFromFormat('d-m-Y',$value)->format('Y-m-d');
}

protected static function booted(): void
{
    if(auth()->check()){
    static::addGlobalScope('transaction_by_user', function (Builder $builder) {
        $builder->where('user_id', auth()->id());
    });
    }
}


}
