<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervento extends Model
{
    protected $table = 'interventi';
    protected $fillable = [
        'client_id',
        'descrizione',
        'data_intervento',
        'note',
    ];
}
