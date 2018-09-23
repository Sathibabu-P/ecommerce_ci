<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Categories <small>categories listing</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Categories</a>
					</li>
				</ul>
				<a class="btn green pull-right" href="<?php echo base_url(); ?>index.php/admin/categories/create"><i class="fa fa-plus"></i> New Category</a>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					
					<div class="portlet box blue-hoki">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_1">
							<thead>
							<tr>
								<th>
									 S.NO
								</th>
								<th>
									 Category Name
								</th>
								<th>
									 Status
								</th>								
								<th>
									 Actions
								</th>
							</tr>
							</thead>
							
							<tbody>
								   <?php 
								   if($categories){
								   $count = 1; foreach($categories as $category) : ?>
						          <tr>          
						            <td class="semi-bold"><?=$count++?></td>         
						            <td class="semi-bold"><?=$category['name'];?></td>
						             <td class="semi-bold"><?=$category['status'];?></td>						           
						            <td class="min-width nowrap">

<a href="<?=base_url();?>index.php/admin/categories/edit/<?=$category['id']?>" class="btn btn-sm blue"><i class="fa fa-edit"></i>Edit</a> <a href="<?=base_url();?>index.php/admin/categories/delete/<?=$category['id']?>" class="btn btn-sm red" onclick="return confirm('Are your sure delete?');"><i class="fa fa-trash"></i>Delete</a></td>
						          </tr>
						        <?php endforeach; }?>
								
							</tbody>
							</table>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->