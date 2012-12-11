#!/usr/bin/php
<?php

while ( true )
{
    $line = fgets( STDIN );
    $line = rtrim( $line, "\n\r" );

    if ( empty( $line ) )
    {
       break;
    }

    list( $url, $page_rank, $links )    = preg_split( "/\s+/", $line, 3, PREG_SPLIT_NO_EMPTY );
    $links                              = preg_split( "/\s+/", $links, -1, PREG_SPLIT_NO_EMPTY );

    foreach ( $links as $link )
    {
        echo "$link\t";
        echo "N" . $page_rank / count( $links );
        echo "\n";
    }

    echo "$url\t";
    echo implode( " ", $links );
    echo "\n";
}
