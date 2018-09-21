
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" name="cart" action="<?=base_url()?>index.php/cart/update">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?=count($cart);?> item(s) in your cart.</p>
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
                                                <input name="cart[<?=$item["rowid"]?>][qty]" type="number" value="<?=$item['qty']?>" class="form-control" min="1" max="10">
                                            </td>
                                            <td><?=$this->cart->format_number($item['price'])?></td>
                                            <td>$0.00</td>
                                            <td><?=$this->cart->format_number($item['subtotal'])?></td>
                                            <td><a onclick="return confirm('Are your sure reomve item?');" href="<?=base_url()?>index.php/cart/remove/<?=$item["rowid"]?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <input type="hidden" name="cart[<?=$item["rowid"]?>][rowid]" value="<?=$item["rowid"]?>">
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
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info"><i class="fa fa-refresh"></i> Update basket</button>
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                             </form>
                            <?php } else { ?>
                             <div class="box-footer">
                                <div class="pull-left">
                                    <a href="/jlr" class="btn btn-primary"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                </div>
                            </div>
                            <?php }  ?>
                       

                    </div>
                    <!-- /.box -->


                 


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">
                <?php if(count($cart)> 0) {?>
                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order subtotal</td>
                                        <th>Rs. <?php echo $this->cart->format_number($this->cart->total()); ?>/-</th>
                                    </tr>
                                    <tr>
                                        <td>Shipping and handling</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <th>$0.00</th>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <th>Rs. <?php echo $this->cart->format_number($this->cart->total()); ?>/-</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                 <?php } ?>              

                </div>
                <!-- /.col-md-3 -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
       