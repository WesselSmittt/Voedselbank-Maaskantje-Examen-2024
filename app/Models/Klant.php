<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    use HasFactory;

    protected $table = 'klanten';

    protected $fillable = [
        'achternaam',
        'adres',
        'telefoon',
        'email',
        'volwassenen',
        'kinderen',
        'babys',
    ];

    public $timestamps = false; // Disable timestamps

    public function voedselpakket()
    {
        return $this->hasMany(Voedselpakket::class, 'klant_id');
    }

    public function specialeBehoeften()
    {
        return $this->belongsToMany(SpecialeBehoefte::class, 'klant_speciale_behoeften', 'klant_id', 'behoefte_id');
    }
}
