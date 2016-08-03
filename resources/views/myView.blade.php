@extends("layouts.main")

@yield("title","這是標題")

@section("sidebar")

    <h2>這是子視圖的側邊攔</h2>
    <h3>@parent</h3>

@endsection

@section("content")
    <h2>測式子視圖的內容</h2>
    <h3>{{$from_server}}</h3>
    <h4>目前的日期:{{date("Y-M-D")}}</h4>
@endsection