@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
 <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Create Admin User</h4>
			</div>
			<!-- /.box-header -->
	<div class="box-body">
			<div class="row">
				<div class="col">
   <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
    @csrf
     <div class="row">
						<div class="col-12">			
       
       <div class="row">
        <div class="col-md-6">
          <div class="form-group">
								    <h5>Admin Username<span class="text-danger">*</span></h5>
								  <div class="controls">
									   <input type="text" name="name" class="form-control"></div>
							   </div>
          @error('name')
               <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-md-6">
          	<div class="form-group">
								     <h5>Admin User Email<span class="text-danger">*</span></h5>
								   <div class="controls">
									    <input type="email" name="email" class="form-control"></div>
							    </div>
           @error('email')
                <span class="text-danger">{{ $message }}</span>
           @enderror
         </div>
       </div> {{-- End row --}}

       <div class="row">
        <div class="col-md-6">
          <div class="form-group">
								    <h5>Admin User Contact Number{{-- <span class="text-danger">*</span> --}}</h5>
								  <div class="controls">
									   <input type="text" name="phone" class="form-control"></div>
							   </div>
          {{-- @error('phone')
               <span class="text-danger">{{ $message }}</span>
          @enderror --}}
        </div>

        <div class="col-md-6">
          	<div class="form-group">
								     <h5>Admin User Password<span class="text-danger">*</span></h5>
								   <div class="controls">
									    <input type="password" name="password" class="form-control"></div>
							    </div>
           @error('password')
                <span class="text-danger">{{ $message }}</span>
           @enderror
         </div>
       </div> {{-- End row --}}

       <div class="row">
        <div class="col-md-6">
          <div class="form-group">
								   <h5>Admin User Image</h5>
           <div class="controls">
            <input type="file" name="profile_photo_path" class="form-control" id="image">
           </div>
							   </div>
         </div>

         <div class="col-md-6">
          <img src="{{ url('upload/no_image.jpg')}}" alt="" style="width: 100px; height: 100px;" id="showImage">
         </div>
       </div>{{-- End row --}}

       <br>

       <div class="row">
        
        <div class="col-md-4">
          <fieldset>
            <input type="checkbox" id="md_checkbox_1" class="chk-col-primary" name="brand" value="1">
            <label for="md_checkbox_1">Brand</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_2" class="chk-col-success" name="category" value="1">
            <label for="md_checkbox_2">Category</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_3" class="chk-col-info" name="product" value="1">
            <label for="md_checkbox_3">Products</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_4" class="chk-col-warning" name="slider" value="1">
            <label for="md_checkbox_4">Sliders</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_5" class="chk-col-danger" name="coupons" value="1">
            <label for="md_checkbox_5">Coupons</label>
          </fieldset>
        </div>

        <div class="col-md-4">
          <fieldset>
            <input type="checkbox" id="md_checkbox_6" class="chk-col-primary" name="shipping" value="1">
            <label for="md_checkbox_6">Shipping Area</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_7" class="chk-col-success" name="blog" value="1">
            <label for="md_checkbox_7">Blogs</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_8" class="chk-col-info" name="setting" value="1">
            <label for="md_checkbox_8">Settings</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_9" class="chk-col-warning" name="orders" value="1">
            <label for="md_checkbox_9">Orders</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_10" class="chk-col-danger" name="returnorders" value="1">
            <label for="md_checkbox_10">Returned Orders</label>
          </fieldset>
        </div>

        <div class="col-md-4">
          <fieldset>
            <input type="checkbox" id="md_checkbox_11" class="chk-col-primary" name="stock" value="1">
            <label for="md_checkbox_11">Stocks</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_12" class="chk-col-success" name="review" value="1">
            <label for="md_checkbox_12">Reviews</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_13" class="chk-col-info" name="reports" value="1">
            <label for="md_checkbox_13">All Reports</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_14" class="chk-col-warning" name="alluser" value="1">
            <label for="md_checkbox_14">All Users</label>
          </fieldset>
          <fieldset>
            <input type="checkbox" id="md_checkbox_15" class="chk-col-danger" name="adminuserrole" value="1">
            <label for="md_checkbox_15">Admin Users Role</label>
          </fieldset>
        </div>

       </div>{{-- End row --}}

       <hr>

       <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-info" value="Add Admin User">
       </div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
</div>

<script type="text/javascript">
 $(document).ready(function(){
  $('#image').change(function(e){
   var reader = new FileReader();
   reader.onload = function(e){
    $('#showImage').attr('src',e.target.result);
   }
   reader.readAsDataURL(e.target.files['0']);
  });
 });
</script>

@endsection
