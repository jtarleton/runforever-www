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
		$dsn = sprintf('mysql://%s:%s@%s/%s','root', 'rot', 'localhost', 'adid_dw');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class codes_created_report extends Baseobject 
{
public $cid;
	public $pid;
	public $bid;
	public $creator_userid;
	public $parent;
	public $parent_id;
	public $advertiser;
	public $advertiser_id;
	public $brand;
	public $brand_id;
	public $product;
	public $product_id;
	public $company_type;
	public $company_name;
	public $company_domain;
	public $prefix;
	public $adid;
	public $pre_parent;
	public $pre_advertiser;
	public $locked_unlocked;
	public $media_type;
	public $length_id;
	public $length;
	public $adid_base;
	public $real_purchase_price;
	public $not_for_profit;
	public $created;
	public $sd_flag;
	public $hd_flag;
	public $3d_flag;
	public $video_format_flag;
	public $cyear;
	public $cmonth;
	public $agency_location;
	public $agency_parent;
	public $user_email;
	public $agency_name;
	public $code_record_type;
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
    }    public function getPId() {
        return $this->pid;
    }    public function getBId() {
        return $this->bid;
    }    public function getCreatorUserId() {
        return $this->creator_userid;
    }    public function getParent() {
        return $this->parent;
    }    public function getParentId() {
        return $this->parent_id;
    }    public function getAdvertiser() {
        return $this->advertiser;
    }    public function getAdvertiserId() {
        return $this->advertiser_id;
    }    public function getBrand() {
        return $this->brand;
    }    public function getBrandId() {
        return $this->brand_id;
    }    public function getProduct() {
        return $this->product;
    }    public function getProductId() {
        return $this->product_id;
    }    public function getCompanyType() {
        return $this->company_type;
    }    public function getCompanyName() {
        return $this->company_name;
    }    public function getCompanyDomain() {
        return $this->company_domain;
    }    public function getPrefix() {
        return $this->prefix;
    }    public function getAdId() {
        return $this->adid;
    }    public function getPreParent() {
        return $this->pre_parent;
    }    public function getPreAdvertiser() {
        return $this->pre_advertiser;
    }    public function getLockedUnlocked() {
        return $this->locked_unlocked;
    }    public function getMediaType() {
        return $this->media_type;
    }    public function getLengthId() {
        return $this->length_id;
    }    public function getLength() {
        return $this->length;
    }    public function getAdIdBase() {
        return $this->adid_base;
    }    public function getRealPurchasePrice() {
        return $this->real_purchase_price;
    }    public function getNotForProfit() {
        return $this->not_for_profit;
    }    public function getCreated() {
        return $this->created;
    }    public function getSdFlag() {
        return $this->sd_flag;
    }    public function getHdFlag() {
        return $this->hd_flag;
    }    public function get3dFlag() {
        return $this->3d_flag;
    }    public function getVIdeoFormatFlag() {
        return $this->video_format_flag;
    }    public function getCyear() {
        return $this->cyear;
    }    public function getCmonth() {
        return $this->cmonth;
    }    public function getAgencyLocation() {
        return $this->agency_location;
    }    public function getAgencyParent() {
        return $this->agency_parent;
    }    public function getUserEmail() {
        return $this->user_email;
    }    public function getAgencyName() {
        return $this->agency_name;
    }    public function getCodeRecordType() {
        return $this->code_record_type;
    }    private function setCId($cid) {
        $this->cid = $cid;
    }    private function setPId($pid) {
        $this->pid = $pid;
    }    private function setBId($bid) {
        $this->bid = $bid;
    }    private function setCreatorUserId($creator_userid) {
        $this->creator_userid = $creator_userid;
    }    private function setParent($parent) {
        $this->parent = $parent;
    }    private function setParentId($parent_id) {
        $this->parent_id = $parent_id;
    }    private function setAdvertiser($advertiser) {
        $this->advertiser = $advertiser;
    }    private function setAdvertiserId($advertiser_id) {
        $this->advertiser_id = $advertiser_id;
    }    private function setBrand($brand) {
        $this->brand = $brand;
    }    private function setBrandId($brand_id) {
        $this->brand_id = $brand_id;
    }    private function setProduct($product) {
        $this->product = $product;
    }    private function setProductId($product_id) {
        $this->product_id = $product_id;
    }    private function setCompanyType($company_type) {
        $this->company_type = $company_type;
    }    private function setCompanyName($company_name) {
        $this->company_name = $company_name;
    }    private function setCompanyDomain($company_domain) {
        $this->company_domain = $company_domain;
    }    private function setPrefix($prefix) {
        $this->prefix = $prefix;
    }    private function setAdId($adid) {
        $this->adid = $adid;
    }    private function setPreParent($pre_parent) {
        $this->pre_parent = $pre_parent;
    }    private function setPreAdvertiser($pre_advertiser) {
        $this->pre_advertiser = $pre_advertiser;
    }    private function setLockedUnlocked($locked_unlocked) {
        $this->locked_unlocked = $locked_unlocked;
    }    private function setMediaType($media_type) {
        $this->media_type = $media_type;
    }    private function setLengthId($length_id) {
        $this->length_id = $length_id;
    }    private function setLength($length) {
        $this->length = $length;
    }    private function setAdIdBase($adid_base) {
        $this->adid_base = $adid_base;
    }    private function setRealPurchasePrice($real_purchase_price) {
        $this->real_purchase_price = $real_purchase_price;
    }    private function setNotForProfit($not_for_profit) {
        $this->not_for_profit = $not_for_profit;
    }    private function setCreated($created) {
        $this->created = $created;
    }    private function setSdFlag($sd_flag) {
        $this->sd_flag = $sd_flag;
    }    private function setHdFlag($hd_flag) {
        $this->hd_flag = $hd_flag;
    }    private function set3dFlag($3d_flag) {
        $this->3d_flag = $3d_flag;
    }    private function setVIdeoFormatFlag($video_format_flag) {
        $this->video_format_flag = $video_format_flag;
    }    private function setCyear($cyear) {
        $this->cyear = $cyear;
    }    private function setCmonth($cmonth) {
        $this->cmonth = $cmonth;
    }    private function setAgencyLocation($agency_location) {
        $this->agency_location = $agency_location;
    }    private function setAgencyParent($agency_parent) {
        $this->agency_parent = $agency_parent;
    }    private function setUserEmail($user_email) {
        $this->user_email = $user_email;
    }    private function setAgencyName($agency_name) {
        $this->agency_name = $agency_name;
    }    private function setCodeRecordType($code_record_type) {
        $this->code_record_type = $code_record_type;
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

class codes_created_reportTable extends Baseobject{
    public static function get($id, $data=null) {
		return new codes_created_report($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM codes_created_report");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM codes_created_report  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':pid', 'pid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':creator_userid', 'creator_userid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':brand', 'brand', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':brand_id', 'brand_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product', 'product', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product_id', 'product_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':company_type', 'company_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':company_name', 'company_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':company_domain', 'company_domain', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':prefix', 'prefix', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':adid', 'adid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':pre_parent', 'pre_parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':pre_advertiser', 'pre_advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':locked_unlocked', 'locked_unlocked', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':media_type', 'media_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':length_id', 'length_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':length', 'length', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':adid_base', 'adid_base', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':real_purchase_price', 'real_purchase_price', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':not_for_profit', 'not_for_profit', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':sd_flag', 'sd_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':hd_flag', 'hd_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':3d_flag', '3d_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':video_format_flag', 'video_format_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cyear', 'cyear', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cmonth', 'cmonth', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':agency_location', 'agency_location', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':agency_parent', 'agency_parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':user_email', 'user_email', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':agency_name', 'agency_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':code_record_type', 'code_record_type', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO codes_created_report ( cid,pid,bid,creator_userid,parent,parent_id,advertiser,advertiser_id,brand,brand_id,product,product_id,company_type,company_name,company_domain,prefix,adid,pre_parent,pre_advertiser,locked_unlocked,media_type,length_id,length,adid_base,real_purchase_price,not_for_profit,created,sd_flag,hd_flag,3d_flag,video_format_flag,cyear,cmonth,agency_location,agency_parent,user_email,agency_name,code_record_type) VALUES(:cid,:pid,:bid,:creator_userid,:parent,:parent_id,:advertiser,:advertiser_id,:brand,:brand_id,:product,:product_id,:company_type,:company_name,:company_domain,:prefix,:adid,:pre_parent,:pre_advertiser,:locked_unlocked,:media_type,:length_id,:length,:adid_base,:real_purchase_price,:not_for_profit,:created,:sd_flag,:hd_flag,:3d_flag,:video_format_flag,:cyear,:cmonth,:agency_location,:agency_parent,:user_email,:agency_name,:code_record_type');


		
	
	$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pid', 'pid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_userid', 'creator_userid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand', 'brand', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand_id', 'brand_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product', 'product', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_id', 'product_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_type', 'company_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_name', 'company_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_domain', 'company_domain', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix', 'prefix', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':adid', 'adid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pre_parent', 'pre_parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pre_advertiser', 'pre_advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':locked_unlocked', 'locked_unlocked', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_type', 'media_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':length_id', 'length_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':length', 'length', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':adid_base', 'adid_base', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':real_purchase_price', 'real_purchase_price', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':not_for_profit', 'not_for_profit', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sd_flag', 'sd_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':hd_flag', 'hd_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':3d_flag', '3d_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':video_format_flag', 'video_format_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cyear', 'cyear', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cmonth', 'cmonth', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_location', 'agency_location', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_parent', 'agency_parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':user_email', 'user_email', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_name', 'agency_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_record_type', 'code_record_type', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE codes_created_report SET cid=:cid,pid=:pid,bid=:bid,creator_userid=:creator_userid,parent=:parent,parent_id=:parent_id,advertiser=:advertiser,advertiser_id=:advertiser_id,brand=:brand,brand_id=:brand_id,product=:product,product_id=:product_id,company_type=:company_type,company_name=:company_name,company_domain=:company_domain,prefix=:prefix,adid=:adid,pre_parent=:pre_parent,pre_advertiser=:pre_advertiser,locked_unlocked=:locked_unlocked,media_type=:media_type,length_id=:length_id,length=:length,adid_base=:adid_base,real_purchase_price=:real_purchase_price,not_for_profit=:not_for_profit,created=:created,sd_flag=:sd_flag,hd_flag=:hd_flag,3d_flag=:3d_flag,video_format_flag=:video_format_flag,cyear=:cyear,cmonth=:cmonth,agency_location=:agency_location,agency_parent=:agency_parent,user_email=:user_email,agency_name=:agency_name,code_record_type=:code_record_type');


		
	
	$stmt->bindValue(':cid', $changes['cid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pid', $changes['pid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', $changes['bid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_userid', $changes['creator_userid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', $changes['parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', $changes['parent_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', $changes['advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', $changes['advertiser_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand', $changes['brand'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand_id', $changes['brand_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product', $changes['product'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_id', $changes['product_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_type', $changes['company_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_name', $changes['company_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_domain', $changes['company_domain'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix', $changes['prefix'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':adid', $changes['adid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pre_parent', $changes['pre_parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pre_advertiser', $changes['pre_advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':locked_unlocked', $changes['locked_unlocked'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_type', $changes['media_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':length_id', $changes['length_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':length', $changes['length'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':adid_base', $changes['adid_base'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':real_purchase_price', $changes['real_purchase_price'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':not_for_profit', $changes['not_for_profit'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', $changes['created'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sd_flag', $changes['sd_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':hd_flag', $changes['hd_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':3d_flag', $changes['3d_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':video_format_flag', $changes['video_format_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cyear', $changes['cyear'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cmonth', $changes['cmonth'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_location', $changes['agency_location'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_parent', $changes['agency_parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':user_email', $changes['user_email'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_name', $changes['agency_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_record_type', $changes['code_record_type'], PDO::PARAM_STR);
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
$objs = codes_created_reportTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=codes_created_reportTable::getCount();
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


































