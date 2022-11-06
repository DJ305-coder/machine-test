@extends('layout.app')
@section('title')
    <title>Register</title>
@endsection
@section('content')
    <div class="register-container">
        <div class="inner-container">
            <h2>Register Here</h2>
            @if (isset($errors) && count($errors) > 0)
                <div class="alert alert-danger" style="color:red">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('user-register')}}" method="post" id="register_form">
                @csrf
                    <div class="register-name-wrapper">
                       <div class="form-group col-6">
                          <input type="text" name="first_name" class="form-control" placeholder="First Name">
                       </div>
                       <div class="form-group col-6">
                          <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                       </div>
                    </div>
                    <div class="w-100-wrapper">
                        <div class="form-group col-12">
                           <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group col-12">
                           <input type="text" name="contact_number" maxlength="10" class="form-control" placeholder="Contact Number">
                        </div>
                        <div class="form-group col-12">
                           <input type="email" name="email" id="email" class="form-control" placeholder="Email Id">
                        </div>
                        <div class="form-group col-12">
                           <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group col-12">
                           <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="w-33-wrapper">
                        <div class="form-group col-4">
                            <select  id="country-dropdown" name="country_id" id="country" class="form-control">
                            <option value="">-- Select Country --</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group col-4">
                            <select id="state-dropdown" name="state_id" class="form-control" >
                                <option value="">-- Select State --</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <select id="city-dropdown" name="city_id" class="form-control">
                                <option value="">-- Select City --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <textarea type="text" name="address" class="form-control" placeholder="Address"></textarea>
                    </div>
                    <div class="button-wrapper">
                       <button type="submit">Submit</button>
                       <div class="already-wrapper">
                          <p>Already Registered? <a href="{{url('/')}}">Login</a></p>
                       </div>
                    </div>
                    
            </form>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $("#register_form").validate({
            rules: {
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                username: {
                    required: true,
                },
                contact_number: {
                    required: true,
                    minlength:10,
                    maxlength:10,
                },
                email: {
                    required: true,
                    remote: {
                        url: "{{url('email-exists')}}",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        type: "post",
                        data: {
                            email: function () {
                                return $("#email").val();
                            },
                        },
                    },
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password",
                },
                country: {
                    required: true,
                },
                state: {
                    required: true,
                },
                city: {
                    required: true,
                },
                address: {
                    required: true,
                },
            },
            messages: {
                first_name: {
                    required: "* Please enter first name.",
                },
                last_name: {
                    required: "* Please enter last name.",
                },
                username: {
                    required: "* Please enter username.",
                },
                contact_number: {
                    required: "* Please enter contact number.",
                    minlength: "* Please enter minimum 10 number.",
                    maxlength: "* Please enter maximum 10 number.",
                },
                email: {
                    required: "* Please enter email.",
                    remote: "* This email already exists",
                },
                password: {
                    required: "* Please enter password.",
                },
                confirm_password: {
                    required: "* Please enter confrim password.",
                },
                country: {
                    required: "* Please select country.",
                },
                state: {
                    required: "* Please select state.",
                },
                city: {
                    required: "* Please select city.",
                },
                address: {
                    required: "* Please enter address.",
                },
            },
            submitHandler: function (form) {
                form.submit();
            },
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#country-dropdown").on("change", function () {
            var idCountry = this.value;
            $("#state-dropdown").html("");
            $.ajax({
                url: "{{url('get-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: "{{csrf_token()}}",
                },
                dataType: "json",
                success: function (result) {
                    $("#state-dropdown").html(
                        '<option value="">-- Select State --</option>'
                    );
                    $.each(result.states, function (key, value) {
                        $("#state-dropdown").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                    $("#city-dropdown").html(
                        '<option value="">-- Select City --</option>'
                    );
                },
            });
        });


        $("#state-dropdown").on("change", function () {
            var idState = this.value;
            $("#city-dropdown").html("");
            $.ajax({
                url: "{{url('get-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: "{{csrf_token()}}",
                },
                dataType: "json",
                success: function (res) {
                    $("#city-dropdown").html(
                        '<option value="">-- Select City --</option>'
                    );
                    $.each(res.cities, function (key, value) {
                        $("#city-dropdown").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                "</option>"
                        );
                    });
                },
            });
        });
    });
</script>
@endsection('script')

