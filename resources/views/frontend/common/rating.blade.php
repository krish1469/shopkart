        <style type="text/css">
        .checked {
            color: orange;
        }
        </style>

        @php
            $reviewcount = App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->get();
            $average = App\Models\Review::where('product_id', $product->id)->where('status', 1)->avg('rating');
        @endphp

        <div class="rating-reviews m-t-20">
            @if ($average == 0)
                <b style="color: #888787"> No Rating Yet </b>
            @elseif($average == 1 || $average < 2)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>

            @elseif($average == 2 || $average < 3)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>

            @elseif($average == 3 || $average < 4)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>

            @elseif($average == 4 || $average < 5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>

            @elseif($average == 5)
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
            @endif
        </div>

        {{-- <div class="col-sm-9">
            <div class="reviews">
                <a href="#" class="lnk"><b>({{ count($reviewcount) }} Reviews)</b></a>
            </div>
        </div> --}}