<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Actuality extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'cover_id', 'category_id'
    ];

    public function cover() : BelongsTo 
    {
            return $this->belongsTo(Gallery::class) ;
    }

    public function category() : BelongsTo 
    {
            return $this->belongsTo(Category::class) ;
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
}
