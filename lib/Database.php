<?php

namespace RLDatix\Lib;

class Database extends \PDO
{
    protected static $instance;

    public function __construct()
    {
        try {
            $options = [
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ];
            $dsn = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'];
            parent::__construct($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $options);
        } catch (\PDOException $e) {
            var_dump($e);
        }
    }

    // a classical static method to make it universally available
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
