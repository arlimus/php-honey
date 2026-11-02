<?php

namespace HoneyFlow;

use PDO;

final class Db
{
    public static function connect(array $cfg): PDO
    {
        return new PDO($cfg['dsn'], $cfg['user'], $cfg['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    }
}
