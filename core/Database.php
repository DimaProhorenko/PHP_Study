<?php
class DB
{
    public $connection;
    private $statement;

    public function __construct($config, $username, $password)
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($queryString, $params = [])
    {

        $this->statement = $this->connection->prepare($queryString);
        $this->statement->execute($params);

        return $this;
    }

    public function fetch()
    {
        return $this->statement->fetch();
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }

    public function fetchOrAbort($code = 404)
    {
        $result = $this->fetch();

        if (!$result) {
            abort($code);
        }

        return $result;
    }
}
