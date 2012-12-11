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
}
