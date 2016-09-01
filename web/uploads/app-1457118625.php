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








class users extends Baseobject 
{
public $uid;
	public $name;
	public $pass;
	public $mail;
	public $theme;
	public $signature;
	public $signature_format;
	public $created;
	public $access;
	public $login;
	public $status;
	public $timezone;
	public $language;
	public $picture;
	public $init;
	public $data;
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

    public function getUId() {
        return $this->uid;
    }    public function getName() {
        return $this->name;
    }    public function getPass() {
        return $this->pass;
    }    public function getMail() {
        return $this->mail;
    }    public function getTheme() {
        return $this->theme;
    }    public function getSignature() {
        return $this->signature;
    }    public function getSignatureFormat() {
        return $this->signature_format;
    }    public function getCreated() {
        return $this->created;
    }    public function getAccess() {
        return $this->access;
    }    public function getLogin() {
        return $this->login;
    }    public function getStatus() {
        return $this->status;
    }    public function getTimezone() {
        return $this->timezone;
    }    public function getLanguage() {
        return $this->language;
    }    public function getPicture() {
        return $this->picture;
    }    public function getInit() {
        return $this->init;
    }    public function getData() {
        return $this->data;
    }    private function setUId($uid) {
        $this->uid = $uid;
    }    private function setName($name) {
        $this->name = $name;
    }    private function setPass($pass) {
        $this->pass = $pass;
    }    private function setMail($mail) {
        $this->mail = $mail;
    }    private function setTheme($theme) {
        $this->theme = $theme;
    }    private function setSignature($signature) {
        $this->signature = $signature;
    }    private function setSignatureFormat($signature_format) {
        $this->signature_format = $signature_format;
    }    private function setCreated($created) {
        $this->created = $created;
    }    private function setAccess($access) {
        $this->access = $access;
    }    private function setLogin($login) {
        $this->login = $login;
    }    private function setStatus($status) {
        $this->status = $status;
    }    private function setTimezone($timezone) {
        $this->timezone = $timezone;
    }    private function setLanguage($language) {
        $this->language = $language;
    }    private function setPicture($picture) {
        $this->picture = $picture;
    }    private function setInit($init) {
        $this->init = $init;
    }    private function setData($data) {
        $this->data = $data;
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

class usersTable extends Baseobject{
    public static function get($id, $data=null) {
		return new users($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM users");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM users  LIMIT $offset,$limit;");
		
	
	//$stmt->bindValue(':uid', 'uid', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':name', 'name', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':pass', 'pass', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':mail', 'mail', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':theme', 'theme', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':signature', 'signature', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':signature_format', 'signature_format', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':access', 'access', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':login', 'login', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':status', 'status', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':timezone', 'timezone', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':language', 'language', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':picture', 'picture', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':init', 'init', PDO::PARAM_STR);
		
	
	//$stmt->bindValue(':data', 'data', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('INSERT INTO users ( uid,name,pass,mail,theme,signature,signature_format,created,access,login,status,timezone,language,picture,init,data) VALUES(:uid,:name,:pass,:mail,:theme,:signature,:signature_format,:created,:access,:login,:status,:timezone,:language,:picture,:init,:data');


		
	
	$stmt->bindValue(':uid', 'uid', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':name', 'name', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pass', 'pass', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':mail', 'mail', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':theme', 'theme', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':signature', 'signature', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':signature_format', 'signature_format', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', 'created', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':access', 'access', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':login', 'login', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':status', 'status', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':timezone', 'timezone', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':language', 'language', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':picture', 'picture', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':init', 'init', PDO::PARAM_STR);
		
	
	$stmt->bindValue(':data', 'data', PDO::PARAM_STR);
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

	$stmt=$pdo->prepare('UPDATE users SET uid=:uid,name=:name,pass=:pass,mail=:mail,theme=:theme,signature=:signature,signature_format=:signature_format,created=:created,access=:access,login=:login,status=:status,timezone=:timezone,language=:language,picture=:picture,init=:init,data=:data');


		
	
	$stmt->bindValue(':uid', $changes['uid'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':name', $changes['name'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':pass', $changes['pass'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':mail', $changes['mail'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':theme', $changes['theme'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':signature', $changes['signature'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':signature_format', $changes['signature_format'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':created', $changes['created'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':access', $changes['access'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':login', $changes['login'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':status', $changes['status'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':timezone', $changes['timezone'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':language', $changes['language'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':picture', $changes['picture'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':init', $changes['init'], PDO::PARAM_STR);
		
	
	$stmt->bindValue(':data', $changes['data'], PDO::PARAM_STR);
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
$objs = usersTable::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='<table border="1"><thead><tr><th>'.$thead.'</tr></thead><tbody>';
foreach ($objs as $obj) {
    $html.= '<tr><td colspan="'.count(get_object_vars($obj)).'">'. $obj->getId().'</td></tr>';
    if($i>1000) break;
}




$html.= '</tbody></table>';


$ct=usersTable::getCount();
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


































