<?php
require_once './DefiManager.php';
require_once './UserManager.php';
require_once './RelationManager.php';
require_once './PartieManager.php';
/**
 * Initialise la base de donnée utilisée par l'application
 */
class DB {
    
    /**
     * Initialise la base de donnée. La connection avec le serveur doit déja avoir été établie
     */
    public static function init($nom = "echec") {
        if (!DB::createDatabase($nom))
            return;

        mysql_select_db($nom);
        
        DB::createTables();
        DB::populate();
    }

    public static function drop($nom = "echec") {
        mysql_query("DROP DATABASE ".$nom);
    }
    
    /**
     * Construis la base de donnée. Return false si elle existe déja
     */
    private static function createDatabase($nom){
        return mysql_query("CREATE DATABASE ".$nom);
    }

    /**
     * Crée les tables de la bd
     */
    private static function createTables() {
        //<editor-fold desc="initialisation de $sql" defaultstate="collapsed">
        $sql = "CREATE TABLE IF NOT EXISTS type_compte(
	id INT PRIMARY KEY,
	nom VARCHAR(25)
);

CREATE TABLE IF NOT EXISTS status_relation(
	id INT PRIMARY KEY,
	nom VARCHAR(200)
);

INSERT INTO type_compte VALUES (1, 'Publique'), (2, 'Privé'), (3, 'Amis seulement'), (4, 'Anonyme');
INSERT INTO status_relation VALUES (1, 'Ami'), (2, 'Attente de demande d''ami'), (3, 'Refusé'), (4, 'Bloqué');

CREATE TABLE IF NOT EXISTS utilisateur(
	id INT PRIMARY KEY,
	login VARCHAR(25),
	password VARCHAR(32),
	nom VARCHAR(100),
	prenom VARCHAR(100),
	email VARCHAR(100),
	type_compte INT,
	updated INT,		
	FOREIGN KEY (type_compte) REFERENCES type_compte(id)
);

CREATE TABLE IF NOT EXISTS relation(
	user_1 INT,
	user_2 INT,
	status_relation INT,
	FOREIGN KEY (status_relation) REFERENCES status_relation(id),
	CONSTRAINT PK_relation PRIMARY KEY (user_1, user_2)
);

CREATE TABLE IF NOT EXISTS defi(
	id INT PRIMARY KEY,
	nom VARCHAR(50),
	nb_tours_max INT, 	
	score FLOAT,		
	difficulte FLOAT,	
	nombre_evaluations INT,
	grille VARCHAR(384),	
	updated INT	
);

CREATE TABLE IF NOT EXISTS defi_utilisateurs(
	id INT PRIMARY KEY,
	nb_tour INT,
	reussi INT, 
	utilisateur INT,
	defi INT,
	FOREIGN KEY (utilisateur) REFERENCES utilisateur(id),
	FOREIGN KEY (defi) REFERENCES defi(id)
);

CREATE TABLE IF NOT EXISTS partie(
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

CREATE TABLE IF NOT EXISTS tours(
	partie INT,
	tour INT,
	description VARCHAR(10),
	CONSTRAINT PK_tour PRIMARY KEY (partie, tour),
	FOREIGN KEY (partie) REFERENCES partie(id)
);

CREATE TABLE IF NOT EXISTS suggestions(
	utilisateur INT,
	defi INT,
	CONSTRAINT PK_sugg PRIMARY KEY (utilisateur, defi),
	FOREIGN KEY (utilisateur) REFERENCES utilisateur(id),
    FOREIGN KEY (defi) REFERENCES defi(id)
);";
        //</editor-fold>
        
        $sqls = explode(";", $sql);
        
        foreach ($sqls as $s) {
            if ($s != "")
                mysql_query($s);
        }
    }

    /**
     * Ajoute des données a la bd
     */
    private static function populate(){
        echo "<br>Defi:<br>";
        DefiManager::add(1, "Defi_Test", 0, 5, 1, 6, "PB777,PN000");
        
        echo "<br>Utilisateurs:<br>";
        UserManager::add(1, "Bob", "f", "NULL", NULL, NULL, 1, 0);
        UserManager::add(2, "Bob", "f", "NULL", NULL, NULL, 1, 0);
        
        echo "<br>Relations:<br>";
        RelationManager::add(1, 2, 2);
        RelationManager::add(1, 2, 1);
        
        echo "<br>Defi & Utilisateurs:<br>";
        DefiManager::addToUser(2, 1, 1, 1, 1);
        DefiManager::addToUser(NULL, 1, 1, 1, 1);
        
        echo "<br>Parties:<br>";
        PartieManager::add(1, 1, 1, 2);
        PartieManager::add(2, 2, 1, 2);
        
        echo "<br>Tours:<br>";
        PartieManager::addTours(1, "abc");
        PartieManager::addTours(1, "def");
        PartieManager::addTours(2, "abc");
        PartieManager::addTours(2, "def");

    }
}
