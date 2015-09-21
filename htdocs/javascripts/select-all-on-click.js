/*!
 * Select passphrase on click
 *
 * Couldn't get script to select all text on focus event.
 */
var pass = document.getElementById('passphrase');
var qtyW = document.getElementById('qtyWords');
var qtyS = document.getElementById('qtySymbols');
var qtyD = document.getElementById('qtyDigits');

var clickListener = function( event ) {
                    // select all text in element
                    event.target.setSelectionRange(0, this.value.length);
                    // stop listening, allows selection of a portion of text
                    event.target.removeEventListener('click', clickListener);
                    }

pass.addEventListener('click', clickListener );

pass.addEventListener('blur', function( event ) {
                    // start listening again
                    event.target.addEventListener('click', clickListener );
                    } );

/*!
 * Limit # of symbols and digits to no greater than # of words
 *
 */
qtyW.addEventListener('blur', function( event ) {
                    var newMax;
                    if (event.target.valueAsNumber <= 1) {
                        newMax = 1;
                        }
                    if (event.target.valueAsNumber >= 9) {
                        newMax = 9;
                        }
                    else {
                        newMax = event.target.value;
                        }

                    qtyS.setAttribute("max", newMax);
                    qtyD.setAttribute("max", newMax);
                    } );
