<?php


/**
* 
*/
class csv extends mysqli
{
	private $state_csv=false;
	public function __construct()
	{
		parent::__construct("localhost","root","","csv");
		if($this->connect_error)
		{
			echo "Failed to connect to database : ".$this->connect_error;
		}
	}

 
	public function import($file)
	{
     	$file = fopen($file,'r');
     	while ($row = fgetcsv($file))
     	{

     		//print "<pre>";
     		//print_r($row);
     		//print"</pre>";
     		$value="'".implode("','",$row)."'";
     		//echo $value;

     		$q= "INSERT INTO file5(regq,name) VALUES(".$value.")";

     		if ($this->query($q)){
     			$this->state_csv = true;
     		}

     		else{
     			$this->state_csv = false;
     			echo $this->error;
     		}






     	}


	}

}
?>




