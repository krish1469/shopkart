<!DOCTYPE html>
<html lang="en">

@php
    $seo = App\Models\Seo::find(1);
@endphp

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{ $seo->meta_description }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="keywords" content="{{ $seo->meta_keyword }}">
<meta name="robots" content="all">

<!-- Google Analytics -->
<script>
  {{ $seo->google_analytics }}
</script>

<!-- Google Verification -->
<meta name="google-site-verification" content="{{ $seo->google_verification }}">

<!-- Alexa Analytics -->
<script>
  {{ $seo->alexa_analytics }}
</script>

<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

{{-- Toaster --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- End Toaster --}}

{{-- Stripe Payment --}}
<script src="https://js.stripe.com/v3/"></script>
{{-- End Stripe Payment --}}



<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>




{{-- SweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- End Sweet Alert --}}


{{-- Toaster Script --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
      @if(Session::has('message'))
      var type = "{{ Session::get('alert-type', 'info') }}"
      switch(type) {
        case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;
          
        case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;

        case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;

        case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
      }
      @endif
    </script>
  {{-- End of Toaster Script --}}

{{-- ================================ Add to Cart Page Modal ============================================--}}
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span></strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" id="closeModel">&times;</span>
            </button>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="" alt="Card image cap" style="height: 100%; width: 250px;" id="pimage">
                </div>
              </div> {{-- End col-md-4 --}}
              <div class="col-md-4">
                <ul class="list-group">
                  <li class="list-group-item">Price : <strong class="text-danger">&#x20B9;<span id="pprice"></span></strong>&nbsp;
                    <del><span id="oldprice"></span></del></li>
                  <li class="list-group-item">Code : <strong id="pcode"></strong></li>
                  <li class="list-group-item">Category : <strong id="pcategory"></strong></li>
                  <li class="list-group-item">Brand : <strong id="pbrand"></strong></li>
                  <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="available" style="background: green; text-color: white;"></span>
                  <span class="badge badge-pill badge-danger" id="outofstock" style="background: red; text-color: white;"></span></li>
                </ul>
              </div> {{-- End col-md-4 --}}
              <div class="col-md-4">
                <div class="form-group" id="colorArea">
                  <label for="color">Choose Colour</label>
                  <select class="form-control" id="color" name="color">
                  </select>
                </div>

                <div class="form-group" id="sizeArea">
                  <label for="size">Choose Size</label>
                  <select class="form-control" id="size" name="size">
                  </select>
                </div>

                <div class="form-group">
                  <label for="qty">Quantity</label>
                  <input type="number" class="form-control" id="qty" value="1" min="1">
                </div>

                <input type="hidden" id="product_id">
                <button type="submit" class="btn btn-primary mb-2" style="float: right;" onclick="addToCart()">ADD TO CART</button>
              </div> {{-- End col-md-4 --}}
            </div>
          </div> {{-- End modal-body --}}
          {{-- <div class="modal-footer"> --}}
            {{-- <button type="submit" class="btn btn-primary mb-2">Add to Cart</button> --}}
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- </div> --}}
        </div>
      </div>
    </div>

{{-- ================================ End Add to Cart Page Modal =========================================--}}

