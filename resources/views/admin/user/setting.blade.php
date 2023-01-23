<!DOCTYPE html>
  <html>
    <head>
      <title>設定画面</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    　<meta name="description" content="">
    　<meta name="generator" content="Hugo 0.84.0">
      <link href="/css/setting.css" rel="stylesheet">
      <link href="/css/home.css" rel="stylesheet">
      <style>
        @media (min-width: 600px) {
          #split{
            display: flex;
          }
          #left {
            flex-grow: 1;
          }
          #right {
            flex-grow: 1;
          }
        }
      </style>
    </head>
    <body class="font"> 
      <header class="header">
        <div class="header-inner">
          <div class="logo">
            <img src="/image/logo.jpeg">
          </div>
          <div class="header-nav-item">            
            <span class="non-selected-menu"><a href="/homeselect">ホーム</a></span>
            <span class="non-selected-menu"><a href="/graph">データ</a></span>
            <span class="selected-menu"><a href="/admin/setting">設定</a></span>
          </div>
        </div>
      </header>
        <div id="split">
          <div id="left">
            <div class="lets">①目標を決めましょう</div>
              <div class="form">
                <div class="form_title">1日のトレーニング時間目標</div>  
                  <div class="form_content">
                    <form action="/admin/setting" method="post">
                      @csrf
                      <div class="form_list">
                        <div class="goal_ex">目標を達成するとやる気が出る<br>偉人からのメッセージが読めるかも！<br>《  現在の目標：{{Auth::user()->setting == NULL ? '' : Auth::user()->setting->seconds}}　分/日  》</div>
                        <input id="miniput" name="seconds" type="number"> 
                        <div class="minuites">分</div>
                        <input type="submit" value="決定">
                      </div> 
                    </form>
                  </div>
              </div> 
          </div>  
            <div id="right">
              <form action="/admin/menu" method="post">
                @csrf
                <div class="setting_menu">②トレーニングのメニューを入力</div>
                  <p>メニューは５つまで登録可能で、いつでも編集できます</p>
                  @for($i = 0; $i < config('menu.count'); $i++)
                  <input name="menus[]" type="text" class="box1_" style="background-color: {{ config('menu.colors')[$i]}}" value="{{isset($menus[$i+1])? $menus[$i+1]->name:''}}"> 
                  @endfor
                  <input type="submit" id="menu_submit" value="決定">
              </form>  
            </div>
        </div>  
    </body>
  </html>
