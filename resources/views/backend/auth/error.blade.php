<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<style>
    body {
        font-family: 'Open Sans', sans-serif;
        color: #f1e9e9;
        background: white;
    }

    div {
        display: flex;
        align-items: center;
        justify-content: center;
        background:url('https://static.pexels.com/photos/928/sky-clouds-cloudy-blue.jpg'),linear-gradient(233deg, #ac5203, #af261c, #d2a83e, #f5d31d);
        width:100%;
        height:100vh;
        background-size: cover;
        background-blend-mode: soft-light;
        animation: hue-rotate 3s linear infinite;
        opacity: .9;
    }

    .not-found {
        display: block;
        margin: 0 auto;
        font-size: 10em;
        opacity: .7;
    }

    @keyframes hue-rotate {
        from {
            -webkit-filter: hue-rotate(0);
            -moz-filter: hue-rotate(0);
            -ms-filter: hue-rotate(0);
            filter: hue-rotate(0);
        }
        to {
            -webkit-filter: hue-rotate(360deg);
            -moz-filter: hue-rotate(360deg);
            -ms-filter: hue-rotate(360deg);
            filter: hue-rotate(360deg);
        }
    }
</style>
<body>
<div>
    <span class="not-found" style="margin-left: 300px">Login Fail</span><br>
{{--    <span class="not-found">Back Login</span>--}}
</div>


</body>
</html>
