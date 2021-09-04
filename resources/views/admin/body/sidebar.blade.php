@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				<a href="index.html">
				<!-- logo for regular state and mobile devices -->
					<div class="d-flex align-items-center justify-content-center">					 	
						<img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						<h3><b>Shopkart</b> Admin</h3>
					</div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  

		<li class="{{ ($route == 'dashboard')? 'active':'' }}">
          <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  

        @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product	 = (auth()->guard('admin')->user()->product	 == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $coupons = (auth()->guard('admin')->user()->coupons == 1);
            $shipping = (auth()->guard('admin')->user()->shipping == 1);
            $blog = (auth()->guard('admin')->user()->blog == 1);
            $setting = (auth()->guard('admin')->user()->setting == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $returnorders = (auth()->guard('admin')->user()->returnorders == 1);
            $stock = (auth()->guard('admin')->user()->stock == 1);
            $review = (auth()->guard('admin')->user()->review == 1);
            $reports = (auth()->guard('admin')->user()->reports == 1);
            $alluser = (auth()->guard('admin')->user()->alluser == 1);
            $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp

        @if ($brand == true)
            <li class="treeview {{ ($prefix == '/brand')? 'active':'' }}">
              <a href="#">
                <i data-feather="message-circle"></i>
                <span>Brands</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.brand')? 'active':'' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($category == true)
            <li class="treeview {{ ($prefix == '/category')? 'active':'' }}">
              <a href="#">
                <i data-feather="mail"></i> <span>Category</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.category')? 'active':'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a></li>
                <li class="{{ ($route == 'all.subcategory')? 'active':'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All Sub Category</a></li>
                <li class="{{ ($route == 'all.subsubcategory')? 'active':'' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub->Sub Category</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($product == true)
            <li class="treeview {{ ($prefix == '/product')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Products</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'add.product')? 'active':'' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Products</a></li>
                <li class="{{ ($route == 'manage.product')? 'active':'' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Products</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($slider == true)
            <li class="treeview {{ ($prefix == '/slider')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Sliders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'manage.slider')? 'active':'' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($coupons == true)
            <li class="treeview {{ ($prefix == '/coupons')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Coupons</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'manage.coupon')? 'active':'' }}"><a href="{{ route('manage.coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
              </ul>
            </li> 
        @else
            
        @endif


        @if ($shipping == true)
            <li class="treeview {{ ($prefix == '/shipping')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Shipping Area</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'manage.division')? 'active':'' }}"><a href="{{ route('manage.division') }}"><i class="ti-more"></i>Shipping Division</a></li>
                <li class="{{ ($route == 'manage.district')? 'active':'' }}"><a href="{{ route('manage.district') }}"><i class="ti-more"></i>Shipping District</a></li>
                <li class="{{ ($route == 'manage.state')? 'active':'' }}"><a href="{{ route('manage.state') }}"><i class="ti-more"></i>Shipping State</a></li>
              </ul>
            </li> 
        @else
            
        @endif


        @if ($blog == true)
            <li class="treeview {{ ($prefix == '/blog')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Blogs</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'blog.category')? 'active':'' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>
                <li class="{{ ($route == 'manage.post')? 'active':'' }}"><a href="{{ route('manage.post') }}"><i class="ti-more"></i>Manage Blog Post</a></li>
                <li class="{{ ($route == 'add.post')? 'active':'' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($setting == true)
            <li class="treeview {{ ($prefix == '/setting')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Settings</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'site.setting')? 'active':'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Settings</a></li>
                <li class="{{ ($route == 'seo.setting')? 'active':'' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>SEO Settings</a></li>
              </ul>
            </li>
        @else
            
        @endif



{{-- ================================= User Interface ========================================= --}}


        @if ($orders == true || $returnorders == true || $stock == true || $review == true || $reports == true || $alluser == true || $adminuserrole == true)
            <li class="header nav-small-cap">User Interface</li>
        @else
        
        @endif


        @if ($orders == true)
            <li class="treeview {{ ($prefix == '/orders')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
                <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
                <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i>Picked Orders</a></li>
                <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i>Shipped Orders</a></li>
                <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                <li class="{{ ($route == 'cancelled-orders')? 'active':'' }}"><a href="{{ route('cancelled-orders') }}"><i class="ti-more"></i>Cancelled Orders</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($returnorders == true)
            <li class="treeview {{ ($prefix == '/return')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Returned Orders</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return request</a></li>
                <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($stock == true)
            <li class="treeview {{ ($prefix == '/stock')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Stocks</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'product.stock')? 'active':'' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>
              </ul>
            </li> 
        @else
            
        @endif


        @if ($review == true)
            <li class="treeview {{ ($prefix == '/review')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Reviews</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'pending.review')? 'active':'' }}"><a href="{{ route('pending.review') }}"><i class="ti-more"></i>Pending Review</a></li>
                <li class="{{ ($route == 'publish.review')? 'active':'' }}"><a href="{{ route('publish.review') }}"><i class="ti-more"></i>Published Review</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($reports == true)
            <li class="treeview {{ ($prefix == '/reports')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>All Reports</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all-reports')? 'active':'' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>
              </ul>
            </li> 
        @else
            
        @endif


        @if ($alluser == true)
            <li class="treeview {{ ($prefix == '/alluser')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>All Users</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all-users')? 'active':'' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>
              </ul>
            </li>
        @else
            
        @endif


        @if ($adminuserrole == true)
            <li class="treeview {{ ($prefix == '/adminuserrole')? 'active':'' }}">
              <a href="#">
                <i data-feather="file"></i>
                <span>Admin Users Role</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ ($route == 'all.admin.users')? 'active':'' }}"><a href="{{ route('all.admin.users') }}"><i class="ti-more"></i>All Admin Users</a></li>
              </ul>
            </li>
        @else
            
        @endif



        {{-- <li class="treeview">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Components</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Cards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>   --}}
		  
        {{-- <li class="treeview">
          <a href="#">
            <i data-feather="hard-drive"></i>
            <span>Content</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
            <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
            <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
          </ul>
        </li> --}}
		  
        {{-- <li class="treeview">
          <a href="#">
            <i data-feather="package"></i>
            <span>Utilities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
            <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
            <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
            <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
            <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
          </ul>
        </li>
		  
		<li class="treeview">
          <a href="#">
            <i data-feather="edit-2"></i>
            <span>Icons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
            <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
            <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>	
            <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
            <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
            <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
            <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
            <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
          </ul>
        </li> 
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="inbox"></i>
			<span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="forms_advanced.html"><i class="ti-more"></i>Advanced Elements</a></li>
            <li><a href="forms_editors.html"><i class="ti-more"></i>Editors</a></li>
            <li><a href="forms_code_editor.html"><i class="ti-more"></i>Code Editor</a></li>
            <li><a href="forms_validation.html"><i class="ti-more"></i>Form Validation</a></li>
            <li><a href="forms_wizard.html"><i class="ti-more"></i>Form Wizard</a></li>
            <li><a href="forms_general.html"><i class="ti-more"></i>General Elements</a></li>
            <li><a href="forms_dropzone.html"><i class="ti-more"></i>Dropzone</a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i data-feather="server"></i>
			<span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
            <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
          </ul>
        </li>
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="charts_chartjs.html"><i class="ti-more"></i>ChartJS</a></li>
            <li><a href="charts_flot.html"><i class="ti-more"></i>Flot</a></li>
            <li><a href="charts_inline.html"><i class="ti-more"></i>Inline</a></li>	
            <li><a href="charts_morris.html"><i class="ti-more"></i>Morris</a></li>
            <li><a href="charts_peity.html"><i class="ti-more"></i>Peity</a></li>
            <li><a href="charts_chartist.html"><i class="ti-more"></i>Chartist</a></li>
          </ul>
        </li>  
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="map"></i>
			<span>Map</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="map_google.html"><i class="ti-more"></i>Google Map</a></li>
            <li><a href="map_vector.html"><i class="ti-more"></i>Vector Map</a></li>
          </ul>
        </li> 			  
		  
		<li class="treeview">
          <a href="#">
            <i data-feather="alert-triangle"></i>
			<span>Authentication</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
			<li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
			<li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
			<li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
			<li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
			<li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>	
          </ul>
        </li> 		  		   --}}

		
        {{-- <li class="header nav-small-cap">EXTRA</li>		  

        <li class="treeview">
          <a href="#">
            <i data-feather="layers"></i>
			<span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level One</a></li>
            <li class="treeview">
              <a href="#">Level One
                <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Two</a></li>
                <li class="treeview">
                  <a href="#">Level Two
                    <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#">Level Three</a></li>
                    <li><a href="#">Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#">Level One</a></li>
          </ul>
        </li>  
		  
		<li>
          <a href="auth_login.html">
            <i data-feather="lock"></i>
			<span>Log Out</span>
          </a>
        </li>  --}}
        
      </ul>
    
    
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>