<?

function getTypes($conn) {
    return $conn->query("SELECT * FROM `type`")->fetchall(PDO::FETCH_ASSOC);
}

function getTypeById($conn, $id) {
    return $conn->query("SELECT * FROM `type` WHERE `id`='".$id."'")->fetch(PDO::FETCH_ASSOC);
}

?>