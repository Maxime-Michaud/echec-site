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
		require_once 'Utils.php';
        if ($id == null)
            $id = getLast ("utilisateur") + 1;
        $query = "INSERT INTO utilisateur VALUES ($id, '$login', '$password', '$nom', '$prenom', '$email', $type_compte, $updated)";
        mysql_query($query);
    }
    
    static public function authentifier($login, $password)
    {
        //OUI C'EST VULNÉRABLE AU SQL INJECTION. BRING IT ON, BITCHES
        $query = "SELECT id FROM utilisateur WHERE login = '$login' AND password = '$password'";
        $rs = mysql_query($query);

        if ($rs === false || $rs === NULL)
            return $rs;

        $row = mysql_fetch_assoc($rs);

        return $row["id"] ;
    }
    
    static public function get($id)
    {
        $query = "SELECT * FROM utilisateur WHERE id = $id";
        $rs = mysql_query($query);

        if ($rs === false || $rs === NULL)
            return false;

        return mysql_fetch_assoc($rs);
    }
	
	static public function getDernierePartie($userID)
    {
        $query = "SELECT * FROM partie WHERE noir = $userID OR blanc = $userID";
        $rs = mysql_query($query);

        if ($rs === false || $rs === NULL)
            return false;
        
        return mysql_fetch_assoc($rs);

    }
}
