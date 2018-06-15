<?php 
$r=  array(1,2,3,4,5,6,7,8 );
$server='localhost';
$username='root';
$password='';
$database='csv';
$con=new mysqli($server,$username,$password,$database);
if ($con->connect_error) {
	die("connection failed" . $con->connect_error);
}
else
{
	echo "connection successfull";
}
$sql="select * from file3";
$result=$con->query($sql);
if($result->num_rows > 0)
{
   
	while($row=$result->fetch_assoc())
	{
        $sql1="insert into file4 values('$row[regq]','','','','','','','','','0.00')";
        if($con->query($sql1)==true)
        {
        	echo "record successfully inserted";
        }
        else{
        	echo "failed to insert";
        }
		$string1=$row['mark'];
        
        //break;
        echo "\n";
        $strbeg=0;
        $strpos=0;
        $i=1;
        while($i<=8)
        {   
            $strpos=strpos($string1,',',$strpos);
            $diff=$strpos-$strbeg;
        	$str1=substr($string1, $strbeg,$diff);
        	$str2=str_replace(substr($str1, 0,6), '', $str1);
            $str3=str_replace(')', '', $str2);
            $strbeg=$strpos+2;
            $strpos++;
            
            echo $str3;
            $r[$i]=$str3;
            $i++;
            
            
        }
        $j=1;
        while($j<=$i)
        {

        	if($j==1)
        	{
        		$sql2="update file4 set HS200='$r[1]' where rollno='$row[regq]'";
        		$con->query($sql2);
        	}
        	elseif($j==2)
        	{
        		$sql2="update file4 set MA202='$r[2]' where rollno='$row[regq]' ";
        		$con->query($sql2);
        	}
        	elseif ($j==3) {
        	 $sql2="update file4 set CS202='$r[3]' where rollno='$row[regq]'";
        		$con->query($sql2);	

        	 } 
        	 	elseif ($j==4) {
        	 $sql2="update file4 set CS204='$r[4]' where rollno='$row[regq]'";
        		$con->query($sql2);	

        	 } 
        	 elseif ($j==5) {
        	 $sql2="update file4 set CS206='$r[5]' where rollno='$row[regq]'";
        		$con->query($sql2);	

        	 } 
        	 elseif ($j==6) {
        	 $sql2="update file4 set CS232='$r[6]' where rollno='$row[regq]'";
        		$con->query($sql2);	

        	 } 
        	 elseif ($j==7) {
        	 $sql2="update file4 set CS208='$r[7]' where rollno='$row[regq]'";
        		$con->query($sql2);	

        	 } 
        	 else
        	 {
        	 	$sql2="update file4 set CS234='$r[7]' where rollno='$row[regq]'";
        		$con->query($sql2);	
        	 }
        	 $j++;
        }
	}
}


					




 ?>