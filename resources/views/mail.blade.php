<DOCTYPE html>
  <html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
</head>
<body bgcolor="black">
    <div>
      <div align="center" style="background-color:#FFFFFF; padding-left:20px; padding-right:20px; max-width:550px; margin:auto; border-radius:5px; padding-bottom:5px; text-align:left; margin-bottom:40px; width:80%"> 
        <h2 style="padding-top:25px; min-width:600; align:center; font-family:Roboto">
          Hi, {{$data['first_name']}}!
        </h2>
        <p style="max-width:500px; align:center; font-family:Roboto; padding-bottom:0px; wrap:hard; line-height:25px">
           we’re glad you’re here! Following are your account details:
        </p>
        <p style="max-width:500px; align:center; font-family:Roboto-Bold; padding-bottom:0px; wrap:hard">
          Email : {{$data['email']}}
        </p>
        <p style="max-width:500px; align:center; font-family:Roboto-Bold; padding-bottom:0px; wrap:hard">
          Password : {{$data['password']}}
        </p>
        <p style="max-width:500px; align:center; font-family:Roboto-Bold; padding-bottom:0px; wrap:hard">
          <a href="{{url('/')}}">Click here to login.</a>
        </p>
       
        <p style="max-width:500px; align:center; font-family:Roboto; padding-bottom:0px; wrap:hard">
          Thank you,
        </p>
        <hr>
        </hr>
        <p style="max-width:100%; align:center; font-family:Roboto; padding-bottom:10px; wrap:hard; padding-top: 0px; font-size:10px">
          You’re receiving this email because you recently created new account. If this wasn’t you, please ignore this email.
        </p>
      </div>
  </div>
</body>
</html>
