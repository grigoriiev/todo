<?php
namespace App\Services;

use Aura\SqlQuery\QueryFactory;

use PDO;

class Database
{
    private $pdo;
   
    private $queryFactory;

    public function __construct(PDO $PDO, QueryFactory $queryFactory)
    {
        $this->pdo = $PDO;
        $this->queryFactory = $queryFactory;
    }


public function findAdmin($table,$data)
{
    $select = $this->queryFactory->newSelect();
    $select->cols(['*'])
        ->from($table)
        ->where('login = :login')
        ->where('password = :password')  
        ->bindValue('login', $data["login"])
        ->bindValue('password', $data["password"]);
    $sth = $this->pdo->prepare($select->getStatement());

    $sth->execute($select->getBindValues());

    return $sth->fetch(PDO::FETCH_ASSOC);
}





    public function find($table,$id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where('id = :id')
            ->bindValue('id', $id);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function create($table,$data)
    {
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());

        $sth->execute($insert->getBindValues());

        $name = $insert->getLastInsertIdName('id');
        return $this->pdo->lastInsertId($name);
    }

    public function update($table,$data,$id)
    {
        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)                  
            ->cols($data)
            ->where('id = :id')
            ->bindValue('id', $id);

        $sth = $this->pdo->prepare($update->getStatement());

        $sth->execute($update->getBindValues());
    }

 
 public function getPaginatedFrom($table, $page = 1, $rows = 1)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->page($page)
            ->setPaging($rows);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
	

	
	
    public function getCount($table)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table);


        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return count($sth->fetchAll(PDO::FETCH_ASSOC));
    }



}