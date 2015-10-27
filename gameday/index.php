<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bearcat Gameday Programs</title>

    <!-- Bootstrap -->
    <link href="/gameday/css/bootstrap.min.css" rel="stylesheet">
    <link href="/gameday/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <meta property="og:title" content="<? echo $title; ?>" />
        <meta property="og:description" content="<? echo $data['home']['name'] .' '. $title; ?>" />
        <meta property="og:site_name" content="<? echo $data['home']['name']; ?>Athletics" />
        <meta property="og:url" content="http://athletics.app.willamette.edu/gameday/<? echo $sportCode; ?>/" />
        <meta property="og:image" content="http://wubearcats.com/images/setup/thumbnail_default.jpg" />

        <script src="https://use.typekit.net/yvn2pyd.js"></script>
        <script>
            try {
                Typekit.load({
                    async: true
                });
            } catch (e) {}
        </script>
</head>

<body>
    <div class="container">

        <div class="header-row">

            <div class="header">

                <img class="header-logo" src="/gameday/images/headers/bearcats.png" />

                <h1>GAMEDAY</h1>
                <h2><span>Digital</span> PROGRAM</h2>

            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a class="btn btn-default btn-lg btn-block btn-lg" href="wsoc" role="button">Women's Soccer</a>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/gameday/js/bootstrap.min.js"></script>
</body>

</html>
