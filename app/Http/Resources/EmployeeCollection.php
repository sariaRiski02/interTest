<?php

namespace App\Http\Resources;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'Pesan success',
            'data' =>
            ["employees" => $this->collection->transform(function ($data) {
                $division = $data->division()->first()->only(['id', 'name']);
                // dd($division);
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'division' => $division,
                ];
            })],

        ];
    }
}
