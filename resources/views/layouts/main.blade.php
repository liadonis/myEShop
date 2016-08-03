<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
</head>
<body>
    @section("sidebar")

        這是父視圖的sidebar
    @show
<div class="container">
    @yield("content")
</div>

</body>
</html>