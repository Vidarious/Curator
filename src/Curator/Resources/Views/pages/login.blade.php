<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login</title>

        <!-- Start CSS -->
        <link href="css/vendor/curator/material.css" rel="stylesheet">
        <link href="css/vendor/curator/style.css" rel="stylesheet">
        <link href="css/vendor/curator/font-awesome.css" rel="stylesheet">
        <!-- Start CSS -->
    </head>

    <body>
        <!-- Start Content -->
        <div class="container">
            <div class="row">
                <div class="card login-center col-xs-3">
                    <h3 class="card-header login-header"><i class="fa fa-lock"></i></h3>
                    <div class="card-block">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Login</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <input id="password" type="password" name="password" class="form-control" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group col-xs-9 login-footer">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" name="remember" type="checkbox"> Remember me
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-xs-3 login-footer">
                                    <button type="submit" class="btn btn-secondary pull-right">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->

        <!-- Start JS -->
        <script type="text/javascript" src="js/vendor/curator/jquery-3.0.0.js"></script>
        <script type="text/javascript" src="js/vendor/curator/tether.js"></script>
        <script type="text/javascript" src="js/vendor/curator/bootstrap.js"></script>
        <script type="text/javascript" src="js/vendor/curator/material.js"></script>
        <script type="text/javascript" src="js/vendor/curator/ie10-viewport-bug-workaround.js"></script>
        <!-- End JS -->
    </body>

</html>
