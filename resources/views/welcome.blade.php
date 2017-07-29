<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="/">

        <title>Laravel</title>

        <style type="text/css">
            .btn-50 {
                width: 50%;
                height: 9em;
            }
            .sep {
                padding-bottom: 2em;
            }
        </style>
    </head>
    <body ng-app="myApp">
        
        <div class="container">
            <ui-view></ui-view>
        </div>

        <!-- AngularJS Application Scripts -->
        <script src="app/app.min.js"></script>
    </body>
</html>
