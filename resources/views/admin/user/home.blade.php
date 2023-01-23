<!doctype html>
<html lang="en">
  <head>
    <title>ホーム</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <link href="/css/home.css" rel="stylesheet">
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
      <div class="forms">
        <div class="form_title">ログイン</div>
          <div class="form_content">
            <form method="POST" action="{{ route('login') }}">
              @csrf
　　　　　　　　<div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label>
                    <div class="col-md-6">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                </div>
                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">パスワード</label>
                      <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                          @error('password')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                  </div>
                    <div class="row mb-3">
                      <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <div class="form-check-label" for="remember">↑次回から自動ログイン</div>
                        </div>
                      </div>
                    </div>
                      <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                          @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                              パスワードをお忘れですか？
                            </a>
                          @endif
                            <input type="submit" value="ログイン" class="btn btn-primary">
                        </div>
                      </div>
            </form>
          </div>
      </div>
        <div class="notyet"><a href="/admin/usersetting">ユーザー登録がまだの場合はこちら</a></div>
  </body>
</html>
