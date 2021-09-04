@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">


    {{-- ------------------------ Edit Blog Category Page --------------------------- --}}

   <div class="col-12">

    <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Add Blog Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('blogcategory.update') }}">
        @csrf 
          <input type="hidden" name="id" value="{{ $blogcategory->id }}">
      
          <div class="form-group">
            <h5>Blog Category Name English<span class="text-danger">*</span></h5>
             <div class="controls">
                <input type="text" name="blog_category_name_en" class="form-control" value="{{ $blogcategory->blog_category_name_en }}"> 
             </div>
             @error('blog_category_name_en')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>

          <div class="form-group">
            <h5>Blog Category Name Hindi<span class="text-danger">*</span></h5>
             <div class="controls">
               <input type="text" name="blog_category_name_hin" class="form-control" value="{{ $blogcategory->blog_category_name_hin }}">
             </div>
             @error('blog_category_name_hin')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
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