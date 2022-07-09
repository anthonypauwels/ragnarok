/**
 * @example
 * import sameHeight from './lib/same-height';
 *
 * sameHeight('.card');
 */
export default function (elements)
{
    setTimeout( () => {
        if ( typeof elements === 'string' ) {
            elements = document.querySelectorAll( elements );
        }

        const maxEls = elements.length;

        for ( let i = 0; i < maxEls; i++ ) {
            elements[ i ].style.removeProperty('height');
        }

        const heights = [];

        for ( let i = 0; i < maxEls; i++ ) {
            heights.push( elements[ i ].offsetHeight );
        }

        const tallest = Math.max( ...heights );

        for ( let i = 0; i < maxEls; i++ ) {
            elements[ i ].style.height = tallest + 16 + "px";
        }
    } );
};
