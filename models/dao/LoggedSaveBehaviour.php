<?php

class LoggedSaveBehaviour
{

    public function save($values, $connection, $qry)
    {
        try {
            $statement1 = $connection->prepare($qry);
            $statement2 = $connection->prepare("INSERT INTO log (action) VALUE (?)");
            $statement1->execute($values);
            $str[0] = ('nouveau user : '.$values[1]);
            $statement2->execute($str);
        } catch (PDOException $e) {
            if ($e->getCode() == "23000") {
                return 'doublon';
            } else {
                print $e->getMessage();
            }
        }
    }

}
