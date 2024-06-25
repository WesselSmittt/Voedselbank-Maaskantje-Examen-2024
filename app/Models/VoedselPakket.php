<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoedselPakket extends Model
{
    use HasFactory;

    protected $table = 'voedsel_pakkets';

    protected $fillable = [
        'samenstelling_datum',
        'uitgifte_datum',
        'product_id',
        'klant_id'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function pakketDetails()
    {
        return $this->hasMany(PakketDetail::class, 'pakket_id');
    }

    public function klant()
    {
        return $this->belongsTo(Klant::class, 'klant_id');
    }

}

