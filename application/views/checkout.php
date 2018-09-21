

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Checkout - Address</li>
                    </ul>
                </div>
                
                <div class="col-md-6" id="checkout">

                    <div class="box">
                     <div class="box-header">
                            <h3>Billing Details</h3>
                        </div>
                        
                            <?php echo validation_errors('<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>', '</div>'); ?>
                <?php $attributes = array('id' => 'checkout_form'); echo form_open('index.php/checkout/order/create',$attributes);?>
                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname*</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname*</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email*</label>
                                            <input type="text" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Phone*</label>
                                            <input type="text" class="form-control" id="phone" name="phoneno">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div class="row">
                                <div class="col-sm-12 col-md-12">
                                     <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" class="form-control" id="company" name="company">
                                        </div>
                                    </div>
                              
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address*</label>
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="city">Town/City*</label>
                                            <select class="form-control" id="city" name="city">
                                                <option value="city">select city</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="state">State*</label>
                                            <input type="text" class="form-control" id="state" name="state">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label for="sip">Zip*</label>
                                            <input type="text" class="form-control" id="zip" name="zipcode">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>

                           
                        
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-6">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <?php if(count($cart)> 0) {?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th >Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($cart as $item) : ?>
                                        <tr>                                         
                                            <td><a href="#"><?=$item['name']?></a>
                                            </td>
                                            <td>
                                                <?=$item['qty']?>
                                            </td>
                                            <td><?=$this->cart->format_number($item['price'])?></td>
                                            <td>$0.00</td>
                                            <td><?=$this->cart->format_number($item['subtotal'])?></td>
                                            <td>
                                            </td>
                                           
                                        </tr>
                                      <?php endforeach;?> 
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">Total</th>
                                            <th colspan="2">Rs. <?php echo $this->cart->format_number($this->cart->total()); ?>/-</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <?php } ?>
                             <div class="box-footer">
                              <h3>Delivery Options*</h3>
                               <div class="content">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="radio">
                                             <b>Cash On Delivery</b>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                             </div>
                             <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.html" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Place an Order<i class="fa fa-chevron-right"></i>
                                    </button>

                                </div>
                            </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->
                </form>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
 