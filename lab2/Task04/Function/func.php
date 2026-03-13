<?php
function sinCalc($numX)
{
    return sin($numX);
}
function cosCalc($numX)
{
    return cos($numX);
}
function tgCalc($numX)
{
    return tan($numX);
}
function my_tgX($numX)
{
    return sinCalc($numX) / cosCalc($numX);
}
function powCalc($x, $y)
{
    return pow($x, $y);
}

function factorialCalc($factorialX)
{
    if ($factorialX < 0)
        return null;
    if ($factorialX === 0)
        return 1;
    $result = 1;
    for ($x = 1; $x <= $factorialX; $x++) {
        $result *= $factorialX;
    }
    return $result;
}
?>
