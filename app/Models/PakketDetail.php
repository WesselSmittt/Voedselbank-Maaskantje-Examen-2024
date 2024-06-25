<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PakketDetail extends Model
{
    use HasFactory;

    protected $table = 'pakket_details';

    protected $fillable = [
        'pakket_id',
    ];

    public $timestamps = false; // Disable timestamps

    public function voedselpakket()
    {
        return $this->belongsTo(Voedselpakket::class, 'pakket_id');
    }
}
