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
$wordQty = 1;


if(isset($_POST['qtyWords']) ) {
    // cast input as int
    $intQtyWords = (int)$_POST['qtyWords'];
    // set to maximum
    if ($maxWordQty <= $intQtyWords) {
        $wordQty = $maxWordQty;
        }
    // set to minimum
    elseif ($minWordQty >= $intQtyWords) {
        $wordQty = $minWordQty;
        }
    // set to input
    else {
        $wordQty = $intQtyWords;
        }
    }
else {
    $wordQty = $defaultWordQty;
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