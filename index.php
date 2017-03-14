<?

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/utils/requestlib.php';
require __DIR__.'/utils/rb.php';
require __DIR__.'/app/core/db.php';


$router = new AltoRouter();

$router->map('POST|PUT|DELETE', '/', function() {
	/*R::setup('mysql:host=localhost;dbname=tap.kz', 'root', '');
    
    $user = R::dispense('user');
    
    $user->name = 'User2';
    $user->sex = 1;
    $user->age = 20;
    $user->number = "87007007070";
    
    R::store($user);
    R::close();*/
    print_r(Input::post());
    print_r(Input::put());
});

$router->map('GET', '/users', function() {
	require __DIR__.'/app/models/user.php';
    $db = connect();
    
    $data = getUsers($db);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/user/[i:id]', function($id) {
	require __DIR__.'/app/models/user.php';
    $db = connect();
    
    $data = getUserById($db, $id);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/types', function() {
	require __DIR__.'/app/models/type.php';
    $db = connect();
    
    $data = getTypes($db);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/type/[i:id]', function($id) {
	require __DIR__.'/app/models/type.php';
    $db = connect();
    
    $data = getTypeById($db, $id);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/orgs', function() {
	require __DIR__.'/app/models/org.php';
    $db = connect();
    
    $data = getAll($db);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/orgs.type/[i:id]', function($typeId) {
	require __DIR__.'/app/models/org.php';
    $db = connect();
    
    $data = getByType($db, $typeId);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/orgs.top', function() {
	require __DIR__.'/app/models/org.php';
    $db = connect();
    
    $data = top($db);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/orgs.top/[i:id]', function($typeId) {
	require __DIR__.'/app/models/org.php';
    $db = connect();
    
    $data = topByType($db, $typeId);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/org/[i:id]', function($id) {
	require __DIR__.'/app/models/org.php';
    $db = connect();
    
    $data = getById($db, $id);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$router->map('GET', '/nearest.type/[i:id]/[i:x]/[i:y]', function($typeId, $x, $y) {
	require __DIR__.'/app/models/org.php';
    $db = connect();
    
    $data = nearest($db, $typeId, $x, $y);
    
    $db = null;
    
    header("Content-type:application/json");
    header("Access-Control-Allow-Origin: *");
    echo json_encode($data);
});

$match = $router->match();

if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

?>
