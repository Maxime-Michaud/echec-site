<?php
require_once './Utils.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partieManager
 *
 * @author Maxime
 */
class PartieManager {
    
    /**
     * Ajoute une partie a la bd
     * @param int $id Id de la partie. peut etre null
     * @param int $gagnant id du gagnant. doit etre égal a $noir ou $blanc
     * @param int $noir id du joueur noir
     * @param int $blanc id du joueur blanc
     */
    static public function add($id, $gagnant, $noir, $blanc)
    {
        if ($id === NULL)
            $id = getLast("partie") + 1;
        
        $query = "INSERT INTO partie VALUES ($id, NULL, NULL, NULL, NULL, $gagnant, $blanc, $noir)";

        mysql_query($query);
    }
    
    /**
     * Ajoute un tour a une partie
     * @param int $partie ID de la partie
     * @param string $move représentation textuelle du tour (max 10 char)
     */
    static public function addTours($partie, $move)
    {
        $tour = getLast("tours", "tour", "partie = $partie") + 1;
        $query = "INSERT INTO tours VALUES ($partie, $tour, '$move')";

        mysql_query($query);
    }
    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    static public function get($id)
    {
        $query = "SELECT * FROM partie WHERE id = $id";
        $rs = mysql_query($query);

        if ($rs === false || $rs === NULL)
            return false;

        return mysql_fetch_assoc($rs);
    }
    
   
    static public function getTours($id)
    {
        $query = "SELECT * FROM tours WHERE partie = $id";
        $rs = mysql_query($query);

        if ($rs === false || $rs === NULL)
            return false;
        
        return mysql_fetch_assoc($rs);
    }
    
}
