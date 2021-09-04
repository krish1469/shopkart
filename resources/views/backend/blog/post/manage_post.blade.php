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
				  <h3 class="box-title">Blog Post List <span class="badge badge-pill badge-danger">{{ count($blogpost)  }}</span></h3>
      <span><a href="{{ route('add.post') }}" class="btn btn-info" style="float: right;">Add Blog Post</a></span>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Post Category</th>
								<th>Post Image</th>
								<th>Post Title English</th>
								<th>Post Title Hindi</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
       @foreach ($blogpost as $item)
        <tr>
								<td>{{ $item['blogpostcategory']['blog_category_name_en'] }}</td>
								<td><img src="{{ asset($item->post_image) }}" alt="" style="width: 60px; height: 60px;"></td>
								<td>{{ $item->post_title_en }}</td>
								<td>{{ $item->post_title_hin }}</td> 
								<td width="15%">
         <a href="{{ route('blog.post.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
         <a href="{{ route('blog.post.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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