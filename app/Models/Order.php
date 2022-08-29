<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'nombre',
        'telefono',
        'correo',
        'calle',
        'noExterior',
        'noInterior',
        'cp',
        'colonia',
        'municipioDelegacion',
        'estado',
        'nombrePersonaRecibir',
        'total',
        'status'

    ];

    public function getCreatedAtAttribute($date)
    {
        return $this->attributes['created_at'] = Carbon::parse($date)->format('d/m/Y H:i:s');
    }
    public function ordersDetail(){
                return $this->hasMany(OrderDetail::class)->with("productOrder");

    }
}
