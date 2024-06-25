<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    protected $table = 'klanten';

    protected $fillable = [
        'voornaam', 
        'achternaam',
        'adres',
        'telefoon',
        'email',
        'volwassenen',
        'kinderen',
        'babys',
    ];

    public $timestamps = false;

    public function producten()
    {
        return $this->hasMany(Product::class, 'klant_id');
    }

    public function specialeBehoeften()
    {
        return $this->belongsToMany(SpecialeBehoefte::class, 'klant_speciale_behoeften', 'klant_id', 'behoefte_id');
    }

    public function voedselPakketten()
    {
        return $this->hasMany(VoedselPakket::class, 'klant_id');
    }
}

