<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ActualityCollection extends JsonResource
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
            'description' => $this->description,
            'title' => $this->title,
            'category'=> $this->category,
            'created_at' => (new DateTime($this->created_at))->format('Y-m-d'),
            'updated_at' => (new DateTime($this->updated_at))->format('Y-m-d'),
        ];
    }
}
