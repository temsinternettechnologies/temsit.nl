<?php

/**
 * Class Database
 *
 * author: Menno Spijker
 *
 * Create date: 11-12-16
 *
 * last update: 06-10-17
 */
class Database
{

    /**
     * Dit is het object om de connectie te onthouden.
     */
    public static $connection;
    /**
     * Dit is het object om de database te onthouden.
     */
    public static $database;

    /**
     * Deze constructor zet de naam van de database en maakt verbinding.
     *
     * Database constructor.
     * @param $hostname -> De server naam.
     * @param $username -> De username van de database.
     * @param $password -> Het wachtwoord van de database.
     * @param $database -> De database naam.
     * @param $port -> De database poort.
     */
    public function __construct($hostname, $username, $password, $database, $port = null)
    {
        self::$database = $database;
        if ($port) {
            $this->connect($hostname, $username, $password, $database, $port);
        } else {
            $this->connect($hostname, $username, $password, $database);
        }
    }

    /**
     * Deze functie voert alle SQL query's uit.
     *
     * @param $query -> De sql query.
     * @return bool|mysqli_result -> Het resultaat van de query.
     */
    public static function run($query)
    {
        try {
            if (!$result = mysqli_query(self::$connection, $query)) {
                throw new \RuntimeException('Query execution failed: "' . $query . '", because ' . mysqli_error(self::$connection), 1);
            }

            return $result;
        }catch (Exception $e){
            if (strpos($_SERVER['HTTP_HOST'], "dev") === 0){
                var_dump($e->getMessage());
                var_dump($e->getTraceAsString());
                exit;
            }
            return false;
        }
    }

    /**
     * Deze functie verbindt de class met de database.
     *
     * @param $hostname -> De server naam.
     * @param $username -> De username van de database.
     * @param $password -> Het wachtwoord van de database.
     * @param $database -> De database naam.
     */
    private function connect($hostname, $username, $password, $database ,$port = null)
    {

        if ($port) {
            if (!self::$connection = mysqli_connect($hostname, $username, $password, $database)) {
                die('Kon geen verbinding maken met database');
            }
        } else {
            if (!self::$connection = mysqli_connect($hostname, $username, $password, $database, $port)) {
                die('Kon geen verbinding maken met database');
            }
        }
        try {
            self::test();
        }catch(Exception $e){
            $e->getMessage();
        }
    }

    /**
     * Deze functie escaped de input.
     *
     * @param string $input -> De input die geescaped moet worden.
     * @return null|string  -> De escaped string.
     */
    public static function escape($input = '')
    {
        if ($input === null) {
            return null;
        }
        if ($input && !strlen($input)) {
            return '';
        }
        return mysqli_real_escape_string(self::$connection, $input);
    }

    /**
     * Deze functie insert dingen met behulp van run in de database.
     *
     * @param $table -> De tabel waar het in moet.
     * @param bool $data -> De data wat geinserd moet worden.
     * @return int|string -> geeft de laatste geinserde id terug.
     */
    public static function insert($table, $data = false)
    {
        if ($data === false) {
            $data = $_POST[$table];
        }
        $keys = array();
        $values = array();
        if (is_array($data)) {
            foreach ($data as $veld => $waarde) {
                $keys[] = sprintf('`%s`', $veld);

                if ($waarde === null) {
                    $values[] = 'null';

                } elseif (is_numeric($waarde)) {
                    $values[] = sprintf("'%s'", $waarde);

                } else {
                    $values[] = sprintf("'%s'", self::escape($waarde));
                }
            }
        }
        $query = sprintf("insert into `%s` (%s) values (%s) ", $table, join(',', $keys), join(',', $values));
        $result = self::run($query);

        $new_id = mysqli_insert_id(self::$connection);
        return $new_id;
    }

    /**
     * Deze functie update een bepaalde tabel met bepaalde waardes.
     *
     * @param $table -> De tabel waarin geupdate moet worden.
     * @param $data -> De data waarmee geupdated wordt.
     * @param $wherecolumn -> De kolom waar geupdated moet worden.
     * @param $where -> De value of @param $wherecolumn.
     * @return bool|mysqli_result -> gelukt = true, mislukt = false
     */
    public static function update($table, $data, $wherecolumn, $where)
    {
        $error = array();
        foreach ($data as $veld => $waarde) {
            $set = $veld . " = '" . $waarde . "'";
            $query = sprintf("update `%s` set %s where %s = '%s'", $table, $set, $wherecolumn, $where);
            if (!self::run($query)) {
                $error[$veld] = true;
            }
        }
        if (count($error)) {
            var_dump($error);
            print_r($query);
            exit;
        }
        return true;

    }

    /**
     * De functie die bepaalde dingen uit de database verwijderd.
     *
     * @param $table -> De betreffende tabel
     * @param $id -> Het id van het betreffende record
     * @return bool|mysqli_result -> gelukt = true, mislukt = false
     */
    public static function delete($table, $where, $whereCol = null)
    {
        if (isset($whereCol)) {
            $query = sprintf("delete from %s where `%s` = '%s' limit 1 ", $table, $whereCol, $where);
        } else {
            $query = sprintf("delete from %s where id = '%s' limit 1 ", $table, $where);
        }
        return self::run($query);
    }

    /**
     * Haalt gegevens op doormiddel van een id.
     *
     * @param $table -> De betreffende tabel.
     * @param bool $id -> Het id van het betreffende record.
     * @return array|bool|null|object gelukt = true, mislukt = false
     */
    public static function getById($table, $id = false)
    {
        if (!$id || empty($id)) {
            return false;
        }
        $query = sprintf('select * from %s where id = %d', $table, $id);
        $result = self::select($query);
        return $result;
    }

    /**
     * Deze functie haalt allemaal items op van een tabel.
     *
     * @param $query -> De betreffende query.
     * @return array|null|object -> Het object met de items
     */
    public static function select($query, $simplify = false)
{

    $limit_is_1 = preg_match('/limit\s+1$/', trim($query));
    if ($limit_is_1) {
        $result = self::run($query);
        $item = mysqli_fetch_object($result);
        return $item;
    }

    $result = self::run($query);

    $items = array();
    while ($item = mysqli_fetch_object($result)) {
        $items[] = $item;
    }

    if ($simplify && count($items) == 1) {
        $items = $items[0];
    }

    return $items;
}

    /**
     * Deze functie test of de database het doet.
     */
    public static function test()
    {
        $object = self::run("SELECT version()");
        while ($item = mysqli_fetch_object($object)) {
            $items[] = $item;
        }
        if (!$items) {
            throw new Exception("error connection to database");
        }
    }
}




