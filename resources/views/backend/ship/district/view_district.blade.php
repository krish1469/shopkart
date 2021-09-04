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
				  <h3 class="box-title">District List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
        <th>Division Name</th>
        <th>District Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
       @foreach ($district as $item)
        <tr>
								<td>{{ $item->division->division_name }}</td>
								<td>{{ $item->district_name }}</td>
								<td>
         <a href="{{ route('district.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
         <a href="{{ route('district.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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


    {{-- ------------------------ Add Coupon Page --------------------------- --}}

   <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add District</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('district.store') }}">
        @csrf

          <div class="form-group validate">
           <h5>Select Division<span class="text-danger">*</span></h5>
           <div class="controls">
            <select name="division_id" class="form-control" aria-invalid="false">
             <option value="" selected="" disabled="">Select Division</option>
               @foreach ($division as $div)
                    <option value="{{ $div->id }}">{{ $div->division_name }}</option>
               @endforeach
            </select>
             @error('division_id')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
          </div>
      
          <div class="form-group">
								    <h5>District Name<span class="text-danger">*</span></h5>
								     <div class="controls">
									       <input type="text" name="district_name" class="form-control"> 
             </div>
             @error('district_name')
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

    
@endsection