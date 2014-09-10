<?php
Class Log
{

	private $_FileName;
	private $_Data;

	/**
* @desc write a file
* @param str 
* @param sdsd
	*/
	public function Write($strFileName,$strData)
	{

		//set class vars
		$this->_FileName=$strFileName;
		$this->_Data=$strData;

		//check file permission
		$this->_CheckPermission();
		$this->_CheckData();

		//write file
		
		$handle=fopen($strFileName,'a+');
		fwrite($handle, "\n" . $strData);
		fclose($handle);
	}
	/**
* @desc read a file
* @param strFileName fiel name  
* @param return the text file
	*/

	public function Read($strFileName)
	{
		$this->_FileName=$strFileName;
		$this->_CheckExists();

		$handle=fopen($strFileName,'r');
		return file_get_contents($strFileName);
	}

	private function _CheckPermission()
	{
		if(!is_writable($this->_FileName))
			die ('change permission '.$this->_FileName);
	}
	private function _CheckData()
	{
		if(strlen($this->_Data) <1)
			die('You have to more then 1 charater data');
	}
	private function _CheckExists()
	{
		if(!file_exists($this->_FileName))
			die('this file does not exists');
	}
}
?>