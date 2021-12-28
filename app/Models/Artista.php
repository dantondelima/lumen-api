<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $fillable = ['nome'];
    protected $appends = ['links'];

    public function musicas(){
        return $this->hasMany(Musica::class);
    }

    public function setNomeAttribute(string $nome): void
    {
        $this->attributes['nome'] = mb_convert_case($nome, MB_CASE_TITLE);
    }

    public function getLinksAttribute()
    {
        return [
            'self' => '/api/artistas/'. $this->id,
            'musicas' => '/api/artistas/'. $this->id .'/musicas'
        ];
    }

}
