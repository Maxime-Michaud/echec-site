<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Gère les defis dans la bd. Il faut init la connection avant d'utiliser ses fonctions
 * @author Maxime
 */
class DefiManager {
    
    /**
     * Ajoute un defi a la bd.
     * @param int $id
     * @param string $nom
     * @param int $nb_tours_max
     * @param float $score
     * @param float $difficulte
     * @param int $nombre_evaluations
     * @param string $grille
     * @return 
     */
    static public function add($id, $nom, $nb_tours_max, $score, $difficulte, $nombre_evaluations, $grille, $updated = 0){
        $query = "INSERT INTO defi VALUES ($id, '$nom', $nb_tours_max, $score, $difficulte, $nombre_evaluations, '$grille', $updated)";
        mysql_query($query);
    }
    
    static public function addToUser($id, $nb_tour, $reussi, $utilisateur, $defi) {
        if ($id === null)
            $id = DefiManager::getLastDefiUtilisateur() + 1;
        
        $query = "INSERT INTO defi_utilisateurs VALUES ($id, $nb_tour, $reussi, $utilisateur, $defi)";
        mysql_query($query);
    }

    public static function getLastDefiUtilisateur() {
        $query = "SELECT id FROM defi_utilisateurs ORDER BY id DESC LIMIT 1 ";
        $rs = mysql_query($query);
        $row = mysql_fetch_assoc($rs);
                
        return $row['id'];
    }

}
