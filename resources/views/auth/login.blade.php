@extends('layout.app')
@section('title')
    <title>Login</title>
@endsection
@section('content')
    <div class="register-container">
        <div class="inner-container login-inner-container">
            <h2>Login Here</h2>
            <form action="{{route('user-login')}}" method="post" id="login_form" >
                @csrf
            <div class="w-100-wrapper">
                <div class="form-group col-12">
                   <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group col-12">
                   <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group col-12">
                   <button type="submit">Login</button>
                </div>
                <div class="already-wrapper">
                    <p>Not Registered?  <a href="{{url('register')}}">Create New Account</a></p>
                </div>
           </div>
        </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $("#login_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password:{
                    required : true,
                }
            },
            messages: {
                email: {
                    required: "* Please enter email.",
                    email: "* Please enter valid email."
                },
                password: {
                    required: "* Please enter password.",
                }
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    });
</script>
@endsection('script')
