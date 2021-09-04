@extends('frontend.main_master')
@section('content')

@section('title')
   Blog Category Page
@endsection

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Blog Category</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">

     @foreach ($blogpost as $blog)
         <div class="blog-post  wow fadeInUp">
       <a href="{{ route('post.details', $blog->id) }}"><img class="img-responsive" src="{{ asset($blog->post_image) }}" alt=""></a>
       <h1><a href="{{ route('post.details', $blog->id) }}">@if (session()->get('language') == 'hindi') {{ $blog->post_title_hin }} @else {{ $blog->post_title_en }} @endif</a></h1>
       <span class="date-time">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
       <p>@if (session()->get('language') == 'hindi') {!! Str::limit($blog->post_details_hin, 300) !!} @else {!! Str::limit($blog->post_details_en, 300) !!} @endif</p>
       <a href="{{ route('post.details', $blog->id) }}" class="btn btn-upper btn-primary read-more">@if (session()->get('language') == 'hindi') अधिक पढ़ें @else Read more @endif</a>
     </div>
     @endforeach
					

										{{-- Pagination Link --}}
              {{ $blogpost->links('vendor.pagination.custom_down') }}
          {{-- End Pagination Link --}}
									
									
					</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>		

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
</div>
				<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">
     {{-- <div class="accordion-group">
         <div class="accordion-heading">
             <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed">
                Camera
             </a>
         </div><!-- /.accordion-heading -->
         <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
             <div class="accordion-inner">
                 <ul>
                     <li><a href="#">gaming</a></li>
                     <li><a href="#">office</a></li>
                     <li><a href="#">kids</a></li>
                     <li><a href="#">for women</a></li>
                 </ul>
             </div><!-- /.accordion-inner -->
         </div><!-- /.accordion-body -->
     </div><!-- /.accordion-group --> --}}

     @foreach ($blogcategory as $category)
         <ul class="list-group list-group-flush">
           <a href="{{ url('blog/category/post/'.$category->id) }}"><li class="list-group-item">@if (session()->get('language') == 'hindi') {{ $category->blog_category_name_hin }} @else {{ $category->blog_category_name_en }} @endif</li></a>
         </ul>
     @endforeach


	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->						
 {{-- <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
    <h3 class="section-title">tab widget</h3>
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#popular" data-toggle="tab">popular post</a></li>
	  <li><a href="#recent" data-toggle="tab">recent post</a></li>
	</ul>
	<div class="tab-content" style="padding-left:0">
	   <div class="tab-pane active m-t-20" id="popular">
		<div class="blog-post inner-bottom-30 " >
			<img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
				<span class="review">6 Comments</span>
			<span class="date-time">12/06/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
		<div class="blog-post" >
			<img class="img-responsive" src="assets/images/blog-post/blog_big_02.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="review">6 Comments</span>
			<span class="date-time">23/06/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
	</div>

	<div class="tab-pane m-t-20" id="recent">
		<div class="blog-post inner-bottom-30" >
			<img class="img-responsive" src="assets/images/blog-post/blog_big_03.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="review">6 Comments</span>
			<span class="date-time">5/06/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
		<div class="blog-post">
			<img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
			<h4><a href="blog-details.html">Simple Blog Post</a></h4>
			<span class="review">6 Comments</span>
			<span class="date-time">10/07/16</span>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			
		</div>
	</div>
	</div>
</div> --}}
						<!-- ============================================== PRODUCT TAGS ============================================== -->
@include('frontend.common.product_tags')
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brand')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
</div>



	





@endsection