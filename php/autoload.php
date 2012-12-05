<?php
/**
 * arquivo de autoload
 * 
 * único arquivo que deve ser incluído explicitamente
 * 
 * @author Luiz Messias <tonyzrp@gmail.com>
 */

/**
 * método mágico para controlar os requires
 * 
 * @param string $class nome da classe
 */
function __autoLoad( $class ) {
	$class = str_replace('\\', '/', $class) . ".php";
	$class = str_replace('App/', __DIR__ . "/", $class);

	if(!file_exists($class))
		throw new FileNotExistsException("Arquivo não existe");

	require_once $class;
}