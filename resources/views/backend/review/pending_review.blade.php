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
				  <h3 class="box-title">Pending Reviews<span class="badge badge-pill badge-danger">{{ count($review)  }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
        <th>User</th>
								<th>Product</th>
        <th>Summary</th>
								<th>Comment</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
       @foreach ($review as $item)
        <tr>
								<td>{{ $item->user->name }}</td>
								<td>{{ $item->product->product_name_en }}</td>
								<td>{{ $item->summary }}</td>
								<td>{{ $item->comment }}</td>
								<td>
            @if($item->status == 0)
                <span class="badge badge-pill badge-primary" style="background: #057bca">Pending</span>
            @elseif($item->status == 1)
                <span class="badge badge-pill badge-success" style="background: #308120">Published</span>
            @endif
        </td> 
								<td>
         <a href="{{ route('review.approve', $item->id) }}" class="btn btn-danger">Approve</a>
         {{-- <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info btn-sm" title="View Data"><i class="fa fa-eye"></i></a>
         <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a> --}}
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