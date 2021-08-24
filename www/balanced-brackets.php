<?php
    $string = $_GET['string'];

    if (!empty($string)) {
        $array = str_split($string);
        $stack = array();

        foreach ($array as $caracter) {
            if ($caracter == '(' || $caracter == '{' || $caracter == '[') {
                array_push($stack, $caracter);

            } elseif (($caracter == ')' && end($stack) == '(') || ($caracter == '}' && end($stack) == '{') || ($caracter == ']' && end($stack) == '[')) {
                array_pop($stack);

            } elseif ($caracter == ')' || $caracter == '}' || $caracter == ']') {
                echo 'Is not valid!';
                exit;
            }
        }

        if (empty($stack)) {
            echo 'Is valid!';
            exit;
        }
 
        echo 'Is not valid!';
        exit;

    } else {
        echo 'Please, try with a not empty string!';
        exit;
    }
?>