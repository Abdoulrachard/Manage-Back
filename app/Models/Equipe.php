<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_id' ,'name' , 'posted', 'descriptions' , 'domaine_competence' , 'formations' , 'affilations' , 'curiculum' , 'links' , 'selections' , 
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
