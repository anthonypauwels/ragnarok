<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class UseLocale
{
    public function handle(Request $request, Closure $next)
    {
        /** Force locale to Fr */
        App::setLocale( 'fr' );

        return $next( $request );
    }
}