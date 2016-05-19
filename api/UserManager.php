<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserManager
 *
 * @author Maxime
 */
class UserManager {
    static public function add($id, $login, $password, $nom, $prenom, $email, $type_compte, $updated = 0)
    {
        $query = "INSERT INTO utilisateur VALUES ($id, '$login', '$password', '$nom', '$prenom', '$email', $type_compte, $updated)";
        mysql_query($query);
    }
    
    static public function authentifier($login, $password)
    {
        $query = "SELECT id FROM utilisateur WHERE login = $login AND password = $password ORDER BY $column DESC LIMIT 1 ";
        $rs = mysql_query($query);

        if ($rs === false || $rs === NULL)
            return false;

        $row = mysql_fetch_assoc($rs);

        return $row["id"] ;
    }
}
