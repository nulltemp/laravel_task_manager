<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>task manager</title>

        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}"></script>

        <script>
            window.Laravel = {
                csrfToken: "{{ csrf_token() }}"
            };
        </script>
    </head>
    <body>
        <div id="app">
            <router-view></router-view>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
