<?php
class HardDeleteBehaviour implements DeleteBehaviour {

    public function delete($id, $connection, $table) {
        try {
            $statement = $connection->prepare("DELETE FROM {$table} WHERE id = ?");
            $statement->execute([$id]);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}