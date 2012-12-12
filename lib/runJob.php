<?php

require_once __DIR__ . '/executeProgram.php';

function runJob( $mapper, $reducer, $input, $output )
{
    $command =
        'hadoop jar ' .
        escapeshellarg( __DIR__ . '/../bin/hadoop-streaming-0.23.3.jar' ) .
        ' -files '   . escapeshellarg( $mapper . ',' . $reducer ) .
        ' -mapper '  . escapeshellarg( basename( $mapper ) ) .
        ' -reducer ' . escapeshellarg( basename( $reducer ) ) .
        ' -input '   . escapeshellarg( $input ) .
        ' -output '  . escapeshellarg( $output ) .
        ' 2>&1';

    list( $output, $exit_code ) = executeProgram( $command );

    if ( 0 !== $exit_code )
    {
        throw new RuntimeException( 'Unexpected exit code: ' . $exit_code );
    }

    if ( !preg_match( '/Running job: (?P<job_id>[a-zA-Z0-9_]+)/', $output, $matches ) )
    {
        throw new RuntimeException( 'No job ID found.' );
    }

    return $matches['job_id'];
}