<script type="text/javascript">
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

  // Start Product View with Modal 
  function productView(id) {
    // alert(id)
    $.ajax({
      type: 'GET',
      url: '/product/view/modal/'+id,
      dataType: 'json',
      success:function(data) {
        // console.log(data);
        $('#pname').text(data.product.product_name_en);
        $('#price').text(data.product.selling_price);
        $('#pcode').text(data.product.product_code);
        $('#pcategory').text(data.product.category.category_name_en);
        $('#pbrand').text(data.product.brand.brand_name_en);
        $('#pimage').attr('src','/'+data.product.product_thumbnail);

        $('#product_id').val(id);
        $('#qty').val(1);

        // Product Price
        if(data.product.discount_price == null) {
          $('#pprice').text('');
          $('#oldprice').text('');
          $('#pprice').text(data.product.selling_price);
        }else {
          $('#pprice').text(data.product.discount_price);
          $('#oldprice').text(data.product.selling_price);
        }

        // Stocks
        if(data.product.product_qty > 0) {
          $('#available').text('');
          $('#outofstock').text('');
          $('#available').text('Available');
        }else {
          $('#available').text('');
          $('#outofstock').text('');
          $('#outofstock').text('Out Of Stock');
        }

        // Color
        $('select[name="color"]').empty();
        $.each(data.color,function(key,value){
          $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
          if(data.color == "") {
            $('#colorArea').hide();
          }else {
            $('#colorArea').show();
          }
        })

        // Size
        $('select[name="size"]').empty();
        $.each(data.size,function(key,value){
          $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')
          if(data.size == "") {
            $('#sizeArea').hide();
          }else {
            $('#sizeArea').show();
          }
        })
      }
    })
  }


// ================================ Add To Cart Product ==========================================  //
  function addToCart() {
    var product_name = $('#pname').text();
    var id = $('#product_id').val();
    var color = $('#color option:selected').text();
    var size = $('#size option:selected').text();
    var quantity = $('#qty').val();
    $.ajax({
      type: "POST",
      dataType: 'json',
      data:{
        color:color, size:size, quantity:quantity, product_name:product_name
      },
      url: "/cart/data/store/"+id,
      success:function(data) {
        miniCart()
        $('#closeModel').click();
        // console.log(data)
        // SweetAlert Message
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        // title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    if($.isEmptyObject(data.error)) {
                      Toast.fire({
                        type: 'success',
                        title: data.success
                      })
                    }else {
                      Toast.fire({
                        type: 'error',
                        title: data.error
                      })
                    }
        // End SweetAlert
      }
    })
  }
</script>

<script type="text/javascript">
  function miniCart() {
    $.ajax({
      type: 'GET',
      url: '/product/mini/cart',
      dataType: 'json',
      success:function(response) {
        // console.log(response)
        $('span[id="cartSubTotal"]').text(response.cartTotal);
        $('#cartQty').text(response.cartQty);
        var miniCart = ""
        $.each(response.carts, function(key,value){
          miniCart += `<div class="cart-item product-summary">
                        <div class="row">
                          <div class="col-xs-4">
                            <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                          </div>
                          <div class="col-xs-7">
                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                            <div class="price">${value.price} * ${value.qty}</div>
                          </div>
                          <div class="col-xs-1 action"><button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button></div>
                        </div>
                      </div>
                      <br>`
        });
        $('#miniCart').html(miniCart);
      }
    })
  }
  miniCart();

  // Start Mini Cart Remove //
  function miniCartRemove(rowId) {
    $.ajax({
      type: 'GET',
      url: '/minicart/product-remove/'+rowId,
      dataType: 'json',
      success:function(data) {
        miniCart();
        // SweetAlert Message
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        // title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    if($.isEmptyObject(data.error)) {
                      Toast.fire({
                        type: 'success',
                        title: data.success
                      })
                    }else {
                      Toast.fire({
                        type: 'error',
                        title: data.error
                      })
                    }
        // End SweetAlert
      }
    })
  }

  // End Mini Cart Remove //
</script>

{{-- Start Add Wishlist Page --}}

<script type="text/javascript">
  function addToWishList(product_id){
    $.ajax({
      type: "POST",
      dataType: 'json',
      url:"/add-to-wishlist/"+product_id,
      success:function(data){
        // SweetAlert Message
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    if($.isEmptyObject(data.error)) {
                      Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                      })
                    }else {
                      Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                      })
                    }
        // End SweetAlert
      }
    })
  }
</script>

{{-- End Add Wishlist Page --}}

{{-- Start WishList Data --}}

