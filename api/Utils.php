<?php
/**
 * Sélectionne le dernier élément d'une table
 * @param string $table nom de la table
 * @param string $column nom de la colonne qui contient la PK.
 * @param string $whereCondition Condition where a appliquer. null = pas de condition.
 * @return int
 */
function getLast($table, $column = "id", $whereCondition = null)
{
    if ($whereCondition === null)
        $whereCondition = "1 = 1";
        
    $query = "SELECT $column FROM $table WHERE $whereCondition ORDER BY $column DESC LIMIT 1 ";
    $rs = mysql_query($query);

    if ($rs === false || $rs === NULL)
        return 0;
    
    $row = mysql_fetch_assoc($rs);

    return $row[$column] ;

}