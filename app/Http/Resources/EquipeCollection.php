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
            'cover' => $this->cover,
            'name' => $this->name,
            'posted' => $this->posted,
            'domaine de competence'=> $this->domaine_competence,
            'descriptions' => $this->descriptions,
            'formations' => $this->formations,
            'affilations' => $this->affilations,
            'curriculum vitae' => $this->curiculum,
            'links' => $this->links,
            'selection' => $this->selection,
        ];
    }
}
