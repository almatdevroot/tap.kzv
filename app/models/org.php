<?

function getAll($conn) {
    return $conn->query("SELECT * FROM `org`")->fetchall(PDO::FETCH_ASSOC);
}

function getById($conn, $id) {
    return $conn->query("SELECT * FROM `org` WHERE `id` = '".$id."';")->fetch(PDO::FETCH_ASSOC);
}

function getByType($conn, $type) {
    return $conn->query("SELECT * FROM `org` WHERE `type`='".$type."'")->fetchall(PDO::FETCH_ASSOC);
}

function top($conn) {
    return $conn->query("SELECT * FROM `org` ORDER BY `sumb` DESC LIMIT 5;")->fetchall(PDO::FETCH_ASSOC);
}

function topByType($conn, $type) {
    return $conn->query("SELECT * FROM `org` WHERE `type` = '".$type."' ORDER BY `sumb` DESC LIMIT 5;")->fetchall(PDO::FETCH_ASSOC);
}

function nearest($conn, $type, $x, $y) {
    $xy = array(
        $x - 10000, $y - 10000,
        $x + 10000, $y + 10000
    );
    return $conn->query("
        SELECT * FROM `org` WHERE `type` = '".$type."' AND
        `x` >= '".$xy[0]."' AND `x` <= '".$xy[2]."' AND
        `y` >= '".$xy[1]."' AND `y` <= '".$xy[3]."';
    ")->fetchall(PDO::FETCH_ASSOC);
}

?>