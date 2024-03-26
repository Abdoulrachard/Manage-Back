<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Project extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'year' , 'title', 'project_name','city', 'developer', 'maitre_ouvre', 'typologie', 'programme','procedure', 'signaletique' , 'descriptions', 'cover_path','surface','realisation','volume', 
    ];

    public function cover() : BelongsTo 
    {
            return $this->belongsTo(Gallery::class) ;
    }
    public function galleries(): MorphMany
    {
        return $this->morphMany(Gallery::class, 'galleriestable');
    }

}
