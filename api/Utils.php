<?php
function getLast($table)
{
    $query = "SELECT id FROM $table ORDER BY id DESC LIMIT 1 ";
    $rs = mysql_query($query);
    $row = mysql_fetch_assoc($rs);

    if (null !== $row['id'])
        return $row['id'] ;

    return 0;
}


    

