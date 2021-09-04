@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
 <section class="content">

    <!-- Basic Forms -->
    <div class="box">
      <div class="box-header with-border">
        <h4 class="box-title">SEO Settings</h4>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col">
            <form method="POST" action="{{ route('update.seo.setting') }}">
              @csrf
              <input type="hidden" name="id" value="{{ $seo->id }}">
               <div class="row">
                <div class="col-12">			
                 
                 <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <h5>Meta Title</h5>
                      <div class="controls">
                       <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}">
                      </div>
                    </div> 
                    
                    <div class="form-group">
                      <h5>Meta Author</h5>
                      <div class="controls">
                       <input type="text" name="meta_author" class="form-control" value="{{ $seo->meta_author }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Meta Keyword</h5>
                      <div class="controls">
                       <input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}">
                      </div>
                    </div>

                    <div class="form-group">
                     <h5>Meta Description</h5>
                      <div class="controls">
                       <textarea name="meta_description" id="textarea" class="form-control">{{ $seo->meta_description }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                     <h5>Google Analytics</h5>
                      <div class="controls">
                       <textarea name="google_analytics" id="textarea" class="form-control">{{ $seo->google_analytics }}</textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <h5>Google Verification</h5>
                      <div class="controls">
                       <input type="text" name="google_verification" class="form-control" value="{{ $seo->google_verification }}">
                      </div>
                    </div>

                    <div class="form-group">
                     <h5>Alexa Analytics</h5>
                      <div class="controls">
                       <textarea name="alexa_analytics" id="textarea" class="form-control">{{ $seo->alexa_analytics }}</textarea>
                      </div>
                    </div>

                  </div> {{-- End col-md-6 --}}
                 </div> {{-- End row --}}

                 <div class="text-xs-right">
                  <input type="submit" class="btn btn-rounded btn-info" value="Update">
                 </div>

                </div> {{-- End col-12 --}}
               </div> {{-- End row --}}
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
</div>

@endsection
