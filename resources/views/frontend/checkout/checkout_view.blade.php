@extends('frontend.main_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
   Checkout Page
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading" class="active">
    	<h4 class="unicase-checkout-title">
	        {{-- <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne"> --}}
         <a>
	          <span>1</span>Shipping Address
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				{{-- <div class="col-md-6 col-sm-6 guest-login">
					<h4 class="checkout-subtitle">Guest or Register Login</h4>
					<p class="text title-tag-line">Register with us for future convenience:</p>

					<!-- radio-form  -->
					<form class="register-form" role="form">
					    <div class="radio radio-checkout-unicase">  
					        <input id="guest" type="radio" name="text" value="guest" checked>  
					        <label class="radio-button guest-check" for="guest">Checkout as Guest</label>  
					          <br>
					        <input id="register" type="radio" name="text" value="register">  
					        <label class="radio-button" for="register">Register</label>  
					    </div>  
					</form>
					<!-- radio-form  -->

					<h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
					{{-- <p class="text title-tag-line ">Register with us for future convenience:</p> --}}
					
					{{-- <ul class="text instruction inner-bottom-30">
						<li class="save-time-reg">- Fast and easy check out</li>
						<li>- Easy access to your order history and status</li>
					</ul>

					<button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Continue</button>
				</div> --}}
    <div class="col-md-6 col-sm-6 already-registered-login">
					{{-- <h4 class="checkout-subtitle"><b>Shipping Address</b></h4> --}}
					<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
      @csrf
						 <div class="form-group">
         <h5><b>Shipping Name</b><span style="color: red">*</span></h5>
         <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}">
         @error('shipping_name')
              <span class="text-danger">{{ $message }}</span>
         @enderror
					  </div>

						 <div class="form-group">
					    <h5><b>Email</b><span style="color: red">*</span></h5>
					    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}">
         @error('shipping_email')
              <span class="text-danger">{{ $message }}</span>
         @enderror
					  </div>
       
						 <div class="form-group">
					    <h5><b>Contact Number</b><span style="color: red">*</span></h5>
					    <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone Number" value="{{ Auth::user()->phone }}">
         @error('shipping_phone')
              <span class="text-danger">{{ $message }}</span>
         @enderror
					  </div>

						 <div class="form-group">
					    <h5><b>Pincode</b><span style="color: red">*</span></h5>
					    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Pincode">
         @error('post_code')
              <span class="text-danger">{{ $message }}</span>
         @enderror
					  </div>

					  {{-- <div class="form-group">
					    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
					    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="">
					    <a href="#" class="forgot-password">Forgot your Password?</a>
					  </div>
					  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button> --}}
				</div>
    
				<!-- guest-login -->

				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					
     <div class="form-group validate">
       <h5><b>Select Division</b><span style="color: red">*</span></h5>
       <div class="controls">
        <select name="division_id" class="form-control" aria-invalid="false">
         <option value="" selected="" disabled="">-- Select Division --</option>
           @foreach ($divisions as $div)
                <option value="{{ $div->id }}">{{ $div->division_name }}</option>
           @endforeach
        </select>
         @error('division_id')
              <span class="text-danger">{{ $message }}</span>
         @enderror
       </div>
      </div>

      <div class="form-group validate">
       <h5><b>Select District</b><span style="color: red">*</span></h5>
       <div class="controls">
        <select name="district_id" class="form-control" aria-invalid="false">
         <option value="" selected="" disabled="">-- Select District --</option>
         
        </select>
         @error('district_id')
              <span class="text-danger">{{ $message }}</span>
         @enderror
       </div>
      </div>

      <div class="form-group validate">
       <h5><b>Select State</b><span style="color: red">*</span></h5>
       <div class="controls">
        <select name="state_id" class="form-control" aria-invalid="false">
         <option value="" selected="" disabled="">-- Select State --</option>

        </select>
         @error('state_id')
              <span class="text-danger">{{ $message }}</span>
         @enderror
       </div>
      </div>

      <div class="form-group">
        <h5><b>Notes</b><span style="color: red">*</span></h5>
        <textarea class="form-control" name="notes" cols="30" rows="7" placeholder="Notes"></textarea>
         @error('notes')
              <span class="text-danger">{{ $message }}</span>
         @enderror
      </div>


					  {{-- <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button> --}}
					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->



					    {{-- <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo">
						          <span>2</span>Billing Information
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
						      <div class="panel-body">
						      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->

						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
						       		<span>3</span>Shipping Information
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse">
						      <div class="panel-body">
						      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-03  -->

						<!-- checkout-step-04  -->
					    <div class="panel panel-default checkout-step-04">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
						        	<span>4</span>Shipping Method
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFour" class="panel-collapse collapse">
							    <div class="panel-body">
							     Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
							    </div>
					    	</div>
						</div>
						<!-- checkout-step-04  -->

						<!-- checkout-step-05  -->
					  	<div class="panel panel-default checkout-step-05">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
						        	<span>5</span>Payment Information
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse">
						      <div class="panel-body">
						       Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
						      </div>
						    </div>
					    </div>
					    <!-- checkout-step-05  -->

						<!-- checkout-step-06  -->
					  	<div class="panel panel-default checkout-step-06">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
						        	<span>6</span>Order Review
						        </a>
						      </h4>
						    </div>
					    	<div id="collapseSix" class="panel-collapse collapse">
					      		<div class="panel-body">
					        		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					      		</div>
					    	</div>
					  	</div>
					  	<!-- checkout-step-06  --> --}}



					  	
					</div><!-- /.checkout-steps -->
				</div>
    
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

     @foreach ($carts as $item)
         <li>
          <table>
           <tr>
            <td style="padding: 0px 0px 20px 10px;"><img src="{{ asset($item->options->image) }}" alt="" style="height: 70px; width: 70px; border: 0.5px solid #c7bfbf;"></td>
            <td style="padding: 0px 0px 20px 10px">
             <li>
               <strong>Qty:</strong>
               {{ ($item->qty) }} <br>
               <strong>Colour:</strong>
               @if ($item->options->color == NULL)
                   <strong><span> -- </span></strong>
               @else
                   {{ ($item->options->color) }}
               @endif <br>
               <strong>Size:</strong>
               @if ($item->options->size == NULL)
                   <strong><span> -- </span></strong>
               @else
                   {{ ($item->options->size) }}
               @endif <br>
             </li>
            </td>
           </tr>
          </table>
         </li>
     @endforeach
					<hr>
					<li>
      @if (Session::has('coupon'))
      <div class="row">
       <div class="col-md-5">
          <strong style="float: right;">Subtotal</strong>
       </div>
       <div class="col-md-7">
          <strong style="float: right;">₹&nbsp;{{ $cartTotal }}</strong>
       </div>
      </div><br>
          
      <div class="row">
       <div class="col-md-5">
          <strong style="float: right;">Coupon Name</strong>
       </div>
       <div class="col-md-7">
          <strong style="float: right;">{{ session()->get('coupon')['coupon_name'] }}&nbsp;({{ session()->get('coupon')['coupon_discount'] }}%)</strong>
       </div>
      </div><br>

      <div class="row">
       <div class="col-md-5">
          <strong style="float: right;">Coupon Discount</strong>
       </div>
       <div class="col-md-7">
           <strong style="float: right; color: #f12020">₹&nbsp;{{ session()->get('coupon')['discount_amount'] }}.00</strong>
       </div>
      </div><br>
      <div class="row">
       <div class="col-md-5">
           <h4><strong style="float: right; color: #008015">Grand Total</strong></h4>
       </div>
       <div class="col-md-7">
           <h4><strong style="float: right; color: #008015">₹&nbsp;{{ session()->get('coupon')['total_amount'] }}.00</strong></h4>
       </div>
      </div>
      @else
      <div class="row">
        <div class="col-md-5">
           <strong style="float: right;">Subtotal</strong>
        </div>
        <div class="col-md-7">
           <strong style="float: right;">₹&nbsp;{{ $cartTotal }}</strong>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-5">
            <h4><strong style="float: right; color: #008015">Grand Total</strong></h4>
        </div>
        <div class="col-md-7">
            <h4><strong style="float: right; color: #008015">₹&nbsp;{{ $cartTotal }}</strong></h4>
        </div>
      </div>
      @endif
     </li>
				
				</ul>		
   
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>


{{-- <div class="col-md-8">
</div> --}}

<div class="col-md-8">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
      <h4 class="unicase-checkout-title">Select Payment Method</h4>
     </div>
     <div class="">	
      <div class="row">
        <div class="col-md-4">
          {{-- <label for="radio_3">Stripe</label>
          <input name="payment_method" type="radio" class="with-gap" value="stripe"> --}}
          <label for="">Stripe</label>
          <input type="radio" name="payment_method" value="stripe"><br>
          <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
        </div>
        <div class="col-md-4">
          <label for="">Card</label>
          <input type="radio" name="payment_method" value="card"><br>
          <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">
        </div>
        <div class="col-md-4">
          <label for="">Cash</label>
          <input type="radio" name="payment_method" value="cash"><br>
          <img src="{{ asset('frontend/assets/images/payments/6.png') }}" alt="">
        </div>
      </div><br><br>
      <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>

</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="division_id"]').on('change', function(){
        var division_id = $(this).val();
        if(division_id) {
            $.ajax({
                url: "{{  url('/district-get/ajax') }}/"+division_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   $('select[name="state_id"]').empty();
                   var d = $('select[name="district_id"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                      });
                },
            });
        } else {
            alert('danger');
        }
    });

    $('select[name="district_id"]').on('change', function(){
       var district_id = $(this).val();
       if(district_id) {
           $.ajax({
               url: "{{  url('/state-get/ajax') }}/"+district_id,
               type:"GET",
               dataType:"json",
               success:function(data) {
                  var d =$('select[name="state_id"]').empty();
                     $.each(data, function(key, value){
                         $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                     });
               },
           });
       } else {
           alert('danger');
       }
   });

});
</script>


@endsection