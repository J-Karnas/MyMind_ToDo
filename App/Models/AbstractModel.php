<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use PDOException;

abstract class AbstractModel
{

    protected PDO $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {
        try {
            $this->createConnection();
        } catch (PDOException $e) {
            header('Location: http://mymind.local/404');
        }
    }

    private function createConnection(): void
    {

        $config = require 'App/configuration/configurationDB.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['database']}";
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO(
                $dsn,
                $config['user'],
                $config['password'],
                $options
            );
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql): void
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function singleArray()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function allArray()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Count()
    {
        return $this->stmt->rowCount();
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
}
