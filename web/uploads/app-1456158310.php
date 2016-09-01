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
		$dsn = sprintf('mysql://%s:%s@%s/%s','root', 'toot', 'localhost', 'test_dw');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class adid_nielsen_changes extends Baseobject 
{
public $cid;
	public $action;
	public $id;
	public $old_name;
	public $new_name;
	public $date;
	public $type;
	public $changing_source;
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
    }    public function getAction() {
        return $this->action;
    }    public function getId() {
        return $this->id;
    }    public function getOldName() {
        return $this->old_name;
    }    public function getNewName() {
        return $this->new_name;
    }    public function getDate() {
        return $this->date;
    }    public function getType() {
        return $this->type;
    }    public function getChangingSource() {
        return $this->changing_source;
    }    private function setCId($cid) {
        $this->cid = $cid;
    }    private function setAction($action) {
        $this->action = $action;
    }    private function setId($id) {
        $this->id = $id;
    }    private function setOldName($old_name) {
        $this->old_name = $old_name;
    }    private function setNewName($new_name) {
        $this->new_name = $new_name;
    }    private function setDate($date) {
        $this->date = $date;
    }    private function setType($type) {
        $this->type = $type;
    }    private function setChangingSource($changing_source) {
        $this->changing_source = $changing_source;
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

class adid_nielsen_changesTable extends Baseobject{
    public static function get($id, $data=null) {
		return new adid_nielsen_changes($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM adid_nielsen_changes");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM adid_nielsen_changes  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':action', 'action', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':id', 'id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':old_name', 'old_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':new_name', 'new_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':date', 'date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':type', 'type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':changing_source', 'changing_source', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO adid_nielsen_changes ( cid,action,id,old_name,new_name,date,type,changing_source) VALUES(:cid,:action,:id,:old_name,:new_name,:date,:type,:changing_source');


		
	
	$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':action', 'action', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':id', 'id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':old_name', 'old_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':new_name', 'new_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date', 'date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':type', 'type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':changing_source', 'changing_source', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE adid_nielsen_changes SET cid=:cid,action=:action,id=:id,old_name=:old_name,new_name=:new_name,date=:date,type=:type,changing_source=:changing_source');


		
	
	$stmt->bindValue(':cid', $changes['cid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':action', $changes['action'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':id', $changes['id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':old_name', $changes['old_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':new_name', $changes['new_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date', $changes['date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':type', $changes['type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':changing_source', $changes['changing_source'], PDO::PARAM_STR);
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
$objs = adid_nielsen_changesTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=adid_nielsen_changesTable::getCount();
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


































