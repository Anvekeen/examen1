<?php


abstract class DAO // n'est pas instanciée dans l'état
{
    protected $deleteBehaviour;
    protected $connection;
    protected $object_list;

    function __construct() {
        $this->connection = new PDO('mysql:host=localhost;dbname=examen;charset=utf8mb4', 'root', '');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->object_list = array();
    }

    function delete($id) {
        $this->deleteBehaviour->delete($id, $this->connection, $this->table);
    }

    function save($data) {
        $data[$this->properties[0]] = -1;
        $object = $this->create($data);
        if ($object) {
            $qry = "(";
            $values = array();
            $params = "(";

            foreach($this->properties as $property) {
                if($property !== $this->properties[0]) {
                    $qry.= $property.',';
                    array_push($values, $object->__get($property));
                    $params.= "?,";
                }
            }

            $qry = rtrim($qry, ",");
            $params = rtrim($params, ",");
            $qry.=')';
            $params.=')';
            $qry = "INSERT INTO {$this->table} {$qry} VALUES {$params}";

            try {
                $statement = $this->connection->prepare($qry);
                $statement->execute($values);
            } catch(PDOException $e) {
                if($e->getCode() == "23000") {
                    return 'doublon';
                } else {
                print $e->getMessage();
                }
            }
        }
    }

    function fetch($id) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE {$this->properties[0]} = ?");
            $statement->execute([$id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $this->create($result);

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function fetchAll() {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $data) {
                //CREER UN NOUVEL OBJET
                //AJOUTE CET OBJET A NOTRE LISTE DE PRODUIT
                array_push($this->object_list, $this->create($data));
            }

            return $this->object_list;

        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function __set($property, $value) {
        if (property_exists($this, $property) && $property == "deleteBehaviour") {
            $this->deleteBehaviour = new $value();
            // $this->deleteBehaviour = new HardDeleteBehaviour();
        } else if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}