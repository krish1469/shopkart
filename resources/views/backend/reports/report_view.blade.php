@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">




    {{-- ------------------------ Add Search Page --------------------------- --}}

  <div class="col-4">

			<div class="box">
				<div class="box-header with-border">
       <h3 class="box-title">Search by Date</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('search-by-date') }}">
        @csrf
      
         <div class="form-group">
           <h5>Select Date<span class="text-danger">*</span></h5>
            <div class="controls">
               <input type="date" name="date" class="form-control"> 
            </div>
            @error('date')
                 <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>

         <div class="text-xs-right">
           <input type="submit" class="btn btn-rounded btn-info mb-5" value="Search">
         </div>

       </form>
     </div>
    </div>
				<!-- /.box-body -->
   </div>
    <!-- /.box -->
		</div>
   <!-- /.col -->

   
  <div class="col-4">

			<div class="box">
				<div class="box-header with-border">
       <h3 class="box-title">Search by Month</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('search-by-month') }}">
        @csrf
      
         <div class="form-group">
           <h5>Select Month<span class="text-danger">*</span></h5>
            <div class="controls">
             <select name="month" class="form-control">
               <option label="Select Month" selected="" disabled=""></option>
               <option value="January">January</option>
               <option value="February">February</option>
               <option value="March">March</option>
               <option value="April">April</option>
               <option value="May">May</option>
               <option value="June">June</option>
               <option value="July">July</option>
               <option value="August">August</option>
               <option value="September">September</option>
               <option value="October">October</option>
               <option value="November">November</option>
               <option value="December">December</option>
             </select>
            </div>
            @error('month')
                 <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>

         <div class="form-group">
           <h5>Select Year<span class="text-danger">*</span></h5>
            <div class="controls">
             <select name="year" class="form-control">
               <option label="Select Year" selected="" disabled=""></option>
               <option value="2021">2021</option>
               <option value="2022">2022</option>
               <option value="2023">2023</option>
               <option value="2024">2024</option>
               <option value="2025">2025</option>
               <option value="2026">2026</option>
               <option value="2027">2027</option>
               <option value="2028">2028</option>
               <option value="2029">2029</option>
               <option value="2030">2030</option>
             </select>
            </div>
            @error('year')
                 <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>


         <div class="text-xs-right">
           <input type="submit" class="btn btn-rounded btn-info mb-5" value="Search">
         </div>

       </form>
     </div>
    </div>
				<!-- /.box-body -->
   </div>
    <!-- /.box -->
		</div>
   <!-- /.col -->

   
  <div class="col-4">

			<div class="box">
				<div class="box-header with-border">
       <h3 class="box-title">Search by Year</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
       <form method="POST" action="{{ route('search-by-year') }}">
        @csrf
      
         <div class="form-group">
           <h5>Select Year<span class="text-danger">*</span></h5>
            <div class="controls">
             <select name="year" class="form-control">
               <option label="Select Year" selected="" disabled=""></option>
               <option value="2021">2021</option>
               <option value="2022">2022</option>
               <option value="2023">2023</option>
               <option value="2024">2024</option>
               <option value="2025">2025</option>
               <option value="2026">2026</option>
               <option value="2027">2027</option>
               <option value="2028">2028</option>
               <option value="2029">2029</option>
               <option value="2030">2030</option>
             </select>
            </div>
            @error('year')
                 <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>


         <div class="text-xs-right">
           <input type="submit" class="btn btn-rounded btn-info mb-5" value="Search">
         </div>

       </form>
     </div>
    </div>
				<!-- /.box-body -->
   </div>
    <!-- /.box -->
		</div>
   <!-- /.col -->

   
   


       {{-- ------------------------ End Add Search Page --------------------------- --}}



   </div>
   <!-- /.row -->
		</section>
		<!-- /.content -->
  
 </div>

    
@endsection