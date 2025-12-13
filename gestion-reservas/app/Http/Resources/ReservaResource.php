<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sala' => $this->sala_id,
            'user' => $this->user->email,
            'telefono' => $this->telefono,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'numPersonas' => $this->numPersonas,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
