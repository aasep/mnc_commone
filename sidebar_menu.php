
<li >
					<a href="index" >
					
					<span class="title">

					</span>
					</a>
				</li>
				<li class="start">
					<a href="index">
					<i class="fa fa-home"></i>
					<span class="title bold">
					Home </span>
					</a>
				</li>


<?php
// active parent
if (isset($_GET['pm'])){
$active_parent=$_GET['pm'];
} else {
$active_parent="";	
}
// active sub menu
if (isset($_GET['module'])){
$active_submenu=$_GET['module'];
} else {
$active_submenu="";	
}

$parent_count=0;
$query_parent_menu="select distinct (a.parent)  FROM master_menu a, group_menu b WHERE a.id_menu=b.id_menu AND b.id_group_type=$_SESSION[SESS_GROUP_USER]";
$result_parent_menu = pg_query($connection,$query_parent_menu);
    while ($row = pg_fetch_array($result_parent_menu))
	   { 
	   //===masang class parent menu 
	   $class_parent="";
		   if ($parent_count==0)
		   {$class='icon-docs';}
		   if ($parent_count==1)
		   {$class='fa fa-th-list';}
		   if ($parent_count==2)
		   {$class='icon-wallet';}
		   if ($parent_count==3)
		   {$class='icon-briefcase';}
		   if ($parent_count==4)
		   {$class='fa fa-gear';}
		   if ($parent_count==5)
		   {$class='fa fa-paper-plane';}
		   if ($parent_count==6)
		   {$class='fa fa-rocket';}
			if ($parent_count==7)
		   {$class='fa fa-tags';}
			if ($parent_count==8)
		   {$class='fa fa-send';}
			if ($parent_count==9)
		   {$class='fa fa-folder-open';}
		   if ($parent_count==10)
		   {$class='fa fa-book';}
		   if ($parent_count==11)
		   {$class='fa fa-leaf';}
		   if ($parent_count==12)
		   {$class='fa fa-recycle';}
		   
		   $parent_menu=$row['parent'];
		   if ($active_parent==sha1($parent_menu)) {$class_parent="class='start active open'";} 
		   
		   $query_nama_menu="SELECT name FROM master_menu WHERE id_menu='$parent_menu'";
		   $result_nama_menu = pg_query($connection,$query_nama_menu);
		   $r_menu = pg_fetch_array($result_nama_menu);
		 //display parent menu 
		 
		  	   
		 echo "<li $class_parent ><a href='#'><i class='$class'></i><span class='title bold'> $r_menu[name] </span><span class='arrow '></span></a>";
		   
		// SUBMENU=========

		   $q_submenu="select distinct (a.name),a.id_menu  FROM master_menu a, group_menu b WHERE a.id_menu=b.id_menu AND b.id_group_type=$_SESSION[SESS_GROUP_USER]  AND a.parent='$parent_menu' order by a.name asc";
		   $result_submenu = pg_query($connection,$q_submenu);
		   $found_submennu = pg_num_rows($result_submenu);
		   if ($found_submennu >= 1)
		   {
		   echo "<ul class='sub-menu'>";
 while ($r_submenu = pg_fetch_array($result_submenu))
		    {
			$class_submenu="";
         if ($active_submenu==sha1($r_submenu['id_menu'])) {$class_submenu="class='active'";} 
		echo"<li $class_submenu ><a href='home?module=".sha1($r_submenu['id_menu'])."&pm=".sha1($parent_menu)."'>$r_submenu[name]</a></li>";

			  //$submenu++;
		    } //end while loop submenu
			echo "</ul></li>"; 
		   } // end submenu found
		   $parent_count++;
		   }
		      
		   
/*		   
?>

				<li >  <!--  class="start active open"   if active    -->
					<a href="javascript:;">
					<i class="fa fa-cogs"></i>
					<span class="title">
					Page Layouts </span>
					<span class="arrow open">
					</span>
					<!-- <span class="selected"></span>   bentuk panah -->
					</a>
					<ul class="sub-menu">
						<li class="active">  <!--  class="active"   if active    -->
							<a href="<?php echo "index.php?module=".sha1('0005');?>">
							Modul 1 </a>
						</li>
						<li>
							<a href="<?php echo "index.php?module=".sha1('0006');?>">
							Modul 2 </a>
						</li>
						
						
					</ul>
				</li>
			
            
<?php

*/
?>
				
				
				<li class="last">
					<a href="logout">
					<i class="fa fa-lock "></i>
					<span class="title bold">
					Logout</span>
					</a>
				</li>
                
                
            