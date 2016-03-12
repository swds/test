<?php
/*
 * Main class to view
 *
 */
class Main extends Config {

    private $db;
    function __construct(){
        $this->db = new MySQL();
    }

	public function getCities (){
		$query = "SELECT
						`id`,
						`name`
						FROM `cities` order by `name` ASC";
        $cities = $this->db->query($query);
		 return $cities;
	}
	
	public function showCities(){
		$cities = $this->getCities();
		echo json_encode($cities, JSON_UNESCAPED_UNICODE);
	}
	
	public function getQualifications (){
		$query = "SELECT
                        `id`,
						`name`
						FROM `qualifications` order by `id` ASC";
        $qualifications = $this->db->query($query);
		return $qualifications;
	}
	public function showQualifications(){
		$qualifications = $this->getQualifications();
		echo json_encode($qualifications, JSON_UNESCAPED_UNICODE);
	}
	public function getUserCities ($userID) {
		
		
	}
	
    public function showUsers (){
		$startFrom = $_POST['startFrom'];
		$userID = $_POST['userID'];
		$where = '';
		if (isset($startFrom)){
			$limit = ' LIMIT '.$startFrom.', 10';
		}else{
			$limit = ' LIMIT '.self::$core_cfg['page_limit'];
		}

		if(isset($userID)){
			$where = 'WHERE id = '.$userID;
			$limit = ' LIMIT 1';
		}

		$query = "SELECT
                        `id`,
						`name`,
						`qualification_id`
						FROM `users`
						".$where." ".$limit;
        $users = $this->db->query($query);
		$qualifications_temp = $this->getQualifications();
		$qualifications = array();
		foreach ($qualifications_temp as $qualification){
			$qualifications[$qualification['id']]['name'] = $qualification['name'];
		}
			$i=0;
		foreach ($users as  $user){
			
			$users[$i]['qualification'] .= $qualifications[$user['qualification_id']]['name'];
			$i++;
		}
		
        echo json_encode($users, JSON_UNESCAPED_UNICODE);
    }

	public function searchName(){
        $keyword = '%'.$_POST['value'].'%';
		$query = "SELECT * FROM users WHERE name LIKE '".$keyword."' ORDER BY id ASC LIMIT 0, 3";
        $search = $this->db->query($query);
        echo json_encode($search, JSON_UNESCAPED_UNICODE);
    }
}
?>