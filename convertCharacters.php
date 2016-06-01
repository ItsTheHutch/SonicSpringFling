<?php
    
    /*
     * @author Chris Hutcherson
     * A string that is already ASCII but with the UTF-8 encoded characters will have them replaced by ASCII
     */

    function convertCharacters($s){
        $s = str_replace("%20", " ", $s);
        $s = str_replace("%21", "!", $s);
        $s = str_replace("%22", '"', $s);
        $s = str_replace("%23", "#", $s);
        $s = str_replace("%24", "$", $s);
        $s = str_replace("%25", "%", $s);
        $s = str_replace("%26", "&", $s);
        $s = str_replace("%27", "'", $s);
        $s = str_replace("%28", "(", $s);
        $s = str_replace("%29", ")", $s);
        $s = str_replace("%2A", "*", $s);
        $s = str_replace("+", " ", $s); //Paypal has returned the message with +'s instead of spaces
        $s = str_replace("%2B", "+", $s);
        $s = str_replace("%2C", ",", $s);
        $s = str_replace("%2D", "-", $s);
        $s = str_replace("%2E", ".", $s);
        $s = str_replace("%2F", "/", $s);
        $s = str_replace("%7C", "|", $s);
        $s = str_replace("%3A", ":", $s);
        $s = str_replace("%3B", ";", $s);
        $s = str_replace("%3C", "<", $s);
        $s = str_replace("%3D", "=", $s);
        $s = str_replace("%3E", ">", $s);
        $s = str_replace("%3F", "?", $s);
        $s = str_replace("%40", "@", $s);
        return $s;
    }

?>