<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>  
 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <style>
    body {
  font-family: arial;
}

.collapsed .fa {
  transform: rotate(180deg);
  color: #007bff;
}

.mystyle {
  color: #ff0066;
}

#notifyHeader {
  color: #007bff;
  font-size: 18px;
  text-align: center;
}

#notifyContent {
  font-size: 14px;
  text-align: center;
}

.fa {
  transition: 0.2s transform ease-in-out;
}

.card-header {
  background: #ffffff;
}

span {
  font-size: 18px;
  font-weight: bold;
}

.card {
  background: #ffffff;
}

div.a {
  margin: 0 auto;
}

.table {
  text-align: center;
}

h1,
h2 {
  text-align: center;
  margin-top: 10px;
  margin-bottom: 10px;
}

#messageTitle:before,
#messageTitle:after {
  content: " - ";
  color: #ff0066;
  font-weight: 800;
}

#followingTitle:before,
#followingTitle:after {
  font-weight: 800;
  content: " - ";
  color: #99ccff;
}

#followTitle:before,
#followTitle:after {
  font-weight: 800;
  content: " - ";
  color: #ff884d;
}

.imageVacation {
  width: 46%;
  height: 300px;
  float: left;
  margin: 1.66%;
}

@media screen and (max-width: 800px) {
  .imageVacation {
    width: 96%;
    height: 300px;
    float: left;
    margin: 1.66%;
  }
}

footer {
  background-color: #007bff;
  color: white;
  padding: 15px;
  text-align: center;
}

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">User Profile</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <a class="btn navbar-btn btn-primary ml-2 text-white"  href="{{url('logout')}}"><i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign out</a>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <table class="table ">
              <thead>
                <tr>
                  <th id="">First Name</th>
                  <th id="">Last Name</th>
                  <th id="">Usernmae</th>
                  <th id="">Conact Number</th>
                  <th id="">Email</th>
                  <th id="">Country</th>
                  <th id="">State</th>
                  <th id="">City</th>
                  <th id="">Address</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{isset($user->first_name) ? $user->first_name : '-' }}</td>
                  <td>{{isset($user->last_name) ? $user->last_name : '-' }}</td>
                  <td>{{isset($user->username) ? $user->username : '-' }}</td>
                  <td>{{isset($user->contact_number) ? $user->contact_number : '-' }}</td>
                  <td>{{isset($user->email) ? $user->email : '-' }}</td>
                  <td>{{isset($user->country) ? $user->country->name : '-' }}</td>
                  <td>{{isset($user->state) ? $user->state->name : '-' }}</td>
                  <td>{{isset($user->city) ? $user->city->name : '-' }}</td>
                  <td>{{isset($user->address) ? $user->address : '-' }}</td>
                </tr>
              </tbody>
            </table>  
          </div>
        </div>
      </div>
    </div>
  </div>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>