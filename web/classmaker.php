<?php 
function klean($txt) {
	return str_replace("\n",'', $txt);
}

$fields = 'foo,bar,baz';
if(!isset($_POST['csv_fields'])): ?>

<h2>PHP Data Objects Helper Monkey for MySQL</h2>
<img src="http://www.runforever.co/images/th.jpg"></img>


<b>Quickly obtain a comma-delimited list of fields by running this on your MySQL table:</b><p><pre>SELECT `COLUMN_NAME` 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 

WHERE `TABLE_SCHEMA`='db' 
    AND `TABLE_NAME`='tblname';</pre></p>
<br>
<fieldset><legend>Details of your data type</legend>
<form action="classmaker.php" method="POST">
<p>
DB User Name<input type="text" name="dbuser" value=""></p>
<p>DB Pass <input type="password" name="dbpass" value=""></p>
<p>DB Name <input type="text" name="dbname" value=""></p>
<p>Table Name * <input type="text" name="classname" value="Code"></p>
<p>Parent Class Name<input type="text" name="parent" value="BaseObject"></p>
<p>Fields *<textarea name="csv_fields"></p>
<?php echo $fields; ?>
</textarea>

<input type="submit"></input>
</form>

<?php else: 

foreach ($_POST as $key => &$value) {
	$_POST[$key] = klean($value);
}

foreach(explode(',', @$_POST['csv_fields']) as $field) { $l=strlen($field);
$lengths[$l] = (int)$l;
}
$maxlength = max($lengths) + 18;
?>
<pre cols="1800" rows="100" style="background-color:#000; color:#FFF; font-family:Courier New, serif; font-size:11px; border:0; padding:5px;">
<?php ob_start(); ?>&lt;?php 

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
		$dsn = sprintf('mysql://%s:%s@%s/%s','<?php echo $_POST['dbuser']; ?>', '<?php echo $_POST['dbpass']; ?>', 'localhost', '<?php echo $_POST['dbname']; ?>');

		$this->pdo = parent::PDOCreate($dsn , false);
	}
	public static function Connect() {
		$obj = new self;
		return $obj->pdo;
	}
}








class <?php echo @$_POST['classname']; $par=null; if(isset($_POST['parent'])){ $par = ucfirst(strtolower($_POST['parent'])); echo " extends $par"; } ?> 
{
<?php $field=null; foreach(explode(',',@$_POST['csv_fields']) as $field) {
	if(isset($field)){ ?>public $<?php echo $field; ?>;
	<?php
} } ?>
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
<?php //foreach(explode(',', @$_POST['csv_fields']) as $field) {
	?>foreach($data as $prop=>$value) {
			$this->$prop = $value;
		} 
	<?php //if(isset($field)) echo str_pad("        \$this->{$field} ", $maxlength); echo "= \$data['$field'];\n"; } ?>       
     }

<?php foreach(explode(',', @$_POST['csv_fields']) as $field) {
	if(isset($field)) $getter = 'get'.str_replace('id','Id',str_replace(' ','',ucwords(str_replace('_', ' ', $field)))); 
	echo "    public function {$getter}() {
        return \$this->$field;
    }";
} ?>
<?php foreach(explode(',', @$_POST['csv_fields']) as $field) {
	if(isset($field)) $setter = 'set'.str_replace('id','Id',str_replace(' ','',ucwords(str_replace('_', ' ', $field)))); 
	echo "    private function {$setter}(\${$field}) {
        \$this->$field = \${$field};
    }";
} ?>


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

class <?php echo @$_POST['classname']; ?>Table<?php if(isset($par)) echo " extends $par"; ?>
{
    public static function get($id, $data=null) {
		return new <?php echo @$_POST['classname']; ?>($id, $data);
    }


  public static function getCount(){
   	$pdo = parent::Connect();
   	$stmt=$pdo->prepare("SELECT count(*) as ct
		FROM <?php echo @$_POST['classname']; ?>");
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	return intval($row['ct']);
    }


    public static function getAll($offset=0,$limit=10) {


$pdo = parent::Connect();

	$stmt=$pdo->prepare("SELECT * FROM <?php echo @$_POST['classname']; ?>  LIMIT $offset,$limit;");
	<?php foreach(explode(',', @$_POST['csv_fields']) as $field) { ?>	
	
	//$stmt->bindValue(':<?php echo $field; ?>', '<?php echo $field; ?>', PDO::PARAM_STR);
	<?php } ?>
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

	$stmt=$pdo->prepare('INSERT INTO <?php echo @$_POST['classname']; ?> ( <?php 

	echo @$_POST['csv_fields']; $markers =explode(',',@$_POST['csv_fields']); 

	foreach($markers as &$marker) { $marker = ':'.$marker; }         

	?>) VALUES(<?php 

	echo implode(',',$markers); 

	?>)');


	<?php foreach(explode(',', @$_POST['csv_fields']) as $field) { ?>	
	
	$stmt->bindValue(':<?php echo $field; ?>', '<?php echo $field; ?>', PDO::PARAM_STR);
	<?php } ?>
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

	$stmt=$pdo->prepare('UPDATE <?php echo @$_POST['classname']; ?> SET <?php 
		$sqlpieces=array();
	foreach( explode(',',@$_POST['csv_fields']) as $fld) $sqlpieces[]= "$fld=:$fld"; 

	//foreach($markers as &$marker) { $marker = ':'.$marker; }         
echo implode(',', $sqlpieces)
	?>');


	<?php foreach(explode(',', @$_POST['csv_fields']) as $field) { ?>	
	
	$stmt->bindValue(':<?php echo $field; ?>', $changes['<?php echo $field; ?>'], PDO::PARAM_STR);
	<?php } ?>
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
$objs = <?php echo @$_POST['classname']; ?>Table::getAll($offset,$limit);
$current = current($objs);
$thead=$current->getTableHeading();
$html.='&lt;table border="1"&gt;&lt;thead&gt;&lt;tr&gt;&lt;th&gt;'.$thead.'&lt;/tr&gt;&lt;/thead&gt;&lt;tbody&gt;';
foreach ($objs as $obj) {
    $html.= '&lt;tr>&lt;td colspan="'.count(get_object_vars($obj)).'"&gt;'. $obj->getId().'&lt;/td&gt;&lt;/tr&gt;';
    if($i>1000) break;
}




$html.= '&lt;/tbody&gt;&lt;/table&gt;';


$ct=<?php echo @$_POST['classname']; ?>Table::getCount();
$mod = $ct%$limit;
$pages = ($mod==0) ? intval($ct/$limit) : intval($ct/$limit) + 1;
$start = $p;

$range = range($start, $pages);

foreach(array_slice($range,$p, 10) as $page)

$html.= '&lt;a href="app.php?offset='. ($page-1) .'&limit='.$limit.'"&gt;'.$page.'&lt;/a&gt; | ';



?&gt;

&lt;!DOCTYPE html&gt;
&lt;body&gt;
&lt;div&gt;
&lt;?php echo $html;
?&gt;
&lt;/div&gt;

&lt;/body&gt;

&lt;/html&gt;


































<?php $out=ob_get_clean(); 
$time=time();
file_put_contents('/var/runforever-www/web/uploads/app-'. $time . '.php', html_entity_decode($out)); 

echo $out; ?>
</pre>
<p>
<a href="./uploads/app-<?php echo $time; ?>.php">Created App</a>
</p>
<?php endif; ?>
</body>
</html>
