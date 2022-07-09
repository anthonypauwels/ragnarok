let isPrinting = false;

/**
 * @example
 * import printer from 'printer.js';
 *
 * const my_printable_element = document.querySelector('.printable_container');
 * printer(my_printable_element);
 *
 * @todo : using promise or await / async ?
 * @param element
 */
export default function ( element )
{
    // if we are currently printing, abort the process
    if ( isPrinting ) {
        return;
    }

    const origParent = element.parentNode;
    const origDisplay = [];
    const body = document.body;
    const childNodes = body.childNodes;

    isPrinting = true;

    // we hide every nodes of the page
    childNodes.forEach( (node, i) => {
        if ( node.nodeType === 1 ) {
            // push the current display state for later
            origDisplay[i] = node.style.display;
            // hide the node
            node.style.display = 'none';
        }
    } );

    // push the element in the body
    body.appendChild( element );

    document.dispatchEvent( new Event('beforeprint') );

    // execute the browser print behavior
    window.focus();
    window.print();

    document.dispatchEvent( new Event('afterprint') );

    // revert the change when printing process is finished
    setTimeout( () => {
        // push back the element in his origin parent
        origParent.appendChild( element );

        childNodes.forEach( (node, i) => {
            if ( node.nodeType === 1 ) {
                // revert the display state with the origin state
                node.style.display = origDisplay[i];
            }
        } );

        isPrinting = false;
    } );
};
