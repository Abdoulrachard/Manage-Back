<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $yourDate = Carbon::parse($request->created_at);
        $currentDateTime = Carbon::now();

        $formattedTime = $yourDate->diffForHumans($currentDateTime);

        return [
            'id' => $request->id,
            'name' => $request->name,
            'desc' => $request->desc,
            'date' => $formattedTime
        ];
    }
}
