<?php
/**
 * code outside web directory
 *
 * Page-level DocBlock is here because it is the first DocBlock
 * in the file, and contains a @package tag
 * @logic logic
 */

$passphrase = "";

$defaultWordQty = 4;
$minWordQty = 1;
$maxWordQty = 9;
$wordQty = $defaultWordQty;

$minSymbolQty = 0;
$maxSymbolQty = $maxWordQty;
$symbolQty = $minSymbolQty;

$minDigitQty = 0;
$maxDigitQty = $maxWordQty;
$digitQty = $minDigitQty;

// generate a passphrase on form submission
if(isset($_POST['qtyWords']) ) {
    $words = explode(PHP_EOL, file_get_contents('../misc/words-no-apostrophes-ascii-only-all-lower-no-dups') );

    // symbol character list
    $symbols = Array('`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '{', '}', '[', ']', '\\', '|', ':', ';', '"', '\'', '<', '>', ',', '.', '?', '/');

    if($_POST['qtyWords'] != "") {
        $wordQty = validate_int_range($_POST['qtyWords'], $minWordQty, $maxWordQty);
        }

    if(isset($_POST['qtySymbols']) && $_POST['qtySymbols'] != "") {
        $symbolQty = validate_int_range($_POST['qtySymbols'], $minSymbolQty, $wordQty);
        }

    if(isset($_POST['qtyDigits']) && $_POST['qtyDigits'] != "") {
        $digitQty = validate_int_range($_POST['qtyDigits'], $minDigitQty, $wordQty);
        }

    // generate passphrase
    $passphrase = pass_phrase($wordQty, $symbolQty, $digitQty);
    }


/**
 * returns random digit
 *
 */
function random_digit() {
    return  rand(0,9);
}

/**
 * returns random symbol from given array
 *
 */
function random_symbol() {
    global $symbols;
    return $symbols[rand(0,count($symbols)-1 )];
}

/**
 * returns random word from given array
 *
 */
function random_word() {
    global $words;
    return $words[rand(0,count($words)-1 )];
}

/**
 * returns random words from given array
 *
 * @param Array wordArray   array of strings
 * @param int   wordCount   quantity of words to return
 */
function pass_phrase($wordCount, $symbolCount, $digitCount) {
    $phrase = "";
    for ($i = 0; $i < $wordCount; $i++) {
        $phrase .= random_word();
        
        // add symbol if all haven't been added
        if ($symbolCount > 0) {
            $phrase .= random_symbol();
            }

        // add digit if all haven't been added
        if ($digitCount > 0) {
            $phrase .= random_digit();
            }

        $symbolCount--;
        $digitCount--;
        // don't add separator to last word, add separator if no more symbols or digits
        if ($i < $wordCount -1 && $symbolCount < 0 && $digitCount < 0)
            $phrase .= "-";
        }

    return $phrase;
}

/**
 * ensure input is within allowed range
 *
 * @param int   input   submitted value
 * @param int   min     minimum allowed
 * @param int   max     maximum allowed
 */
function validate_int_range($input, $min, $max) {
    // cast input as int
    $input = (int) $input;

    // set to maximum
    if ($max <= $input) {
        return $max;
        }
    // set to minimum
    elseif ($min >= $input) {
        return $min;
        }
    // set to input
    else {
        return $input;
        }
}


/**
 * echos string with characters encoded for HTML
 * 
 * Use in place of <code>echo</code> and <code>print</code> in all HTML
 *
 * @param string hscString   to encode
 */
function hsc($hscString) {
    return htmlspecialchars($hscString, ENT_HTML5);
}
