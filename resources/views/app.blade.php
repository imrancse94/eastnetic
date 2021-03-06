<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">
    <title>URL Shortener</title>
</head>
<body>
<div id="app">
    <App></App>
</div>
<script>
    const base_url = '{{get_base_url()}}'
</script>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
