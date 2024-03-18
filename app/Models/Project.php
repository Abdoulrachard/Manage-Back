<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'project_name','city', 'developer', 'maitre_ouvre', 'typologie', 'programme','procedure', 'signaletique' , 'descriptions', 'cover_id', 
    ];

    public function cover() : BelongsTo 
    {
            return $this->belongsTo(Gallery::class) ;
    }
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }

}
