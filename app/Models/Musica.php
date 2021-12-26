<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $fillable = ['nome', 'numero', 'escutada', 'artista_id'];

    public function artista(){
        return $this->belongsTo(Artista::class);
    }
}
