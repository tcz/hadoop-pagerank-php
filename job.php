#!/usr/bin/php
<?php

if ( $argc !== 3 )
{
    exit( "Usage: " . basename( __FILE__ ) . " [input_path] [output_path_prefix]\n\n" );
}

require_once __DIR__ . '/lib/deleteFile.php';
require_once __DIR__ . '/lib/runJob.php';
require_once __DIR__ . '/lib/readCounter.php';

$input          = $argv[1];
$output_prefix  = $argv[2];
$mapper         = __DIR__ . '/map.php';
$reducer        = __DIR__ . '/reduce.php';
$iteration      = 0;
