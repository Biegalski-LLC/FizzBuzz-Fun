<?php

function isMultiple($value, $multiple){
    return 0 === $value % $multiple;
}

for ($i = 1; $i <= 100; $i++) {

    $isFizz = isMultiple($i, 3);
    $isBuzz = isMultiple($i, 5);

    if( $isFizz && $isBuzz ){
        echo 'FizzBuzz', PHP_EOL;
        continue;
    }

    if( $isFizz ){
        echo 'Fizz', PHP_EOL;
        continue;
    }

    if( $isBuzz ){
        echo 'Buzz', PHP_EOL;
        continue;
    }

    echo $i, PHP_EOL;

}
