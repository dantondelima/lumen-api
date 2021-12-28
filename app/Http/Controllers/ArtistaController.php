<?php

namespace App\Http\Controllers;

use App\Services\ArtistaService;

class ArtistaController extends AbstractController
{
    /**
     * @var ArtistaService
     */

    public function __construct(ArtistaService $service)
    {
        $this->service = $service;
    }


}
