@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Slider List <span class="badge badge-pill badge-danger">{{ count($sliders)  }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Slider Image</th>
								<th>Title English</th>
								<th>Description English</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
       @foreach ($sliders as $item)
        <tr>
								<td><img src="{{ asset($item->slider_img) }}" style="width: 70px; height: 40px;" alt=""></td>
        <td>
            @if ($item->title_en == NULL)
                <span class="badge badge-pill badge-danger">No Title</span>
            @else
                {{ $item->title_en }}
            @endif
        </td>
								<td>
            @if ($item->description_en == NULL)
                <span class="badge badge-pill badge-danger">No Description</span>
            @else
                {{ $item->description_en }}
            @endif
        </td>
        <td>
            @if ($item->status == 1)
                <span class="badge badge-pill badge-success">Active</span>
            @else
                <span class="badge badge-pill badge-danger">Inactive</span>
            @endif
        </td>
								<td width="20%">
         <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-pencil"></i></a>
         <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
         @if ($item->status == 1)
             <a href="{{ route('slider.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i></a>
         @else
             <a href="{{ route('slider.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i></a>
         @endif
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


    {{-- ------------------------ Add Slider Page --------------------------- --}}

   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
        @csrf
      
          <div class="form-group">
								    <h5>Slider Image<span class="text-danger">*</span></h5>
             <div class="controls">
              <input type="file" name="slider_img" class="form-control">
             </div>
             @error('slider_img')
                 <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>

          <div class="form-group">
								    <h5>Slider Title English</h5>
								     <div class="controls">
									       <input type="text" name="title_en" class="form-control"> 
             </div>
							   </div>

          <div class="form-group">
								    <h5>Slider Title Hindi</h5>
								     <div class="controls">
									      <input type="text" name="title_hin" class="form-control">
             </div> 
							   </div> 
          
          <div class="form-group">
								    <h5>Slider Description English</h5>
								     <div class="controls">
									       <input type="text" name="description_en" class="form-control"> 
             </div>
							   </div>

          <div class="form-group">
								    <h5>Slider Description Hindi</h5>
								     <div class="controls">
									      <input type="text" name="description_hin" class="form-control">
             </div> 
							   </div> 
          
          

          <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Slider">
          </div>

					</form>
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