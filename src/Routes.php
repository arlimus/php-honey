<?php

namespace HoneyFlow;

use PDO;

/** Delivery routes from the extraction room to retailers and farmers' markets. */
final class Routes
{
    public function __construct(private PDO $db)
    {
    }

    public function render(string $outlet): string
    {
        $stmt = $this->db->prepare('SELECT stop, jars, eta FROM routes WHERE outlet = ? ORDER BY eta');
        $stmt->execute([$outlet]);

        $html = '<h2>Deliveries to ' . $outlet . '</h2><ul>';
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $html .= '<li>' . $row['stop'] . ': ' . (int) $row['jars'] . ' jars, ETA ' . $row['eta'] . '</li>';
        }

        return $html . '</ul>';
    }
}
