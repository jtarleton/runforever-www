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
		$dsn = sprintf('mysql://%s:%s@%s/%s','', '', 'localhost', '');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class Code extends Baseobject 
{
public $nielsen_advertiser_code;
	public $nielsen_advertiser_entity;
	public $sum_of_total_spend;
	public $spend_category;
	public $primary_pcc;
	public $uses_adid;
	public $start_year;
	public $advertiser_loyalty;
	public $monthly_loyalty;
	public $is_ana_member;
	public $is_ana_board_member;
	public $in_nielsen;
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
    }    public function getSumOfTotalSpend() {
        return $this->sum_of_total_spend;
    }    public function getSpendCategory() {
        return $this->spend_category;
    }    public function getPrimaryPcc() {
        return $this->primary_pcc;
    }    public function getUsesAdId() {
        return $this->uses_adid;
    }    public function getStartYear() {
        return $this->start_year;
    }    public function getAdvertiserLoyalty() {
        return $this->advertiser_loyalty;
    }    public function getMonthlyLoyalty() {
        return $this->monthly_loyalty;
    }    public function getIsAnaMember() {
        return $this->is_ana_member;
    }    public function getIsAnaBoardMember() {
        return $this->is_ana_board_member;
    }    public function getInNielsen() {
        return $this->in_nielsen;
    }    private function setNielsenAdvertiserCode($nielsen_advertiser_code) {
        $this->nielsen_advertiser_code = $nielsen_advertiser_code;
    }    private function setNielsenAdvertiserEntity($nielsen_advertiser_entity) {
        $this->nielsen_advertiser_entity = $nielsen_advertiser_entity;
    }    private function setSumOfTotalSpend($sum_of_total_spend) {
        $this->sum_of_total_spend = $sum_of_total_spend;
    }    private function setSpendCategory($spend_category) {
        $this->spend_category = $spend_category;
    }    private function setPrimaryPcc($primary_pcc) {
        $this->primary_pcc = $primary_pcc;
    }    private function setUsesAdId($uses_adid) {
        $this->uses_adid = $uses_adid;
    }    private function setStartYear($start_year) {
        $this->start_year = $start_year;
    }    private function setAdvertiserLoyalty($advertiser_loyalty) {
        $this->advertiser_loyalty = $advertiser_loyalty;
    }    private function setMonthlyLoyalty($monthly_loyalty) {
        $this->monthly_loyalty = $monthly_loyalty;
    }    private function setIsAnaMember($is_ana_member) {
        $this->is_ana_member = $is_ana_member;
    }    private function setIsAnaBoardMember($is_ana_board_member) {
        $this->is_ana_board_member = $is_ana_board_member;
    }    private function setInNielsen($in_nielsen) {
        $this->in_nielsen = $in_nielsen;
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

class CodeTable extends Baseobject{
    public static function get($id, $data=null) {
		return new Code($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM Code");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM Code  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':sum_of_total_spend', 'sum_of_total_spend', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':spend_category', 'spend_category', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':primary_pcc', 'primary_pcc', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':uses_adid', 'uses_adid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':start_year', 'start_year', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':advertiser_loyalty', 'advertiser_loyalty', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':monthly_loyalty', 'monthly_loyalty', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':is_ana_member', 'is_ana_member', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':is_ana_board_member', 'is_ana_board_member', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':in_nielsen', 'in_nielsen', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO Code ( nielsen_advertiser_code,nielsen_advertiser_entity,sum_of_total_spend,spend_category,primary_pcc,uses_adid,start_year,advertiser_loyalty,monthly_loyalty,is_ana_member,is_ana_board_member,in_nielsen) VALUES(:nielsen_advertiser_code,:nielsen_advertiser_entity,:sum_of_total_spend,:spend_category,:primary_pcc,:uses_adid,:start_year,:advertiser_loyalty,:monthly_loyalty,:is_ana_member,:is_ana_board_member,:in_nielsen');


		
	
	$stmt->bindValue(':nielsen_advertiser_code', 'nielsen_advertiser_code', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', 'nielsen_advertiser_entity', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sum_of_total_spend', 'sum_of_total_spend', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spend_category', 'spend_category', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':primary_pcc', 'primary_pcc', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':uses_adid', 'uses_adid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':start_year', 'start_year', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_loyalty', 'advertiser_loyalty', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':monthly_loyalty', 'monthly_loyalty', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':is_ana_member', 'is_ana_member', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':is_ana_board_member', 'is_ana_board_member', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':in_nielsen', 'in_nielsen', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE Code SET nielsen_advertiser_code=:nielsen_advertiser_code,nielsen_advertiser_entity=:nielsen_advertiser_entity,sum_of_total_spend=:sum_of_total_spend,spend_category=:spend_category,primary_pcc=:primary_pcc,uses_adid=:uses_adid,start_year=:start_year,advertiser_loyalty=:advertiser_loyalty,monthly_loyalty=:monthly_loyalty,is_ana_member=:is_ana_member,is_ana_board_member=:is_ana_board_member,in_nielsen=:in_nielsen');


		
	
	$stmt->bindValue(':nielsen_advertiser_code', $changes['nielsen_advertiser_code'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':nielsen_advertiser_entity', $changes['nielsen_advertiser_entity'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':sum_of_total_spend', $changes['sum_of_total_spend'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':spend_category', $changes['spend_category'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':primary_pcc', $changes['primary_pcc'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':uses_adid', $changes['uses_adid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':start_year', $changes['start_year'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':advertiser_loyalty', $changes['advertiser_loyalty'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':monthly_loyalty', $changes['monthly_loyalty'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':is_ana_member', $changes['is_ana_member'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':is_ana_board_member', $changes['is_ana_board_member'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':in_nielsen', $changes['in_nielsen'], PDO::PARAM_STR);
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
$objs = CodeTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=CodeTable::getCount();
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


































