<?php
//IMPORT TOOLS
include('./env.php');
include('./utils/utils.php');

//AUTOLOADER
spl_autoload_register(function (string $class) {
    if (str_starts_with($class, 'Controller')) {
        $class = explode('\\', $class);
        include(__DIR__ . "\\controller\\" . $class[1] . ".php");
    } elseif (str_starts_with($class, 'Model')) {
        $class = explode('\\', $class);
        include(__DIR__ . "\\model\\" . $class[1] . ".php");
    } elseif (str_starts_with($class, 'View')) {
        $class = explode('\\', $class);
        include(__DIR__ . "\\view\\" . $class[1] . ".php");
    }
});

//ROUTEUR
$url = parse_url($_SERVER['REQUEST_URI']);
$path = isset($url['path']) ? $url['path'] : '/';
switch ($path) {
    case '/':
        $controller = new Controller\ControllerHome(new Model\ModelPlayer, new View\ViewHome());
        $controller->displayPlayers();
        $controller->registerPlayer();
        $controller->render();
        break;
    default:
        echo "Erreur 404";
        break;
}
