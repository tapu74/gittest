<?php
Class Clac {

	public $input;
	public $input2;
	public $output;

	function setInput($int1)
	{
		$this->input=(int) $int1;
	}
	function setInput2($int2)
	{
		$this->input2=(int) $int2;
	}
	function calculate()
	{
		$this->output=$this->input*$this->input2;
	}

	function getResult()
	{
		
		return $this->output;
	}


}

$calc=new Clac(); ///this is instance///
$calc->setInput(5);
$calc->setInput2(22);
$calc->calculate();
echo $calc->getResult();

echo "<br />";
$calc2=new Clac();
$calc2->setInput(10);
$calc2->setInput2(50);
$calc2->calculate();
echo $calc2->getResult();


?>