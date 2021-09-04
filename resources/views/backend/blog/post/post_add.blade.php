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
			  <h3 class="box-title">Add Blog Post</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
      @csrf

					<div class="row">
						<div class="col-12">		

       <div class="row"> {{-- Start 1st row --}}
        

        <div class="col-md-6"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Blog Post Title English <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="post_title_en" class="form-control">
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
            <input type="text" name="post_title_hin" class="form-control">
             @error('post_title_hin')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}
       </div> {{-- End 1st row --}}

       <div class="row"> {{-- Start 2nd row --}}
        <div class="col-md-6"> {{-- Start col-md-4 --}}
          <div class="form-group validate">
            <h5>Select Blog Category<span class="text-danger">*</span></h5>
            <div class="controls">
              <select name="category_id" class="form-control" aria-invalid="false">
              <option value="" selected="" disabled="">Select Blog Category</option>
                @foreach ($blogcategory as $category)
                      <option value="{{ $category->id }}">{{ $category->blog_category_name_en }}</option>
                @endforeach
              </select>
              @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div> 
        </div> {{-- End col-md-4 --}}

         <div class="col-md-6">{{-- Start col-md-4 --}}
          <div class="form-group">
           <h5>Blog Post Main Thumbnail<span class="text-danger">*</span></h5>
            <div class="controls">
             <input type="file" name="post_image" class="form-control" onChange="mainThumbUrl(this)">
              @error('post_image')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
              <br>
              <img src="" id="mainThumb" alt="">
            </div>
          </div>

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

         </div> {{-- End col-md-4 --}}

         
       </div> {{-- End 2nd row --}}
							
      
							
       <div class="row"> {{-- Start 8th row --}}
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
           <h5> Blog Post Description English <span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea id="editor1" name="post_details_en" rows="10" cols="80">
               Please go through the size chart before placing the orders. Mark your solid impressions with ours ultra-soft, super cool hooded t-shirt. Wear this ultra-comfy full sleeve hooded t-shirt. Place in many ways with dark jeans, cuffed chinos. Its 100% soft cotton, solid color. Machine wash t-shirt, the material moves in every direction. Looks cool in every type of jacket so you look cool in winters as well. Its super dry and ultra-fashionable hooded must have t-shirt in your wardrobe.
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
               ऑर्डर देने से पहले कृपया आकार चार्ट देखें। हमारे अल्ट्रा-सॉफ्ट, सुपर कूल हुड वाली टी-शर्ट के साथ अपने ठोस छापों को चिह्नित करें। इस अल्ट्रा-आरामदायक फुल स्लीव हुड वाली टी-शर्ट पहनें। डार्क जींस, कफ्ड चिनोस के साथ कई तरह से लगाएं। इसका 100% सॉफ्ट कॉटन, सॉलिड कलर। मशीन वॉश टी-शर्ट, सामग्री हर दिशा में चलती है। हर तरह के जैकेट में कूल लगते हैं इसलिए आप सर्दियों में भी कूल दिखें. इसकी सुपर ड्राई और अल्ट्रा-फैशनेबल हुड वाली आपकी अलमारी में टी-शर्ट होनी चाहिए।
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
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Post">
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



@endsection
  