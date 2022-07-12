<?php
namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class MainController extends Controller
{
    /**
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function getIndex(Request $request):View|RedirectResponse
    {
        $locales = config('app.authorized_locales');

        if ( $request->hasAny( $locales ) ) {
            $locale = Arr::first( array_keys( $request->query() ) );

            if ( in_array( $locale, $locales ) ) {
                $request->session()->put( 'locale', $locale );
            }

            return redirect()->route('get.index');
        }

        javascript('translations', __('common') );
        javascript('races', $this->getRaces() );
        javascript('inclinations', $this->getInclinations() );
        javascript('spells', $this->getSpells() );
        javascript('baseUrl', Str::finish( config('app.url'), '/' ) );

        return view('app' );
    }

    /**
     * @return array
     */
    protected function getRaces(): array
    {
        $races = [];

        foreach ( config('ragnarok.races') as $name => $race ) {
            $labels = __('races.' . $name );

            $can = $cannot = [];

            foreach ( $race['can'] as $skill_name ) {
                $can[ $skill_name ] = __('skills.' . $skill_name . '.name');
            }

            foreach ( $race['cannot'] as $skill_name ) {
                $cannot[ $skill_name ] = __('skills.' . $skill_name . '.name');
            }

            $race['can'] = $can;
            $race['cannot'] = $cannot;

            $races[ $name ] = array_merge( $labels, $race );
        }

        return $races;
    }

    /**
     * @return array
     */
    protected function getInclinations(): array
    {
        $inclinations = [];

        foreach ( config('ragnarok.inclinations') as $name => $skills ) {
            $labels = __('inclinations.' . $name );

            foreach ( $skills as $skill => $items ) {
                $items['id'] = $skill;
                $items['inclination'] = $name;

                $skills[ $skill ] = array_merge( __('skills.' . $skill ), $items);
            }

            $inclinations[ $name ] = array_merge( $labels, compact('skills') );
        }

        return $inclinations;
    }

    /**
     * @return array
     */
    protected function getSpells():array
    {
        $spells = [];

        foreach ( config('ragnarok.spells') as $rank => $items ) {
            if ( !isset( $spells[ $rank ] ) ) {
                $spells[ $rank ] = [];
            }

            foreach ( $items as $name ) {
                $labels = __('spells.' . $name );

                $labels['id'] = $name;
                $labels['rank'] = $rank;

                $spells[ $rank ][] = $labels;
            }
        }

        return $spells;
    }
}
