<?php
class Config {
		/* MySQL Setting */
			static public $mysql_cfg = array (
											'mysql_host' 	=> 'localhost',
											'mysql_port' 	=> '3306',
											'mysql_user' 	=> 'root',
											'mysql_pass' 	=> 'panasonic',
											'mysql_charset' => 'utf8',
											'mysql_db'	 	=> 'test'
										);
		/* System Setting */
			static public $core_cfg = array (
											'title' 		=> 'Список Пользователей',
											'version' 		=> '0.1',
											'page_limit'	=> '10',
										);
}

?>