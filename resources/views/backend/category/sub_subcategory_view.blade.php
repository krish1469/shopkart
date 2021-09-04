@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<!-- Content Wrapper. Contains page content -->
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub-Sub Category List <span class="badge badge-pill badge-danger">{{ count($subsubcategory)  }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
        <th>Category</th>
								<th>Sub Category </th>
								<th>Sub-Sub Category English</th>
								{{-- <th>Sub-Sub Category Hindi</th> --}}
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
       @foreach ($subsubcategory as $item)
        <tr>
								<td>{{ $item['category']['category_name_en']  }}</td>
								<td>{{ $item['subcategory']['subcategory_name_en']  }}</td>
								<td>{{ $item->subsubcategory_name_en }}</td>
								{{-- <td>{{ $item->subsubcategory_name_hin }}</td> --}}
								<td>
         <a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
         <a href="{{ route('subsubcategory.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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


    {{-- ------------------------ Add Sub Category Page --------------------------- --}}

   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Sub-Sub Category</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('subsubcategory.store') }}">
        @csrf

          <div class="form-group validate">
           <h5>Select Category<span class="text-danger">*</span></h5>
           <div class="controls">
            <select name="category_id" class="form-control" aria-invalid="false">
             <option value="" selected="" disabled="">Select Category</option>
               @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
               @endforeach
            </select>
             @error('category_id')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
          </div>
      
          <div class="form-group validate">
           <h5>Select Sub Category<span class="text-danger">*</span></h5>
           <div class="controls">
            <select name="subcategory_id" class="form-control" aria-invalid="false">
             <option value="" selected="" disabled="">Select Sub Category</option>
           
            </select>
             @error('subcategory_id')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
          </div>
      
          <div class="form-group">
								    <h5>Sub-Sub Category English<span class="text-danger">*</span></h5>
								     <div class="controls">
									       <input type="text" name="subsubcategory_name_en" class="form-control"> 
             </div>
             @error('subsubcategory_name_en')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
							   </div>

          <div class="form-group">
								    <h5>Sub-Sub Category Hindi<span class="text-danger">*</span></h5>
								     <div class="controls">
									      <input type="text" name="subsubcategory_name_hin" class="form-control">
             </div>
             @error('subsubcategory_name_hin')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
							   </div> 

          <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add New">
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

 <script type="text/javascript">
 $(document).ready(function() {
  $('select[name="category_id"]').on('change', function() {
   var category_id = $(this).val();
   if(category_id) {
    $.ajax({
     url: "{{ url('/category/subcategory/ajax') }}/"+category_id,
     type: "GET",
     dataType: "json",
     success:function(data) {
      var d = $('select[name="subcategory_id"]').empty();
      $.each(data, function(key, value){
       $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
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