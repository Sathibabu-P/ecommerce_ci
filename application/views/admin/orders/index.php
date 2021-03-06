

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
         Orders <small>orders listing</small>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="fa fa-home"></i>
               <a href="index.html">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">orders</a>
            </li>
         </ul>
         <!-- <a class="btn green pull-right" href="<?php# echo base_url(); ?>index.php/admin/orders/create"><i class="fa fa-plus"></i> New order</a> -->
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
              
       
                  <table class="table table-striped table-bordered table-hover" id="order-datatable">
                    
                    <thead>
                           <th>S.No</th> 
                           <th>Date</th> 
                           <th>Reference No</th>
                           <th>Customer Name</th>
                           <th>Order Amount</th>
                           <th>Status</th>
                           <th>Actions</th>
                    </thead>  

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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Items List</h4>
            </div>
            <div class="modal-body">
            <table class="table table-striped table-bordered table-hover">

            <thead>
               <tr>
                  <th>S.NO</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
               </tr>
            </thead> 
            <tbody class="tboby">
               
            </tbody>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
