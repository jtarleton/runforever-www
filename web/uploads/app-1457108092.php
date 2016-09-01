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








class codes_prefixes_trans_agcy_nielsen_report extends Baseobject 
{
public $parent_id;
	public $parent;
	public $advertiser_id;
	public $advertiser;
	public $parent_type;
	public $bid;
	public $rate_card_name;
	public $cid;
	public $customer_company_name;
	public $domain;
	public $state;
	public $charge_type;
	public $amount;
	public $cyear;
	public $cmonth;
	public $cday;
	public $ayear;
	public $amonth;
	public $ann_month;
	public $company_name;
	public $company_type;
	public $company_domain;
	public $nielsen_advertiser_code;
	public $nielsen_advertiser_entity;
	public $in_nielsen;
	public $created;
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

    public function getParentId() {
        return $this->parent_id;
    }    public function getParent() {
        return $this->parent;
    }    public function getAdvertiserId() {
        return $this->advertiser_id;
    }    public function getAdvertiser() {
        return $this->advertiser;
    }    public function getParentType() {
        return $this->parent_type;
    }    public function getBId() {
        return $this->bid;
    }    public function getRateCardName() {
        return $this->rate_card_name;
    }    public function getCId() {
        return $this->cid;
    }    public function getCustomerCompanyName() {
        return $this->customer_company_name;
    }    public function getDomain() {
        return $this->domain;
    }    public function getState() {
        return $this->state;
    }    public function getChargeType() {
        return $this->charge_type;
    }    public function getAmount() {
        return $this->amount;
    }    public function getCyear() {
        return $this->cyear;
    }    public function getCmonth() {
        return $this->cmonth;
    }    public function getCday() {
        return $this->cday;
    }    public function getAyear() {
        return $this->ayear;
    }    public function getAmonth() {
        return $this->amonth;
    }    public function getAnnMonth() {
        return $this->ann_month;
    }    public function getCompanyName() {
        return $this->company_name;
    }    public function getCompanyType() {
        return $this->company_type;
    }    public function getCompanyDomain() {
        return $this->company_domain;
    }    public function getNielsenAdvertiserCode() {
        return $this->nielsen_advertiser_code;
    }    public function getNielsenAdvertiserEntity() {
        return $this->nielsen_advertiser_entity;
    }    public function getInNielsen() {
        return $this->in_nielsen;
    }    public function getCreated() {
        return $this->created;
    }    private function setParentId($parent_id) {
        $this->parent_id = $parent_id;
    }    private function setParent($parent) {
        $this->parent = $parent;
    }    private function setAdvertiserId($advertiser_id) {
        $this->advertiser_id = $advertiser_id;
    }    private function setAdvertiser($advertiser) {
        $this->advertiser = $advertiser;
    }    private function setParentType($parent_type) {
        $this->parent_type = $parent_type;
    }    private function setBId($bid) {
        $this->bid = $bid;
    }    private function setRateCardName($rate_card_name) {
        $this->rate_card_name = $rate_card_name;
    }    private function setCId($cid) {
        $this->cid = $cid;
    }    private function setCustomerCompanyName($customer_company_name) {
        $this->customer_company_name = $customer_company_name;
    }    private function setDomain($domain) {
        $this->domain = $domain;
    }    private function setState($state) {
        $this->state = $state;
    }    private function setChargeType($charge_type) {
        $this->charge_type = $charge_type;
    }    private function setAmount($amount) {
        $this->amount = $amount;
    }    private function setCyear($cyear) {
        $this->cyear = $cyear;
    }    private function setCmonth($cmonth) {
        $this->cmonth = $cmonth;
    }    private function setCday($cday) {
        $this->cday = $cday;
    }    private function setAyear($ayear) {
        $this->ayear = $ayear;
    }    private function setAmonth($amonth) {
        $this->amonth = $amonth;
    }    private function setAnnMonth($ann_month) {
        $this->ann_month = $ann_month;
    }    private function setCompanyName($company_name) {
        $this->company_name = $company_name;
    }    private function setCompanyType($company_type) {
        $this->company_type = $company_type;
    }    private function setCompanyDomain($company_domain) {
        $this->company_domain = $company_domain;
    }    private function setNielsenAdvertiserCode($nielsen_advertiser_code) {
        $this->nielsen_advertiser_code = $nielsen_advertiser_code;
    }    private function setNielsenAdvertiserEntity($nielsen_advertiser_entity) {
        $this->nielsen_advertiser_entity = $nielsen_advertiser_entity;
    }    private function setInNielsen($in_nielsen) {
        $this->in_nielsen = $in_nielsen;
    }    private function setCreated($created) {
        $this->created = $created;
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

class codes_prefixes_trans_agcy_nielsen_reportTable extends Baseobject{
    public static function get($id, $data=null) {
		return new codes_prefixes_trans_agcy_nielsen_report($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM codes_prefixes_trans_agcy_nielsen_report");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM codes_prefixes_trans_agcy_nielsen_report  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':rate_card_name', 'rate_card_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':customer_company_name', 'customer_company_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':domain', 'domain', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':state', 'state', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':charge_type', 'charge_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':amount', 'amount', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cyear', 'cyear', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cmonth', 'cmonth', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cday', 'cday', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':ayear', 'ayear', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':amonth', 'amonth', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':ann_month', 'ann_month', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':company_name', 'company_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':company_type', 'company_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':company_domain', 'company_domain', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':in_nielsen', 'in_nielsen', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO codes_prefixes_trans_agcy_nielsen_report ( parent_id,parent,advertiser_id,advertiser,parent_type,bid,rate_card_name,cid,customer_company_name,domain,state,charge_type,amount,cyear,cmonth,cday,ayear,amonth,ann_month,company_name,company_type,company_domain,nielsen_advertiser_code,nielsen_advertiser_entity,in_nielsen,created) VALUES(:parent_id,:parent,:advertiser_id,:advertiser,:parent_type,:bid,:rate_card_name,:cid,:customer_company_name,:domain,:state,:charge_type,:amount,:cyear,:cmonth,:cday,:ayear,:amonth,:ann_month,:company_name,:company_type,:company_domain,:nielsen_advertiser_code,:nielsen_advertiser_entity,:in_nielsen,:created');


		
	
	$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':rate_card_name', 'rate_card_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':customer_company_name', 'customer_company_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':domain', 'domain', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':state', 'state', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':charge_type', 'charge_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amount', 'amount', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cyear', 'cyear', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cmonth', 'cmonth', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cday', 'cday', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ayear', 'ayear', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amonth', 'amonth', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ann_month', 'ann_month', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_name', 'company_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_type', 'company_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_domain', 'company_domain', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':in_nielsen', 'in_nielsen', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE codes_prefixes_trans_agcy_nielsen_report SET parent_id=:parent_id,parent=:parent,advertiser_id=:advertiser_id,advertiser=:advertiser,parent_type=:parent_type,bid=:bid,rate_card_name=:rate_card_name,cid=:cid,customer_company_name=:customer_company_name,domain=:domain,state=:state,charge_type=:charge_type,amount=:amount,cyear=:cyear,cmonth=:cmonth,cday=:cday,ayear=:ayear,amonth=:amonth,ann_month=:ann_month,company_name=:company_name,company_type=:company_type,company_domain=:company_domain,nielsen_advertiser_code=:nielsen_advertiser_code,nielsen_advertiser_entity=:nielsen_advertiser_entity,in_nielsen=:in_nielsen,created=:created');


		
	
	$stmt->bindValue(':parent_id', $changes['parent_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', $changes['parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', $changes['advertiser_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', $changes['advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', $changes['parent_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', $changes['bid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':rate_card_name', $changes['rate_card_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', $changes['cid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':customer_company_name', $changes['customer_company_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':domain', $changes['domain'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':state', $changes['state'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':charge_type', $changes['charge_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amount', $changes['amount'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cyear', $changes['cyear'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cmonth', $changes['cmonth'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cday', $changes['cday'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ayear', $changes['ayear'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amonth', $changes['amonth'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ann_month', $changes['ann_month'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_name', $changes['company_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_type', $changes['company_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_domain', $changes['company_domain'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_code', $changes['nielsen_advertiser_code'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', $changes['nielsen_advertiser_entity'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':in_nielsen', $changes['in_nielsen'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', $changes['created'], PDO::PARAM_STR);
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
$objs = codes_prefixes_trans_agcy_nielsen_reportTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=codes_prefixes_trans_agcy_nielsen_reportTable::getCount();
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


































