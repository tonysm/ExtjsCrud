<?php
namespace App\Domain;
/**
 * Classe que representa o modelo de usuários
 * 
 * @author Luiz Messias <tonyzrp@gmail.com>
 */
class Usuario {
	/**
	 * @var int
	 */
	private $id;
	/**
	 * @var string
	 */
	private $nome;
	/**
	 * @var string
	 */
	private $email;
	/**
	 * construtor
	 */
	public function __construct($props = null) {
		foreach($props as $prop => $val) {
			$this->$prop = $val;
		}
	}
	/**
	 * método mágico __get ({@link http://www.php.net/manual/en/language.oop5.overloading.php#object.get})
	 * 
	 * @return mixed
	 */
	public function __get( $prop ) {
		return $this->$prop;
	}
	/**
	 * método mágico __set ({@link http://www.php.net/manual/en/language.oop5.overloading.php#object.set})
	 * 
	 * @param string $prop nome do atributo
	 * @param mixed $value valor do atributo
	 */
	public function __set($prop, $value) {
		if(isset($this->$prop)) {
			$this->$prop = $value;
		}
	}

	public function toXml() {
		return get_object_vars($this);
	}
}