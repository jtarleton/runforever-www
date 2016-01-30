<?php 

class Database 
{
 public static function PDOCreate( $uri, $cache = true )
    {

        if( $cache )
        {
            if( isset(self::$pdo_objects[$uri]) )
            {
                self::$pdo_objects[$uri]['count']++;
                return self::$pdo_objects[$uri]['dbh'];
            }

            self::$pdo_objects[$uri]['count'] = 1;
        }



        $args = parse_url($uri);

        $dbtype 	= $args['scheme'];
        $server 	= $args['host'];
		$port		= null;
        $user     	= $args['user'];
        $pass     	= $args['pass'];
        $database 	= $args['path'];

        while( $database[0] == '/' )
            $database = substr($database,1);


        $db = null;

        /*
        * Here we will format the DSN string to match
        * how the PDO driver expects the data
        */

        $dsn = '';

        switch( strtolower($dbtype) )
        {
            case 'mysql':

            	$dsn = 'mysql:host='.$server;

            	//if( ! empty($port) )
            		$dsn .= ';port=3307'; // .$port;

            	if( ! empty($database) )
            		$dsn .= ';dbname='.$database;

            	$dsn .= ';charset=utf8';

                break;
			default:
				throw new Exception('Unknown database type: '.$uri);
				break;
        }



        //echo "\nCreating PDO with DSN: $dsn \n\n";

       	$db = new PDO( $dsn, $user, $pass );


        if( $cache )
            self::$pdo_objects[$uri]['dbh'] = $db;


  		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


  		/*
  		* Execute post-creation SQL
  		*/


  		switch( strtolower($dbtype) )
        {
            case 'mysql':
        		$db->prepare("set names 'UTF8'")->execute();
        		break;
    	}


        return $db;
    }	
}





