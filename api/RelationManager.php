<?php

class RelationManager {
    
    public static function add($usr1, $usr2, $status)
    {
        if ($usr1 === $usr2)
            throw new Exception("Users 1 et 2 égaux");
        
        if (!(is_int($status) || is_int($usr1)|| is_int($usr2)))
            throw new Exception("Ça prend des ints. ");

        if ($status < 1 || $status > 4)
            throw new Exception("Status invalide");
        
        if ($status === 1) 
        {
            RelationManager::dropRel($usr2, $usr1);
            $query = "INSERT INTO relation VALUES ($usr2, $usr1, $status)";
            mysql_query($query);

        }
        
        $query = "INSERT INTO relation VALUES ($usr1, $usr2, $status)";

        RelationManager::dropRel($usr1, $usr2);
        mysql_query($query);
        
    }
    
    public static function dropRel($usr1, $usr2, $rel = null)
    {
        $query = "DELETE FROM relation "
                . "WHERE user_1 = $usr1 AND user_2 = $usr2";
        
        mysql_query($query);

        if ($rel === 1)
        {
            $query = "DELETE FROM relation "
                . "WHERE user_2 = $usr1 AND user_1 = $usr2";
        
            mysql_query($query);
        }
    }
}
