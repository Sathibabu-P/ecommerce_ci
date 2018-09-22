

    <div id="all">
        <div id="content">
            <div class="container">
                <div class="col-md-8" id="customer-order">
                <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Order Success</li>
                    </ul>

                <div class="box">
                    <h1>Order #<?=$order['id']?></h1>

                    <p class="lead">Order #<?=$order['id']?> was placed on <strong><?=$order['created_at']?></strong> and is currently <strong>Being prepared</strong>.</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>

                    <hr>

                    <div class="table-responsive">
                        <?php if(count($order['items']) > 0) {?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>                                  
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($order['items'] as $item) : ?>
                                <tr>
                                    <td>
                                        <a href="#">
                                            <img src="img/detailsquare.jpg" alt="White Blouse Armani">
                                        </a>
                                    </td>
                                    <td><a href="#"><?=$item['name']?></a>
                                    </td>
                                    <td><?=$item['quantity']?></td>
                                    <td><?=$item['item_price']?></td>
                                    <td><?=$item['total_price']?></td>
                                </tr>
                             <?php endforeach; ?>   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4" class="text-right">Order subtotal</th>
                                    <th><?=$order['order_total']?></th>
                                </tr>
                                <tr>
                                    <th colspan="4" class="text-right">Shipping and handling</th>
                                    <th>0.00</th>
                                </tr>
                              
                                <tr>
                                    <th colspan="4" class="text-right">Total</th>
                                    <th><?=$order['order_total']?></th>
                                </tr>
                            </tfoot>
                        </table>
                        <?php } ?>
                    </div>
                    <!-- /.table-responsive -->

                 
                </div>
                </div>
                <div class="col-md-4" id="customer-address">
                    <div class="box">
                       <div class="row addresses">
                        <div class="col-md-12">
                            <h2>Shipping address</h2>
                            <p><?=$order['customer']['firstname']?>&nbsp;<?=$order['customer']['lastname']?>
                                <br><?=$order['customer']['phoneno']?>
                                <br><?=$order['customer']['address']?>
                                <br><?=$order['customer']['city']?>
                                <br><?=$order['customer']['state']?>
                                <br><?=$order['customer']['zipcode']?></p>
                        </div>
                       
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>