class Baseobject extends Database {
	public function __construct() {
		$dsn = sprintf('mysql://%s:%s@%s/%s','root', '', 'localhost', 'tarlejh_venus');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class nyrr_race_results extends Baseobject 
{
public $id;
	public $race_name;
	public $date;
	public $finisher_name;
	public $gender_age;
	public $city;
	public $team;
	public $distance;
	public $net;
	public $pace;
	public $overall;
	public $gender;
	public $age;
	public $agegraded;
	public $age_graded_percentage;
	public $photo;
		/**
	 * Constructor 
	 */
    public function __construct($id, $data=null){
      if(!isset($data)) {
  	    //$data = lookup data by id
      } 
      $this->load($data);
    }

    /**
     * Load data  
     */
     public function load(array $data) {
foreach($data as $prop=>$value) {
			$this->$prop = $value;
		} 
	       
     }

    public function getId() {
        return $this->id;
    }    public function getRaceName() {
        return $this->race_name;
    }    public function getDate() {
        return $this->date;
    }    public function getFinisherName() {
        return $this->finisher_name;
    }    public function getGenderAge() {
        return $this->gender_age;
    }    public function getCity() {
        return $this->city;
    }    public function getTeam() {
        return $this->team;
    }    public function getDistance() {
        return $this->distance;
    }    public function getNet() {
        return $this->net;
    }    public function getPace() {
        return $this->pace;
    }    public function getOverall() {
        return $this->overall;
    }    public function getGender() {
        return $this->gender;
    }    public function getAge() {
        return $this->age;
    }    public function getAgegraded() {
        return $this->agegraded;
    }    public function getAgeGradedPercentage() {
        return $this->age_graded_percentage;
    }    public function getPhoto() {
        return $this->photo;
    }    private function setId($id) {
        $this->id = $id;
    }    private function setRaceName($race_name) {
        $this->race_name = $race_name;
    }    private function setDate($date) {
        $this->date = $date;
    }    private function setFinisherName($finisher_name) {
        $this->finisher_name = $finisher_name;
    }    private function setGenderAge($gender_age) {
        $this->gender_age = $gender_age;
    }    private function setCity($city) {
        $this->city = $city;
    }    private function setTeam($team) {
        $this->team = $team;
    }    private function setDistance($distance) {
        $this->distance = $distance;
    }    private function setNet($net) {
        $this->net = $net;
    }    private function setPace($pace) {
        $this->pace = $pace;
    }    private function setOverall($overall) {
        $this->overall = $overall;
    }    private function setGender($gender) {
        $this->gender = $gender;
    }    private function setAge($age) {
        $this->age = $age;
    }    private function setAgegraded($agegraded) {
        $this->agegraded = $agegraded;
    }    private function setAgeGradedPercentage($age_graded_percentage) {
        $this->age_graded_percentage = $age_graded_percentage;
    }    private function setPhoto($photo) {
        $this->photo = $photo;
    }

public function getTableHeading() {
		$html = '%s';
		$closure = function($fields){ 
			foreach ($fields as $k => &$value) 
				$fields[$k]=ucwords(str_replace('_',' ',$value)); 
			return $fields; 
		};

		return sprintf($html, implode('</th><th>', 
				call_user_func($closure, array_keys(get_object_vars($this)))
			)
		);
	}

}

class nyrr_race_resultsTable extends Baseobject{
    public static function get($id, $data=null) {
		return new nyrr_race_results($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM nyrr_race_results");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM nyrr_race_results  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':id', 'id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':race_name', 'race_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':date', 'date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':finisher_name', 'finisher_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':gender_age', 'gender_age', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':city', 'city', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':team', 'team', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':distance', 'distance', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':net', 'net', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':pace', 'pace', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':overall', 'overall', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':gender', 'gender', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':age', 'age', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':agegraded', 'agegraded', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':age_graded_percentage', 'age_graded_percentage', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':photo', 'photo', PDO::PARAM_STR);
		$stmt->execute();
	$objs = array();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$obj = self::get(null,$row);
		$objs[] = $obj;
	} 








    	return $objs;
	}







public static function Create() {


$pdo = parent::Connect();

	$stmt=$pdo->prepare('INSERT INTO nyrr_race_results ( id,race_name,date,finisher_name,gender_age,city,team,distance,net,pace,overall,gender,age,agegraded,age_graded_percentage,photo) VALUES(:id,:race_name,:date,:finisher_name,:gender_age,:city,:team,:distance,:net,:pace,:overall,:gender,:age,:agegraded,:age_graded_percentage,:photo');


		
	
	$stmt->bindValue(':id', 'id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':race_name', 'race_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date', 'date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':finisher_name', 'finisher_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':gender_age', 'gender_age', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':city', 'city', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':team', 'team', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':distance', 'distance', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':net', 'net', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pace', 'pace', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':overall', 'overall', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':gender', 'gender', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':age', 'age', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agegraded', 'agegraded', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':age_graded_percentage', 'age_graded_percentage', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':photo', 'photo', PDO::PARAM_STR);
		$stmt->execute();
	








    	return $stmt->rowCount();
	}













public static function Update(array $changes) {

$fields = explode(',',@$_POST['csv_fields']);

$missing = array();
foreach($fields as $v){
	if(!isset($changes[$v])){
		$missing[] =  $v;
	}
}

if(count($missing))
	throw new Exception('Please provide a non-null value for the following fields: ' . implode(',',$missing) );

$pdo = parent::Connect();

	$stmt=$pdo->prepare('UPDATE nyrr_race_results SET id=:id,race_name=:race_name,date=:date,finisher_name=:finisher_name,gender_age=:gender_age,city=:city,team=:team,distance=:distance,net=:net,pace=:pace,overall=:overall,gender=:gender,age=:age,agegraded=:agegraded,age_graded_percentage=:age_graded_percentage,photo=:photo');


		
	
	$stmt->bindValue(':id', $changes['id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':race_name', $changes['race_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date', $changes['date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':finisher_name', $changes['finisher_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':gender_age', $changes['gender_age'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':city', $changes['city'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':team', $changes['team'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':distance', $changes['distance'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':net', $changes['net'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pace', $changes['pace'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':overall', $changes['overall'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':gender', $changes['gender'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':age', $changes['age'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agegraded', $changes['agegraded'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':age_graded_percentage', $changes['age_graded_percentage'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':photo', $changes['photo'], PDO::PARAM_STR);
		$stmt->execute();
	








    	return $stmt->rowCount();
	}























}








$html= '';
$i = 0;
$offset= isset($_GET['offset']) ?  $_GET['offset'] : 0;
$p = ($offset+1);

$limit = isset($_GET['limit']) ?  $_GET['limit'] : 100;
$offset=$offset*$limit;
$objs = nyrr_race_resultsTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=nyrr_race_resultsTable::getCount();
$mod = $ct%$limit;
$pages = ($mod==0) ? intval($ct/$limit) : intval($ct/$limit) + 1;
$start = $p;

$range = range($start, $pages);

foreach(array_slice($range,$p, 10) as $page)

$html.= '<a href="app.php?offset='. ($page-1) .'&limit='.$limit.'">'.$page.'</a> | ';



?>

<!DOCTYPE html>
<body>
<div>
<?php echo $html;
?>
</div>

</body>

</html>


































