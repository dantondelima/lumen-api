<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $fillable = ['nome', 'numero', 'escutada', 'artista_id'];

    public function artista(){
        return $this->belongsTo(Artista::class);
    }

    public function getEscutadaAttribute($escutada)
    {
        return $escutada;
    }

    public function setNomeAttribute(string $nome): void
    {
        $this->attributes['nome'] = mb_convert_case($nome, MB_CASE_TITLE);
    }

}
