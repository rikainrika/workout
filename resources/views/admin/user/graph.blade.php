<!DOCTYPE html>
<html lang="en">
  <head>
    <title>データ</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/home.css" rel="stylesheet">
    <link href="/css/graph.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
    <style>
      @media (min-width: 600px) {
        .split {
          display: flex;
        }
        .left {
          flex-grow: 1;
        }
        .right {
          flex-grow: 1;
        }
      }
    </style>
  </head>
  <body class="font">
      <header class="header-3">
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
      <div class="split">
        <div class="left">
          <div class="title">１週間データ</div>
        </div>
          <div class="right">  
            <div class="explanation">グラフを触ると時間（分）の内訳が表示されます</div>
          </div>
      </div>  
        
        <canvas id="myChart" width="900" height="500"></canvas>
        
      <script>
        const labels = <?php echo json_encode($labels); ?>;
        const data = <?php echo json_encode($datas); ?>;
      
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
        
		      type: 'bar',
		      data : { 
            labels: labels,		      
		        datasets : data,
		      }, 
  		
          options: {
            scales: {
                xAxes: {
                  stacked: true
                },
                yAxes: {
                  stacked: true
                }
            },
              responsive: false
          }
        })
        
      
      </script>
  </body>
</html>
