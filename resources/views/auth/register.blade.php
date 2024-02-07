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
      @include('partials.alert')
      <div class="container">
          <div class="wrapper">
        <div class="title"><span>Register Form</span></div>
        <form action="{{ route('register-store') }}" method="POST">
            @csrf
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="name" placeholder="Nama..." required>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email..." required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="pass" placeholder="Sandi" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="c_pass" placeholder="Konfirmasi sandi" required>
          </div>
          <div class="row button">
            <input type="submit" value="Daftar">
          </div>
          <div class="signup-link">Sudah memiliki akun? <a href="{{ route('login-view') }}">Masuk</a></div>
        </form>
      </div>
    </div>

  </body>
</html>