<script type="text/javascript">
  function wishlist() {
    $.ajax({
      type: 'GET',
      url: '/user/get-wishlist-product',
      dataType: 'json',
      success:function(response) {    
        var rows = ""
        $.each(response, function(key,value){
          rows += `<tr>
                        <td class="col-md-2"><img src="/${value.product.product_thumbnail}" alt="image"></td>
                        <td class="col-md-7">
                          <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                          {{-- <div class="rating">
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star rate"></i>
                            <i class="fa fa-star non-rate"></i>
                            <span class="review">( 06 Reviews )</span>
                          </div> --}}
                          <div class="price">
                            ${value.product.discount_price == null
                              ? `${value.product.selling_price}`
                              : `${value.product.discount_price} <span>${value.product.selling_price}</span>`
                            }
                          </div>
                        </td>
                        <td class="col-md-2">
                          <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.product_id}" onclick="productView(this.id)">ADD TO CART</button>
                        </td>
                        <td class="col-md-1 close-btn">
                          <button type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>`
        });
        $('#wishlist').html(rows);
      }
    })
  }
  wishlist();

  // Start Wishlist Remove //
  function wishlistRemove(id) {
    $.ajax({
      type: 'GET',
      url: '/user/wishlist-remove/'+id,
      dataType: 'json',
      success:function(data) {
        wishlist();
        // SweetAlert Message
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    if($.isEmptyObject(data.error)) {
                      Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                      })
                    }else {
                      Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                      })
                    }
        // End SweetAlert
      }
    })
  }

  // End Wishlist Remove //
</script>

{{-- End WishList Data --}}

{{-- Start MyCart Page --}}
<script type="text/javascript">
  function cart() {
    $.ajax({
      type: 'GET',
      url: '/user/get-cart-product',
      dataType: 'json',
      success:function(response) {    
        var rows = ""
        $.each(response.carts, function(key,value){
          rows +=`<tr>
                    
                    <td class="cart-image">
                      <a class="entry-thumbnail" href="detail.html">
                          <img src="/${value.options.image}" alt="" style="width: 60px; height: 60px">
                      </a>
                    </td>

                    <td class="cart-product-name-info col-md-4" style="text-align:center;">
                      <h4 class='cart-product-description'><a href="detail.html"><strong>${value.name}</strong></a></h4>
                    </td>

                    <td class="cart-product-name-info col-md-1" style="text-align:center; vertical-align: middle;">
                      <div class="cart-product-info">
                          <span class="product-color">${value.options.color == null
                                                              ? `<strong><span> -- </span></strong>`
                                                              : `<strong>${value.options.color}</strong>`
                                                            }
                          </span>
                      </div>
                    </td>

                    <td class="cart-product-name-info col-md-1" style="text-align:center;">
                      <div class="cart-product-info">
                          <span class="product-color">${value.options.size == null
                                                              ? `<strong><span> -- </span></strong>`
                                                              : `<strong>${value.options.size}</strong>`
                                                            }
                          </span>
                      </div>
                    </td>
                    
                    <td class="cart-product-quantity">
                      <div class="quant-input">
                        <div class="arrows">
                          <div class="arrow plus gradient" id="${value.rowId}" onclick="cartIncreament(this.id)"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                          ${value.qty > 1
                          ?`<div class="arrow minus gradient" id="${value.rowId}" onclick="cartDecreament(this.id)"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>`
                          
                          :`<div class="arrow minus gradient" disabled=""><span class="ir" disabled=""><i class="icon fa fa-sort-desc" disabled=""></i></span></div>`
                          }
                        </div>
                        <input type="text" value="${value.qty}" min="1" max="100" disabled="">
                      </div>
                    </td>

                    <td class="cart-product-sub-total col-md-2"><span class="cart-sub-total-price"><strong>₹ ${value.subtotal}</strong></span></td>
                    
                    <td class="col-md-1 close-btn">
                      <button type="submit" id="${value.rowId}" onclick="cartRemove(this.id)" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>

                  </tr>`
        });
        $('#cartPage').html(rows);
      }
    })
  }
  cart();

  // Start Cart Remove //
  function cartRemove(id) {
    $.ajax({
      type: 'GET',
      url: '/user/cart-remove/'+id,
      dataType: 'json',
      success:function(data) {
        couponCalculation();
        cart();
        miniCart();
        $('#couponField').show();
        $('#coupon_name').val('');
        // SweetAlert Message
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    if($.isEmptyObject(data.error)) {
                      Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                      })
                    }else {
                      Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                      })
                    }
        // End SweetAlert
      }
    })
  }

  // End Cart Remove //

