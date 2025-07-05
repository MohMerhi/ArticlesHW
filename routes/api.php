<?php 

function routes(){
global $mysqli;

$base_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'); //   /article-server
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //    /article-server/index


if (strpos($request, $base_dir) === 0) {
    $request = substr($request, strlen($base_dir));
}


if ($request == '') {
    $request = '/';
}



$apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'],
    '/articles/delete'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/articles/create'       =>['controller' => 'ArticleController', 'method' => 'createArticle'],
    '/articles/update'       =>['controller' => 'ArticleController', 'method' => 'updateArticle'],
    '/categories'       =>['controller' => 'CategoryController', 'method' => 'getAllCategories'],
    '/categories/delete'       =>['controller' => 'CategoryController', 'method' => 'deleteAllCategories'],
    '/categories/create'       =>['controller' => 'CategoryController', 'method' => 'createCategory'],
    '/categories/update'       =>['controller' => 'CategoryController', 'method' => 'deleteAllCategories'],
    '/login'         => ['controller' => 'AuthController', 'method' => 'login'],
    '/register'         => ['controller' => 'AuthController', 'method' => 'register'],
    '/categoryarticles'  => ['controller' => 'CategorizationController', 'method' => 'getArticlesByCategory'],
    '/articlecategories' => ['controller' => 'CategorizationController', 'method' => 'getCategoriesByArticle']
];


if (isset($apis[$request])) {
    $controller_name = $apis[$request]['controller'];
    $method = $apis[$request]['method'];
    require_once "controllers/{$controller_name}.php";

    $controller = new $controller_name();
    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        echo "Error: Method {$method} not found in {$controller_name}.";
    }
} else {
    echo "404 Not Found";
}

}