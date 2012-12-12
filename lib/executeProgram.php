<?php

function executeProgram( $command )
{
    echo $command . "\n";

    exec( $command, $output, $exit_code );

    $output = implode( "\n", $output );
    echo $output . "\n";

    return array( $output, $exit_code );
}