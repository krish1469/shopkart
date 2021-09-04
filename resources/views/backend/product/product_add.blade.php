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
			  <h3 class="box-title">Add Product</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
      @csrf

					<div class="row">
						<div class="col-12">		
       
       <div class="row"> {{-- Start 1st row --}}
        <div class="col-md-4"> {{-- Start col-md-4 --}}
          <div class="form-group validate">
            <h5>Select Brand<span class="text-danger">*</span></h5>
            <div class="controls">
              <select name="brand_id" class="form-control" aria-invalid="false">
              <option value="" selected="" disabled="">Select Brand</option>
                @foreach ($brands as $brand)
                      <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
                @endforeach
              </select>
              @error('brand_id')
                    <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div> 
        </div> {{-- End col-md-4 --}}

        <div class="col-md-4"> {{-- Start col-md-4 --}}
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
        </div> {{-- End col-md-4 --}}

        <div class="col-md-4"> {{-- Start col-md-4 --}}
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
        </div> {{-- End col-md-4 --}}
       </div> {{-- End 1st row --}}

       <div class="row"> {{-- Start 2nd row --}}
        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group validate">
           <h5>Select Sub-Sub Category<span class="text-danger">*</span></h5>
           <div class="controls">
            <select name="subsubcategory_id" class="form-control" aria-invalid="false">
             <option value="" selected="" disabled="">Select Sub-Sub Category</option>
              
            </select>
             @error('subsubcategory_id')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
          </div> 
        </div> {{-- End col-md-4 --}}

        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Product Name English <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="product_name_en" class="form-control">
             @error('product_name_en')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}

        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Product Name Hindi <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="product_name_hin" class="form-control">
             @error('product_name_hin')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}
       </div> {{-- End 2nd row --}}

       <div class="row"> {{-- Start 3rd row --}}
        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Product Code <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="product_code" class="form-control">
             @error('product_code')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}

        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Product Quantity <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="product_qty" class="form-control">
             @error('product_qty')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}

        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
          <h5>Product Tags English <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="product_tags_en" class="form-control" value="Round,Casual,Hooded" data-role="tagsinput" placeholder="Add Tags">
             @error('product_tags_en')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
        </div> {{-- End col-md-4 --}}
       </div> {{-- End 3rd row --}}
							
       <div class="row"> {{-- Start 4th row --}}
        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
           <h5>Product Tags Hindi <span class="text-danger">*</span></h5>
            <div class="controls">
             <input type="text" name="product_tags_hin" class="form-control" value="Round,Casual,Hooded" data-role="tagsinput" placeholder="Add Tags">
              @error('product_tags_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-4 --}}

         <div class="col-md-4"> {{-- Start col-md-4 --}}
          <div class="form-group">
           <h5>Product Size English {{-- <span class="text-danger">*</span> --}}</h5>
            <div class="controls">
             <input type="text" name="product_size_en" class="form-control" value="Small,Medium,Large" data-role="tagsinput" placeholder="Add Tags">
              {{-- @error('product_size_en')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-4 --}}

         <div class="col-md-4"> {{-- Start col-md-4 --}}
          <div class="form-group">
           <h5>Product Size Hindi {{-- <span class="text-danger">*</span> --}}</h5>
            <div class="controls">
             <input type="text" name="product_size_hin" class="form-control" value="Small,Medium,Large" data-role="tagsinput" placeholder="Add Tags">
              {{-- @error('product_size_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-4 --}}
       </div> {{-- End 4th row --}}
							
       <div class="row"> {{-- Start 5th row --}}
        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
           <h5>Product Colour English {{-- <span class="text-danger">*</span> --}}</h5>
            <div class="controls">
             <input type="text" name="product_color_en" class="form-control" value="Red,White,Yellow" data-role="tagsinput" placeholder="Add Tags">
              {{-- @error('product_color_en')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-4 --}}

         <div class="col-md-4"> {{-- Start col-md-4 --}}
          <div class="form-group">
           <h5>Product Colour Hindi {{-- <span class="text-danger">*</span> --}}</h5>
            <div class="controls">
             <input type="text" name="product_color_hin" class="form-control" value="Red,White,Yellow" data-role="tagsinput" placeholder="Add Tags">
              {{-- @error('product_color_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-4 --}}

         <div class="col-md-4"> {{-- Start col-md-4 --}}
          <div class="form-group">
          <h5>Product Selling Price <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="selling_price" class="form-control">
             @error('selling_price')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
         </div> {{-- End col-md-4 --}}
       </div> {{-- End 5th row --}}
							
       <div class="row"> {{-- Start 6th row --}}
        <div class="col-md-4"> {{-- Start col-md-4 --}}
         <div class="form-group">
           <h5>Product Discount Price {{-- <span class="text-danger">*</span> --}}</h5>
            <div class="controls">
             <input type="text" name="discount_price" class="form-control">
              {{-- @error('discount_price')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-4 --}}

         <div class="col-md-4">{{-- Start col-md-4 --}}
          <div class="form-group">
           <h5>Product Main Thumbnail<span class="text-danger">*</span></h5>
            <div class="controls">
             <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumbUrl(this)">
              @error('product_thumbnail')
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

         <div class="col-md-4"> {{-- Start col-md-4 --}}
          <div class="form-group">
          <h5>Product Multiple Images <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
             @error('multi_img')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
             <div class="row" id="preview_img" style="margin: 2px 7px;"></div>
           </div>
         </div>
         </div> {{-- End col-md-4 --}}
       </div> {{-- End 6th row --}}
							
       <div class="row"> {{-- Start 8th row --}}
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
           <h5> Short Description English <span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea name="short_descp_en" id="textarea" class="form-control"></textarea>
              @error('short_descp_en')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-6 --}}

         <div class="col-md-6"> {{-- Start col-md-6 --}}
          <div class="form-group">
           <h5>Short Description Hindi<span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea name="short_descp_hin" id="textarea" class="form-control"></textarea>
              @error('short_descp_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-6 --}}
       </div> {{-- End 7th row --}}
							
       <div class="row"> {{-- Start 8th row --}}
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
           <h5> Long Description English <span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea id="editor1" name="long_descp_en" rows="10" cols="80">
               Please go through the size chart before placing the orders. Mark your solid impressions with ours ultra-soft, super cool hooded t-shirt. Wear this ultra-comfy full sleeve hooded t-shirt. Place in many ways with dark jeans, cuffed chinos. Its 100% soft cotton, solid color. Machine wash t-shirt, the material moves in every direction. Looks cool in every type of jacket so you look cool in winters as well. Its super dry and ultra-fashionable hooded must have t-shirt in your wardrobe.
             </textarea>
              @error('long_descp_en')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-6 --}}

         <div class="col-md-6"> {{-- Start col-md-6 --}}
          <div class="form-group">
           <h5>Long Description Hindi<span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea id="editor2" name="long_descp_hin" rows="10" cols="80">
               ऑर्डर देने से पहले कृपया आकार चार्ट देखें। हमारे अल्ट्रा-सॉफ्ट, सुपर कूल हुड वाली टी-शर्ट के साथ अपने ठोस छापों को चिह्नित करें। इस अल्ट्रा-आरामदायक फुल स्लीव हुड वाली टी-शर्ट पहनें। डार्क जींस, कफ्ड चिनोस के साथ कई तरह से लगाएं। इसका 100% सॉफ्ट कॉटन, सॉलिड कलर। मशीन वॉश टी-शर्ट, सामग्री हर दिशा में चलती है। हर तरह के जैकेट में कूल लगते हैं इसलिए आप सर्दियों में भी कूल दिखें. इसकी सुपर ड्राई और अल्ट्रा-फैशनेबल हुड वाली आपकी अलमारी में टी-शर्ट होनी चाहिए।
             </textarea>
              @error('long_descp_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-6 --}}
       </div> {{-- End 8th row --}}

       <hr>

       <div class="row"> {{-- Start 9th row --}}      
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
          <div class="controls">
           <fieldset>
            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
            <label for="checkbox_2">Hot Deals</label>
           </fieldset>
           <fieldset>
            <input type="checkbox" id="checkbox_3" name="featured" value="1">
            <label for="checkbox_3">Featured Products</label>
           </fieldset>
          </div>
         </div>
        </div> {{-- End col-md-6 --}}

        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
          <div class="controls">
           <fieldset>
            <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
            <label for="checkbox_4">Special offers</label>
           </fieldset>
           <fieldset>
            <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
            <label for="checkbox_5">Special Deals</label>
           </fieldset>
          </div>
         </div>
        </div> {{-- End col-md-6 --}}
       </div> {{-- End 9th row --}}

      <div class="row">{{-- Start 10th row --}}
        <div class="col-md-6">{{-- Start col-md-6 --}}
          <div class="form-group">
            <h5>Digital Product&nbsp;<span class="text-danger">pdf,xlxs,docx,csv</span></h5>
            <div class="controls">
              <input type="file" name="file" class="form-control" onChange="mainThumbUrl(this)">
              {{-- @error('product_thumbnail')
                    <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
        </div>{{-- End col-md-6 --}}
      </div>{{-- End 10th row --}}

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Add Product">
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
  $(document).ready(function() {
    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{  url('/category/subcategory/ajax') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   $('select[name="subsubcategory_id"]').html('');
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                      });
                },
            });
        } else {
            alert('danger');
        }
    });

    $('select[name="subcategory_id"]').on('change', function(){
       var subcategory_id = $(this).val();
       if(subcategory_id) {
           $.ajax({
               url: "{{  url('/category/sub-subcategory/ajax') }}/"+subcategory_id,
               type:"GET",
               dataType:"json",
               success:function(data) {
                  var d =$('select[name="subsubcategory_id"]').empty();
                     $.each(data, function(key, value){
                         $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
                     });
               },
           });
       } else {
           alert('danger');
       }
   });

});
</script>

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

<script type="text/javascript">
  $(document).ready(function(){
    $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
</script>



@endsection
  