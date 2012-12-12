<?php

require_once __DIR__ . '/executeProgram.php';

function deleteFile( $path )
{
    $command =
        'hadoop fs -rm -r ' .
        escapeshellarg( $path ) .
        ' 2>&1';

    list( $output, $exit_code ) = executeProgram( $command );
}