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








class adid_nielsen_exc extends Baseobject 
{
public $product;
	public $pcc_code;
	public $parent_company;
	public $parent_code;
	public $subsidiary;
	public $advertiser;
	public $parent_type;
	public $source;
	public $spend_source;
	public $diff_flag;
	public $has_codes;
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

    public function getProduct() {
        return $this->product;
    }    public function getPccCode() {
        return $this->pcc_code;
    }    public function getParentCompany() {
        return $this->parent_company;
    }    public function getParentCode() {
        return $this->parent_code;
    }    public function getSubsIdiary() {
        return $this->subsidiary;
    }    public function getAdvertiser() {
        return $this->advertiser;
    }    public function getParentType() {
        return $this->parent_type;
    }    public function getSource() {
        return $this->source;
    }    public function getSpendSource() {
        return $this->spend_source;
    }    public function getDiffFlag() {
        return $this->diff_flag;
    }    public function getHasCodes() {
        return $this->has_codes;
    }    private function setProduct($product) {
        $this->product = $product;
    }    private function setPccCode($pcc_code) {
        $this->pcc_code = $pcc_code;
    }    private function setParentCompany($parent_company) {
        $this->parent_company = $parent_company;
    }    private function setParentCode($parent_code) {
        $this->parent_code = $parent_code;
    }    private function setSubsIdiary($subsidiary) {
        $this->subsidiary = $subsidiary;
    }    private function setAdvertiser($advertiser) {
        $this->advertiser = $advertiser;
    }    private function setParentType($parent_type) {
        $this->parent_type = $parent_type;
    }    private function setSource($source) {
        $this->source = $source;
    }    private function setSpendSource($spend_source) {
        $this->spend_source = $spend_source;
    }    private function setDiffFlag($diff_flag) {
        $this->diff_flag = $diff_flag;
    }    private function setHasCodes($has_codes) {
        $this->has_codes = $has_codes;
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

class adid_nielsen_excTable extends Baseobject{
    public static function get($id, $data=null) {
		return new adid_nielsen_exc($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM adid_nielsen_exc");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM adid_nielsen_exc  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':product', 'product', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':pcc_code', 'pcc_code', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_company', 'parent_company', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_code', 'parent_code', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':subsidiary', 'subsidiary', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':source', 'source', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':spend_source', 'spend_source', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':diff_flag', 'diff_flag', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':has_codes', 'has_codes', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO adid_nielsen_exc ( product,pcc_code,parent_company,parent_code,subsidiary,advertiser,parent_type,source,spend_source,diff_flag,has_codes) VALUES(:product,:pcc_code,:parent_company,:parent_code,:subsidiary,:advertiser,:parent_type,:source,:spend_source,:diff_flag,:has_codes');


		
	
	$stmt->bindValue(':product', 'product', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pcc_code', 'pcc_code', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_company', 'parent_company', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_code', 'parent_code', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':subsidiary', 'subsidiary', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', 'advertiser', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', 'parent_type', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':source', 'source', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spend_source', 'spend_source', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':diff_flag', 'diff_flag', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':has_codes', 'has_codes', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE adid_nielsen_exc SET product=:product,pcc_code=:pcc_code,parent_company=:parent_company,parent_code=:parent_code,subsidiary=:subsidiary,advertiser=:advertiser,parent_type=:parent_type,source=:source,spend_source=:spend_source,diff_flag=:diff_flag,has_codes=:has_codes');


		
	
	$stmt->bindValue(':product', $changes['product'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pcc_code', $changes['pcc_code'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_company', $changes['parent_company'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_code', $changes['parent_code'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':subsidiary', $changes['subsidiary'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser', $changes['advertiser'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':parent_type', $changes['parent_type'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':source', $changes['source'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spend_source', $changes['spend_source'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':diff_flag', $changes['diff_flag'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':has_codes', $changes['has_codes'], PDO::PARAM_STR);
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
$objs = adid_nielsen_excTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=adid_nielsen_excTable::getCount();
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


































