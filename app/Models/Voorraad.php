<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voorraad extends Model
{
    use HasFactory;

    protected $table = 'producten';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'product_naam', 'hoeveelheid', 'categorie_id', 'leverancier_id', 'klant_id', 'ean'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id', 'id');
    }

    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class, 'leverancier_id', 'id');
    }

    public function klant()
    {
        return $this->belongsTo(Klant::class, 'klant_id', 'id');
    }
}
