<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Laravel | Login</title>
    <style type="text/css">
        .left-image{
            height:100%;
            width:100%;
            object-fit:cover;
        }
    </style>
</head>
<body>
    <main class="login-form">
        <div class="body w-100 d-md-flex" style="height:100vh">
            <div class="h-100" style="width:70%">
                <img style="" class="left-image" src="https://images.pexels.com/photos/2033997/pexels-photo-2033997.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="" alt="">
            </div>
            <div class="" style="width:30%">
                <div class="w-100 p-3">
                    <div class="h4 text-center">Login</div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="">
                            <label for="email_address" class="col-form-label text-md-right">E-Mail Address</label>
                            <div class="">
                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="">
                            <label for="password" class="col-form-label text-md-right">Password</label>
                            <div class="">
                                <input type="password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
    
                        <div class="">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                            
                        <div class="w-100">
                            <button type="submit" class="w-100 btn btn-primary">
                                    Login
                            </button>
                        </div>
                        <span class="mt-4">Don't Have Account? <a href="{{ route('register') }}">Register</a></span>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>