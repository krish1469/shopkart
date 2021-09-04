@extends('frontend.main_master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
   Cash on Delivery
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Cash on Delivery</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Shopping Amount</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

      @if (Session::has('coupon'))
      <div class="row">
       <div class="col-md-4">
          <strong style="float: right;">Subtotal</strong>
       </div>
       <div class="col-md-8">
          <strong style="float: right;">₹&nbsp;{{ $cartTotal }}</strong>
       </div>
      </div><br>
          
      <div class="row">
       <div class="col-md-4">
          <strong style="float: right;">Coupon Name</strong>
       </div>
       <div class="col-md-8">
          <strong style="float: right;">{{ session()->get('coupon')['coupon_name'] }}({{ session()->get('coupon')['coupon_discount'] }}%)</strong>
       </div>
      </div><br>

      <div class="row">
       <div class="col-md-4">
          <strong style="float: right;">Coupon Discount</strong>
       </div>
       <div class="col-md-8">
           <strong style="float: right; color: #f12020;">₹&nbsp;{{ session()->get('coupon')['discount_amount'] }}.00</strong>
       </div>
      </div><br>
      <div class="row">
       <div class="col-md-4">
           <h4><strong style="float: right; color: #008015;">Grand Total</strong></h4>
       </div>
       <div class="col-md-8">
           <h4><strong style="float: right; color: #008015">₹&nbsp;{{ session()->get('coupon')['total_amount'] }}.00</strong></h4>
       </div>
      </div>
      @else
      <div class="row">
       <div class="col-md-3">
         <strong style="float: right;">Subtotal</strong>
       </div>
       <div class="col-md-9">
         <strong style="float: right;">₹&nbsp;{{ $cartTotal }}</strong>
       </div>
      </div><br>
      <div class="row">
       <div class="col-md-3">
         <h4><strong style="float: right; color: #008015;">Grand Total</strong></h4>
       </div>
       <div class="col-md-9">
         <h4><strong style="float: right; color: #008015;">₹&nbsp;{{ $cartTotal }}</strong></h4>
       </div>
      </div>
      @endif
     </li>
				
				</ul>		
   
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				
</div>


<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
      <h4 class="unicase-checkout-title">Select Payment Method</h4>
     </div>
      <form action="{{ route('cash.order') }}" method="post" id="payment-form">
        @csrf
         <div class="form-row">
          <img src="{{ asset('frontend/assets/images/payments/cash.png') }}" alt="">
             <label for="card-element">
             {{-- Credit or debit card --}}
               <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
               <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
               <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
               <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
               <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
               <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
               <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
               <input type="hidden" name="notes" value="{{ $data['notes'] }}">
             </label>              
             <div id="card-element">
             <!-- A Stripe Element will be inserted here. -->
             </div>
             <!-- Used to display form errors. -->
             <div id="card-errors" role="alert"></div>
         </div>
         <br>
      <button class="btn btn-primary">Submit Payment</button>
      </form>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->			
</div>{{-- end col-md-6 --}}

</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->





@endsection