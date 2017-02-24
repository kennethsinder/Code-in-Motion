<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Welcome to Kenneth Sinder's Website!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/css.css') }}" type="text/css">
    <link rel="stylesheet"
          href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js">
    </script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <!-- Google Analytics -->
    {!! Analytics::render() !!}
</head>
<body>
<div class="container">
@include('partials.navbar')
@include('partials.flash')
@yield('content')
</div>
<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
</script>
@yield('footer')
<hr/>
<h5 style="text-align: center;">&#169; {{date('Y')}}
    <a href="/" style="text-decoration: none; color: #ffff">Code in Motion</a></h5>
</body>
</html>