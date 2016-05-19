<?php
require_once './AuthManager.php';
require_once './Utils.php';
require_once './UserManager.php';
if ($_GET['next'] === 'true')
{
    mysql_connect("localhost", AuthManager::Username(), AuthManager::Password());
    mysql_select_db("beton395_echec");

    $id = getLast("utilisateur") + 1;
    
    
    //Ajoute un placeholder dans la bd
    UserManager::add($id, NULL, NULL, NULL, NULL, NULL, 4);

    echo $id;
}
elseif ($_GET['']) {

}
