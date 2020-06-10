<?php
class HardDeleteBehaviour implements DeleteBehaviour {

    public function delete($id, $connection, $table, $property) {
        try {
            $statement = $connection->prepare("DELETE FROM {$table} WHERE $property = ?");
            $statement->execute([$id]);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}