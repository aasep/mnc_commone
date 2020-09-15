<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title bold">
			Commone System<small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
				
					
				</ul>
				
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			

			<!-- MODAL NEWS PRODUCT-->
							<div class="modal fade" id="news-product" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Product News </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							
								<div class="form-body">
									<div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
									<div class="row" id="detail-produk">
									</div>
									
									
								</div>	
								</div>
								
							
						</div>
					</div>
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											
										</div>
									</div>
									<!-- /.modal-content -->
								
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				<!-- END MODAL NEWS PRODUCT-->

				<!-- MODAL NEWS PROMOTION-->
							<div class="modal fade" id="news-promotion" tabindex="-1" role="basic" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											
										</div>
										<div class="modal-body">
											<!-- BEGIN VALIDATION STATES-->
					<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Promotion News </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							
								<div class="form-body">
									<div class="scroller" style="height: 500px;" data-always-visible="1" data-rail-visible="0">
									<div class="row" id="detail-promosi">
									</div>
									
									
								</div>	
								</div>
								
							
						</div>
					</div>
					<!-- END VALIDATION STATES-->
										</div>
										<div class="modal-footer">
											<button type="button" class="btn default" data-dismiss="modal">Close</button>
											
										</div>
									</div>
									<!-- /.modal-content -->
								
							<!-- END FORM-->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
             
				<!-- END MODAL NEWS PROMOTION-->



			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light grey-steel bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-red-sunglo"></i>
											<span class="caption-subject font-red-sunglo bold uppercase"> Welcome To Commone System </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>


