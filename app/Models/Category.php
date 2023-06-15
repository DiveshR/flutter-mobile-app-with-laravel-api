<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = ['name','slug','user_id'];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    protected static function booted(): void
    {
        if(auth()->check()){
        static::addGlobalScope('category_by_user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
        }
    }
}
