
<?php
$gambar=getImage();
if (!isset($gambar) || $gambar=="" || $gambar==NULL){
$var_avatar="user-avatar.png";
} else {
$var_avatar="$gambar";

}

?>

<div class="hor-menu hor-menu-light hidden-sm hidden-xs">
<ul class="nav navbar-nav">
<li class="classic-menu-dropdown"><a href="#"><b><?php echo getNamaChannel();?> </b><span class="selected"> </span></a>
</li>

</ul>
</div>




<div class="top-menu">
			<ul class="nav navbar-nav pull-right">	
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!--
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="fa fa-share-alt"> </i>
					
					</a>
					
				</li>
				-->

				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="images/profile/<?php echo $var_avatar; ?>"/>
					<span class="username username-hide-on-mobile">
					<b> <?php echo getGroupUserName(); ?> </b> ( <i><?php echo $_SESSION['SESS_USERNAME'];?> </i>) </span>
					<i class="fa fa-angle-down"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="#">
							<i class="icon-user"></i> My Profile </a>
						</li>
				
						<li>
							<a href="logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>


				


				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-calendar" > </i>
					<span id='ct' ></span>
					<?php //echo " ".date('d-m-Y H:i')." WIB";?>
					</a>
					
				</li>
				<!-- END USER LOGIN DROPDOWN -->
			
			</ul>
		</div>