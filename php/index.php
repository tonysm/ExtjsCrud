<?php
use App\Config\ConnectionManager as ConnectionManager;
use App\Controllers\Controller as Controller;

class FileNotExistsException extends Exception {}
/**
 * método mágico para controlar os requires
 */
function __autoLoad( $class ) {
	$class = str_replace('\\', '/', $class) . ".php";
	$class = str_replace('App', __DIR__, $class);

	if(!file_exists($class))
		throw new FileNotExistsException("Arquivo não existe");

	require_once $class;
}

try {
	$data = isset($_POST['data']) ? json_decode($_POST['data']) : null;
	$data = is_array($data) ? $data : array($data);

	// pega o controller
	$Control = Controller::factory($_GET['control']);
	// invoca o método
	call_user_func(
		array(
			&$Control,
			$_GET['action']
		), 
		$data
	);

} catch(FileNotExistsException $e) {
	echo $e->getMessage();
	die();
} catch(Exception $e) {
	echo $e->getMessage();
	die('Outra Exception');
}