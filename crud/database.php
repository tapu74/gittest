<?php 
Class Database {
	
	private static $HostName="127.0.0.1";
	private static $dbName="test";
	private static $UserName="tufazzul";
	private static $PassWord="tufazzul";
	private static $PortNo=3306;
	
	private static $const=null;
	
	public function __construct()
	{
		die("INIT function is not allowed!!!");
	}
	
	public static function connect()
	{
		//one connection through whole application//
		if(null==self::$const)
		{
			self::$const = new mysqli(self::$HostName,self::$UserName,self::$PassWord,self::$dbName);
			if ($mysqli->connect_errno) {
			    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			//echo $mysqli->host_info . "\n";
			
			self::$const = new mysqli(self::$HostName,self::$UserName,self::$PassWord,self::$dbName,self::$PortNo);
			if ($mysqli->connect_errno) {
			    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			}
			
			//echo $mysqli->host_info . "\n";
		}
		return self::$const;
	}
	
	public static function disconnect()
	{
		self::$const=null;
	} 
	 
}
?>