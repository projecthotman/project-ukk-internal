<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login Form | CodingLab</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
        @include('partials.alert')
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="{{ route('login-action') }}" method="POST">
            @csrf
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Masukkan email..." required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Masukkan password..." required>
          </div>
          <div class="pass"><a href="#">Lupa Password</a></div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">Belum memiliki akun? <a href="{{ route('register-view') }}">Daftar</a></div>
        </form>
      </div>
    </div>

  </body>
</html>
