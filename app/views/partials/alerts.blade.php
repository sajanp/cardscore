@if(Session::has('success_message'))
	<p class="alert alert-success">{{Session::get('success_message')}}</p>
@endif

@if(Session::has('error_message'))
	<p class="alert alert-danger">{{Session::get('error_message')}}</p>
@endif