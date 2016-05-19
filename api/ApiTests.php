<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'InitDB.php';
            mysql_connect("localhost", "root", "");
            echo DB::drop("beton395_echec");
            echo mysql_error();
            echo DB::init("beton395_echec");
            
        ?>
    </body>
</html>
