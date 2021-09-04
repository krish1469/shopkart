 @extends('frontend.main_master')
@section('content')
    
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-5">
             <div class="card">
              <div class="card-header"><h4>Shipping Details</h4></div>
              <hr>
              <div class="card-body" style="background: #E9EBEC;">
               <table class="table">
                <tr>
                 <th>Shipping Name</th>
                 <th>{{ $order->name }}</th>
                </tr>
                <tr>
                 <th>Shipping Phone</th>
                 <th>{{ $order->phone }}</th>
                </tr>
                <tr>
                 <th>Shipping Email</th>
                 <th>{{ $order->email }}</th>
                </tr>
                <tr>
                 <th>State</th>
                 <th>{{ $order->division->division_name }}</th>
                </tr>
                <tr>
                 <th>District</th>
                 <th>{{ $order->district->district_name }}</th>
                </tr>
                <tr>
                 <th>Division</th>
                 <th>{{ $order->state->state_name }}</th>
                </tr>
                <tr>
                 <th>Pincode</th>
                 <th>{{ $order->post_code }}</th>
                </tr>
                <tr>
                 <th>Order Date</th>
                 <th>{{ $order->order_date }}</th>
                </tr>
               </table>
              </div>
             </div>{{-- End card --}}
            </div>{{-- End col-md-5 --}}

            <div class="col-md-5">
             <div class="card">
              <div class="card-header"><h4>Order Details&nbsp;(&nbsp;<span class="text-danger">Invoice: {{ $order->invoice_no }}</span>&nbsp;)</h4></div>
              <hr>
              <div class="card-body" style="background: #E9EBEC;">
               <table class="table">
                <tr>
                 <th>Name</th>
                 <th>{{ $order->user->name }}</th>
                </tr>
                <tr>
                 <th>Contact Number</th>
                 <th>{{ $order->user->phone }}</th>
                </tr>
                <tr>
                 <th>Payment Type</th>
                 <th>{{ $order->payment_method }}</th>
                </tr>
                <tr>
                 <th>Transaction ID</th>
                 <th>{{ $order->transaction_id }}</th>
                </tr>
                <tr>
                 <th>Invoice</th>
                 <th>{{ $order->invoice_no }}</th>
                </tr>
                <tr>
                 <th>Order Total</th>
                 <th>₹{{ $order->amount }}.00</th>
                </tr>
                <tr>
                 <th>Order</th>
                 <th>
                  <span class="badge badge-pill badge-warning" style="background: #418D89;">{{ $order->status }}</span></th>
                </tr>
               </table>
              </div>

             </div>{{-- End card --}}
            </div>{{-- End 2nd col-md-5 --}}


            <div class="row">
             <div class="col-md-12">
              <div class="table-responsive">
               <table class="table">
                <tbody>
                 <tr style="background: #e2e2e2;">
                   <td class="col-md-1" align="center">
                    <label for="">Image</label>
                   </td>
                   <td class="col-md-3" align="center">
                    <label for="">Product Name</label>
                   </td>
                   <td class="col-md-1.5" align="center">
                    <label for="">Product Code</label>
                   </td>
                   <td class="col-md-1" align="center">
                    <label for="">Colour</label>
                   </td>
                   <td class="col-md-1" align="center">
                    <label for="">Size</label>
                   </td>
                   <td class="col-md-1" align="center">
                    <label for="">Quantity</label>
                   </td>
                   <td class="col-md-2.5" align="center">
                    <label for="">Price</label>
                   </td>
                   <td class="col-md-1" align="center">
                    <label for="">Download</label>
                   </td>
                 </tr>
                 @foreach ($orderItem as $item)
                  <tr>
                    <td class="col-md-1" align="center">
                     <label for=""><img src="{{ asset($item->product->product_thumbnail) }}" alt="" width="60px" height="60px"></label>
                    </td>
                    <td class="col-md-3" align="center">
                     <label for="">{{ $item->product->product_name_en }}</label>
                    </td>
                    <td class="col-md-1.5" align="center">
                     <label for="">{{ $item->product->product_code }}</label>
                    </td>
                    <td class="col-md-1" align="center">
                     <label for="">{{ $item->color }}</label>
                    </td>
                    <td class="col-md-1" align="center">
                     <label for="">{{ $item->size }}</label>
                    </td>
                    <td class="col-md-1" align="center">
                     <label for="">{{ $item->qty }}</label>
                    </td>
                    <td class="col-md-2.5" align="center">
                     <label for="">₹{{ $item->price }}.00 <br>( ₹{{$item->price * $item->qty}}.00 )</label>
                    </td>

                      @php
                          $file = App\Models\Product::where('id', $item->product_id)->first();
                      @endphp

                    <td class="col-md-1" align="center">
                      @if ($order->status == 'Pending')
                          <strong>
                            <span class="badge badge-pill badge-success" style="background: #418db9;">No File</span>
                          </strong>
                      @elseif($order->status == 'Confirmed')
                          <a href="{{ asset('upload/pdf/'.$file->digital_file) }}" target="_blank">
                            <strong>
                              <span class="btn btn-success" style="background: #139b40;">Download</span>
                            </strong>
                          </a>
                      @endif
                    </td>
                  </tr>
                 @endforeach
                </tbody>
               </table>
              </div>
             </div>
            </div>{{-- End ORDER ITEM ROW --}}


            @if ($order->status !== "Delivered")
                
            @else

              @php
                  $order = App\Models\Order::where('id', $order->id)->where('return_reason', '=', NULL)->first();
              @endphp
                @if($order)
                    <form action="{{ route('return.order', $order->id) }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="label">Order Return Reason</label>
                        <textarea name="return_reason" id="" class="form-control" cols="30" rows="5" placeholder="Return Reason"></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary">Return Order</button>
                    </form>
                @else
                    <span class="badge badge-pill badge-warning" style="background: #fa1d1d">You have send Return Request for this Product</span>
                @endif

            @endif
            <br><br>
            

        </div>{{-- End Row --}}
    </div>
</div>

@endsection
