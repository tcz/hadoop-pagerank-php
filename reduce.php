#!/usr/bin/php
<?php

$last_key = null;
$links = array();
$new_page_rank = 0;

while ( true )
{
    $line = fgets( STDIN );
    $line = rtrim( $line, "\n\r" );

    list( $key, $value ) = preg_split( "/\t/", $line, 2, PREG_SPLIT_NO_EMPTY );

    if ( empty( $line ) )
    {
        break;
    }

    $last_key = $key;
}
