<div class="flash-container">
	@if(Session::has('message'))
	  <div class="alert {{ Session::get('alert-class') }} text-center" style="margin-bottom:10px;" role="alert">
	    {{ Session::get('message') }}
	    <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
	  </div>
	@endif

	@if (session('status'))
	    <div class="alert alert-success font-weight-700">
	        {!! session('status') !!}
	        <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
	    </div>
	@endif

	@if (session('warning'))
	    <div class="alert alert-warning font-weight-700">
	        {{ session('warning') }}
	        <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
	    </div>
	@endif

	@if (session('success'))
	    <div class="alert alert-success font-weight-700">
	        {{ session('success') }}
	        <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
	    </div>
	@endif

	@if (session('error'))
	    <div class="alert alert-danger font-weight-700">
	        {{ session('error') }}
	        <a href="#" style="float:right;" class="alert-close" data-dismiss="alert">&times;</a>
	    </div>
	@endif
</div>

<script src="{{ asset('jquery/jquery.min.js')}}"></script>
{{-- <script>
	@if(Session::has('success'))
		toastr.info("{{ Session::get('message') }}");
	@endif
	@if(Session::has('message'))
	  var type = "{{ Session::get('alert-type', 'info') }}";
	  switch(type){
		  case 'info':
			  toastr.info("{{ Session::get('message') }}");
			  break;
		  
		  case 'warning':
			  toastr.warning("{{ Session::get('message') }}");
			  break;
  
		  case 'success':
			  toastr.success("{{ Session::get('message') }}");
			  break;
  
		  case 'error':
			  toastr.error("{{ Session::get('message') }}");
			  break;
	  }
	@endif
  </script> --}}