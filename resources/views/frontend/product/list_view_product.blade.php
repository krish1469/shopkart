@foreach ($products as $product)
  <div class="category-product-inner wow fadeInUp">
    <div class="products">
      <div class="product-list product">
        <div class="row product-list-row">
          <div class="col col-sm-4 col-lg-4">
            <div class="product-image">
              <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
            </div>
            <!-- /.product-image --> 
          </div>
          <!-- /.col -->
          <div class="col col-sm-8 col-lg-8">
            <div class="product-info">
              <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if (session()->get('language') == 'hindi'){{ $product->product_name_hin }} @else {{ $product->product_name_en }} @endif</a></h3>

              @include('frontend.common.rating')

                @if ($product->discount_price==NULL)
                    <div class="product-price"> <span class="price">&#x20B9;{{ $product->selling_price }}</span> </div>
                @else
                    <div class="product-price"> <span class="price">&#x20B9;{{ $product->discount_price }}</span><span class="price-before-discount">&#x20B9;{{ $product->selling_price }}</span> </div>
                @endif
              <!-- /.product-price -->
              <div class="description m-t-10">@if (session()->get('language') == 'hindi'){{ $product->short_descp_hin }} @else {{ $product->short_descp_en }} @endif</div>
              <div class="cart clearfix animate-effect">
                <div class="action">
                  <ul class="list-unstyled">
                    <li class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" type="button" title="Add to Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                      <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary cart-btn" type="button">ADD TO CART</button>
                    </li>
                    <li>
                      <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add to Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                    </li>
                    <li>
                      <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Compare"> <i class="fa fa-signal"></i> </button>
                    </li>
                    {{-- <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li> --}}
                  </ul>
                </div>
                <!-- /.action --> 
              </div>
              <!-- /.cart --> 
              
            </div>
            <!-- /.product-info --> 
          </div>
          <!-- /.col --> 
        </div>
        <!-- /.product-list-row -->
          @php
              $amount = $product->selling_price - $product->discount_price;
              $discount = ($amount/$product->selling_price) * 100;
          @endphp
        <div>
          @if ($product->discount_price==NULL)
              <div class="tag new"><span>new</span></div>
          @else
              <div class="tag hot"><span>{{ round($discount) }}%</span></div>
          @endif
      </div>
      </div>
      <!-- /.product-list --> 
    </div>
    <!-- /.products --> 
  </div>
@endforeach

<!-- /.category-product-inner -->