@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">All Returned Orders List <span class="badge badge-pill badge-danger">{{ count($orders)  }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
        <th>Date</th>
								<th>Invoice</th>
								<th>Amount</th>
								<th>Payment</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
       @foreach ($orders as $item)
        <tr>
								<td>{{ $item->order_date }}</td>
								<td>{{ $item->invoice_no }}</td>
								<td>₹{{ $item->amount }}.00</td>
								<td>{{ $item->payment_method }}</td>
								<td>
            @if($item->return_order == 1)
                {{-- <span class="badge badge-pill badge-warning" style="background: #f14646">Return Requested</span> --}}
                <span class="badge badge-pill badge-primary" style="background: #057bca">Pending</span>
            @elseif($item->return_order == 2)
                <span class="badge badge-pill badge-success" style="background: #308120">Return Approved</span>
            @endif
        </td> 
								<td>
            <span class="badge badge-pill badge-success" style="background: #308120">Return Approved</span>
         {{-- <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info btn-sm" title="View Data"><i class="fa fa-eye"></i></a>
         <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
         <a target="_blank" href="{{ route('invoice.download',$item->id) }}" class="btn btn-danger btn-sm" title="Invoice Download"><i class="fa fa-download"></i></a> --}}
        </td>
							</tr>  
       @endforeach
							
      </tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
    </div>
    <!-- /.box -->
        
			</div>
			<!-- /.col -->

   </div>
   <!-- /.row -->
		</section>
		<!-- /.content -->
  
 </div>

    
@endsection