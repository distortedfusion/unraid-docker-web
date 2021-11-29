<?php

namespace App\Http\Controllers;

use App\Facades\Docker;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DockerImageController extends Controller
{
    /**
     * Get a file response for the mounted images.
     *
     * @param string $image
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke(string $image): BinaryFileResponse
    {
        abort_unless(Docker::storage()->has('images/'.$image), 404);

        return response()->file(Docker::storage()->path('images/'.$image));
    }
}
