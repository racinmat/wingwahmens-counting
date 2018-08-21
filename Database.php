<?php


define('SQL_HOST', 'mysql');
define('SQL_DBNAME', 'filipovyodchody');
define('SQL_USERNAME', 'root');
define('SQL_PASSWORD', '');

class Database {
    private $dsn = 'mysql:dbname=' . SQL_DBNAME . ';host=' . SQL_HOST . '';
    private $user = SQL_USERNAME;
    private $password = SQL_PASSWORD;

    public function __construct() {
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function addLeave($time, int $id) {
        $query = $this->connection->prepare("UPDATE entries SET `leave` = ? WHERE id = ?");
        $query->execute([
            $time,
            $id
        ]);

    }

    public function addEntry($time) {
        $query = $this->connection->prepare("INSERT INTO entries (entry) VALUE (?)");
        $query->execute([
            $time
        ]);
    }

    public function getAllEntries() {
        $query = $this->connection->query("SELECT entry, `leave` FROM entries ORDER BY id DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public function getLastId() {
        $query = $this->connection->query("SELECT id FROM entries ORDER BY id DESC");
        $query->execute();
        $result = $query->fetch();
        return $result[0];
    }

    public function getText(): String {
        $query = $this->connection->query("SELECT COUNT(id) FROM entries WHERE `leave` IS NULL");
        $query->execute();
        $result = $query->fetch();
        return intval($result[0]) === 0 ? "Filip se vrátil" : "Filip odešel";
    }

    public function getTime(): String {
        $query = $this->connection->query("SELECT MAX(`leave`) FROM entries");
        $query->execute();
        $result = $query->fetch();
        return $result[0];
    }
}