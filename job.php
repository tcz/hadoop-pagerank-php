#!/usr/bin/php
<?php

if ( $argc !== 3 )
{
    exit( "Usage: " . basename( __FILE__ ) . " [input_path] [output_path_prefix]\n\n" );
}

require_once __DIR__ . '/lib/deleteFile.php';
require_once __DIR__ . '/lib/runJob.php';
require_once __DIR__ . '/lib/readCounter.php';
