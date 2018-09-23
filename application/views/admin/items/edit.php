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
Product Edit 
</h3>
<div class="page-bar">
<ul class="page-breadcrumb">
<li>
	<i class="fa fa-home"></i>
	<a href="index.html">Home</a>
	<i class="fa fa-angle-right"></i>
</li>
<li>
	<a href="<?=base_url()?>index.php/admin/items">Products</a>
	<i class="fa fa-angle-right"></i>
</li>
<li>
	<a href="#">Product Edit</a>
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
				<i class="fa fa-shopping-cart"></i>Edit Product
			</div>
			
		</div>
		<div class="portlet-body">
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#tab_general" data-toggle="tab">
						General </a>
					</li>
					
					<li>
						<a href="#tab_images" data-toggle="tab">
						Images</a>
					</li>
					
				</ul>
				 <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
				<div class="tab-content no-space">
					<div class="tab-pane active" id="tab_general">
					<div class="form-body">
					
						  <?php $attributes = array('class' => 'form-horizontal form-row-seperated','id' => 'items-form'); echo form_open('index.php/admin/items/edit',$attributes);?>
							  <div class="alert alert-danger display-hide">
								<button class="close" data-close="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success display-hide">
								<button class="close" data-close="allert"></button>
								Successfuly saved..
							</div>

							<div class="form-group">
							<label class="col-md-2 control-label">Category: <span class="required">
							* </span>
							</label>
							<div class="col-md-10">
								<select class="select2me form-control" name="category_id">
									<?php foreach($categories as $category) : ?>
										<option value="<?=$category['id']?>" <?php if($category['id'] == $item['category_id']) echo "selected";?>>
										<?=$category['name']?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Name: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="name" value="<?=$item['name']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Description: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<textarea class="form-control" name="description"><?=$item['description']?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label">Weight: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<select class="table-group-action-input form-control" name="weight">
										<option value="">Select...</option>
										<option value="25" <?php if($item['weight'] == 25) echo "selected";?>>25 kg's</option>
										<option value="50" <?php if($item['weight'] == 50) echo "selected";?> >50 kg's</option>
										<option value="100" <?php if($item['weight'] == 100) echo "selected";?> >100 kg's</option>
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Actual Price: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="actual_price" value="<?=$item['actual_price']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Offer Price: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="offer_price" value="<?=$item['offer_price']?>">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-2 control-label">Quantity: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="quantity" value="<?=$item['quantity']?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">Status: <span class="required">
								* </span>
								</label>
								<div class="col-md-10">
									<select class="table-group-action-input form-control" name="status">
										<option value="">Select...</option>
										<option value="1" <?php if($item['status'] == 1) echo "selected";?>>Published</option>
										<option value="0" <?php if($item['status'] == 0) echo "selected";?>>Not Published</option>
									</select>
								</div>
							</div>
						</div>
						 <input type="hidden"  value="<?=$item['id']?>" name="id"> 
						<a class="btn default" href="<?php echo base_url(); ?>index.php/admin/items"><i class="fa fa-reply"></i> Back</a>
						<button type="submit" name="submit" value="index" class="btn green"><i class="fa fa-check"></i> Save</button>
					<button type="submit" name="submit" value="edit" class="btn green"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
						<?php echo form_close();?>
					</div>
					<div class="tab-pane" id="tab_images">
						<?php include('images.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>
<!-- END PAGE CONTENT-->
</div>
</div>