<div class="portlet-body">
							<div class="tabbable-custom nav-justified">
								<ul class="nav nav-tabs nav-justified">
									<li class="active">
										<a href="#tab_1_1_1" data-toggle="tab">
										<i class="fa fa-info-circle"></i> Information Login </a>
									</li>
									<li>
										<a href="#tab_1_1_2" data-toggle="tab">
										<i class="fa fa-info-circle"></i> Product News </a>
									</li>
									<li>
										<a href="#tab_1_1_3" data-toggle="tab">
										<i class="fa fa-info-circle"></i> Promotion News </a>
									</li>
									
									<li>
										<a href="#tab_1_1_5" data-toggle="tab">
										<i class="fa fa-info-circle"></i> FAQ </a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1_1_1">
									
								<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											
											<span class="caption-subject font-dark-sunglo bold uppercase"> <span class="icon-users" aria-hidden="true"></span> <b>Information Login </b> </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>	
								<table class="table table-bordered table-hover" width="100%">
								<thead>
								<tr class="active">
									<th width="20%">
										 #
									</th>
									
									<th width="78%">
										 Information
									</th>
								
									
								</tr>
								</thead>
								<tbody><tr >
									<td>
										<b> Full Name </b>
									</td>
									
									<td>
										  <?php echo "<i>".getNamaLengkap()."</i>";?>
									</td>
								</tr>
								<tr >
									<td>
										<b>Username</b>
									</td>
									
									<td>
										  <?php echo getUsername();?>
									</td>
									
									
								</tr>
								<tr >
									<td>
										<b> Group Name</b>
									</td>
									
									<td>
										 <?php echo getGroupUserName()?>
									</td>
								</tr>
								<tr >
									<td>
										<b>Branch</b>
									</td>
									
									<td>
										  <?php echo getNamaCabang(); 

										 	//echo lastLogin();
										 ?>
									</td>
									
									
								</tr>
								<tr >
									<td>
										<b>Office [ Position ]</b>
									</td>
									
									<td>

										  </i> <?php  echo getNamaJabatan();

										 	//echo lastLogin();
										 ?>
									</td>
									
									
								</tr>

								<tr >
									<td>
										<b>Last Login</b>
									</td>
									
									<td>
										 <?php echo date('d-m-Y H:i',strtotime(lastLogin())); 

										 	//echo lastLogin();
										 ?>
									</td>
									
									
								</tr>
								<tr >
									<td>
										<b>Channel</b>
									</td>
									
									<td>

										  </i> <?php  echo getNamaChannel();

										 	//echo lastLogin();
										 ?>
									</td>
									
									
								</tr>
								<tr >
									<td>
										<b>PIC </b>
									</td>
									
									<td>
										 <b><?php echo getNamaPic(); 

										 	//echo lastLogin();
										 ?></b>
									</td>
									
									
								</tr>
								
								</tbody>
								</table>
							</div>
							
										
									</div>
									<div class="tab-pane" id="tab_1_1_2">
										<p>
											<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 blog-page">
					<div class="row">

						<div class="col-md-12 col-sm-12 article-block">

						<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											<i class="icon-equalizer font-dark-sunglo"></i>
											<span class="caption-subject font-dark-sunglo bold uppercase"> <span class="icon-info" aria-hidden="true"></span> Latest Product News </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						
						<table class="table table-striped table-bordered table-hover" id="sample_2" width="100%">
							<thead>
							<tr>
								
								<th width="30%">
									 Image
								</th>
								
								<th width="70%">
									 Title / News Content
								</th>
								
							</tr>
							</thead>
							<tbody>
							<?php
							

							$query_product=" select a.id_pnews,a.title,a.news,a.image,a.adddt,a.addby,a.id_cat_pnews,a.status,b.name_category from product_news a ";
							$query_product.=" left join category_productnews b on b.id_cat_pnews=a.id_cat_pnews where a.status='1' order by a.adddt desc ";
							$result_product=pg_query($connection,$query_product);
							while ($row_product=pg_fetch_array($result_product))
							{
							
									echo "<tr>";
									echo "<td width='30%''><img src='images/img-prodnews/$row_product[image]'' alt='' class='img-responsive'></td> ";
									//echo "<td width='70%''><b><i class='fa fa-calendar'></i> <a href='#'>".date('j F Y',strtotime($row_product['adddt']))."</a> <i class='fa fa-tags'></i> <a href='#'>$row_product[name_category] </a><hr></b><h3 class='page-title font-blue-steel font-lg bold'>".$row_product['title']."</h3>".shortNews( $row_product['news'], $wordCount = 30 )."...."."<hr> <a class='beritaProduk' href='#' id-produk='$row_product[id_pnews]' id-title='$row_product[title]' data-toggle='modal' data-target='#news-product'><button class='btn blue'> Read more <i class='m-icon-swapright m-icon-white'></i> </button></a></td> ";
									//echo "</tr>";
									
									echo "<td width='70%'><div class='page-bar2'>";
									echo "	<ul class='page-breadcrumb'>";
									echo "		<li>";
									echo "			<i class='fa fa-calendar'></i>";
									echo "				<a href='#' class='bold'>".date('j F Y',strtotime($row_product['adddt']))."</a>";
									echo "			<i class='fa fa-angle-right'></i>";
									echo "		</li>";
									echo "		<li>";
									echo "			<i class='fa fa-tags'></i>";
									echo "				<a href='#' class='bold'>".$row_product['name_category']."</a>";
									echo "			<i class='fa fa-angle-right'></i>";
									echo "		</li>";
									echo "	</ul>";
				
									echo "</div>";
							
									echo "<hr></b><h3 class='page-title font-blue-steel font-lg bold' >".$row_product['title']."</h3>".shortNews( $row_product['news'], $wordCount = 30 )."...."."<hr> <a class='beritaProduk' href='#' id-produk='$row_product[id_pnews]' id-title='$row_product[title]' data-toggle='modal' data-target='#news-product'><button class='btn blue'> Read more <i class='m-icon-swapright m-icon-white'></i> </button> </a>";
									echo "</td>";
									echo "</tr>";
							
							
						
						}
							?>

							</tbody>
							</table>
							
						</div>
							<hr>
							
							
							
						</div>
						<!--end col-md-9-->
						
						<!--end col-md-3-->
					</div>
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
										</p>
									</div>
									<div class="tab-pane" id="tab_1_1_3">
										<p>
											<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12 blog-page">
					<div class="row">

						<div class="col-md-12 col-sm-12 article-block">

							
							<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											
											<span class="caption-subject font-dark-sunglo bold uppercase"> <span class="icon-layers" aria-hidden="true"></span> <b>Latest Promotion News </b> </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
						
						<table class="table table-striped table-bordered table-hover" id="sample_1" width="100%">
							<thead>
							<tr>
								
								<th width="30%">
									 Image
								</th>
								
								<th width="70%">
									 Title / News Content
								</th>
								
							</tr>
							</thead>
							<tbody>
							<?php
							
  

							$query_promotion=" select a.id_pronews,a.title,a.news,a.image,a.adddt,a.addby,a.id_cat_pronews,a.status,b.name_category from promotion_news a ";
							$query_promotion.=" left join category_promotion b on b.id_cat_pronews=a.id_cat_pronews where a.status='1' order by a.adddt desc ";
							$result_promotion=pg_query($connection,$query_promotion);
							while ($row_promotion=pg_fetch_array($result_promotion))
							{
							
									echo "<tr>";
									echo "<td width='30%'><img src='images/img-promnews/$row_promotion[image]' alt='' class='img-responsive'></td> ";
									//echo "<td width='70%'><b><i class='fa fa-calendar'></i> <a href='#'>".date('j F Y',strtotime($row_promotion['adddt']))."</a> <i class='fa fa-tags'></i> <a href='#'>$row_promotion[name_category] </a><hr></b><h3 class='page-title font-blue-steel font-lg bold' >".$row_promotion['title']."</h3>".shortNews( $row_promotion['news'], $wordCount = 30 )."...."."<hr> <a class='beritaPromosi' href='#' id-promosi='$row_promotion[id_pronews]' id-title2='$row_promotion[title]' data-toggle='modal' data-target='#news-promotion'><button class='btn blue'> Read more <i class='m-icon-swapright m-icon-white'></i> </button> </a></td> ";
									//echo "</tr>";
								
									echo "<td width='70%'><div class='page-bar2'>";
									echo "	<ul class='page-breadcrumb'>";
									echo "		<li>";
									echo "			<i class='fa fa-calendar'></i>";
									echo "				<a href='#' class='bold'>".date('j F Y',strtotime($row_promotion['adddt']))."</a>";
									echo "			<i class='fa fa-angle-right'></i>";
									echo "		</li>";
									echo "		<li>";
									echo "			<i class='fa fa-tags'></i>";
									echo "				<a href='#' class='bold'>".$row_promotion['name_category']."</a>";
									echo "			<i class='fa fa-angle-right'></i>";
									echo "		</li>";
									echo "	</ul>";
				
									echo "</div>";
							
									echo "<hr></b><h3 class='page-title font-blue-steel font-lg bold' >".$row_promotion['title']."</h3>".shortNews( $row_promotion['news'], $wordCount = 30 )."...."."<hr> <a class='beritaPromosi' href='#' id-promosi='$row_promotion[id_pronews]' id-title2='$row_promotion[title]' data-toggle='modal' data-target='#news-promotion'><button class='btn blue'> Read more <i class='m-icon-swapright m-icon-white'></i> </button> </a>";
									echo "</td>";
									echo "</tr>";
								
						
						}
							?>

							</tbody>
							</table>
							
						</div>
							<hr>
							
							
							
						</div>
							
							
						
						<!--end col-md-9-->
						
						<!--end col-md-3-->
					</div>
					
				</div>
			</div>
			<!-- END PAGE CONTENT-->
										</p>
									</div>
									
									<div class="tab-pane" id="tab_1_1_5">
										<div class="portlet light bordered">
									<div class="portlet-title">
										<div class="caption">
											
											<span class="caption-subject font-dark-sunglo bold uppercase"> <span class="icon-settings" aria-hidden="true"></span> <b>FAQ </b> </span>
											<span class="caption-helper"> </span>
										</div>
										<div class="actions">
											
										</div>
									</div>
			<div class="row">
				<div class="col-md-3">
					<ul class="ver-inline-menu tabbable margin-bottom-10">
					<?php 
					$query_faq =" select * from category_faq order by name_category asc ";
					$result_faq= pg_query($query_faq);
					$x=1;
					while ($row_faq=pg_fetch_array($result_faq)) {
						switch ($x) {
							case '1':
								$faclass="fa fa-briefcase";
								break;
							case '2':
								$faclass="fa fa-group";
								break;
							case '3':
								$faclass="fa fa-leaf";
								break;
							case '4':
								$faclass="fa fa-info-circle";
								break;
							case '5':
								$faclass="fa fa-tint";
								break;
							case '6':
								$faclass="fa fa-plus";
								break;
							case '7':
								$faclass="fa fa-send";
								break;
							case '8':
								$faclass="fa fa-space-shuttle";
								break;
							case '9':
								$faclass="fa fa-shield";
								break;
							case '10':
								$faclass="fa fa-eraser";
								break;
							case '11':
								$faclass="fa fa-rocket";
								break;
							case '12':
								$faclass="fa fa-question-circle";
								break;
							
							default:
								$faclass="fa fa-gears";
								break;
						}

						if ($x=='1'){
							$iclass="active";
						} else { $iclass=""; }
						echo "<li class='$iclass'>
							<a data-toggle='tab' href='#tab_".$row_faq['id_catfaq']."'>
							<i class='$faclass'></i> $row_faq[name_category] </a>
							<span class='after'>
							</span>
							</li>";

						$x++;
					}

					?>
						
						
					</ul>
				</div>
				<div class="col-md-9">
					<div class="tab-content">

					<?php
					$query_faq2 =" select * from category_faq order by name_category asc  ";
					//$query_faq2.=" left join category_faq b on a.id_catfaq=b.id_catfaq order by b.name_category asc ";
					//echo $query_faq2;
					$result_faq2=pg_query($query_faq2);
					$z=1;
					while ($row_faq2=pg_fetch_array($result_faq2)){
					if ($z=='1'){
							$tab="active";
							$collapse="in";
						} else { $tab="";}	

					?>
						<div id="tab_<?php echo $row_faq2['id_catfaq'];?>" class="tab-pane <?php echo $tab;?>">
							<div id="accordion1" class="panel-group">
							<?php
								$query_faq3 =" select * from faq where id_catfaq='$row_faq2[id_catfaq]' ";
								$result_faq3=pg_query($query_faq3);
								$y=1;
								while ($row_faq3=pg_fetch_array($result_faq3)){

									if ($y=='1'){
										$collapse="in";
									} else { $collapse="";}	

							?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion<?php echo $z;?>" href="#accordion<?php echo $z."_".$y;?>">
										<?php echo "<b>".$row_faq3['question']."</b>";?> </a>
										</h4>
									</div>
									<div id="accordion<?php echo $z."_".$y;?>" class="panel-collapse collapse <?php echo $collapse;?>">
										<div class="panel-body">
											 <?php echo $row_faq3['answer'];?>
										</div>
									</div>
								</div>
								<?php
								$y++;
								}
								?>


								
							</div>
						</div>
						<?php
						$z++;

					}
						?>
						
					</div>
				</div>
			</div>
			</div>
			<!-- END PAGE CONTENT-->
										</p>
										
									</div>
								</div>
							</div>
							</div>





						<div class="portlet-body">
							
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-12">
					
					<!-- END BORDERED TABLE PORTLET
					<div align="center"><img src="images/financial.png" style="height: 75px;" alt=""/>
					-->
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL STYLES -->

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function() {

	$('.beritaProduk').click(function() {
		var judul = $(this).attr('id-title');
    	var idproduk = $(this).attr('id-produk');
		 // alert(idproduk);
			$("#judul-produk").empty();
			$("#judul-produk").append('<i class="fa fa-info-circle"></i> '+ judul );


			var dataString = 'id='+idproduk;
		
			$.ajax({
			type: "POST",
			url: "module/ajax/ajax_detail_product_news.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$("#detail-produk").html(html);
			} 
			});	




			  });


	$('.beritaPromosi').click(function() {
		var judul = $(this).attr('id-title2');
    	var idpromosi = $(this).attr('id-promosi');
		 // alert(idproduk);
			$("#judul-promosi").empty();
			$("#judul-promosi").append('<i class="fa fa-info-circle"></i> '+ judul );


			var dataString = 'id='+idpromosi;
		
			$.ajax({
			type: "POST",
			url: "module/ajax/ajax_detail_promotion_news.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$("#detail-promosi").html(html);
			} 
			});	




			  });

}); // document ready	$(document).ready(function() {

    </script>