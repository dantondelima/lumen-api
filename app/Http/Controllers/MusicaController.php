<?php

namespace App\Http\Controllers;

use App\Services\MusicaService;
use Illuminate\Http\Request;

class MusicaController extends AbstractController
{

    /**
     * @param MusicaService $service
     */
    public function __construct(MusicaService $service)
    {
        $this->service = $service;
    }
}
