<?php

require __DIR__ . "/../controllers/inc/essentials.php";

function getGeneral($db)
{
    $query = "SELECT * FROM `settings` WHERE `sr_no` = ?";
    $values = [1];
    $res = select($db, $query, $values, "i");
    $data = mysqli_fetch_assoc($res);
    $json_data = json_encode($data);
    return $json_data;
    $db->close();
}


function updGeneral($db, $post)
{
    $frm_data = filteration($post);
    $q = "UPDATE `settings` SET `side_title` = ?, `side_about` = ? WHERE `sr_no` = ?";
    $values = [$frm_data['side_title'], $frm_data['side_about'], 1];
    $res = update($db, $q, $values, 'ssi');
    return $res;
    $db->close();
}
