<?php

//El singleton es un patrón de diseño.
//Lo hacemos para asegurarnos que haya una sola instancia de la clase, en este caso para que haya una sola conexión a la base de datos.

trait Singleton {
	protected static $instance; // referencia interna a la única instancia de la clase
	private function __construct() {

	} // denegar new DB() desde afuera de la clase
	public static function getInstance() { // factory method, permite obtener la instancia de DB
		if (self::$instance) {
			return self::$instance;
		}
		return self::$instance = new self();
	}
}