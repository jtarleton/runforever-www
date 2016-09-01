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
		$dsn = sprintf('mysql://%s:%s@%s/%s','root', 'root', 'localhost', 'test_dw');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class nielsen_spend_meta extends Baseobject 
{
public $nsid;
	public $outdoor;
	public $cable_tv;
	public $fsi_coupon;
	public $spanish_language_cable_tv;
	public $spanish_language_network_tv;
	public $internet;
	public $local_magazine;
	public $local_newspaper;
	public $local_sunday_supplement;
	public $network_tv;
	public $national_magazine;
	public $national_newspaper;
	public $network_radio;
	public $national_sunday_supplement;
	public $spot_tv;
	public $spot_radio;
	public $syndicated;
	public $total_spend;
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

    public function getNsId() {
        return $this->nsid;
    }    public function getOutdoor() {
        return $this->outdoor;
    }    public function getCableTv() {
        return $this->cable_tv;
    }    public function getFsiCoupon() {
        return $this->fsi_coupon;
    }    public function getSpanishLanguageCableTv() {
        return $this->spanish_language_cable_tv;
    }    public function getSpanishLanguageNetworkTv() {
        return $this->spanish_language_network_tv;
    }    public function getInternet() {
        return $this->internet;
    }    public function getLocalMagazine() {
        return $this->local_magazine;
    }    public function getLocalNewspaper() {
        return $this->local_newspaper;
    }    public function getLocalSundaySupplement() {
        return $this->local_sunday_supplement;
    }    public function getNetworkTv() {
        return $this->network_tv;
    }    public function getNationalMagazine() {
        return $this->national_magazine;
    }    public function getNationalNewspaper() {
        return $this->national_newspaper;
    }    public function getNetworkRadio() {
        return $this->network_radio;
    }    public function getNationalSundaySupplement() {
        return $this->national_sunday_supplement;
    }    public function getSpotTv() {
        return $this->spot_tv;
    }    public function getSpotRadio() {
        return $this->spot_radio;
    }    public function getSyndicated() {
        return $this->syndicated;
    }    public function getTotalSpend() {
        return $this->total_spend;
    }    private function setNsId($nsid) {
        $this->nsid = $nsid;
    }    private function setOutdoor($outdoor) {
        $this->outdoor = $outdoor;
    }    private function setCableTv($cable_tv) {
        $this->cable_tv = $cable_tv;
    }    private function setFsiCoupon($fsi_coupon) {
        $this->fsi_coupon = $fsi_coupon;
    }    private function setSpanishLanguageCableTv($spanish_language_cable_tv) {
        $this->spanish_language_cable_tv = $spanish_language_cable_tv;
    }    private function setSpanishLanguageNetworkTv($spanish_language_network_tv) {
        $this->spanish_language_network_tv = $spanish_language_network_tv;
    }    private function setInternet($internet) {
        $this->internet = $internet;
    }    private function setLocalMagazine($local_magazine) {
        $this->local_magazine = $local_magazine;
    }    private function setLocalNewspaper($local_newspaper) {
        $this->local_newspaper = $local_newspaper;
    }    private function setLocalSundaySupplement($local_sunday_supplement) {
        $this->local_sunday_supplement = $local_sunday_supplement;
    }    private function setNetworkTv($network_tv) {
        $this->network_tv = $network_tv;
    }    private function setNationalMagazine($national_magazine) {
        $this->national_magazine = $national_magazine;
    }    private function setNationalNewspaper($national_newspaper) {
        $this->national_newspaper = $national_newspaper;
    }    private function setNetworkRadio($network_radio) {
        $this->network_radio = $network_radio;
    }    private function setNationalSundaySupplement($national_sunday_supplement) {
        $this->national_sunday_supplement = $national_sunday_supplement;
    }    private function setSpotTv($spot_tv) {
        $this->spot_tv = $spot_tv;
    }    private function setSpotRadio($spot_radio) {
        $this->spot_radio = $spot_radio;
    }    private function setSyndicated($syndicated) {
        $this->syndicated = $syndicated;
    }    private function setTotalSpend($total_spend) {
        $this->total_spend = $total_spend;
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

class nielsen_spend_metaTable extends Baseobject{
    public static function get($id, $data=null) {
		return new nielsen_spend_meta($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM nielsen_spend_meta");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM nielsen_spend_meta  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':nsid', 'nsid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':outdoor', 'outdoor', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cable_tv', 'cable_tv', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':fsi_coupon', 'fsi_coupon', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':spanish_language_cable_tv', 'spanish_language_cable_tv', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':spanish_language_network_tv', 'spanish_language_network_tv', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':internet', 'internet', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':local_magazine', 'local_magazine', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':local_newspaper', 'local_newspaper', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':local_sunday_supplement', 'local_sunday_supplement', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':network_tv', 'network_tv', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':national_magazine', 'national_magazine', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':national_newspaper', 'national_newspaper', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':network_radio', 'network_radio', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':national_sunday_supplement', 'national_sunday_supplement', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':spot_tv', 'spot_tv', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':spot_radio', 'spot_radio', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':syndicated', 'syndicated', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_spend', 'total_spend', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO nielsen_spend_meta ( nsid,outdoor,cable_tv,fsi_coupon,spanish_language_cable_tv,spanish_language_network_tv,internet,local_magazine,local_newspaper,local_sunday_supplement,network_tv,national_magazine,national_newspaper,network_radio,national_sunday_supplement,spot_tv,spot_radio,syndicated,total_spend) VALUES(:nsid,:outdoor,:cable_tv,:fsi_coupon,:spanish_language_cable_tv,:spanish_language_network_tv,:internet,:local_magazine,:local_newspaper,:local_sunday_supplement,:network_tv,:national_magazine,:national_newspaper,:network_radio,:national_sunday_supplement,:spot_tv,:spot_radio,:syndicated,:total_spend');


		
	
	$stmt->bindValue(':nsid', 'nsid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':outdoor', 'outdoor', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cable_tv', 'cable_tv', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':fsi_coupon', 'fsi_coupon', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spanish_language_cable_tv', 'spanish_language_cable_tv', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spanish_language_network_tv', 'spanish_language_network_tv', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':internet', 'internet', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':local_magazine', 'local_magazine', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':local_newspaper', 'local_newspaper', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':local_sunday_supplement', 'local_sunday_supplement', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':network_tv', 'network_tv', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':national_magazine', 'national_magazine', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':national_newspaper', 'national_newspaper', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':network_radio', 'network_radio', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':national_sunday_supplement', 'national_sunday_supplement', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spot_tv', 'spot_tv', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spot_radio', 'spot_radio', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':syndicated', 'syndicated', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_spend', 'total_spend', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE nielsen_spend_meta SET nsid=:nsid,outdoor=:outdoor,cable_tv=:cable_tv,fsi_coupon=:fsi_coupon,spanish_language_cable_tv=:spanish_language_cable_tv,spanish_language_network_tv=:spanish_language_network_tv,internet=:internet,local_magazine=:local_magazine,local_newspaper=:local_newspaper,local_sunday_supplement=:local_sunday_supplement,network_tv=:network_tv,national_magazine=:national_magazine,national_newspaper=:national_newspaper,network_radio=:network_radio,national_sunday_supplement=:national_sunday_supplement,spot_tv=:spot_tv,spot_radio=:spot_radio,syndicated=:syndicated,total_spend=:total_spend');


		
	
	$stmt->bindValue(':nsid', $changes['nsid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':outdoor', $changes['outdoor'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cable_tv', $changes['cable_tv'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':fsi_coupon', $changes['fsi_coupon'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spanish_language_cable_tv', $changes['spanish_language_cable_tv'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spanish_language_network_tv', $changes['spanish_language_network_tv'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':internet', $changes['internet'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':local_magazine', $changes['local_magazine'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':local_newspaper', $changes['local_newspaper'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':local_sunday_supplement', $changes['local_sunday_supplement'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':network_tv', $changes['network_tv'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':national_magazine', $changes['national_magazine'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':national_newspaper', $changes['national_newspaper'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':network_radio', $changes['network_radio'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':national_sunday_supplement', $changes['national_sunday_supplement'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spot_tv', $changes['spot_tv'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spot_radio', $changes['spot_radio'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':syndicated', $changes['syndicated'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_spend', $changes['total_spend'], PDO::PARAM_STR);
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
$objs = nielsen_spend_metaTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=nielsen_spend_metaTable::getCount();
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


































