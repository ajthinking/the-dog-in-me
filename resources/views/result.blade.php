<!doctype html>
<html class="bg-indigo-dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        
    </head>
    <body>
        <div id="app">
            <show-result 
                :accuracy={{$accuracy}}
                :pred_class="'{{$pred_class}}'"
            ></show-result>
        </div>        
        <script src="/js/app.js"></script>
    </body>
</html>
