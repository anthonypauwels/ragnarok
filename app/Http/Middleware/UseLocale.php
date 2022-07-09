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
        if ( Session::has('locale') ) {
            $locale = Session::get('locale');
        } else {
            $locale = Str::before( $request->getPreferredLanguage( ['fr', 'nl', 'en'] ), '_') ;
        }

        App::setLocale( $locale );

        return $next( $request );
    }
}