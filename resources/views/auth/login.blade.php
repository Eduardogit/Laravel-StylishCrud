<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro</title>

    <!-- LATO  -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/AdminLTE.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/_all-skins.min.css">

    <!-- MY OWN STYLES-->

    {!! Html::style('assets/css/main.css') !!}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition register-page">
<div  id="centering" class="container">
<div id="wrapper">
    <div class="register-logo">
        <a ><b>NEWSLETTER  </b></a>
        <p class="text-center">Registrate y recibe promociones y noticias sobretodas nuestras marcas</p>
    </div>
    <!-- /.login-logo -->


        <form method="post" action="{{ url('/auth/login') }}">
            {!! csrf_field() !!}
            <div class="row">
                <div class="contenedor col-md-offset-2 col-sm-offset-2 col-xs-offset-2 col-xs-7 col-md-7 col-sm-7">
                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="mail@ejemplo.com">
                        @if ($errors->has('email'))
                            <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }} ">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="contenedor col-xs-3 col-md-3 col-sm-3 pull-right">
                    <a id="send"  class="boton"><i class="fa fa-caret-right"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/js/app.min.js"></script>
<script>
    $(function () {
    $('#wrapper > div.register-logo > a > b').hide()
    $('input[type="password"]').hide()

        $('#send').on('click',function(){

            if($('#send').hasClass("form")){
                $('form').submit()
            }else{
                
                if($('input[type="email"]').val().length > 0){
                    //HIDE FIRST INPUT
                    $('input[type="email"]').parent().hide()
                    //APPEAR SECOND ONE 
                    $('input[type="password"]').fadeIn('slow')    
                    //ATTACH VALIDATION
                    $('#send').addClass('form');
                }
                
            }

        })
    $('#wrapper > div.register-logo > a > b').fadeIn('slow')
        
    });
</script>
</body>
</html>
