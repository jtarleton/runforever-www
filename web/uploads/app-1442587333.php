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








class transactions_report extends Baseobject 
{
public $parent;
	public $parent_id;
	public $advertiser;
	public $advertiser_id;
	public $locked_unlocked;
	public $tid;
	public $bid;
	public $rate_card_name;
	public $pid;
	public $cid;
	public $creator_userid;
	public $customer_company_name;
	public $customer_name;
	public $mail;
	public $domain;
	public $field_company_city_value;
	public $field_company_state_value;
	public $field_company_country_value;
	public $charge_type;
	public $amount;
	public $bank_balance;
	public $created;
	public $processed;
	public $cyear;
	public $cmonth;
	public $cday;
	public $ayear;
	public $amonth;
	public $start_cycle_date;
	public $profit_nonprofit;
	public $ann_month;
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

    public function getParent() {
        return $this->parent;
    }    public function getParentId() {
        return $this->parent_id;
    }    public function getAdvertiser() {
        return $this->advertiser;
    }    public function getAdvertiserId() {
        return $this->advertiser_id;
    }    public function getLockedUnlocked() {
        return $this->locked_unlocked;
    }    public function getTId() {
        return $this->tid;
    }    public function getBId() {
        return $this->bid;
    }    public function getRateCardName() {
        return $this->rate_card_name;
    }    public function getPId() {
        return $this->pid;
    }    public function getCId() {
        return $this->cid;
    }    public function getCreatorUserId() {
        return $this->creator_userid;
    }    public function getCustomerCompanyName() {
        return $this->customer_company_name;
    }    public function getCustomerName() {
        return $this->customer_name;
    }    public function getMail() {
        return $this->mail;
    }    public function getDomain() {
        return $this->domain;
    }    public function getFieldCompanyCityValue() {
        return $this->field_company_city_value;
    }    public function getFieldCompanyStateValue() {
        return $this->field_company_state_value;
    }    public function getFieldCompanyCountryValue() {
        return $this->field_company_country_value;
    }    public function getChargeType() {
        return $this->charge_type;
    }    public function getAmount() {
        return $this->amount;
    }    public function getBankBalance() {
        return $this->bank_balance;
    }    public function getCreated() {
        return $this->created;
    }    public function getProcessed() {
        return $this->processed;
    }    public function getCyear() {
        return $this->cyear;
    }    public function getCmonth() {
        return $this->cmonth;
    }    public function getCday() {
        return $this->cday;
    }    public function getAyear() {
        return $this->ayear;
    }    public function getAmonth() {
        return $this->amonth;
    }    public function getStartCycleDate() {
        return $this->start_cycle_date;
    }    public function getProfitNonprofit() {
        return $this->profit_nonprofit;
    }    public function getAnnMonth() {
        return $this->ann_month;
    }    private function setParent($parent) {
        $this->parent = $parent;
    }    private function setParentId($parent_id) {
        $this->parent_id = $parent_id;
    }    private function setAdvertiser($advertiser) {
        $this->advertiser = $advertiser;
    }    private function setAdvertiserId($advertiser_id) {
        $this->advertiser_id = $advertiser_id;
    }    private function setLockedUnlocked($locked_unlocked) {
        $this->locked_unlocked = $locked_unlocked;
    }    private function setTId($tid) {
        $this->tid = $tid;
    }    private function setBId($bid) {
        $this->bid = $bid;
    }    private function setRateCardName($rate_card_name) {
        $this->rate_card_name = $rate_card_name;
    }    private function setPId($pid) {
        $this->pid = $pid;
    }    private function setCId($cid) {
        $this->cid = $cid;
    }    private function setCreatorUserId($creator_userid) {
        $this->creator_userid = $creator_userid;
    }    private function setCustomerCompanyName($customer_company_name) {
        $this->customer_company_name = $customer_company_name;
    }    private function setCustomerName($customer_name) {
        $this->customer_name = $customer_name;
    }    private function setMail($mail) {
        $this->mail = $mail;
    }    private function setDomain($domain) {
        $this->domain = $domain;
    }    private function setFieldCompanyCityValue($field_company_city_value) {
        $this->field_company_city_value = $field_company_city_value;
    }    private function setFieldCompanyStateValue($field_company_state_value) {
        $this->field_company_state_value = $field_company_state_value;
    }    private function setFieldCompanyCountryValue($field_company_country_value) {
        $this->field_company_country_value = $field_company_country_value;
    }    private function setChargeType($charge_type) {
        $this->charge_type = $charge_type;
    }    private function setAmount($amount) {
        $this->amount = $amount;
    }    private function setBankBalance($bank_balance) {
        $this->bank_balance = $bank_balance;
    }    private function setCreated($created) {
        $this->created = $created;
    }    private function setProcessed($processed) {
        $this->processed = $processed;
    }    private function setCyear($cyear) {
        $this->cyear = $cyear;
    }    private function setCmonth($cmonth) {
        $this->cmonth = $cmonth;
    }    private function setCday($cday) {
        $this->cday = $cday;
    }    private function setAyear($ayear) {
        $this->ayear = $ayear;
    }    private function setAmonth($amonth) {
        $this->amonth = $amonth;
    }    private function setStartCycleDate($start_cycle_date) {
        $this->start_cycle_date = $start_cycle_date;
    }    private function setProfitNonprofit($profit_nonprofit) {
        $this->profit_nonprofit = $profit_nonprofit;
    }    private function setAnnMonth($ann_month) {
        $this->ann_month = $ann_month;
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

class transactions_reportTable extends Baseobject{
    public static function get($id, $data=null) {
		return new transactions_report($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM transactions_report");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM transactions_report  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':locked_unlocked', 'locked_unlocked', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':tid', 'tid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':rate_card_name', 'rate_card_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':pid', 'pid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':creator_userid', 'creator_userid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':customer_company_name', 'customer_company_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':customer_name', 'customer_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':mail', 'mail', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':domain', 'domain', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':field_company_city_value', 'field_company_city_value', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':field_company_state_value', 'field_company_state_value', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':field_company_country_value', 'field_company_country_value', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':charge_type', 'charge_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':amount', 'amount', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':bank_balance', 'bank_balance', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':processed', 'processed', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cyear', 'cyear', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cmonth', 'cmonth', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cday', 'cday', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':ayear', 'ayear', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':amonth', 'amonth', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':start_cycle_date', 'start_cycle_date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':profit_nonprofit', 'profit_nonprofit', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':ann_month', 'ann_month', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO transactions_report ( parent,parent_id,advertiser,advertiser_id,locked_unlocked,tid,bid,rate_card_name,pid,cid,creator_userid,customer_company_name,customer_name,mail,domain,field_company_city_value,field_company_state_value,field_company_country_value,charge_type,amount,bank_balance,created,processed,cyear,cmonth,cday,ayear,amonth,start_cycle_date,profit_nonprofit,ann_month) VALUES(:parent,:parent_id,:advertiser,:advertiser_id,:locked_unlocked,:tid,:bid,:rate_card_name,:pid,:cid,:creator_userid,:customer_company_name,:customer_name,:mail,:domain,:field_company_city_value,:field_company_state_value,:field_company_country_value,:charge_type,:amount,:bank_balance,:created,:processed,:cyear,:cmonth,:cday,:ayear,:amonth,:start_cycle_date,:profit_nonprofit,:ann_month');


		
	
	$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':locked_unlocked', 'locked_unlocked', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':tid', 'tid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':rate_card_name', 'rate_card_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pid', 'pid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_userid', 'creator_userid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':customer_company_name', 'customer_company_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':customer_name', 'customer_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':mail', 'mail', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':domain', 'domain', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':field_company_city_value', 'field_company_city_value', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':field_company_state_value', 'field_company_state_value', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':field_company_country_value', 'field_company_country_value', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':charge_type', 'charge_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amount', 'amount', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bank_balance', 'bank_balance', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':processed', 'processed', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cyear', 'cyear', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cmonth', 'cmonth', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cday', 'cday', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ayear', 'ayear', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amonth', 'amonth', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':start_cycle_date', 'start_cycle_date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':profit_nonprofit', 'profit_nonprofit', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ann_month', 'ann_month', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE transactions_report SET parent=:parent,parent_id=:parent_id,advertiser=:advertiser,advertiser_id=:advertiser_id,locked_unlocked=:locked_unlocked,tid=:tid,bid=:bid,rate_card_name=:rate_card_name,pid=:pid,cid=:cid,creator_userid=:creator_userid,customer_company_name=:customer_company_name,customer_name=:customer_name,mail=:mail,domain=:domain,field_company_city_value=:field_company_city_value,field_company_state_value=:field_company_state_value,field_company_country_value=:field_company_country_value,charge_type=:charge_type,amount=:amount,bank_balance=:bank_balance,created=:created,processed=:processed,cyear=:cyear,cmonth=:cmonth,cday=:cday,ayear=:ayear,amonth=:amonth,start_cycle_date=:start_cycle_date,profit_nonprofit=:profit_nonprofit,ann_month=:ann_month');


		
	
	$stmt->bindValue(':parent', $changes['parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', $changes['parent_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', $changes['advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', $changes['advertiser_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':locked_unlocked', $changes['locked_unlocked'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':tid', $changes['tid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', $changes['bid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':rate_card_name', $changes['rate_card_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pid', $changes['pid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', $changes['cid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_userid', $changes['creator_userid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':customer_company_name', $changes['customer_company_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':customer_name', $changes['customer_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':mail', $changes['mail'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':domain', $changes['domain'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':field_company_city_value', $changes['field_company_city_value'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':field_company_state_value', $changes['field_company_state_value'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':field_company_country_value', $changes['field_company_country_value'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':charge_type', $changes['charge_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amount', $changes['amount'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bank_balance', $changes['bank_balance'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', $changes['created'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':processed', $changes['processed'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cyear', $changes['cyear'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cmonth', $changes['cmonth'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cday', $changes['cday'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ayear', $changes['ayear'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':amonth', $changes['amonth'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':start_cycle_date', $changes['start_cycle_date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':profit_nonprofit', $changes['profit_nonprofit'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':ann_month', $changes['ann_month'], PDO::PARAM_STR);
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
$objs = transactions_reportTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=transactions_reportTable::getCount();
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


































