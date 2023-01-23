<!doctype html>
<html lang="en">
  <head>
    <title>タイマー</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <link href="/css/home.css" rel="stylesheet">
    <link href="/css/timer.css" rel="stylesheet">
  </head>
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
  <body class="font">
    <div class="position">
      <h1>🕑タイマー</h1>
        <div id="container">
          <div id="time">00:00:00</div>
            <div id="buttons">
      
              <input type="hidden">
              <button id="start">start</button>
        
              <input type="hidden">
              <button id="stop">stop</button>
        
              <input type="hidden">
              <button id="reset">reset</button>
            </div>
        </div>  
   
          <div id="action">
            <button onclick="location.href='https://6418291ae13f4326b8f3ea9671483b50.vfs.cloud9.us-west-1.amazonaws.com/homeselect'" id="back">
              メニュー選択に戻る
            </button>
              <form name="next" action = "{{ url('/graph') }}" method="post">
                @csrf
                  <input type="hidden" name="seconds" id="seconds">
                  <input type="hidden" name="name" value="{{$name}}">
                  <button id="next" type="button" onclick="nextEvent()">記録を登録する</button>
              </form>
          </div>
    </div>
  </body>
    <script src='/js/timer.js'></script>
      <script>
        //登録ボタンをsubmitにする
        function nextEvent() {
          document.next.submit();
        }
      
        //登録ボタンをクリック→目標時間を上回っていたらポップアップ表示
        document.getElementById('next').addEventListener('click',function() {
        let sec = (currentTime.getHours()-9)*3600+currentTime.getMinutes()*60+currentTime.getSeconds();
        if(sec >= {{Auth::user()->setting->seconds*60}}){
         window.location.href = "https://6418291ae13f4326b8f3ea9671483b50.vfs.cloud9.us-west-1.amazonaws.com/complete?name={{$name}}&seconds=" + sec;
         }
        });
      </script>
</html>