// Start Cart Increament //
function cartIncreament(rowId) {
  $.ajax({
    type: 'GET',
    url: "/cart-increament/"+rowId,
    dataType: 'json',
    success:function(data) {
      couponCalculation();
      cart();
      miniCart();
    }
  });
}
// End Cart Increament //

// Start Cart Decreament //
function cartDecreament(rowId) {
  $.ajax({
    type: 'GET',
    url: "/cart-decreament/"+rowId,
    dataType: 'json',
    success:function(data) {
      couponCalculation();
      cart();
      miniCart();
    }
  });
}
// End Cart Decreament //

</script>

{{-- End MyCart Page --}}


{{-- Start Coupon Apply --}}

<script type="text/javascript">
  function applyCoupon() {
    var coupon_name = $('#coupon_name').val();
    $.ajax({
      type: 'POST',
      dataType: 'json',
      data: {coupon_name:coupon_name},
      url: "{{ url('/coupon-apply') }}",
      success:function(data) {
        couponCalculation();
        if(data.validity == true) {
          $('#couponField').hide();
        }
        // SweetAlert Message
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    if($.isEmptyObject(data.error)) {
                      Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                      })
                    }else {
                      Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                      })
                      $('#couponField').show();
                    }
                    
        // End SweetAlert
      }
    })
  }

  // 
  
  function couponCalculation() {
    $.ajax({
      type: 'GET',
      url: "{{ url('coupon-calculation') }}",
      dataType: 'json',
      success:function(data) {
        if(data.total) {
          $('#couponCalField').html(
            `<tr>
              <th>
                <div class="cart-sub-total">
                  Subtotal<span class="inner-left-md">₹ ${data.total}</span>
                </div>
                <div class="cart-grand-total">
                  Grand Total<span class="inner-left-md">₹ ${data.total}</span>
                </div>
              </th>
            </tr>`
          )
        }else {
          $('#couponCalField').html(
            `<tr>
              <th>
                <div class="cart-sub-total">
                  <span style="float:left;">Subtotal</span><span class="inner-left-md">₹ ${data.subtotal}</span>
                </div>
                <div class="cart-sub-total">
                  <span style="float:left;">Coupon</span><span class="inner-left-md">${data.coupon_name}</span>
                  <button type="submit" onclick="couponRemove()"><i class="fa fa-trash"></i></button>
                </div>
                <div class="cart-sub-total">
                  <span style="float:left;">Discount Amount</span><span class="inner-left-md">₹ ${data.discount_amount}</span>
                </div>
                <div class="cart-grand-total">
                  <span style="float:left;">Grand Total</span><span class="inner-left-md">₹ ${data.total_amount}</span>
                </div>
              </th>
            </tr>`
          ) 
        }
      }
    });
  }
  couponCalculation();
</script>

{{-- End Coupon Apply --}}

{{-- Start Coupon Remove --}}

<script type="text/javascript">
  function couponRemove(){
    $.ajax({
      type: 'GET',
      url: "{{ url('/coupon-remove') }}",
      dataType: 'json',
      success:function(data) {
        couponCalculation();
        $('#couponField').show();
        $('#coupon_name').val('');
        // SweetAlert Message
        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        // title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 3000
                      })
                    if($.isEmptyObject(data.error)) {
                      Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                      })
                    }else {
                      Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                      })
                    }
        // End SweetAlert
      }
    });
  }
</script>

{{-- End Coupon Remove --}}

</body>
</html>