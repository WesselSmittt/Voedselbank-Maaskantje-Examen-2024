<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;

    protected $table = 'leveranciers';

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

    public $timestamps = false; // Disable timestamps

    public function producten()
    {
        return $this->hasMany(Product::class, 'leverancier_id');
    }
}
