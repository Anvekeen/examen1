<?php
class SoftDeleteBehaviour implements DeleteBehaviour {
    public function delete($pk) {
        var_dump('IN SOFT DELETE STRATEGY');
    }
    
}