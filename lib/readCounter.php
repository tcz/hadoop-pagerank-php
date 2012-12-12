<?php

require_once __DIR__ . '/executeProgram.php';

function readCounter( $job_id, $group, $counter )
{
     $command =
        'hadoop job -counter' .
        ' ' . escapeshellarg( $job_id ) .
        ' ' . escapeshellarg( $group ) .
        ' ' . escapeshellarg( $counter ) .
        ' 2>/dev/null';

    list( $output, $exit_code ) = executeProgram( $command );

    if ( 0 !== $exit_code )
    {
        throw new RuntimeException( 'Unexpected exit code: ' . $exit_code );
    }

    return (int) $output;
}