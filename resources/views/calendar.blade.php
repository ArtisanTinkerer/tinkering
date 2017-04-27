<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Churchill Calendar</title>




        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <link rel="stylesheet" type="text/css" href="/css/all.css">


        <script>
            // rename myToken as you like
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>


    </head>
    <body>


    <div id='app'>
        <ch-calendar>


        </ch-calendar>
    </div>





    <script type="text/javascript" language="javascript" src="/js/app.js"></script>
    <script type="text/javascript" language="javascript" src="/js/all.js"></script>


    </body>
</html>
