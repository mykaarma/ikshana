<?php
    include('../connection.php');
    if(password_verify("graph", $_POST['token']))
    {
    	$finalarray=array();
    	$time=$_POST['time']+1;
    	if($_POST['code'] == "500")
    	{
    		 $check=$db->prepare('SELECT count(*) as counts,backend FROM errors500 WHERE DATE(timestamp) >= NOW() - INTERVAL ? DAY GROUP BY backend ORDER BY count(*) DESC');
            $data=array($time);
            $check->execute($data);
            $count=0;

            if($check->rowcount()>0)
            {
            	
				while($datarow = $check->fetch())

				{
					$arr=array();
					$arr['label']=strtok($datarow['backend'], '/');
					$arr['y']=(int)$datarow['counts'];
					array_push($finalarray, $arr);
					
				}

            }
            echo json_encode($finalarray);
    	}
       
    }

?>