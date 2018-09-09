<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
			
			
				<li class="active open">
					
					<ul class="sub-menu">
						<li class="active">
							<a href="<?=base_url()?>index.php/admin">
							<i class="icon-home"></i>
							Dashboard</a>
						</li>
						<li>
							<a href="<?=base_url()?>index.php/admin/orders">
							<i class="icon-basket"></i>
							Orders</a>
						</li>						
						<li>
							<a href="<?=base_url()?>index.php/admin/items">
							<i class="icon-handbag"></i>
							Products</a>
						</li>
						<li>
							<a href="<?=base_url()?>index.php/admin/customers">
							<i class="icon-users"></i>
							Customers</a>
						</li>
						
					</ul>
				</li>
				
				
				
				
				

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->