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








class churn_archived_advertiser_churn_status extends Baseobject 
{
public $nielsen_advertiser_code;
	public $nielsen_advertiser_entity;
	public $ytd_churn_status;
	public $jan_churn_status;
	public $feb_churn_status;
	public $march_churn_status;
	public $april_churn_status;
	public $may_churn_status;
	public $june_churn_status;
	public $july_churn_status;
	public $august_churn_status;
	public $sept_churn_status;
	public $oct_churn_status;
	public $nov_churn_status;
	public $dec_churn_status;
	public $year;
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

    public function getNielsenAdvertiserCode() {
        return $this->nielsen_advertiser_code;
    }    public function getNielsenAdvertiserEntity() {
        return $this->nielsen_advertiser_entity;
    }    public function getYtdChurnStatus() {
        return $this->ytd_churn_status;
    }    public function getJanChurnStatus() {
        return $this->jan_churn_status;
    }    public function getFebChurnStatus() {
        return $this->feb_churn_status;
    }    public function getMarchChurnStatus() {
        return $this->march_churn_status;
    }    public function getAprilChurnStatus() {
        return $this->april_churn_status;
    }    public function getMayChurnStatus() {
        return $this->may_churn_status;
    }    public function getJuneChurnStatus() {
        return $this->june_churn_status;
    }    public function getJulyChurnStatus() {
        return $this->july_churn_status;
    }    public function getAugustChurnStatus() {
        return $this->august_churn_status;
    }    public function getSeptChurnStatus() {
        return $this->sept_churn_status;
    }    public function getOctChurnStatus() {
        return $this->oct_churn_status;
    }    public function getNovChurnStatus() {
        return $this->nov_churn_status;
    }    public function getDecChurnStatus() {
        return $this->dec_churn_status;
    }    public function getYear() {
        return $this->year;
    }    private function setNielsenAdvertiserCode($nielsen_advertiser_code) {
        $this->nielsen_advertiser_code = $nielsen_advertiser_code;
    }    private function setNielsenAdvertiserEntity($nielsen_advertiser_entity) {
        $this->nielsen_advertiser_entity = $nielsen_advertiser_entity;
    }    private function setYtdChurnStatus($ytd_churn_status) {
        $this->ytd_churn_status = $ytd_churn_status;
    }    private function setJanChurnStatus($jan_churn_status) {
        $this->jan_churn_status = $jan_churn_status;
    }    private function setFebChurnStatus($feb_churn_status) {
        $this->feb_churn_status = $feb_churn_status;
    }    private function setMarchChurnStatus($march_churn_status) {
        $this->march_churn_status = $march_churn_status;
    }    private function setAprilChurnStatus($april_churn_status) {
        $this->april_churn_status = $april_churn_status;
    }    private function setMayChurnStatus($may_churn_status) {
        $this->may_churn_status = $may_churn_status;
    }    private function setJuneChurnStatus($june_churn_status) {
        $this->june_churn_status = $june_churn_status;
    }    private function setJulyChurnStatus($july_churn_status) {
        $this->july_churn_status = $july_churn_status;
    }    private function setAugustChurnStatus($august_churn_status) {
        $this->august_churn_status = $august_churn_status;
    }    private function setSeptChurnStatus($sept_churn_status) {
        $this->sept_churn_status = $sept_churn_status;
    }    private function setOctChurnStatus($oct_churn_status) {
        $this->oct_churn_status = $oct_churn_status;
    }    private function setNovChurnStatus($nov_churn_status) {
        $this->nov_churn_status = $nov_churn_status;
    }    private function setDecChurnStatus($dec_churn_status) {
        $this->dec_churn_status = $dec_churn_status;
    }    private function setYear($year) {
        $this->year = $year;
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

class churn_archived_advertiser_churn_statusTable extends Baseobject{
    public static function get($id, $data=null) {
		return new churn_archived_advertiser_churn_status($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM churn_archived_advertiser_churn_status");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM churn_archived_advertiser_churn_status  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':ytd_churn_status', 'ytd_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':jan_churn_status', 'jan_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':feb_churn_status', 'feb_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':march_churn_status', 'march_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':april_churn_status', 'april_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':may_churn_status', 'may_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':june_churn_status', 'june_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':july_churn_status', 'july_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':august_churn_status', 'august_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':sept_churn_status', 'sept_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':oct_churn_status', 'oct_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':nov_churn_status', 'nov_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':dec_churn_status', 'dec_churn_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':year', 'year', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO churn_archived_advertiser_churn_status ( nielsen_advertiser_code,nielsen_advertiser_entity,ytd_churn_status,jan_churn_status,feb_churn_status,march_churn_status,april_churn_status,may_churn_status,june_churn_status,july_churn_status,august_churn_status,sept_churn_status,oct_churn_status,nov_churn_status,dec_churn_status,year) VALUES(:nielsen_advertiser_code,:nielsen_advertiser_entity,:ytd_churn_status,:jan_churn_status,:feb_churn_status,:march_churn_status,:april_churn_status,:may_churn_status,:june_churn_status,:july_churn_status,:august_churn_status,:sept_churn_status,:oct_churn_status,:nov_churn_status,:dec_churn_status,:year');


		
	
	$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ytd_churn_status', 'ytd_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':jan_churn_status', 'jan_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':feb_churn_status', 'feb_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':march_churn_status', 'march_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':april_churn_status', 'april_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':may_churn_status', 'may_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':june_churn_status', 'june_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':july_churn_status', 'july_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':august_churn_status', 'august_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sept_churn_status', 'sept_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':oct_churn_status', 'oct_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nov_churn_status', 'nov_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':dec_churn_status', 'dec_churn_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':year', 'year', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE churn_archived_advertiser_churn_status SET nielsen_advertiser_code=:nielsen_advertiser_code,nielsen_advertiser_entity=:nielsen_advertiser_entity,ytd_churn_status=:ytd_churn_status,jan_churn_status=:jan_churn_status,feb_churn_status=:feb_churn_status,march_churn_status=:march_churn_status,april_churn_status=:april_churn_status,may_churn_status=:may_churn_status,june_churn_status=:june_churn_status,july_churn_status=:july_churn_status,august_churn_status=:august_churn_status,sept_churn_status=:sept_churn_status,oct_churn_status=:oct_churn_status,nov_churn_status=:nov_churn_status,dec_churn_status=:dec_churn_status,year=:year');


		
	
	$stmt->bindValue(':nielsen_advertiser_code', $changes['nielsen_advertiser_code'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', $changes['nielsen_advertiser_entity'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ytd_churn_status', $changes['ytd_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':jan_churn_status', $changes['jan_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':feb_churn_status', $changes['feb_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':march_churn_status', $changes['march_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':april_churn_status', $changes['april_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':may_churn_status', $changes['may_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':june_churn_status', $changes['june_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':july_churn_status', $changes['july_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':august_churn_status', $changes['august_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sept_churn_status', $changes['sept_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':oct_churn_status', $changes['oct_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nov_churn_status', $changes['nov_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':dec_churn_status', $changes['dec_churn_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':year', $changes['year'], PDO::PARAM_STR);
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
$objs = churn_archived_advertiser_churn_statusTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=churn_archived_advertiser_churn_statusTable::getCount();
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


































