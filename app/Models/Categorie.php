<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'categorie_naam',
    ];

    public function producten()
    {
        return $this->hasMany(Voorraad::class, 'categorie_id');
    }
}
