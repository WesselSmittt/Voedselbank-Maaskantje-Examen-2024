<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'producten';

    protected $fillable = [
        'product_naam',
        'categorie_id',
        'ean',
        'hoeveelheid',
        'leverancier_id',
        'klant_id',
    ];

    public $timestamps = false;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class, 'leverancier_id');
    }

    public function klanten()
    {
        return $this->hasMany(Klant::class, 'id', 'klant_id');
    }

    public function voedselPakketten()
    {
        return $this->hasMany(VoedselPakket::class, 'product_id');
    }
}
