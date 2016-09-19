<?php
//Simple functions to remove special characters, anti-hacking.
function test_input($data)
{
    $data = trim($data);
    //vi kan kanskje fjerne htmlspeciachars da preg_replace tar seg av det
    return preg_replace('/[^A-Za-z0-9\. ]/', '', $data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
}

//function test_date($date, $format = 'd-m-Y')

/*
function test_date($date, $format)
{
    $d = DateTime::createFromFormat($date, $format);
    return $d && $d->format($format) == $date;
}
*/

function test_date($date)
{
    $d = DateTime::createFromFormat('d-m-Y', $date);
    return $d && $d->format('d-m-Y') === $date;

}


