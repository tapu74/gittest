<?php
Class Example
{
	public $item="\nhello world";
	public $name;

	function  Sample()
	{
		$this->Test();
	}
	function Test()
	{
		echo "test";
		echo $this->item;
		$regular=500;
		//echo $regular;
	}
	function Dog()
	{
		echo $regular;
	}
}

$class=new Example();
$class->Sample();

?>