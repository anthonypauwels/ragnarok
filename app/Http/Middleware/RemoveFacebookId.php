<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveFacebookId
{
    public function handle(Request $request, Closure $next)
    {
        if ( $request->has('fbclid') ) {
            return redirect( $request->url() );
        }

        return $next( $request );
    }
}