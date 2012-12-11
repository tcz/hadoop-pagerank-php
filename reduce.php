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
}
