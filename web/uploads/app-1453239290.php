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
		$dsn = sprintf('mysql://%s:%s@%s/%s','root', '', 'localhost', 'test_dw');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class cea_requests extends Baseobject 
{
public $id;
	public $response_status;
	public $response;
	public $request_type;
	public $request_id;
	public $userid;
	public $ip_address;
	public $request_date;
	public $ request_timestamp;
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
    }    public function getResponseStatus() {
        return $this->response_status;
    }    public function getResponse() {
        return $this->response;
    }    public function getRequestType() {
        return $this->request_type;
    }    public function getRequestId() {
        return $this->request_id;
    }    public function getUserId() {
        return $this->userid;
    }    public function getIpAddress() {
        return $this->ip_address;
    }    public function getRequestDate() {
        return $this->request_date;
    }    public function getRequestTimestamp() {
        return $this-> request_timestamp;
    }    private function setId($id) {
        $this->id = $id;
    }    private function setResponseStatus($response_status) {
        $this->response_status = $response_status;
    }    private function setResponse($response) {
        $this->response = $response;
    }    private function setRequestType($request_type) {
        $this->request_type = $request_type;
    }    private function setRequestId($request_id) {
        $this->request_id = $request_id;
    }    private function setUserId($userid) {
        $this->userid = $userid;
    }    private function setIpAddress($ip_address) {
        $this->ip_address = $ip_address;
    }    private function setRequestDate($request_date) {
        $this->request_date = $request_date;
    }    private function setRequestTimestamp($ request_timestamp) {
        $this-> request_timestamp = $ request_timestamp;
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

class cea_requestsTable extends Baseobject{
    public static function get($id, $data=null) {
		return new cea_requests($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM cea_requests");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM cea_requests  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':id', 'id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':response_status', 'response_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':response', 'response', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':request_type', 'request_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':request_id', 'request_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':userid', 'userid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':ip_address', 'ip_address', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':request_date', 'request_date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(': request_timestamp', ' request_timestamp', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO cea_requests ( id,response_status,response,request_type,request_id,userid,ip_address,request_date, request_timestamp) VALUES(:id,:response_status,:response,:request_type,:request_id,:userid,:ip_address,:request_date,: request_timestamp');


		
	
	$stmt->bindValue(':id', 'id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':response_status', 'response_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':response', 'response', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':request_type', 'request_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':request_id', 'request_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':userid', 'userid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ip_address', 'ip_address', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':request_date', 'request_date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(': request_timestamp', ' request_timestamp', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE cea_requests SET id=:id,response_status=:response_status,response=:response,request_type=:request_type,request_id=:request_id,userid=:userid,ip_address=:ip_address,request_date=:request_date, request_timestamp=: request_timestamp');


		
	
	$stmt->bindValue(':id', $changes['id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':response_status', $changes['response_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':response', $changes['response'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':request_type', $changes['request_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':request_id', $changes['request_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':userid', $changes['userid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ip_address', $changes['ip_address'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':request_date', $changes['request_date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(': request_timestamp', $changes[' request_timestamp'], PDO::PARAM_STR);
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
$objs = cea_requestsTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=cea_requestsTable::getCount();
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


































