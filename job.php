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

deleteFile( $output_prefix . '*' );

do
{
    $output = $output_prefix . $iteration;
    $job_id = runJob( $mapper, $reducer, $input, $output );

    $pagerank_delta = readCounter( $job_id, 'PhpPageRankTest', 'DELTA' );
    $n_documents    = readCounter( $job_id, 'PhpPageRankTest', 'DOCUMENTS' );

    $iteration++;

    if ( $pagerank_delta / $n_documents < 10 )
    {
        echo "PageRanks converge. Executed $iteration iterations.";
        break;
    }

    $input = $output;
} while ( true );
