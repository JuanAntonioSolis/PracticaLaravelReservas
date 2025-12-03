<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    protected $fillable = ['fecha', 'hora', 'sala_id', 'user_id', 'numPersonas', 'estado','telefono'];

    /**
     * @return BelongsTo Develve la sala a la que pertenece la reserva
     */
    public function sala(): BelongsTo{
        return $this->belongsTo(Sala::class);
    }

    /**
     * @return BelongsTo Devuelve el usuario que ha hecho la reserva
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
