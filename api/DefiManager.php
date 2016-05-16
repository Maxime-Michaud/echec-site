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
    static public function add($id, $nom, $nb_tours_max, $score, $difficulte, $nombre_evaluations, $grille){
        $query = "INSERT INTO defi VALUES ($id, '$nom', $nb_tours_max, $score, $difficulte, $nombre_evaluations, '$grille', 0)";
        mysql_query($query);
    }
}
