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








class adid_prefix extends Baseobject 
{
public $pid;
	public $prefix;
	public $creator_groupid;
	public $creator_userid;
	public $owner_groupid;
	public $created;
	public $template;
	public $code_counter;
	public $prefix_title;
	public $prefix_desc;
	public $privacy_flag;
	public $parent;
	public $parent_id;
	public $advertiser;
	public $advertiser_id;
	public $brand;
	public $brand_id;
	public $product;
	public $product_id;
	public $who_updated;
	public $updated;
	public $gprefix;
	public $old_gprefix;
	public $client_prefix;
	public $active;
	public $bid;
	public $purchase_price;
	public $exclude_prefix;
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

    public function getPId() {
        return $this->pid;
    }    public function getPrefix() {
        return $this->prefix;
    }    public function getCreatorGroupId() {
        return $this->creator_groupid;
    }    public function getCreatorUserId() {
        return $this->creator_userid;
    }    public function getOwnerGroupId() {
        return $this->owner_groupid;
    }    public function getCreated() {
        return $this->created;
    }    public function getTemplate() {
        return $this->template;
    }    public function getCodeCounter() {
        return $this->code_counter;
    }    public function getPrefixTitle() {
        return $this->prefix_title;
    }    public function getPrefixDesc() {
        return $this->prefix_desc;
    }    public function getPrivacyFlag() {
        return $this->privacy_flag;
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
    }    public function getWhoUpdated() {
        return $this->who_updated;
    }    public function getUpdated() {
        return $this->updated;
    }    public function getGprefix() {
        return $this->gprefix;
    }    public function getOldGprefix() {
        return $this->old_gprefix;
    }    public function getClientPrefix() {
        return $this->client_prefix;
    }    public function getActive() {
        return $this->active;
    }    public function getBId() {
        return $this->bid;
    }    public function getPurchasePrice() {
        return $this->purchase_price;
    }    public function getExcludePrefix() {
        return $this->exclude_prefix;
    }    private function setPId($pid) {
        $this->pid = $pid;
    }    private function setPrefix($prefix) {
        $this->prefix = $prefix;
    }    private function setCreatorGroupId($creator_groupid) {
        $this->creator_groupid = $creator_groupid;
    }    private function setCreatorUserId($creator_userid) {
        $this->creator_userid = $creator_userid;
    }    private function setOwnerGroupId($owner_groupid) {
        $this->owner_groupid = $owner_groupid;
    }    private function setCreated($created) {
        $this->created = $created;
    }    private function setTemplate($template) {
        $this->template = $template;
    }    private function setCodeCounter($code_counter) {
        $this->code_counter = $code_counter;
    }    private function setPrefixTitle($prefix_title) {
        $this->prefix_title = $prefix_title;
    }    private function setPrefixDesc($prefix_desc) {
        $this->prefix_desc = $prefix_desc;
    }    private function setPrivacyFlag($privacy_flag) {
        $this->privacy_flag = $privacy_flag;
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
    }    private function setWhoUpdated($who_updated) {
        $this->who_updated = $who_updated;
    }    private function setUpdated($updated) {
        $this->updated = $updated;
    }    private function setGprefix($gprefix) {
        $this->gprefix = $gprefix;
    }    private function setOldGprefix($old_gprefix) {
        $this->old_gprefix = $old_gprefix;
    }    private function setClientPrefix($client_prefix) {
        $this->client_prefix = $client_prefix;
    }    private function setActive($active) {
        $this->active = $active;
    }    private function setBId($bid) {
        $this->bid = $bid;
    }    private function setPurchasePrice($purchase_price) {
        $this->purchase_price = $purchase_price;
    }    private function setExcludePrefix($exclude_prefix) {
        $this->exclude_prefix = $exclude_prefix;
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

class adid_prefixTable extends Baseobject{
    public static function get($id, $data=null) {
		return new adid_prefix($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM adid_prefix");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM adid_prefix  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':pid', 'pid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':prefix', 'prefix', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':creator_groupid', 'creator_groupid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':creator_userid', 'creator_userid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':owner_groupid', 'owner_groupid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':template', 'template', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':code_counter', 'code_counter', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':prefix_title', 'prefix_title', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':prefix_desc', 'prefix_desc', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':privacy_flag', 'privacy_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':brand', 'brand', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':brand_id', 'brand_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product', 'product', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':product_id', 'product_id', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':who_updated', 'who_updated', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':updated', 'updated', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':gprefix', 'gprefix', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':old_gprefix', 'old_gprefix', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':client_prefix', 'client_prefix', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':active', 'active', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':purchase_price', 'purchase_price', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':exclude_prefix', 'exclude_prefix', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO adid_prefix ( pid,prefix,creator_groupid,creator_userid,owner_groupid,created,template,code_counter,prefix_title,prefix_desc,privacy_flag,parent,parent_id,advertiser,advertiser_id,brand,brand_id,product,product_id,who_updated,updated,gprefix,old_gprefix,client_prefix,active,bid,purchase_price,exclude_prefix) VALUES(:pid,:prefix,:creator_groupid,:creator_userid,:owner_groupid,:created,:template,:code_counter,:prefix_title,:prefix_desc,:privacy_flag,:parent,:parent_id,:advertiser,:advertiser_id,:brand,:brand_id,:product,:product_id,:who_updated,:updated,:gprefix,:old_gprefix,:client_prefix,:active,:bid,:purchase_price,:exclude_prefix');


		
	
	$stmt->bindValue(':pid', 'pid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix', 'prefix', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_groupid', 'creator_groupid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_userid', 'creator_userid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':owner_groupid', 'owner_groupid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':template', 'template', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_counter', 'code_counter', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix_title', 'prefix_title', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix_desc', 'prefix_desc', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':privacy_flag', 'privacy_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', 'parent', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', 'parent_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', 'advertiser_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand', 'brand', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand_id', 'brand_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product', 'product', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_id', 'product_id', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':who_updated', 'who_updated', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':updated', 'updated', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':gprefix', 'gprefix', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':old_gprefix', 'old_gprefix', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':client_prefix', 'client_prefix', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':active', 'active', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', 'bid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':purchase_price', 'purchase_price', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':exclude_prefix', 'exclude_prefix', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE adid_prefix SET pid=:pid,prefix=:prefix,creator_groupid=:creator_groupid,creator_userid=:creator_userid,owner_groupid=:owner_groupid,created=:created,template=:template,code_counter=:code_counter,prefix_title=:prefix_title,prefix_desc=:prefix_desc,privacy_flag=:privacy_flag,parent=:parent,parent_id=:parent_id,advertiser=:advertiser,advertiser_id=:advertiser_id,brand=:brand,brand_id=:brand_id,product=:product,product_id=:product_id,who_updated=:who_updated,updated=:updated,gprefix=:gprefix,old_gprefix=:old_gprefix,client_prefix=:client_prefix,active=:active,bid=:bid,purchase_price=:purchase_price,exclude_prefix=:exclude_prefix');


		
	
	$stmt->bindValue(':pid', $changes['pid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix', $changes['prefix'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_groupid', $changes['creator_groupid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':creator_userid', $changes['creator_userid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':owner_groupid', $changes['owner_groupid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', $changes['created'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':template', $changes['template'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':code_counter', $changes['code_counter'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix_title', $changes['prefix_title'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':prefix_desc', $changes['prefix_desc'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':privacy_flag', $changes['privacy_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent', $changes['parent'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_id', $changes['parent_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', $changes['advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_id', $changes['advertiser_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand', $changes['brand'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':brand_id', $changes['brand_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product', $changes['product'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':product_id', $changes['product_id'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':who_updated', $changes['who_updated'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':updated', $changes['updated'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':gprefix', $changes['gprefix'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':old_gprefix', $changes['old_gprefix'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':client_prefix', $changes['client_prefix'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':active', $changes['active'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':bid', $changes['bid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':purchase_price', $changes['purchase_price'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':exclude_prefix', $changes['exclude_prefix'], PDO::PARAM_STR);
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
$objs = adid_prefixTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=adid_prefixTable::getCount();
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


































