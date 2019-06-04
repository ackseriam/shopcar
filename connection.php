<?php
class Connection
{
    private $driver='mysql';
    private $host='db4free.net';
    private $user='ackseriam';
    private $pass='-Ackseriam21';
    private $dbName='ackseriam';
    private $charset='utf8';

    protected function connec()
    {
      try
      {
        $pdo=new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}",$this->user,$this->pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
      }catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    }

}


 ?>
