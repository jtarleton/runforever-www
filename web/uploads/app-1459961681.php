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
		$dsn = sprintf('mysql://%s:%s@%s/%s','adiddw2', 'adiddw2', 'localhost', 'adid_sag_test');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class AdidValidatedCodesArchive extends Baseobject 
{
public $commercial_id;
	public $prefix_status;
	public $code_status;
	public $code_status_flag;
	public $code_status_reason;
	public $parent;
	public $parent_type;
	public $advertiser;
	public $media_type;
	public $sd_flag;
	public $hd_flag;
	public $3d_flag;
	public $date_created;
	public $source;
	public $source_filename;
	public $month_received;
	public $year_received;
	public $cid;
	public $days_since_code_creation;
	public $date_processed;
	public $ts_processed;
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

    public function getCommercialId() {
        return $this->commercial_id;
    }    public function getPrefixStatus() {
        return $this->prefix_status;
    }    public function getCodeStatus() {
        return $this->code_status;
    }    public function getCodeStatusFlag() {
        return $this->code_status_flag;
    }    public function getCodeStatusReason() {
        return $this->code_status_reason;
    }    public function getParent() {
        return $this->parent;
    }    public function getParentType() {
        return $this->parent_type;
    }    public function getAdvertiser() {
        return $this->advertiser;
    }    public function getMediaType() {
        return $this->media_type;
    }    public function getSdFlag() {
        return $this->sd_flag;
    }    public function getHdFlag() {
        return $this->hd_flag;
    }    public function get3dFlag() {
        return $this->3d_flag;
    }    public function getDateCreated() {
        return $this->date_created;
    }    public function getSource() {
        return $this->source;
    }    public function getSourceFilename() {
        return $this->source_filename;
    }    public function getMonthReceived() {
        return $this->month_received;
    }    public function getYearReceived() {
        return $this->year_received;
    }    public function getCId() {
        return $this->cid;
    }    public function getDaysSinceCodeCreation() {
        return $this->days_since_code_creation;
    }    public function getDateProcessed() {
        return $this->date_processed;
    }    public function getTsProcessed() {
        return $this->ts_processed;
    }    private function setCommercialId($commercial_id) {
        $this->commercial_id = $commercial_id;
    }    private function setPrefixStatus($prefix_status) {
        $this->prefix_status = $prefix_status;
    }    private function setCodeStatus($code_status) {
        $this->code_status = $code_status;
    }    private function setCodeStatusFlag($code_status_flag) {
        $this->code_status_flag = $code_status_flag;
    }    private function setCodeStatusReason($code_status_reason) {
        $this->code_status_reason = $code_status_reason;
    }    private function setParent($parent) {
        $this->parent = $parent;
    }    private function setParentType($parent_type) {
        $this->parent_type = $parent_type;
    }    private function setAdvertiser($advertiser) {
        $this->advertiser = $advertiser;
    }    private function setMediaType($media_type) {
        $this->media_type = $media_type;
    }    private function setSdFlag($sd_flag) {
        $this->sd_flag = $sd_flag;
    }    private function setHdFlag($hd_flag) {
        $this->hd_flag = $hd_flag;
    }    private function set3dFlag($3d_flag) {
        $this->3d_flag = $3d_flag;
    }    private function setDateCreated($date_created) {
        $this->date_created = $date_created;
    }    private function setSource($source) {
        $this->source = $source;
    }    private function setSourceFilename($source_filename) {
        $this->source_filename = $source_filename;
    }    private function setMonthReceived($month_received) {
        $this->month_received = $month_received;
    }    private function setYearReceived($year_received) {
        $this->year_received = $year_received;
    }    private function setCId($cid) {
        $this->cid = $cid;
    }    private function setDaysSinceCodeCreation($days_since_code_creation) {
        $this->days_since_code_creation = $days_since_code_creation;
    }    private function setDateProcessed($date_processed) {
        $this->date_processed = $date_processed;
    }    private function setTsProcessed($ts_processed) {
        $this->ts_processed = $ts_processed;
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

class AdidValidatedCodesArchiveTable extends Baseobject{
    public static function get($id, $data=null) {
		return new AdidValidatedCodesArchive($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM AdidValidatedCodesArchive");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM AdidValidatedCodesArchive  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':commercial_id', 'commercial_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':prefix_status', 'prefix_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':code_status', 'code_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':code_status_flag', 'code_status_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':code_status_reason', 'code_status_reason', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':media_type', 'media_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':sd_flag', 'sd_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':hd_flag', 'hd_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':3d_flag', '3d_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':date_created', 'date_created', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':source', 'source', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':source_filename', 'source_filename', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':month_received', 'month_received', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':year_received', 'year_received', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':days_since_code_creation', 'days_since_code_creation', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':date_processed', 'date_processed', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':ts_processed', 'ts_processed', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO AdidValidatedCodesArchive ( commercial_id,prefix_status,code_status,code_status_flag,code_status_reason,parent,parent_type,advertiser,media_type,sd_flag,hd_flag,3d_flag,date_created,source,source_filename,month_received,year_received,cid,days_since_code_creation,date_processed,ts_processed) VALUES(:commercial_id,:prefix_status,:code_status,:code_status_flag,:code_status_reason,:parent,:parent_type,:advertiser,:media_type,:sd_flag,:hd_flag,:3d_flag,:date_created,:source,:source_filename,:month_received,:year_received,:cid,:days_since_code_creation,:date_processed,:ts_processed)');


		
	
	$stmt->bindValue(':commercial_id', 'commercial_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix_status', 'prefix_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_status', 'code_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_status_flag', 'code_status_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_status_reason', 'code_status_reason', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_type', 'media_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sd_flag', 'sd_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':hd_flag', 'hd_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':3d_flag', '3d_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date_created', 'date_created', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':source', 'source', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':source_filename', 'source_filename', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':month_received', 'month_received', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':year_received', 'year_received', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':days_since_code_creation', 'days_since_code_creation', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date_processed', 'date_processed', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ts_processed', 'ts_processed', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE AdidValidatedCodesArchive SET commercial_id=:commercial_id,prefix_status=:prefix_status,code_status=:code_status,code_status_flag=:code_status_flag,code_status_reason=:code_status_reason,parent=:parent,parent_type=:parent_type,advertiser=:advertiser,media_type=:media_type,sd_flag=:sd_flag,hd_flag=:hd_flag,3d_flag=:3d_flag,date_created=:date_created,source=:source,source_filename=:source_filename,month_received=:month_received,year_received=:year_received,cid=:cid,days_since_code_creation=:days_since_code_creation,date_processed=:date_processed,ts_processed=:ts_processed');


		
	
	$stmt->bindValue(':commercial_id', $changes['commercial_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix_status', $changes['prefix_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_status', $changes['code_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_status_flag', $changes['code_status_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_status_reason', $changes['code_status_reason'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', $changes['parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', $changes['parent_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', $changes['advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_type', $changes['media_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sd_flag', $changes['sd_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':hd_flag', $changes['hd_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':3d_flag', $changes['3d_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date_created', $changes['date_created'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':source', $changes['source'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':source_filename', $changes['source_filename'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':month_received', $changes['month_received'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':year_received', $changes['year_received'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', $changes['cid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':days_since_code_creation', $changes['days_since_code_creation'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':date_processed', $changes['date_processed'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ts_processed', $changes['ts_processed'], PDO::PARAM_STR);
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
$objs = AdidValidatedCodesArchiveTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=AdidValidatedCodesArchiveTable::getCount();
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


































