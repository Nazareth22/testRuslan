<?php

class Connection
{

    public function __construct(private string $host, private string $user,  private string $pass, private string $database, private int $port)
    {}

    private function connection()
    {
        return new PDO("mysql:host=$this->host; port=$this->port; dbname=$this->database","$this->user","$this->pass");
    }

    public function getData()
    {
        $connection = $this->connection();
        $output = "SELECT * FROM first";
        return $connection->query($output);
    }

    public function exec($sql)
    {
        return $this->connection()->exec($sql);
    }

}
