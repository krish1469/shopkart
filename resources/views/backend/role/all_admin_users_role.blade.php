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
				  <h3 class="box-title">Total Admin Users Roles<span class="badge badge-pill badge-danger">{{ count($adminuser)  }}</span></h3>
      <span><a href="{{ route('add.adminusers') }}" class="btn btn-info" style="float: right;">Add Admin User </a></span>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <table id="example1" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Email</th>
          <th>Access</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
         @foreach ($adminuser as $item)
          <tr>
          <td><img src="{{ asset($item->profile_photo_path) }}" alt="" style="width: 50px; height: 50px;"></td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->email }}</td>
          <td>

              @if($item->brand == 1)
                  <span class="badge badge-pill btn-primary">Brand</span>
              @else
              
              @endif 

              @if($item->category == 1)
                  <span class="badge badge-pill btn-info">Category</span>
              @else

              @endif 
              
              @if($item->product == 1)
                  <span class="badge badge-pill btn-warning">Products</span>
              @else

              @endif 

              @if($item->slider == 1)
                  <span class="badge badge-pill btn-success">Sliders</span>
              @else

              @endif 

              @if($item->coupons == 1)
                  <span class="badge badge-pill btn-danger">Coupons</span>
              @else

              @endif 

              @if($item->shipping == 1)
                  <span class="badge badge-pill btn-primary">Shipping Area</span>
              @else

              @endif 

              @if($item->blog == 1)
                  <span class="badge badge-pill btn-info">Blogs</span>
              @else

              @endif

              @if($item->setting == 1)
                  <span class="badge badge-pill btn-warning">Settings</span>
              @else

              @endif

              @if($item->orders == 1)
                  <span class="badge badge-pill btn-success">Orders</span>
              @else

              @endif 

              @if($item->returnorders == 1)
                  <span class="badge badge-pill btn-danger">Returned Orders</span>
              @else

              @endif

              @if($item->stock == 1)
                  <span class="badge badge-pill btn-primary">Stocks</span>
              @else

              @endif

              @if($item->review == 1)
                  <span class="badge badge-pill btn-info">Reviews</span>
              @else

              @endif 

              @if($item->reports == 1)
                  <span class="badge badge-pill btn-warning">All Reports</span>
              @else

              @endif 

              @if($item->alluser == 1)
                  <span class="badge badge-pill btn-success">All Users</span>
              @else

              @endif 

              @if($item->adminuserrole == 1)
                  <span class="badge badge-pill btn-danger">Admin Users Role</span>
              @else

              @endif 

          </td> 
          <td>
           <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-info btn-sm" title="View Data"><i class="fa fa-eye"></i></a>
           <a href="{{ route('delete.admin.user',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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