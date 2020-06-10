<?php
class SoftDeleteBehaviour implements DeleteBehaviour {

    //on a hard-codé 'valide = 1' car on assume que ce système restera constant
    // pour soft-delete une entrée peut importe la table utilisée

    public function delete($id, $connection, $table, $property) {
        try {
            $statement = $connection->prepare("UPDATE {$table} SET valide = 0 WHERE $property = ?");
            $statement->execute([$id]);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
    
}