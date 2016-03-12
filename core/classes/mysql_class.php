<?php
if(!defined('DEBUG_MYSQL')) define ('DEBUG_MYSQL', false, true);

class MySQL extends Config {

	private $queries = array();
    public  $last_insert_id;
	private $db = null;
	private $result = null;

	/*
	 * Конструктору передаем адрес, имя пользователя, пароль, имя базы данных, порт, а также кодировку для соединения.
	 * По умолчанию используется utf8.
	 */
	public function __construct() {
		$this->db = new mysqli(self::$mysql_cfg['mysql_host'], self::$mysql_cfg['mysql_user'], self::$mysql_cfg['mysql_pass'], self::$mysql_cfg['mysql_db'], self::$mysql_cfg['mysql_port']);
		$this->db->set_charset(self::$mysql_cfg['mysql_charset']);
	}

	/*
	 * Основная и единственная функция, которая выполняет запрос и возвращает результат его работы.
	 */
	public function query($query) {

		if(!$this->db) return false;

		if(DEBUG_MYSQL === true) $this->queries[] = $query;

		/* Очищаем предыдущий результат. */
		if(is_object($this->result)) $this->result->free();

		/* Выполняем запрос. */
		$this->result = $this->db->query($query);

		/* Если есть ошибки - выводим их. */
		if($this->db->errno) die("mysqli error #".$this->db->errno.": ".$this->db->error);

		/*
		 * Если в результате выполнения запроса (например SELECT...) получены данные - возвращаем их.
		 * ВНИМАНИЕ! Данные всегда возвращаются в массиве, даже если запрос возвращает одну запись.
		 */
		if(is_object($this->result)) {

			$data = array();

			while($row = $this->result->fetch_assoc()) $data[] = $row;


			return $data;
		}

		/* Если результат отрицательный - возвращаем false. */
		else if($this->result == FALSE) return false;

		/* Если запрос (например UPDATE или INSERT) затронул какие-либо строки - возвращаем их количество. */
		else return $this->db->affected_rows;
	}

	public function returnQueries() {

		return $this->queries;
	}
}
?>