/*!
 * Select passphrase on click
 *
 * Couldn't get script to select all text on focus event.
 */


var clickListener = function( event ) {
                    // select all text in element
                    event.target.setSelectionRange(0, this.value.length);
                    // stop listening, allows selection of a portion of text
                    event.target.removeEventListener('click', clickListener); }

passphrase.addEventListener('click', clickListener );

passphrase.addEventListener('blur', function( event ) { 
                    // start listening again
                    event.target.addEventListener('click', clickListener ); } );
