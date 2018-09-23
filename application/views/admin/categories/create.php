

<div class="page-content-wrapper">
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
         Category Create 
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="fa fa-home"></i>
               <a href="index.html">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Category Create</a>
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
                     <i class="fa fa-shopping-cart"></i>New Category
                  </div>
               </div>
               <div class="portlet-body">
                  <div class="tabbable">
                     <ul class="nav nav-tabs">
                        <li class="active">
                           <a href="#tab_general" data-toggle="tab">
                           General </a>
                        </li>
                     </ul>
                     <div class="tab-content no-space">
                        <div class="tab-pane active" id="tab_general">
                           <div class="form-body">
                              <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
                              <?php $attributes = array('class' => 'form-horizontal form-row-seperated','id' => 'category-form'); echo form_open('index.php/admin/categories/create',$attributes);?>
                              <div class="alert alert-danger display-hide">
                                 <button class="close" data-close="alert"></button>
                                 You have some form errors. Please check below.
                              </div>
                              <div class="alert alert-success display-hide">
                                 <button class="close" data-close="allert"></button>
                                 Successfuly saved..
                              </div>
                              <?php# echo form_open('');?>
                              <div class="form-group">
                                 <label class="col-md-2 control-label">Name: <span class="required">
                                 * </span>
                                 </label>
                                 <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" placeholder="">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label class="col-md-2 control-label">Status: <span class="required">
                                 * </span>
                                 </label>
                                 <div class="col-md-10">
                                    <select class="table-group-action-input form-control" name="status">
                                       <option value="1">Active</option>
                                       <option value="0">Inactive</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <a class="btn default" href="<?php echo base_url(); ?>index.php/admin/categories"><i class="fa fa-reply"></i> Back</a>
                           <button type="submit" name="submit" value="index" class="btn green"><i class="fa fa-check"></i> Save</button>
                           <button type="submit" name="submit" value="edit" class="btn green"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                           <?php echo form_close();?>
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

