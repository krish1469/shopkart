@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">

    {{-- ------------------------ Add Brand Page --------------------------- --}}

   <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Slider</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('slider.update') }}" enctype="multipart/form-data">
        @csrf

          <input type="hidden" name="id" value="{{ $sliders->id }}">	
          <input type="hidden" name="old_image" value="{{ $sliders->slider_img }}">
      
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
									       <input type="text" name="title_en" class="form-control" value="{{ $sliders->title_en }}"> 
             </div>
							   </div>

          <div class="form-group">
								    <h5>Slider Title Hindi</h5>
								     <div class="controls">
									      <input type="text" name="title_hin" class="form-control" value="{{ $sliders->title_hin }}">
             </div>
							   </div> 
          
          <div class="form-group">
								    <h5>Slider Description English</h5>
								     <div class="controls">
									       <input type="text" name="description_en" class="form-control" value="{{ $sliders->description_en }}"> 
             </div>
							   </div>

          <div class="form-group">
								    <h5>Slider Description Hindi</h5>
								     <div class="controls">
									      <input type="text" name="description_hin" class="form-control" value="{{ $sliders->description_hin }}">
             </div>
							   </div> 

          <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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