<?php
interface DeleteBehaviour {
    public function delete($id, $connection, $table);
}