<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/api',
        'http://127.0.0.1:8000/api',
        'http://localhost:8188/api/stripe',
        'http://localhost:8188/api/stripe/pay',
    ];
}
