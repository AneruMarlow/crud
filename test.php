<?php

function test()
{
    return 'test return';
}

$a = 'empty';

echo $a, PHP_EOL;
$a = test(); // присваеваем $a значение, которое возвращает функция test()

echo $a, PHP_EOL;