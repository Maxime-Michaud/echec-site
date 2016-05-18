<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuggestionManager
 *
 * @author Maxime
 */
class SuggestionManager {
    
    static public function add($user, $defi)
    {        
        $query = "INSERT INTO suggestions VALUES ($user, $defi)";

        mysql_query($query);
    }}
