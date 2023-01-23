<!doctype html>
<html lang="en">
  <head>
    <title>ホーム</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <link href="/css/home.css" rel="stylesheet">
    <link href="/css/setting.css" rel="stylesheet">
  </head>
  <body class="font">
    <header class="header">
      <div class="header-inner">
        <div class="logo">
          <img src="/image/logo.jpeg">
        </div>
          <div class="header-nav-item">            
            <span class="selected-menu"><a href="/homeselect">ホーム</a></span>
            <span class="non-selected-menu"><a href="/graph">データ</a></span>
            <span class="non-selected-menu"><a href="/admin/setting">設定</a></span>
          </div>
      </div>
    </header>
      <div class="select">↓今から開始するメニューを選択↓</div>
      <div class="at_setting">メニューの登録・編集は設定画面から</div>
        @foreach($menus as $menu)
      <div class="{{'box'.($menu->order)}}"><a href="/timer?name={{$menu->name}}">{{$menu->name}}</a></div>
        @endforeach
  </body>
    
</html>    