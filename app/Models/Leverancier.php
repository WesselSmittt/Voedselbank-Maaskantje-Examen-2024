<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;

    protected $table = 'leveranciers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'bedrijfsnaam',
        'straatnaam',
        'huisnummer',
        'postcode',
        'land',
        'contactpersoon',
        'email',
        'telefoon',
        'volgende_levering'
    ];

    public function producten()
    {
        return $this->hasMany(Voorraad::class, 'leverancier_id');
    }
}
