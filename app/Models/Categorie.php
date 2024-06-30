<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'categorie_naam',
        'categorie_id',
    ];

    public $timestamps = false;

    public function producten()
    {
        return $this->hasMany(Product::class, 'categorie_id');
    }
}
