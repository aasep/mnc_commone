<?php

 if (isset($_GET['module'])){

 	$module=$_GET['module'];

	if (!isset($_SESSION['SESS_GROUP_USER']) )
		{
		session_destroy();
		header("location: temp_session_login.php");
		die();
		
	} else {
			   //cek di tabel menu

			       $sql="select id_menu from master_menu where src='$module'";  

				   $res= pg_query($connection,$sql);
				   $found_menu=pg_num_rows($res);
				   

				   if ($found_menu >=1)
				   		{
				   			$row = pg_fetch_array($res);
				   			$id_menu=$row['id_menu'];
			       			$query=" SELECT * FROM group_menu where id_group_type='$_SESSION[SESS_GROUP_USER]' AND id_menu='$id_menu' ";
				   			$result = pg_query($connection,$query);
				   			$found=pg_num_rows($result);
			     
			      			  
				       		if ($found == 0)
				            	{
						       header("location: temp_session_group");
						       die();
						
							}
				
				
			        } 
					
			  } //end isset module
				
		} // end else
				
?>