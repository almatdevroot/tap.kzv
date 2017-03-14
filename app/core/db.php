<?

function connect() {
    return new PDO('mysql:host=localhost;dbname=tap.kz', 'root', '');
}

?>