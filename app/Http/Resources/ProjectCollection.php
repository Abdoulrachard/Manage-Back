<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class ProjectCollection extends JsonResource
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
            'cover' => $this->cover_path,
            'year' => $this->year,
            'project_name' => $this->project_name,
            'city'=> $this->city,
            'descriptions' => $this->descriptions,
            'developer' => $this->developer,
            'maitre_ouvre' => $this->maitre_ouvre,
            'typologie' => $this->typologie,
            'programme' => $this->programme,
            'procedure' => $this->procedure,
            'signaletique' => $this->signaletique,
            'surface' => $this->surface,
            'realisation' => $this->realisation,
            'volume' => $this->volume,
            'additional_images'=>GalleryCollection::collection($this->galleries)
        ];
    }
}
