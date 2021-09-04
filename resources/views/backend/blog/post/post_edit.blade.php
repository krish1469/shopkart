@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	  <div class="container-full">
		<!-- Content Header (Page header) -->  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Edit Blog Post</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('post.data.update') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $blogpost->id }}">
					<div class="row">
						<div class="col-12">		

       <div class="row"> {{-- Start 1st row --}}
        

        <div class="col-md-6"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Blog Post Title English <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="post_title_en" class="form-control" value="{{ $blogpost->post_title_en }}">
             @error('post_title_en')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}

        <div class="col-md-6"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Blog Post Title Hindi <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="post_title_hin" class="form-control" value="{{ $blogpost->post_title_hin }}">
             @error('post_title_hin')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}
       </div> {{-- End 1st row --}}

       <div class="row"> {{-- Start 2nd row --}}
        <div class="col-md-12"> {{-- Start col-md-4 --}}
          <div class="form-group validate">
            <h5>Select Blog Category<span class="text-danger">*</span></h5>
            <div class="controls">
              <select name="category_id" class="form-control" aria-invalid="false">
              <option value="" selected="" disabled="">Select Blog Category</option>
                @foreach ($blogcategory as $category)
                      <option value="{{ $category->id }}" {{ $category->id == $blogpost->category_id ? 'selected': '' }}>{{ $category->blog_category_name_en }}</option>
                @endforeach
              </select>
              @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div> 
        </div> {{-- End col-md-4 --}}

         {{-- <div class="col-md-4"> Start col-md-4
          <div class="form-group row">
           <h5>Product Main Thumbnail<span class="text-danger">*</span></h5>
            <div class="custom-file">
             <label class="custom-file-label" for="customFile"></label>
             <input type="file" name="product_thumbnail" class="custom-file-input" onChange="mainThumbUrl(this)">
            
              @error('product_thumbnail')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div><br><br>
            <img src="" id="mainThumb" alt="">
          </div> --}}


						{{-- <label class="col-form-label col-lg-2">Custom BS file input</label>
						<div class="col-lg-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile">
								<label class="custom-file-label" for="customFile">Choose file</label>
							</div>
						</div>
					</div> --}}

        

         
       </div> {{-- End 2nd row --}}
							
      
							
       <div class="row"> {{-- Start 8th row --}}
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
           <h5> Blog Post Description English <span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea id="editor1" name="post_details_en" rows="10" cols="80">
               {{ $blogpost->post_details_en }}
             </textarea>
              @error('post_details_en')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-6 --}}

         <div class="col-md-6"> {{-- Start col-md-6 --}}
          <div class="form-group">
           <h5>Blog Post Description Hindi<span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea id="editor2" name="post_details_hin" rows="10" cols="80">
              {{ $blogpost->post_details_hin }}
             </textarea>
              @error('post_details_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-6 --}}
       </div> {{-- End 8th row --}}

       <hr>

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update" style="float: left">
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
		<!-- /.content -->

  {{-- ================================= Blog Post Thumbnail Image ================================ --}}

  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box bt-3 border-info">
        <div class="box-header">
          <h4 class="box-title">Blog Post Main Thumbnail Image</h4>
        </div>
         <form action="{{ route('update.post.thumbnail') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $blogpost->id }}">
           <input type="hidden" name="old_img" value="{{ $blogpost->post_image }}">
           <div class="col-md-12">
              <div class="row row-sm"> 
                     <div class="col-md-3">
                       <div class="card">
                        <img class="card-img-top" src="{{ asset($blogpost->post_image) }}" style="height: 130px; width:280px;">
                           <div class="card-body">
                               <p class="card-text">
                                 <div class="form-group">
                                    <label for="" class="form-control-label">Change Image<span class="tx-danger">*</span> </label>
                                    <input type="file" name="post_image" class="form-control" onChange="mainThumbUrl(this)"><br>
                                    <img src="" id="mainThumb" alt="">
                                 </div>
                               </p>
                           </div>
                       </div>
                     </div> {{-- End col-md-3 --}}
              </div>

              <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Image">
              </div>
              <br><br>
           </div>
         </form>
      </div>
    </div>
  </div> {{-- End Row --}}
</section>



	  </div>



<script type="text/javascript">
  function mainThumbUrl(input){
    if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) {
       $('#mainThumb').attr('src',e.target.result).width(80).height(80);
     };
     reader.readAsDataURL(input.files[0]);
    }
  }
</script>

{{-- <script type="text/javascript">
  function mainThumbUrl(input){
    if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function(e) {
       $('#mainThumb').attr('src',e.target.result).width(80).height(80);
     };
     reader.readAsDataURL(input.files[0]);
    }
  }
</script> --}}



@endsection
  