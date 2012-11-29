<?php
/**
 * arquivo de domínio de usuário
 * 
 * @since 2012-11-29
 */

namespace App\Domain;

/**
 * Classe que representa o modelo de usuários
 * 
 * @author Luiz Messias <tonyzrp@gmail.com>
 */
class Usuario {
	/**
	 * @var int identificador do usuário no banco
	 */
	private $id;
	/**
	 * @var string nome do usuário
	 */
	private $nome;
	/**
	 * @var string e-mail do usuário
	 */
	private $email;

	/**
	 * construtor
	 * 
	 * @param array $props propriedades
	 */
	public function __construct(array $props = null) {
		foreach($props as $prop => $val) {
			$this->$prop = $val;
		}
	}
	/**
	 * método mágico __get
	 * 
	 * @param string $prop propriedades do usuário
	 * @return mixed retorna o valor referente a propriedade que está sendo requerida
	 * 
	 * @link http://www.php.net/manual/en/language.oop5.overloading.php#object.get método __get
	 */
	public function __get( $prop ) {
		return $this->$prop;
	}
	/**
	 * método mágico __set
	 * 
	 * @param string $prop nome do atributo
	 * @param mixed $value valor do atributo
	 * 
	 * @link http://www.php.net/manual/en/language.oop5.overloading.php#object.set método __set
	 */
	public function __set($prop, $value) {
		if(isset($this->$prop)) {
			$this->$prop = $value;
		}
	}

	/**
	 * parse Usuário Obj para Array
	 * 
	 * @return array representação do objeto em array
	 */
	public function toArray() {
		return get_object_vars($this);
	}
}