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
		$dsn = sprintf('mysql://%s:%s@%s/%s','devadid', 'devadid', 'localhost', 'adidwarehouse');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class map_nielsen_codes extends Baseobject 
{
public $cid;
	public $parent_id;
	public $parent;
	public $advertiser_id;
	public $advertiser;
	public $nielsen_advertiser_code;
	public $nielsen_advertiser_entity;
	public $parent_type;
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

    public function getCId() {
        return $this->cid;
    }    public function getParentId() {
        return $this->parent_id;
    }    public function getParent() {
        return $this->parent;
    }    public function getAdvertiserId() {
        return $this->advertiser_id;
    }    public function getAdvertiser() {
        return $this->advertiser;
    }    public function getNielsenAdvertiserCode() {
        return $this->nielsen_advertiser_code;
    }    public function getNielsenAdvertiserEntity() {
        return $this->nielsen_advertiser_entity;
    }    public function getParentType() {
        return $this->parent_type;
    }    private function setCId($cid) {
        $this->cid = $cid;
    }    private function setParentId($parent_id) {
        $this->parent_id = $parent_id;
    }    private function setParent($parent) {
        $this->parent = $parent;
    }    private function setAdvertiserId($advertiser_id) {
        $this->advertiser_id = $advertiser_id;
    }    private function setAdvertiser($advertiser) {
        $this->advertiser = $advertiser;
    }    private function setNielsenAdvertiserCode($nielsen_advertiser_code) {
        $this->nielsen_advertiser_code = $nielsen_advertiser_code;
    }    private function setNielsenAdvertiserEntity($nielsen_advertiser_entity) {
        $this->nielsen_advertiser_entity = $nielsen_advertiser_entity;
    }    private function setParentType($parent_type) {
        $this->parent_type = $parent_type;
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

class map_nielsen_codesTable extends Baseobject{
    public static function get($id, $data=null) {
		return new map_nielsen_codes($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM map_nielsen_codes");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM map_nielsen_codes  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO map_nielsen_codes ( cid,parent_id,parent,advertiser_id,advertiser,nielsen_advertiser_code,nielsen_advertiser_entity,parent_type) VALUES(:cid,:parent_id,:parent,:advertiser_id,:advertiser,:nielsen_advertiser_code,:nielsen_advertiser_entity,:parent_type');


		
	
	$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE map_nielsen_codes SET cid=:cid,parent_id=:parent_id,parent=:parent,advertiser_id=:advertiser_id,advertiser=:advertiser,nielsen_advertiser_code=:nielsen_advertiser_code,nielsen_advertiser_entity=:nielsen_advertiser_entity,parent_type=:parent_type');


		
	
	$stmt->bindValue(':cid', $changes['cid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', $changes['parent_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', $changes['parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', $changes['advertiser_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', $changes['advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_code', $changes['nielsen_advertiser_code'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', $changes['nielsen_advertiser_entity'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', $changes['parent_type'], PDO::PARAM_STR);
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
$objs = map_nielsen_codesTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=map_nielsen_codesTable::getCount();
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


































