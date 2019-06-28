<?php

class article
{

    private function dbh ()    {

        $dbh = new PDO("pgsql:host=127.0.0.1;port=5432;dbname=crud;user=postgres;password=141592");
        return $dbh;

    }

    public function create ($name, $description, $created_at)    {

        $sth = ($this->dbh())->prepare ( "INSERT INTO article (name, description, created_at) VALUES (:name, :description, :created_at )");
        $sth->bindParam(':name', $name);
        $sth->bindParam(':description', $description);
        $sth->bindParam(':created_at', $created_at);
        return $sth->execute( );

    }

    public function read ()    {

        $stm = ($this->dbh())->prepare("SELECT * FROM article");
        $stm->execute( );
        return  $stm->fetchAll();

    }

    public function readid ($id)    {

        $stmd = ($this->dbh ())->prepare("SELECT * FROM article WHERE id=:id");
        $stmd->bindParam(':id', $id);
        $stmd->execute();
        return $stmd->fetch();

    }

    public function upd ($name, $description, $created_at, $id)    {

        $stmt = ($this->dbh())->prepare("UPDATE аrticle SET name = :name, description = :description, created_at = :created_at WHERE id = :id");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

    }

    public function del ($id)    {

    $df = ($this->dbh()) -> prepare("DELETE FROM article WHERE id=:id;");
    $df->bindParam(':id', $id);
    return $df->execute();

    }

}