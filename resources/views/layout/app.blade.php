<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script> 
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    
    @yield('content')
    
    
    @yield('script')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        toastr.options ={
        "closeButton" : true,
        "progressBar" : true,
        "positionClass": "toast-bottom-right",
    }
    toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
    toastr.options ={
        "closeButton" : true,
        "progressBar" : true,
        "positionClass": "toast-bottom-right",
    }
  	toastr.error("{{ session('error') }}");
  @endif

</script>
</body>
</html>