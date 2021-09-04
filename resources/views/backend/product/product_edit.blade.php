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
			  <h3 class="box-title">Edit Product</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('product.update') }}">
      @csrf
      <input type="hidden" name="id" value="{{ $products->id }}">
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
                    <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected':'' }}>{{ $brand->brand_name_en }}</option>
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
                    <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected':'' }}>{{ $category->category_name_en }}</option>
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
               @foreach ($subcategory as $subcat)
                    <option value="{{ $subcat->id }}" {{ $subcat->id == $products->subcategory_id ? 'selected':'' }}>{{ $subcat->subcategory_name_en }}</option>
               @endforeach
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
               @foreach ($subsubcategory as $subsubcat)
                    <option value="{{ $subsubcat->id }}" {{ $subsubcat->id == $products->subsubcategory_id ? 'selected':'' }}>{{ $subsubcat->subsubcategory_name_en }}</option>
               @endforeach
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
            <input type="text" name="product_name_en" class="form-control" value="{{ $products->product_name_en }}">
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
            <input type="text" name="product_name_hin" class="form-control" value="{{ $products->product_name_hin }}">
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
            <input type="text" name="product_code" class="form-control" value="{{ $products->product_code }}">
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
            <input type="text" name="product_qty" class="form-control" value="{{ $products->product_qty }}">
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
            <input type="text" name="product_tags_en" class="form-control" data-role="tagsinput" value="{{ $products->product_tags_en }}">
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
             <input type="text" name="product_tags_hin" class="form-control" data-role="tagsinput" value="{{ $products->product_tags_hin }}">
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
             <input type="text" name="product_size_en" class="form-control" data-role="tagsinput" value="{{ $products->product_size_en }}">
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
             <input type="text" name="product_size_hin" class="form-control" data-role="tagsinput" value="{{ $products->product_size_hin }}">
              {{-- @error('product_size_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-4 --}}
       </div> {{-- End 4th row --}}
							
       <div class="row"> {{-- Start 5th row --}}
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
           <h5>Product Colour English{{-- <span class="text-danger">*</span> --}}</h5>
            <div class="controls">
             <input type="text" name="product_color_en" class="form-control" data-role="tagsinput" value="{{ $products->product_color_en }}">
              {{-- @error('product_color_en')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-6 --}}

         <div class="col-md-6"> {{-- Start col-md-6 --}}
          <div class="form-group">
           <h5>Product Colour Hindi{{-- <span class="text-danger">*</span> --}}</h5>
            <div class="controls">
             <input type="text" name="product_color_hin" class="form-control" data-role="tagsinput" value="{{ $products->product_color_hin }}">
              {{-- @error('product_color_hin')
                   <span class="text-danger">{{ $message }}</span>
              @enderror --}}
            </div>
          </div>
         </div> {{-- End col-md-6 --}}  
       </div> {{-- End 5th row --}}

       <div class="row"> {{-- Start 6th row --}}
         <div class="col-md-6"> {{-- Start col-md-6 --}}
          <div class="form-group">
          <h5>Product Selling Price <span class="text-danger">*</span></h5>
           <div class="controls">
            <input type="text" name="selling_price" class="form-control" value="{{ $products->selling_price }}">
             @error('selling_price')
                  <span class="text-danger">{{ $message }}</span>
             @enderror
           </div>
         </div>
         </div> {{-- End col-md-6 --}}
							
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
           <h5>Product Discount Price <span class="text-danger">*</span></h5>
            <div class="controls">
             <input type="text" name="discount_price" class="form-control" value="{{ $products->discount_price }}">
              @error('discount_price')
                   <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
          </div>
         </div> {{-- End col-md-6 --}}

         {{-- <div class="col-md-4">Start col-md-4 --}}
          

         {{-- </div> End col-md-4 --}}

         {{-- <div class="col-md-4"> Start col-md-4 --}}
          
         {{-- </div> End col-md-4 --}}
       </div> {{-- End 6th row --}}
							
       <div class="row"> {{-- Start 8th row --}}
        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
           <h5> Short Description English <span class="text-danger">*</span></h5>
            <div class="controls">
             <textarea name="short_descp_en" id="textarea" class="form-control">{!! $products->short_descp_en !!}</textarea>
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
             <textarea name="short_descp_hin" id="textarea" class="form-control">{!! $products->short_descp_hin !!}</textarea>
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
                  {!! $products->long_descp_en !!}
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
                   {!! $products->long_descp_hin !!}
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
            <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $products->hot_deals == 1 ? 'checked':'' }}>
            <label for="checkbox_2">Hot Deals</label>
           </fieldset>
           <fieldset>
            <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $products->featured == 1 ? 'checked':'' }}>
            <label for="checkbox_3">Featured Products</label>
           </fieldset>
          </div>
         </div>
        </div> {{-- End col-md-6 --}}

        <div class="col-md-6"> {{-- Start col-md-6 --}}
         <div class="form-group">
          <div class="controls">
           <fieldset>
            <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $products->special_offer == 1 ? 'checked':'' }}>
            <label for="checkbox_4">Special offers</label>
           </fieldset>
           <fieldset>
            <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $products->special_deals == 1 ? 'checked':'' }}>
            <label for="checkbox_5">Special Deals</label>
           </fieldset>
          </div>
         </div>
        </div> {{-- End col-md-6 --}}
       </div> {{-- End 9th row --}}

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Product">
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

{{-------------------------------Start Multiple Images Update Area------------------------------------------}}

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box bt-3 border-info">
        <div class="box-header">
          <h4 class="box-title">Product Multiple Images &nbsp;<strong>Update</strong></h4>
        </div>
         <form action="{{ route('update.product.images') }}" method="POST" enctype="multipart/form-data">
           @csrf
            <div class="col-md-12">
              <div class="row row-sm"> 
                   @foreach ($multiImgs as $img)
                     <div class="col-md-3">
                       <div class="card">
                        <img class="card-img-top" src="{{ asset($img->photo_name) }}" style="height: 130px; width:280px;">
                           <div class="card-body">
                             <h5 class="card-title">
                               <a href="{{ route('product.multiimg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                             </h5>
                               <p class="card-text">
                                 <div class="form-group">
                                    <label for="" class="form-control-label">Change Image<span class="tx-danger">*</span> </label>
                                    <input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
                                 </div>
                               </p>
                           </div>
                       </div>
                     </div> {{-- End col-md-3 --}}
                   @endforeach
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

{{------------------------------------- End Multi Images Updated Area---------------------------------------}}

{{-------------------------------------Start Main Thumbnail Update Area------------------------------------}}

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box bt-3 border-info">
        <div class="box-header">
          <h4 class="box-title">Product Thumbnail Image &nbsp;<strong>Update</strong></h4>
        </div>
         <form action="{{ route('update.product.thumbnail') }}" method="POST" enctype="multipart/form-data">
           @csrf
           <input type="hidden" name="id" value="{{ $products->id }}">
           <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">
           <div class="col-md-12">
              <div class="row row-sm"> 
                     <div class="col-md-3">
                       <div class="card">
                        <img class="card-img-top" src="{{ asset($products->product_thumbnail) }}" style="height: 130px; width:280px;">
                           <div class="card-body">
                               <p class="card-text">
                                 <div class="form-group">
                                    <label for="" class="form-control-label">Change Image<span class="tx-danger">*</span> </label>
                                    <input type="file" name="product_thumbnail" class="form-control" onChange="mainThumbUrl(this)"><br>
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

{{-------------------------------------End Main Thumbnail Update Area---------------------------------------}}










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
  