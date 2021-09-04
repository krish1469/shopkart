@extends('frontend.main_master')
@section('content')
    
<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')

            <div class="col-md-2">

            </div>{{-- End col-md-2 --}}

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hi, &nbsp;</span><strong>{{ Auth::user()->name }}</strong>&nbsp; Welcome to Shopkart!</h3>
                </div>
            </div>{{-- End col-md-6 --}}
        </div>{{-- End Row --}}
    </div>
</div>

@endsection
