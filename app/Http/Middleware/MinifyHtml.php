<?php

namespace App\Http\Middleware;

use Closure;

class MinifyHtml
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (method_exists($response, 'getContent')) {
            $output = $response->getContent();

            // Hapus komentar
            $output = preg_replace('/<!--(.*?)-->/', '', $output);
            // Hapus whitespace
            $output = preg_replace('/\s+/', ' ', $output);

            $response->setContent($output);
        }

        return $response;
    }
}
