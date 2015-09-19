<?php
/**
 * code outside web directory
 *
 * Page-level DocBlock is here because it is the first DocBlock
 * in the file, and contains a @package tag
 * @logic logic
 */


$words = Array("alice", "bob", "curtis");

$defaultWordQty = 4;
$minWordQty = 1;
$maxWordQty = 9;
$wordQty = $defaultWordQty;


if(isset($_POST['qtyWords']) ) {
    $wordQty = validate_int_range($_POST['qtyWords'], $minWordQty, $maxWordQty);
    }


$passphrase = pass_phrase($words, $wordQty);

/**
 * returns random word from given array
 *
 * @param Array wordArray   array of strings
 */
function random_word(&$wordArray) {
    return  $wordArray[rand(0,count($wordArray)-1 )];
}

/**
 * returns random words from given array
 *
 * @param Array wordArray   array of strings
 * @param int   wordCount   quantity of words to return
 */
function pass_phrase(&$wordArray, $wordCount) {
    $phrase = "";
    for ($i = 0; $i < $wordCount; $i++) {
        // don't add separator to first word
        if ($i != 0) $phrase .= "-";
        
        $phrase .= random_word($wordArray) . $i;
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