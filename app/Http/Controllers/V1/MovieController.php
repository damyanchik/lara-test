<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\MovieService;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    public function __construct(private MovieService $movieService)
    {
    }

    public function getTitles(): JsonResponse
    {
        $titles = $this->movieService->getTitlesFromApi();

        if (empty($titles)) {
            return response()->json(['status' => 'failute']);
        }

        return response()->json($titles);
    }
}
