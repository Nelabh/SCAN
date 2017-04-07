<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCAN | Student capability Analysis</title>

    <link href="{{URL('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href = "{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href = "{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href = "{{URL::asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    








 <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">SCAN</h1>

            </div>
            <h3>Welcome to SCAN</h3>
            <p>Perfectly designed to know the correct knowledge state of student
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="post" action="{{URL::route('log')}}">
              {{csrf_field()}}
                <div class="form-group">
                    <input type="email" class="form-control" name = "email" placeholder="E-mail" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name = "password" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{URL::route('register')}}">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>




    <!-- Mainly scripts -->
    <script src = "{{URL::asset('js/jquery-2.1.1.js')}}"></script>
    <script src = "{{URL::asset('js/bootstrap.min.js')}}"></script>

</body>

</html>
