<?php

class NormalSaveBehaviour implements SaveBehaviour {

    public function save($values, $connection, $qry) {
        try {
            $statement = $connection->prepare($qry);
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