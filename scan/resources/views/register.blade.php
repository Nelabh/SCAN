<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCAN | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h2 class="logo-name">SCAN</h2>

            </div>
            <h3>Register to SCAN</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" method="post" action="{{URL::route('signup')}}">
              {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Father's Name" name="father" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="mobile" name="contact" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="City" name="address" required="">
                </div>
                Sign In As:<div class="i-checks"><label> <input type="radio" value="2" name="role"> <i></i> Teacher </label></div>
                                        <div class="i-checks"><label> <input type="radio" checked="" value="1" name="role"> <i></i> Student  </label></div>

                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{URL::route('login')}}">Login</a>
            </form>
            <p class="m-t"> <small></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
