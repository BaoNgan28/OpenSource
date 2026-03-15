<?php
session_start();
require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';
require_once 'app/helpers/SessionHelper.php';
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);


$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' :
    'DefaultController';
// Kiểm tra phần thứ hai của URL để xác định action
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// 5. Kiểm tra file Controller có tồn tại không
// Kiểm tra xem controller và action có tồn tại không
if (!file_exists('app/controllers/' . $controllerName . '.php')) {
    // Xử lý không tìm thấy controller
    die('Controller not found');
}

require_once 'app/controllers/' . $controllerName . '.php';
$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    die('Action not found: ' . htmlspecialchars($action));
}
call_user_func_array([$controller, $action], array_slice($url, 2));