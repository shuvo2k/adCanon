<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="{!! asset('../css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! asset('../css/font-awesome.min.css') !!}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{!! asset('../css/custom.min.css') !!}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{!! route('admin.login.submit') !!}" method="POST">
                        {{ csrf_field() }}
                        <h1>Login To Admin</h1>
                        <!-- showing error -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- session message -->
                        @if (session()->has('error_login'))
                          <div class="alert alert-danger">
                            {{ session('error_login') }}
                          </div>

                        @endif
                        <!-- error -->
                        <div>
                            <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>


                            <button type="submit" class="btn btn-default submit">Login</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />


                        </div>
                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>
