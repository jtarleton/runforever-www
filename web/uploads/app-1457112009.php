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
		$dsn = sprintf('mysql://%s:%s@%s/%s','root', '', 'localhost', 'adid_dw');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class adid_bank extends Baseobject 
{
public $bid;
	public $name;
	public $balance;
	public $active;
	public $can_use_credit_card;
	public $credit_worthiness;
	public $creator_id;
	public $start_cycle_date;
	public $end_cycle_date;
	public $rate_card_name;
	public $not_for_profit;
	public $total_purchase;
	public $total_purchase_per_cycle;
	public $total_threshold;
	public $total_threshold_per_cycle;
	public $total_code;
	public $total_code_per_cycle;
	public $total_prefix;
	public $total_prefix_per_cycle;
	public $parent;
	public $parent_id;
	public $billing_contact_name;
	public $billing_company_name;
	public $billing_address;
	public $billing_address_2;
	public $billing_city;
	public $billing_state;
	public $billing_country;
	public $billing_zipcode;
	public $billing_phone;
	public $company_phone;
	public $billing_email;
	public $invoice_memo;
	public $created;
	public $deposit_per_use;
	public $anniv_manual_update;
	public $status;
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
    }    public function getBalance() {
        return $this->balance;
    }    public function getActive() {
        return $this->active;
    }    public function getCanUseCreditCard() {
        return $this->can_use_credit_card;
    }    public function getCreditWorthiness() {
        return $this->credit_worthiness;
    }    public function getCreatorId() {
        return $this->creator_id;
    }    public function getStartCycleDate() {
        return $this->start_cycle_date;
    }    public function getEndCycleDate() {
        return $this->end_cycle_date;
    }    public function getRateCardName() {
        return $this->rate_card_name;
    }    public function getNotForProfit() {
        return $this->not_for_profit;
    }    public function getTotalPurchase() {
        return $this->total_purchase;
    }    public function getTotalPurchasePerCycle() {
        return $this->total_purchase_per_cycle;
    }    public function getTotalThreshold() {
        return $this->total_threshold;
    }    public function getTotalThresholdPerCycle() {
        return $this->total_threshold_per_cycle;
    }    public function getTotalCode() {
        return $this->total_code;
    }    public function getTotalCodePerCycle() {
        return $this->total_code_per_cycle;
    }    public function getTotalPrefix() {
        return $this->total_prefix;
    }    public function getTotalPrefixPerCycle() {
        return $this->total_prefix_per_cycle;
    }    public function getParent() {
        return $this->parent;
    }    public function getParentId() {
        return $this->parent_id;
    }    public function getBillingContactName() {
        return $this->billing_contact_name;
    }    public function getBillingCompanyName() {
        return $this->billing_company_name;
    }    public function getBillingAddress() {
        return $this->billing_address;
    }    public function getBillingAddress2() {
        return $this->billing_address_2;
    }    public function getBillingCity() {
        return $this->billing_city;
    }    public function getBillingState() {
        return $this->billing_state;
    }    public function getBillingCountry() {
        return $this->billing_country;
    }    public function getBillingZipcode() {
        return $this->billing_zipcode;
    }    public function getBillingPhone() {
        return $this->billing_phone;
    }    public function getCompanyPhone() {
        return $this->company_phone;
    }    public function getBillingEmail() {
        return $this->billing_email;
    }    public function getInvoiceMemo() {
        return $this->invoice_memo;
    }    public function getCreated() {
        return $this->created;
    }    public function getDepositPerUse() {
        return $this->deposit_per_use;
    }    public function getAnnivManualUpdate() {
        return $this->anniv_manual_update;
    }    public function getStatus() {
        return $this->status;
    }    private function setBId($bid) {
        $this->bid = $bid;
    }    private function setName($name) {
        $this->name = $name;
    }    private function setBalance($balance) {
        $this->balance = $balance;
    }    private function setActive($active) {
        $this->active = $active;
    }    private function setCanUseCreditCard($can_use_credit_card) {
        $this->can_use_credit_card = $can_use_credit_card;
    }    private function setCreditWorthiness($credit_worthiness) {
        $this->credit_worthiness = $credit_worthiness;
    }    private function setCreatorId($creator_id) {
        $this->creator_id = $creator_id;
    }    private function setStartCycleDate($start_cycle_date) {
        $this->start_cycle_date = $start_cycle_date;
    }    private function setEndCycleDate($end_cycle_date) {
        $this->end_cycle_date = $end_cycle_date;
    }    private function setRateCardName($rate_card_name) {
        $this->rate_card_name = $rate_card_name;
    }    private function setNotForProfit($not_for_profit) {
        $this->not_for_profit = $not_for_profit;
    }    private function setTotalPurchase($total_purchase) {
        $this->total_purchase = $total_purchase;
    }    private function setTotalPurchasePerCycle($total_purchase_per_cycle) {
        $this->total_purchase_per_cycle = $total_purchase_per_cycle;
    }    private function setTotalThreshold($total_threshold) {
        $this->total_threshold = $total_threshold;
    }    private function setTotalThresholdPerCycle($total_threshold_per_cycle) {
        $this->total_threshold_per_cycle = $total_threshold_per_cycle;
    }    private function setTotalCode($total_code) {
        $this->total_code = $total_code;
    }    private function setTotalCodePerCycle($total_code_per_cycle) {
        $this->total_code_per_cycle = $total_code_per_cycle;
    }    private function setTotalPrefix($total_prefix) {
        $this->total_prefix = $total_prefix;
    }    private function setTotalPrefixPerCycle($total_prefix_per_cycle) {
        $this->total_prefix_per_cycle = $total_prefix_per_cycle;
    }    private function setParent($parent) {
        $this->parent = $parent;
    }    private function setParentId($parent_id) {
        $this->parent_id = $parent_id;
    }    private function setBillingContactName($billing_contact_name) {
        $this->billing_contact_name = $billing_contact_name;
    }    private function setBillingCompanyName($billing_company_name) {
        $this->billing_company_name = $billing_company_name;
    }    private function setBillingAddress($billing_address) {
        $this->billing_address = $billing_address;
    }    private function setBillingAddress2($billing_address_2) {
        $this->billing_address_2 = $billing_address_2;
    }    private function setBillingCity($billing_city) {
        $this->billing_city = $billing_city;
    }    private function setBillingState($billing_state) {
        $this->billing_state = $billing_state;
    }    private function setBillingCountry($billing_country) {
        $this->billing_country = $billing_country;
    }    private function setBillingZipcode($billing_zipcode) {
        $this->billing_zipcode = $billing_zipcode;
    }    private function setBillingPhone($billing_phone) {
        $this->billing_phone = $billing_phone;
    }    private function setCompanyPhone($company_phone) {
        $this->company_phone = $company_phone;
    }    private function setBillingEmail($billing_email) {
        $this->billing_email = $billing_email;
    }    private function setInvoiceMemo($invoice_memo) {
        $this->invoice_memo = $invoice_memo;
    }    private function setCreated($created) {
        $this->created = $created;
    }    private function setDepositPerUse($deposit_per_use) {
        $this->deposit_per_use = $deposit_per_use;
    }    private function setAnnivManualUpdate($anniv_manual_update) {
        $this->anniv_manual_update = $anniv_manual_update;
    }    private function setStatus($status) {
        $this->status = $status;
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

class adid_bankTable extends Baseobject{
    public static function get($id, $data=null) {
		return new adid_bank($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM adid_bank");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM adid_bank  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':name', 'name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':balance', 'balance', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':active', 'active', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':can_use_credit_card', 'can_use_credit_card', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':credit_worthiness', 'credit_worthiness', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':creator_id', 'creator_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':start_cycle_date', 'start_cycle_date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':end_cycle_date', 'end_cycle_date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':rate_card_name', 'rate_card_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':not_for_profit', 'not_for_profit', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_purchase', 'total_purchase', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_purchase_per_cycle', 'total_purchase_per_cycle', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_threshold', 'total_threshold', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_threshold_per_cycle', 'total_threshold_per_cycle', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_code', 'total_code', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_code_per_cycle', 'total_code_per_cycle', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_prefix', 'total_prefix', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':total_prefix_per_cycle', 'total_prefix_per_cycle', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_contact_name', 'billing_contact_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_company_name', 'billing_company_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_address', 'billing_address', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_address_2', 'billing_address_2', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_city', 'billing_city', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_state', 'billing_state', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_country', 'billing_country', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_zipcode', 'billing_zipcode', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_phone', 'billing_phone', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':company_phone', 'company_phone', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':billing_email', 'billing_email', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':invoice_memo', 'invoice_memo', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':deposit_per_use', 'deposit_per_use', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':anniv_manual_update', 'anniv_manual_update', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':status', 'status', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO adid_bank ( bid,name,balance,active,can_use_credit_card,credit_worthiness,creator_id,start_cycle_date,end_cycle_date,rate_card_name,not_for_profit,total_purchase,total_purchase_per_cycle,total_threshold,total_threshold_per_cycle,total_code,total_code_per_cycle,total_prefix,total_prefix_per_cycle,parent,parent_id,billing_contact_name,billing_company_name,billing_address,billing_address_2,billing_city,billing_state,billing_country,billing_zipcode,billing_phone,company_phone,billing_email,invoice_memo,created,deposit_per_use,anniv_manual_update,status) VALUES(:bid,:name,:balance,:active,:can_use_credit_card,:credit_worthiness,:creator_id,:start_cycle_date,:end_cycle_date,:rate_card_name,:not_for_profit,:total_purchase,:total_purchase_per_cycle,:total_threshold,:total_threshold_per_cycle,:total_code,:total_code_per_cycle,:total_prefix,:total_prefix_per_cycle,:parent,:parent_id,:billing_contact_name,:billing_company_name,:billing_address,:billing_address_2,:billing_city,:billing_state,:billing_country,:billing_zipcode,:billing_phone,:company_phone,:billing_email,:invoice_memo,:created,:deposit_per_use,:anniv_manual_update,:status');


		
	
	$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':name', 'name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':balance', 'balance', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':active', 'active', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':can_use_credit_card', 'can_use_credit_card', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':credit_worthiness', 'credit_worthiness', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_id', 'creator_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':start_cycle_date', 'start_cycle_date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':end_cycle_date', 'end_cycle_date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':rate_card_name', 'rate_card_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':not_for_profit', 'not_for_profit', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_purchase', 'total_purchase', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_purchase_per_cycle', 'total_purchase_per_cycle', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_threshold', 'total_threshold', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_threshold_per_cycle', 'total_threshold_per_cycle', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_code', 'total_code', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_code_per_cycle', 'total_code_per_cycle', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_prefix', 'total_prefix', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_prefix_per_cycle', 'total_prefix_per_cycle', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_contact_name', 'billing_contact_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_company_name', 'billing_company_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_address', 'billing_address', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_address_2', 'billing_address_2', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_city', 'billing_city', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_state', 'billing_state', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_country', 'billing_country', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_zipcode', 'billing_zipcode', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_phone', 'billing_phone', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_phone', 'company_phone', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_email', 'billing_email', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':invoice_memo', 'invoice_memo', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':deposit_per_use', 'deposit_per_use', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':anniv_manual_update', 'anniv_manual_update', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':status', 'status', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE adid_bank SET bid=:bid,name=:name,balance=:balance,active=:active,can_use_credit_card=:can_use_credit_card,credit_worthiness=:credit_worthiness,creator_id=:creator_id,start_cycle_date=:start_cycle_date,end_cycle_date=:end_cycle_date,rate_card_name=:rate_card_name,not_for_profit=:not_for_profit,total_purchase=:total_purchase,total_purchase_per_cycle=:total_purchase_per_cycle,total_threshold=:total_threshold,total_threshold_per_cycle=:total_threshold_per_cycle,total_code=:total_code,total_code_per_cycle=:total_code_per_cycle,total_prefix=:total_prefix,total_prefix_per_cycle=:total_prefix_per_cycle,parent=:parent,parent_id=:parent_id,billing_contact_name=:billing_contact_name,billing_company_name=:billing_company_name,billing_address=:billing_address,billing_address_2=:billing_address_2,billing_city=:billing_city,billing_state=:billing_state,billing_country=:billing_country,billing_zipcode=:billing_zipcode,billing_phone=:billing_phone,company_phone=:company_phone,billing_email=:billing_email,invoice_memo=:invoice_memo,created=:created,deposit_per_use=:deposit_per_use,anniv_manual_update=:anniv_manual_update,status=:status');


		
	
	$stmt->bindValue(':bid', $changes['bid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':name', $changes['name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':balance', $changes['balance'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':active', $changes['active'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':can_use_credit_card', $changes['can_use_credit_card'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':credit_worthiness', $changes['credit_worthiness'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_id', $changes['creator_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':start_cycle_date', $changes['start_cycle_date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':end_cycle_date', $changes['end_cycle_date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':rate_card_name', $changes['rate_card_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':not_for_profit', $changes['not_for_profit'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_purchase', $changes['total_purchase'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_purchase_per_cycle', $changes['total_purchase_per_cycle'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_threshold', $changes['total_threshold'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_threshold_per_cycle', $changes['total_threshold_per_cycle'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_code', $changes['total_code'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_code_per_cycle', $changes['total_code_per_cycle'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_prefix', $changes['total_prefix'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':total_prefix_per_cycle', $changes['total_prefix_per_cycle'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', $changes['parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', $changes['parent_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_contact_name', $changes['billing_contact_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_company_name', $changes['billing_company_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_address', $changes['billing_address'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_address_2', $changes['billing_address_2'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_city', $changes['billing_city'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_state', $changes['billing_state'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_country', $changes['billing_country'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_zipcode', $changes['billing_zipcode'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_phone', $changes['billing_phone'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':company_phone', $changes['company_phone'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':billing_email', $changes['billing_email'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':invoice_memo', $changes['invoice_memo'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', $changes['created'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':deposit_per_use', $changes['deposit_per_use'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':anniv_manual_update', $changes['anniv_manual_update'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':status', $changes['status'], PDO::PARAM_STR);
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
$objs = adid_bankTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=adid_bankTable::getCount();
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


































