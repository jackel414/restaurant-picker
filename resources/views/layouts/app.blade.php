<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Restaurant Picker</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>
<body id="app-layout">
    <div id="logo" class="text-center">
        <a href="/">
            <img src="logo.png" alt="logo" width="300" height="260"/>
        </a>
    </div>
    @yield('content')

    <div id="footer">
        <div>
            <p>&#169; <a href="http://mays.io" target="_blank">Mays | io</a></p>
        </div>
    </div>
    <!-- JavaScripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
