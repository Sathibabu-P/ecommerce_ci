<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Products <small>product listing</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					
					<li>
						<a href="#">Products</a>
					</li>
				</ul>
				
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
									 Product Name
								</th>
								<th>
									 Actual Price
								</th>
								<th>
									 Special Price
								</th>
								<th>
									 Quantity
								</th>
								<th>
									 Actions
								</th>
							</tr>
							</thead>
							
							<tbody>
								   <?php 
								   if($items){
								   $count = 1; foreach($items as $item) : ?>
						          <tr>          
						            <td class="semi-bold"><?=$count++?></td>         
						            <td class="semi-bold"><?=$item['name'];?></td>
						             <td class="semi-bold"><?=$item['actual_price'];?></td>
						            <td class="semi-bold"><?=$item['offer_price'];?></td> 
						            <td class="semi-bold"><?=$item['quantity'];?></td>
						                            
						            <td class="min-width nowrap">

<a href="<?=base_url();?>index.php/admins/items/edit/<?=$item['id']?>" class="btn btn-sm blue"><i class="fa fa-edit"></i>Edit</a> <a href="<?=base_url();?>index.php/admins/items/delete/<?=$item['id']?>" class="btn btn-sm red" onclick="return confirm('Are your sure delete?');"><i class="fa fa-trash"></i>Delete</a></td>
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