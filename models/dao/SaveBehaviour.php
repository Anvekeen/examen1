<?php
interface SaveBehaviour {
    public function save($values, $connection, $qry);
}