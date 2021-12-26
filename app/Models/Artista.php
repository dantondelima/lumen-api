<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $fillable = ['nome'];

    public function musicas(){
        return $this->hasMany(Musica::class);
    }
}
