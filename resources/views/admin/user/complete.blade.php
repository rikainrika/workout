<!DOCTYPE html>
<html lang="en">
  <head>
    <title>目標達成</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/home.css" rel="stylesheet">
    <link href="/css/complete.css" rel="stylesheet">
  </head>
  <body class="font">
      <header class="header">
        <div class="header-inner">
          <div class="logo">
            <img src="/image/logo.jpeg">
          </div>
          <div class="header-nav-item">            
            <span class="non-selected-menu"><a href="/homeselect">ホーム</a></span>
            <span class="selected-menu"><a href="/graph">データ</a></span>
            <span class="non-selected-menu"><a href="/admin/setting">設定</a></span>
          </div>
        </div>
      </header>
        <div class="overlay">
          <div class="window">
            <div class="congrats">今日の目標達成おめでとう！</div>
              <div class="sentence">
                <script type="text/javascript">
                  rand = Math.floor(Math.random()*5);                     
                    if (rand == 0) msg = "できると思えばできる。できないと思えばできない。これは無情なゆるぎない法則である。　ーパブロ・ピカソ";
                    if (rand == 1) msg = "何事も、成し遂げるまではいつも不可能に見える。　ーネルソン・マンデラ";
                    if (rand == 2) msg = "天才は1％のひらめきと99％の努力でつくられる。　ートーマス・エジソン";
                    if (rand == 3) msg = "努力は必ず報われる。もし報われない努力があるのならば、それはまだ努力とは呼べない。　ー王貞治";
                    if (rand == 4) msg = "進まざる者は必ず退き、退かざる者は必ず進む。　ー福沢諭吉";                       
                  document.write(msg);
                </script>
              </div>
                <form action="/graph" method="post">
                  <input type="hidden" name="name" value="{{$name}}">
                  <input type="hidden" name="seconds" value="{{$seconds}}">
                  @csrf
                  <input type="submit" class="close" value="閉じる">
                </form>      
          </div>
        </div>
    
  </body>
</html>
