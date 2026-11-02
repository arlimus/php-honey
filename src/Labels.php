<?php

namespace HoneyFlow;

/** Prints jar labels on the co-op's label printer through CUPS. */
final class Labels
{
    public function __construct(private string $printer)
    {
    }

    public function printBatchLabel(string $batch, int $copies): string
    {
        $label = sprintf("HoneyFlow batch %s - best before %s", $batch, date('Y-m', strtotime('+2 years')));

        return (string) shell_exec(
            "echo '" . $label . "' | lp -d " . $this->printer . " -n " . $copies . " 2>&1"
        );
    }
}
