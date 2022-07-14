<?php

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as Router;
use Pangu\Common\JavaScript\JavaScript;
use Pangu\Metadata\MetadataGenerator;

/**
 * Export application routes url by name
 *
 * @param array $which
 * @return array
 */
if ( !function_exists( 'export_routes' ) )
{
    function export_routes(array $which = []): array
    {
        $routes = collect( Router::getRoutes()->getRoutesByName() );

        if ( !empty( $which ) ) {
            $routes = $routes->only( $which );
        }

        $routes = $routes->mapWithKeys( function (Route $value, $key ) {
            return [ $key => $value->uri() ];
        } );

        return $routes->toArray();
    }
}

/**
 * @param mixed|null $key
 * @param mixed|null $value
 * @param string|null $namespace
 * @return JavaScript
 */
if ( !function_exists( 'javascript' ) )
{
    function javascript(mixed $key = null, mixed $value = null, ?string $namespace = null):JavaScript
    {
        if ( $key ) {
            return JavaScript::getInstance()->put( $key, $value, $namespace );
        }

        return JavaScript::getInstance();
    }
}

/**
 * @param mixed|null $key
 * @param mixed|null $value
 * @param string|null $namespace
 * @return JavaScript
 */
if ( !function_exists( 'javascript' ) )
{
    function javascript(mixed $key = null, mixed $value = null, ?string $namespace = null):JavaScript
    {
        if ( $key ) {
            return JavaScript::getInstance()->put( $key, $value, $namespace );
        }

        return JavaScript::getInstance();
    }
}

/**
 * @return MetadataGenerator
 */
if ( !function_exists( 'metadata' ) )
{
    function metadata(): MetadataGenerator
    {
        return MetadataGenerator::getInstance();
    }
}