<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
        '*'
=======
<<<<<<< HEAD
        "*"
=======
        '*'
>>>>>>> 68a1ac932e5acfa2fe44fcc91e092cd96ab84ada
>>>>>>> c8f276b631a42f4363fe9c637ccaee1b5ce053fb
    ];
}
