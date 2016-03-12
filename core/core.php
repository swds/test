<?php
/*
 * Core
 * Main File to constract Data
 */

    require_once ('config.php');
    require_once ('classes/mysql_class.php');
    require_once ('classes/main_class.php');
    $main = new Main;
		switch ($_POST['action']){
			case "showUsers":
				$main->showUsers();
			break;
			case "searchName":
				$main->searchName();
			break;
			case "showCities":
				$main->showCities();
			break;
			case "showQualifications":
				$main->showQualifications();
			break;
		}
?>