<?php
require_once '../../config/config.php';
//include('db.php');
if($_POST['id'])
{
$id=$_POST['id'];



//########################## CASE ############################
$sql =" select a.id_pnews,a.title,a.news,a.image,a.adddt,a.addby,a.id_cat_pnews,a.status,b.name_category from product_news a  ";
$sql.=" left join category_productnews b on b.id_cat_pnews=a.id_cat_pnews where a.status='1' and a.id_pnews='$id' ";

$result=pg_query($connection,$sql);
$row=pg_fetch_array($result);


?>


				<div class="col-md-12 news-page blog-page">
					<div class="row">
						<div class="col-md-12 blog-tag-data">
							<h3 class="page-title font-blue-steel font-lg bold"><?php echo $row['title']; ?></h3>
							<img src="images/img-prodnews/<?php echo $row['image'];?>" alt="" class="img-responsive">
							<div class="row">
							<hr>
							<div class="page-bar2">
								<div class="col-md-3">
									<ul class="page-breadcrumb">
										<li>
											<i class="fa fa-tags"></i>
											<a href="#"><i><b>
											<?php echo strtoupper($row['name_category']);?></b></i></a>
											
										</li>
									</ul>
								</div>
								<div class="page-breadcrumb">
									<ul class="list-inline">
										<li>
											<i class="fa fa-calendar"></i>
											<a href="#" class="bold">
											<?php echo date('j F Y',strtotime($row['adddt']));?> </a>
										</li>
										
									</ul>
								</div>
							</div>
							</div>
							<div class="news-item-page">
								<p>
									 <?php echo $row['news'];?>
								</p>
								
							</div>
							<hr>

						
						</div>
						
					</div>
				</div>
			









<?php
}

?>