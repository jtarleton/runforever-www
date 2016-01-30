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
		$dsn = sprintf('mysql://%s:%s@%s/%s','root', 'root', 'localhost', 'adid_dw');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class churn_account_churn extends Baseobject 
{
public $bid;
	public $name;
	public $prior_year_count;
	public $current_year_count;
	public $total_count;
	public $churn_status;
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

    public function getBId() {
        return $this->bid;
    }    public function getName() {
        return $this->name;
    }    public function getPriorYearCount() {
        return $this->prior_year_count;
    }    public function getCurrentYearCount() {
        return $this->current_year_count;
    }    public function getTotalCount() {
        return $this->total_count;
    }    public function getChurnStatus() {
        return $this->churn_status;
    }    private function setBId($bid) {
        $this->bid = $bid;
    }    private function setName($name) {
        $this->name = $name;
    }    private function setPriorYearCount($prior_year_count) {
        $this->prior_year_count = $prior_year_count;
    }    private function setCurrentYearCount($current_year_count) {
        $this->current_year_count = $current_year_count;
    }    private function setTotalCount($total_count) {
        $this->total_count = $total_count;
    }    private function setChurnStatus($churn_status) {
        $this->churn_status = $churn_status;
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

class churn_account_churnTable extends Baseobject{
    public static function get($id, $data=null) {
		return new churn_account_churn($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM churn_account_churn");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM churn_account_churn  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':name', 'name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':prior_year_count', 'prior_year_count', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':current_year_count', 'current_year_count', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_count', 'total_count', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':churn_status', 'churn_status', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO churn_account_churn ( bid,name,prior_year_count,current_year_count,total_count,churn_status) VALUES(:bid,:name,:prior_year_count,:current_year_count,:total_count,:churn_status');


		
	
	$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':name', 'name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prior_year_count', 'prior_year_count', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':current_year_count', 'current_year_count', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_count', 'total_count', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':churn_status', 'churn_status', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE churn_account_churn SET bid=:bid,name=:name,prior_year_count=:prior_year_count,current_year_count=:current_year_count,total_count=:total_count,churn_status=:churn_status');


		
	
	$stmt->bindValue(':bid', $changes['bid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':name', $changes['name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prior_year_count', $changes['prior_year_count'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':current_year_count', $changes['current_year_count'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_count', $changes['total_count'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':churn_status', $changes['churn_status'], PDO::PARAM_STR);
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
$objs = churn_account_churnTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=churn_account_churnTable::getCount();
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


































