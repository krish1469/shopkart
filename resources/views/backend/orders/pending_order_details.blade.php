@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
	<div class="container-full">
		<!-- Content Header (Page header) -->
  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Order Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Order Details</li>
								{{-- <li class="breadcrumb-item active" aria-current="page">Basic Box</li> --}}
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
    <div class="row">


    <div class="col-md-6 col-12">
      <div class="box box-bordered border-primary">
        <div class="box-header with-border">
          <h4 class="box-title"><strong>Shipping Details</strong></h4>
        </div>
        <table class="table">
         <tr>
          <th>Shipping Name</th>
          <th>{{ $order->name }}</th>
         </tr>
         <tr>
          <th>Shipping Phone</th>
          <th>{{ $order->phone }}</th>
         </tr>
         <tr>
          <th>Shipping Email</th>
          <th>{{ $order->email }}</th>
         </tr>
         <tr>
          <th>State</th>
          <th>{{ $order->division->division_name }}</th>
         </tr>
         <tr>
          <th>District</th>
          <th>{{ $order->district->district_name }}</th>
         </tr>
         <tr>
          <th>Division</th>
          <th>{{ $order->state->state_name }}</th>
         </tr>
         <tr>
          <th>Pincode</th>
          <th>{{ $order->post_code }}</th>
         </tr>
         <tr>
          <th>Order Date</th>
          <th>{{ $order->order_date }}</th>
         </tr>
        </table>
      </div>
    </div>

    <div class="col-md-6 col-12">
      <div class="box box-bordered border-primary">
        <div class="box-header with-border">
          <h4 class="box-title"><strong>Order Details</strong>&nbsp;(&nbsp;<span class="text-danger">Invoice: {{ $order->invoice_no }}</span>&nbsp;)</h4>
        </div>
        <table class="table">
         <tr>
          <th>Name</th>
          <th>{{ $order->user->name }}</th>
         </tr>
         <tr>
          <th>Contact Number</th>
          <th>{{ $order->user->phone }}</th>
         </tr>
         <tr>
          <th>Payment Type</th>
          <th>{{ $order->payment_method }}</th>
         </tr>
         <tr>
          <th>Transaction ID</th>
          <th>{{ $order->transaction_id }}</th>
         </tr>
         <tr>
          <th>Invoice</th>
          <th class="text-danger">{{ $order->invoice_no }}</th>
         </tr>
         <tr>
          <th>Order Total</th>
          <th>₹{{ $order->amount }}.00</th>
         </tr>
         <tr>
          <th>Order</th>
          <th>
           <span class="badge badge-pill badge-warning" style="background: #418D89;">{{ $order->status }}</span></th>
         </tr>
         <tr>
          <th></th>
          <th>
            @if ($order->status == 'Pending')
                <a href="{{ route('pending-confirm', $order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
            @elseif($order->status == 'Confirmed')
                <a href="{{ route('confirm-processing', $order->id) }}" class="btn btn-block btn-success" id="process">Process Order</a>
            @elseif($order->status == 'Processing')
                <a href="{{ route('processing-picked', $order->id) }}" class="btn btn-block btn-success" id="picked">Pick Order</a>
            @elseif($order->status == 'Picked')
                <a href="{{ route('picked-shipped', $order->id) }}" class="btn btn-block btn-success" id="shipped">Ship Order</a>
            @elseif($order->status == 'Shipped')
                <a href="{{ route('shipped-delivered', $order->id) }}" class="btn btn-block btn-success" id="delivered">Deliver Order</a>
            @elseif($order->status == 'Delivered')
                <a href="{{ route('delivered-cancelled', $order->id) }}" class="btn btn-block btn-success" id="cancelled">Cancel Order</a>
            @endif
          </th>
         </tr>
        </table>
      </div>
    </div>

    <div class="col-md-12 col-12">
      <div class="box box-bordered border-primary">
        {{-- <div class="box-header with-border">
          <h4 class="box-title"><strong>Bordered</strong> box</h4>
        </div> --}}
        <table class="table">
          <tbody>
           <tr>
             <td width="10%" align="center">
              <h5><label for=""><strong>Image</strong></label></h5>
             </td>
             <td width="30%" align="center">
              <h5><label for=""><strong>Product Name</strong></label></h5>
             </td>
             <td width="10%" align="center">
              <h5><label for=""><strong>Product Code</strong></label></h5>
             </td>
             <td width="10%" align="center">
              <h5><label for=""><strong>Colour</strong></label></h5>
             </td>
             <td width="10%" align="center">
              <h5><label for=""><strong>Size</strong></label></h5>
             </td>
             <td width="10%" align="center">
              <h5><label for=""><strong>Quantity</strong></label></h5>
             </td>
             <td width="10%" align="center">
              <h5><label for=""><strong>Price</strong></label></h5>
             </td>
           </tr>
           @foreach ($orderItem as $item)
            <tr>
              <td width="10%" align="center">
               <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" alt="" width="60px" height="60px"></label>
              </td>
              <td width="30%" align="center">
               <label for="">{{ $item->product->product_name_en }}</label>
              </td>
              <td width="10%" align="center">
               <label for="">{{ $item->product->product_code }}</label>
              </td>
              <td width="10%" align="center">
               <label for="">{{ $item->color }}</label>
              </td>
              <td width="10%" align="center">
               <label for="">{{ $item->size }}</label>
              </td>
              <td width="10%" align="center">
               <label for="">{{ $item->qty }}</label>
              </td>
              <td width="10%" align="center">
               <label for="">₹{{ $item->price }}.00 <br>( ₹{{$item->price * $item->qty}}.00 )</label>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <!-- /.row -->
		</section>
		<!-- /.content -->
  
</div>

    
@endsection