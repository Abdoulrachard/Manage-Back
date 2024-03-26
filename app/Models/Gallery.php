<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['path'] ;
    public function actuality(): BelongsTo
    {
        return $this->belongsTo(Actuality::class);
    }
    public function galleriestable(): MorphTo
    {
        return $this->morphTo();
    }
}
