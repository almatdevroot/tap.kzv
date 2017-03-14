<?

function getUsers($conn) {
    return $conn->query("SELECT `id`, `name`, `sex`, `age` FROM `user`")->fetchall(PDO::FETCH_ASSOC);
}

function getUserById($conn, $id) {
    return $conn->query("SELECT `id`, `name`, `sex`, `age` FROM `user` WHERE `id` = '".$id."'")->fetchall(PDO::FETCH_ASSOC);
}

?>