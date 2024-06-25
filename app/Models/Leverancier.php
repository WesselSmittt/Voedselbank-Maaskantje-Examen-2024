<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;

    protected $primaryKey = 'leverancier_id';

    protected $fillable = [
        'bedrijfsnaam', 'straatnaam', 'huisnummer', 'postcode', 'land', 'contactpersoon', 'email', 'telefoon', 'volgende_levering'
    ];
}
