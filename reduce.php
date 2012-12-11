#!/usr/bin/php
<?php

while ( true )
{
    $line = fgets( STDIN );
    $line = rtrim( $line, "\n\r" );

    list( $key, $value ) = preg_split( "/\t/", $line, 2, PREG_SPLIT_NO_EMPTY );

    if ( empty( $line ) )
    {
        break;
    }
}
