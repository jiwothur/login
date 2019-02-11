<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  </head>
  <body>
    <?php
    if($this->session->flashdata('message')){
     ?>
     <script>
       alert('<?=$this->session->flashdata('message')?>');
     </script>
     <?php
   }
      ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">  <?php
          if($this->session->userdata('is_login')){
            ?>
              <a class="nav-item nav-link active" href="/index.php/auth/logout">로그아웃 <span class="sr-only">(current)</span></a>
            <?php
          }
          else{
            ?>
          <a class="nav-item nav-link active" href="/index.php/auth/register">회원가입 <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active" href="/index.php/auth/login">로그인 <span class="sr-only">(current)</span></a>
          <?php
        }
           ?>
        </div>
      </div>
    </nav>
    <div class="container">
      <style>
      .container{
        margin:0px;
      }
      </style>
      <div class="row">
