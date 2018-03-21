<?php 

function markdown($text)
{
    return (new ParsedownExtra)->text($text);
}
