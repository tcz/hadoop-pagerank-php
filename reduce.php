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

    if ( $key !== $last_key && isset( $last_key ) )
    {
        echo "$last_key ";
        echo "$new_page_rank ";
        echo implode( " ", $links );
        echo "\n";

        $links = array();
        $new_page_rank = 0;
        $old_page_rank = 0;
    }

    if ( empty( $line ) )
    {
        break;
    }

    $last_key = $key;

    switch( substr( $value, 0, 1 ) )
    {
        case 'N':
            $new_page_rank += (float) substr( $value, 1 );
            break;
        default:
            $links = preg_split( "/\s+/", $value, -1, PREG_SPLIT_NO_EMPTY );
    }
}
