<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
    ];

    public function interventi()
    {
        return $this->hasMany(Intervento::class, 'client_id');
    }
}
