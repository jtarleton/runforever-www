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








class adid_meta_data extends Baseobject 
{
public $mid;
	public $cid;
	public $agency_name;
	public $agency_role;
	public $agency_role_other;
	public $product_item_type;
	public $product_item_type_other;
	public $product_number;
	public $product_link;
	public $production_cost;
	public $production_est;
	public $geography;
	public $target_market;
	public $media_mix;
	public $media_start_date;
	public $media_end_date;
	public $client_approval;
	public $trademark;
	public $disclaimer;
	public $regulatory;
	public $restrictions;
	public $doc_reference_num;
	public $encoding_method;
	public $encoding_method_other;
	public $alternate_id_type;
	public $alternate_id_type_other;
	public $alternate_id;
	public $co_op;
	public $link;
	public $creative_strategy;
	public $copy;
	public $delivery_source;
	public $delivery_source_other;
	public $misc;
	public $research_quan;
	public $research_qual;
	public $research_other;
	public $research_claim;
	public $parentchild;
	public $telecaster;
	public $clock;
	public $color_encoder;
	public $country_origin;
	public $language;
	public $talent_status;
	public $image_usage;
	public $editorial_cost;
	public $music_cost;
	public $music_lic;
	public $music_other;
	public $production_add_credits;
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

    public function getMId() {
        return $this->mid;
    }    public function getCId() {
        return $this->cid;
    }    public function getAgencyName() {
        return $this->agency_name;
    }    public function getAgencyRole() {
        return $this->agency_role;
    }    public function getAgencyRoleOther() {
        return $this->agency_role_other;
    }    public function getProductItemType() {
        return $this->product_item_type;
    }    public function getProductItemTypeOther() {
        return $this->product_item_type_other;
    }    public function getProductNumber() {
        return $this->product_number;
    }    public function getProductLink() {
        return $this->product_link;
    }    public function getProductionCost() {
        return $this->production_cost;
    }    public function getProductionEst() {
        return $this->production_est;
    }    public function getGeography() {
        return $this->geography;
    }    public function getTargetMarket() {
        return $this->target_market;
    }    public function getMediaMix() {
        return $this->media_mix;
    }    public function getMediaStartDate() {
        return $this->media_start_date;
    }    public function getMediaEndDate() {
        return $this->media_end_date;
    }    public function getClientApproval() {
        return $this->client_approval;
    }    public function getTrademark() {
        return $this->trademark;
    }    public function getDisclaimer() {
        return $this->disclaimer;
    }    public function getRegulatory() {
        return $this->regulatory;
    }    public function getRestrictions() {
        return $this->restrictions;
    }    public function getDocReferenceNum() {
        return $this->doc_reference_num;
    }    public function getEncodingMethod() {
        return $this->encoding_method;
    }    public function getEncodingMethodOther() {
        return $this->encoding_method_other;
    }    public function getAlternateIdType() {
        return $this->alternate_id_type;
    }    public function getAlternateIdTypeOther() {
        return $this->alternate_id_type_other;
    }    public function getAlternateId() {
        return $this->alternate_id;
    }    public function getCoOp() {
        return $this->co_op;
    }    public function getLink() {
        return $this->link;
    }    public function getCreativeStrategy() {
        return $this->creative_strategy;
    }    public function getCopy() {
        return $this->copy;
    }    public function getDeliverySource() {
        return $this->delivery_source;
    }    public function getDeliverySourceOther() {
        return $this->delivery_source_other;
    }    public function getMisc() {
        return $this->misc;
    }    public function getResearchQuan() {
        return $this->research_quan;
    }    public function getResearchQual() {
        return $this->research_qual;
    }    public function getResearchOther() {
        return $this->research_other;
    }    public function getResearchClaim() {
        return $this->research_claim;
    }    public function getParentchild() {
        return $this->parentchild;
    }    public function getTelecaster() {
        return $this->telecaster;
    }    public function getClock() {
        return $this->clock;
    }    public function getColorEncoder() {
        return $this->color_encoder;
    }    public function getCountryOrigin() {
        return $this->country_origin;
    }    public function getLanguage() {
        return $this->language;
    }    public function getTalentStatus() {
        return $this->talent_status;
    }    public function getImageUsage() {
        return $this->image_usage;
    }    public function getEditorialCost() {
        return $this->editorial_cost;
    }    public function getMusicCost() {
        return $this->music_cost;
    }    public function getMusicLic() {
        return $this->music_lic;
    }    public function getMusicOther() {
        return $this->music_other;
    }    public function getProductionAddCredits() {
        return $this->production_add_credits;
    }    private function setMId($mid) {
        $this->mid = $mid;
    }    private function setCId($cid) {
        $this->cid = $cid;
    }    private function setAgencyName($agency_name) {
        $this->agency_name = $agency_name;
    }    private function setAgencyRole($agency_role) {
        $this->agency_role = $agency_role;
    }    private function setAgencyRoleOther($agency_role_other) {
        $this->agency_role_other = $agency_role_other;
    }    private function setProductItemType($product_item_type) {
        $this->product_item_type = $product_item_type;
    }    private function setProductItemTypeOther($product_item_type_other) {
        $this->product_item_type_other = $product_item_type_other;
    }    private function setProductNumber($product_number) {
        $this->product_number = $product_number;
    }    private function setProductLink($product_link) {
        $this->product_link = $product_link;
    }    private function setProductionCost($production_cost) {
        $this->production_cost = $production_cost;
    }    private function setProductionEst($production_est) {
        $this->production_est = $production_est;
    }    private function setGeography($geography) {
        $this->geography = $geography;
    }    private function setTargetMarket($target_market) {
        $this->target_market = $target_market;
    }    private function setMediaMix($media_mix) {
        $this->media_mix = $media_mix;
    }    private function setMediaStartDate($media_start_date) {
        $this->media_start_date = $media_start_date;
    }    private function setMediaEndDate($media_end_date) {
        $this->media_end_date = $media_end_date;
    }    private function setClientApproval($client_approval) {
        $this->client_approval = $client_approval;
    }    private function setTrademark($trademark) {
        $this->trademark = $trademark;
    }    private function setDisclaimer($disclaimer) {
        $this->disclaimer = $disclaimer;
    }    private function setRegulatory($regulatory) {
        $this->regulatory = $regulatory;
    }    private function setRestrictions($restrictions) {
        $this->restrictions = $restrictions;
    }    private function setDocReferenceNum($doc_reference_num) {
        $this->doc_reference_num = $doc_reference_num;
    }    private function setEncodingMethod($encoding_method) {
        $this->encoding_method = $encoding_method;
    }    private function setEncodingMethodOther($encoding_method_other) {
        $this->encoding_method_other = $encoding_method_other;
    }    private function setAlternateIdType($alternate_id_type) {
        $this->alternate_id_type = $alternate_id_type;
    }    private function setAlternateIdTypeOther($alternate_id_type_other) {
        $this->alternate_id_type_other = $alternate_id_type_other;
    }    private function setAlternateId($alternate_id) {
        $this->alternate_id = $alternate_id;
    }    private function setCoOp($co_op) {
        $this->co_op = $co_op;
    }    private function setLink($link) {
        $this->link = $link;
    }    private function setCreativeStrategy($creative_strategy) {
        $this->creative_strategy = $creative_strategy;
    }    private function setCopy($copy) {
        $this->copy = $copy;
    }    private function setDeliverySource($delivery_source) {
        $this->delivery_source = $delivery_source;
    }    private function setDeliverySourceOther($delivery_source_other) {
        $this->delivery_source_other = $delivery_source_other;
    }    private function setMisc($misc) {
        $this->misc = $misc;
    }    private function setResearchQuan($research_quan) {
        $this->research_quan = $research_quan;
    }    private function setResearchQual($research_qual) {
        $this->research_qual = $research_qual;
    }    private function setResearchOther($research_other) {
        $this->research_other = $research_other;
    }    private function setResearchClaim($research_claim) {
        $this->research_claim = $research_claim;
    }    private function setParentchild($parentchild) {
        $this->parentchild = $parentchild;
    }    private function setTelecaster($telecaster) {
        $this->telecaster = $telecaster;
    }    private function setClock($clock) {
        $this->clock = $clock;
    }    private function setColorEncoder($color_encoder) {
        $this->color_encoder = $color_encoder;
    }    private function setCountryOrigin($country_origin) {
        $this->country_origin = $country_origin;
    }    private function setLanguage($language) {
        $this->language = $language;
    }    private function setTalentStatus($talent_status) {
        $this->talent_status = $talent_status;
    }    private function setImageUsage($image_usage) {
        $this->image_usage = $image_usage;
    }    private function setEditorialCost($editorial_cost) {
        $this->editorial_cost = $editorial_cost;
    }    private function setMusicCost($music_cost) {
        $this->music_cost = $music_cost;
    }    private function setMusicLic($music_lic) {
        $this->music_lic = $music_lic;
    }    private function setMusicOther($music_other) {
        $this->music_other = $music_other;
    }    private function setProductionAddCredits($production_add_credits) {
        $this->production_add_credits = $production_add_credits;
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

class adid_meta_dataTable extends Baseobject{
    public static function get($id, $data=null) {
		return new adid_meta_data($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM adid_meta_data");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM adid_meta_data  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':mid', 'mid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':agency_name', 'agency_name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':agency_role', 'agency_role', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':agency_role_other', 'agency_role_other', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product_item_type', 'product_item_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product_item_type_other', 'product_item_type_other', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product_number', 'product_number', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product_link', 'product_link', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':production_cost', 'production_cost', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':production_est', 'production_est', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':geography', 'geography', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':target_market', 'target_market', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':media_mix', 'media_mix', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':media_start_date', 'media_start_date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':media_end_date', 'media_end_date', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':client_approval', 'client_approval', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':trademark', 'trademark', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':disclaimer', 'disclaimer', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':regulatory', 'regulatory', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':restrictions', 'restrictions', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':doc_reference_num', 'doc_reference_num', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':encoding_method', 'encoding_method', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':encoding_method_other', 'encoding_method_other', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':alternate_id_type', 'alternate_id_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':alternate_id_type_other', 'alternate_id_type_other', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':alternate_id', 'alternate_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':co_op', 'co_op', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':link', 'link', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':creative_strategy', 'creative_strategy', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':copy', 'copy', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':delivery_source', 'delivery_source', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':delivery_source_other', 'delivery_source_other', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':misc', 'misc', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':research_quan', 'research_quan', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':research_qual', 'research_qual', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':research_other', 'research_other', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':research_claim', 'research_claim', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parentchild', 'parentchild', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':telecaster', 'telecaster', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':clock', 'clock', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':color_encoder', 'color_encoder', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':country_origin', 'country_origin', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':language', 'language', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':talent_status', 'talent_status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':image_usage', 'image_usage', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':editorial_cost', 'editorial_cost', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':music_cost', 'music_cost', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':music_lic', 'music_lic', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':music_other', 'music_other', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':production_add_credits', 'production_add_credits', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO adid_meta_data ( mid,cid,agency_name,agency_role,agency_role_other,product_item_type,product_item_type_other,product_number,product_link,production_cost,production_est,geography,target_market,media_mix,media_start_date,media_end_date,client_approval,trademark,disclaimer,regulatory,restrictions,doc_reference_num,encoding_method,encoding_method_other,alternate_id_type,alternate_id_type_other,alternate_id,co_op,link,creative_strategy,copy,delivery_source,delivery_source_other,misc,research_quan,research_qual,research_other,research_claim,parentchild,telecaster,clock,color_encoder,country_origin,language,talent_status,image_usage,editorial_cost,music_cost,music_lic,music_other,production_add_credits) VALUES(:mid,:cid,:agency_name,:agency_role,:agency_role_other,:product_item_type,:product_item_type_other,:product_number,:product_link,:production_cost,:production_est,:geography,:target_market,:media_mix,:media_start_date,:media_end_date,:client_approval,:trademark,:disclaimer,:regulatory,:restrictions,:doc_reference_num,:encoding_method,:encoding_method_other,:alternate_id_type,:alternate_id_type_other,:alternate_id,:co_op,:link,:creative_strategy,:copy,:delivery_source,:delivery_source_other,:misc,:research_quan,:research_qual,:research_other,:research_claim,:parentchild,:telecaster,:clock,:color_encoder,:country_origin,:language,:talent_status,:image_usage,:editorial_cost,:music_cost,:music_lic,:music_other,:production_add_credits');


		
	
	$stmt->bindValue(':mid', 'mid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', 'cid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_name', 'agency_name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_role', 'agency_role', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_role_other', 'agency_role_other', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_item_type', 'product_item_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_item_type_other', 'product_item_type_other', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_number', 'product_number', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_link', 'product_link', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':production_cost', 'production_cost', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':production_est', 'production_est', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':geography', 'geography', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':target_market', 'target_market', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_mix', 'media_mix', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_start_date', 'media_start_date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_end_date', 'media_end_date', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':client_approval', 'client_approval', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':trademark', 'trademark', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':disclaimer', 'disclaimer', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':regulatory', 'regulatory', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':restrictions', 'restrictions', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':doc_reference_num', 'doc_reference_num', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':encoding_method', 'encoding_method', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':encoding_method_other', 'encoding_method_other', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':alternate_id_type', 'alternate_id_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':alternate_id_type_other', 'alternate_id_type_other', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':alternate_id', 'alternate_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':co_op', 'co_op', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':link', 'link', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creative_strategy', 'creative_strategy', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':copy', 'copy', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':delivery_source', 'delivery_source', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':delivery_source_other', 'delivery_source_other', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':misc', 'misc', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_quan', 'research_quan', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_qual', 'research_qual', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_other', 'research_other', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_claim', 'research_claim', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parentchild', 'parentchild', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':telecaster', 'telecaster', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':clock', 'clock', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':color_encoder', 'color_encoder', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':country_origin', 'country_origin', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':language', 'language', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':talent_status', 'talent_status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':image_usage', 'image_usage', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':editorial_cost', 'editorial_cost', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':music_cost', 'music_cost', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':music_lic', 'music_lic', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':music_other', 'music_other', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':production_add_credits', 'production_add_credits', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE adid_meta_data SET mid=:mid,cid=:cid,agency_name=:agency_name,agency_role=:agency_role,agency_role_other=:agency_role_other,product_item_type=:product_item_type,product_item_type_other=:product_item_type_other,product_number=:product_number,product_link=:product_link,production_cost=:production_cost,production_est=:production_est,geography=:geography,target_market=:target_market,media_mix=:media_mix,media_start_date=:media_start_date,media_end_date=:media_end_date,client_approval=:client_approval,trademark=:trademark,disclaimer=:disclaimer,regulatory=:regulatory,restrictions=:restrictions,doc_reference_num=:doc_reference_num,encoding_method=:encoding_method,encoding_method_other=:encoding_method_other,alternate_id_type=:alternate_id_type,alternate_id_type_other=:alternate_id_type_other,alternate_id=:alternate_id,co_op=:co_op,link=:link,creative_strategy=:creative_strategy,copy=:copy,delivery_source=:delivery_source,delivery_source_other=:delivery_source_other,misc=:misc,research_quan=:research_quan,research_qual=:research_qual,research_other=:research_other,research_claim=:research_claim,parentchild=:parentchild,telecaster=:telecaster,clock=:clock,color_encoder=:color_encoder,country_origin=:country_origin,language=:language,talent_status=:talent_status,image_usage=:image_usage,editorial_cost=:editorial_cost,music_cost=:music_cost,music_lic=:music_lic,music_other=:music_other,production_add_credits=:production_add_credits');


		
	
	$stmt->bindValue(':mid', $changes['mid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':cid', $changes['cid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_name', $changes['agency_name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_role', $changes['agency_role'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':agency_role_other', $changes['agency_role_other'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_item_type', $changes['product_item_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_item_type_other', $changes['product_item_type_other'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_number', $changes['product_number'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_link', $changes['product_link'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':production_cost', $changes['production_cost'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':production_est', $changes['production_est'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':geography', $changes['geography'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':target_market', $changes['target_market'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_mix', $changes['media_mix'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_start_date', $changes['media_start_date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':media_end_date', $changes['media_end_date'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':client_approval', $changes['client_approval'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':trademark', $changes['trademark'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':disclaimer', $changes['disclaimer'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':regulatory', $changes['regulatory'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':restrictions', $changes['restrictions'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':doc_reference_num', $changes['doc_reference_num'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':encoding_method', $changes['encoding_method'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':encoding_method_other', $changes['encoding_method_other'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':alternate_id_type', $changes['alternate_id_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':alternate_id_type_other', $changes['alternate_id_type_other'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':alternate_id', $changes['alternate_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':co_op', $changes['co_op'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':link', $changes['link'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creative_strategy', $changes['creative_strategy'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':copy', $changes['copy'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':delivery_source', $changes['delivery_source'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':delivery_source_other', $changes['delivery_source_other'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':misc', $changes['misc'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_quan', $changes['research_quan'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_qual', $changes['research_qual'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_other', $changes['research_other'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':research_claim', $changes['research_claim'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parentchild', $changes['parentchild'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':telecaster', $changes['telecaster'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':clock', $changes['clock'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':color_encoder', $changes['color_encoder'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':country_origin', $changes['country_origin'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':language', $changes['language'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':talent_status', $changes['talent_status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':image_usage', $changes['image_usage'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':editorial_cost', $changes['editorial_cost'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':music_cost', $changes['music_cost'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':music_lic', $changes['music_lic'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':music_other', $changes['music_other'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':production_add_credits', $changes['production_add_credits'], PDO::PARAM_STR);
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
$objs = adid_meta_dataTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=adid_meta_dataTable::getCount();
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


































