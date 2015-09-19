<?php
/**
 * code outside web directory
 *
 * Page-level DocBlock is here because it is the first DocBlock
 * in the file, and contains a @package tag
 * @logic logic
 */


$words = Array("alice", "bob", "curtis");

// symbol character list from
// http://windows.microsoft.com/en-us/windows-vista/tips-for-creating-a-strong-password
// \ and ' require escaping
$symbols = Array('`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=', '{', '}', '[', ']', '\\', '|', ':', ';', '"', '\'', '<', '>', ',', '.', '?', '/');

$defaultWordQty = 4;
$minWordQty = 1;
$maxWordQty = 9;
$wordQty = $defaultWordQty;

$minSymbolQty = 0;
$maxSymbolQty = 9;
$symbolQty = $minSymbolQty;

if(isset($_POST['qtyWords'])  && $_POST['qtyWords'] != "") {
    $wordQty = validate_int_range($_POST['qtyWords'], $minWordQty, $maxWordQty);
    }

if(isset($_POST['qtySymbols']) && $_POST['qtySymbols'] != "") {
    $symbolQty = validate_int_range($_POST['qtySymbols'], $minSymbolQty, $maxSymbolQty);
    }

$passphrase = pass_phrase($wordQty, $symbolQty);


/**
 * returns random symbol from given array
 *
 */
function random_symbol() {
    global $symbols;
    return  $symbols[rand(0,count($symbols)-1 )];
}

/**
 * returns random word from given array
 *
 */
function random_word() {
    global $words;
    return  $words[rand(0,count($words)-1 )];
}

/**
 * returns random words from given array
 *
 * @param Array wordArray   array of strings
 * @param int   wordCount   quantity of words to return
 */
function pass_phrase($wordCount, $symbolCount) {
    $phrase = "";
    for ($i = 0; $i < $wordCount; $i++) {
        // don't add separator to first word
        if ($i != 0) $phrase .= "-";
        
        $phrase .= random_word();
        }
        
    return $phrase;
}

/**
 * returns random words from given array
 *
 * @param Array wordArray   array of strings
 * @param int   wordCount   quantity of words to return
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
    echo htmlspecialchars($hscString, ENT_HTML5) ."\n";
}
?>