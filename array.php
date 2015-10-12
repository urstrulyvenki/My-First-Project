<?php
    $result = pg_query($db_connection, "SELECT id,project_start_date_old,project_end_date_old,project_due_date_old,project_start_date,project_end_date,project_due_date FROM projects ORDER BY id ASC");
	$res=pg_fetch_all($result);
	
	$i=0;
 	foreach($res as $getres)
	{
	 
	if($getres['project_start_date_old']!="")
	{ 
 	$oldstartdate= explode('-',$getres['project_start_date_old']);
	echo $newstartdate=$oldstartdate[2].'-'.$oldstartdate[0].'-'.$oldstartdate[1];
  	echo '<br>';
	}
	
	if($getres['project_end_date_old']!="")
	{ 
	$oldenddate= explode('-',$getres['project_end_date_old']);
	echo $newenddate=$oldenddate[2].'-'.$oldenddate[0].'-'.$oldenddate[1];
	echo '<br>';
	}
	
	if($getres['project_due_date_old']!="")
	{
	$oldduedate= explode('-',$getres['project_due_date_old']);
	echo $newduedate=$oldduedate[2].'-'.$oldduedate[0].'-'.$oldduedate[1];
	}
	 
 	 echo '<br>';
	 echo '<br>';
	 
	 
	 $query_trans_insert = "UPDATE projects SET project_start_date = '$newstartdate', project_end_date = '$newenddate', project_due_date = '$newduedate'  where id =".$getres['id'];   
       $user_id = pg_query($query_trans_insert) or die('quer:'.$query_trans_insert.pg_last_error());
 	 
 	$i++;
	}
	
 	
?>
