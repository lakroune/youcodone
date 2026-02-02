<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    protected $table = 'plats';

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
