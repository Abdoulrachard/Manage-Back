<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipeCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cover_path' => $this->cover_path,
            'name' => $this->name,
            'posted' => $this->posted,
            'domaine de competence'=> $this->domaine_competence,
            'descriptions' => $this->descriptions,
            'formations' => $this->formations,
            'affilations' => $this->affilations,
            'curriculum vitae' => $this->curiculum,
            'links' => $this->links,
            'selections' => $this->selections,
            'additional_images.*'=>GalleryCollection::collection($this->galleries),
        ];
    
    }
}
