<?php

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
     * CREATE TABLE IF NOT EXISTS partie(
	id INT PRIMARY KEY,
	elo_blanc INT, 
	elo_noir INT,
	gain_blanc INT,
	gain_noir INT,
	gagnant INT,
	noir INT,
	blanc INT,
	FOREIGN KEY (gagnant) REFERENCES utilisateur(id),
	FOREIGN KEY (noir) REFERENCES utilisateur(id),
	FOREIGN KEY (blanc) REFERENCES utilisateur(id) 
);
     */
    static public function add($id, $gagnant, $noir, $blanc)
    {
        if ($id === NULL)
            $id = getLastPartie() + 1;
        
        $query = "INSERT INTO partie VALUES ($id, NULL, NULL, NULL, NULL, $gagnant, $blanc, $noir)";
        mysql_query($query);
    }
    
    static public function getLastPartie()
    {
        $query = "SELECT id FROM partie ORDER BY id DESC LIMIT 1 ";
        $rs = mysql_query($query);
        $row = mysql_fetch_assoc($rs);
                
        return $row['id'];
    }
}
