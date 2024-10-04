<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class GetBookController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        return new Response('TODO: Implement this endpoint.');
    }
}
