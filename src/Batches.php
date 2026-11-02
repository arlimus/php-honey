<?php

namespace HoneyFlow;

use PDO;

/** Extraction batches: one row per extraction run, with varietal and moisture. */
final class Batches
{
    public function __construct(private PDO $db)
    {
    }

    /** Finds batches of a varietal at or below a moisture threshold (percent). */
    public function search(string $varietal, string $maxMoisture): array
    {
        $sql = "SELECT id, apiary, varietal, moisture, jars FROM batches "
            . "WHERE varietal = '" . $varietal . "' AND moisture <= " . $maxMoisture
            . " ORDER BY extracted_at DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
