<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--    Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        .map-iframe {
            width: 100%;
            height: 450px;
            border: 0;
        }
        h3 {
            margin-bottom: 30px;
            margin-top: 30px;
        }
    </style>

    @yield('head content')
</head>

<body>
    <iframe class="map-iframe" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13215.079075971047!2d-118.3434578!3d34.101038!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4b705f7%3A0x1c4beb7772cd2003!2s7060%20Hollywood!5e0!3m2!1suk!2sua!4v1693223926975!5m2!1suk!2sua" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    @yield('body content')
</body>

</html>
