<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chợ Tốt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/for_header.css">
  <link rel="stylesheet" type="text/css" href="css/css1.css">
  <link rel="stylesheet" type="text/css" href="css/css2.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/css3.css">
  <link rel="stylesheet" type="text/css" href="css/css4.css">
  <link rel="stylesheet" type="text/css" href="css/css5.css">
  <link rel="stylesheet" type="text/css" href="css/css6.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
* {
  box-sizing: border-box;
}

body {
  margin:0;
  font-family:Arial;
}

.topnav {
  overflow: hidden;
  background-color: #ffba00;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 2000;
}

.topnav a{
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 0.28vw 0.4vw;
  text-decoration: none;
  font-size: 14px;
  line-height: 2.5vw;
}

.container-topnav {
  max-width: 70%;
  margin: auto;
}

a.cho-tot {
  color: white;
  width: 45%;
  font-size: 22px;
  font-weight: bold;
  line-height: 2.3vw;
  text-align: left;
}

a.item-menu:hover {
  cursor: pointer;
}

a.dang-tin {
  font-family: Verdana;
  line-height: 2.5vw;
  font-weight: bold;
  color: white;
  background-color: #fc9807;
}

.topnav .icon {
  display: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 14px;    
    border: none;
    outline: none;
    color: black;
    padding: 0.28vw 0.5vw;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
    line-height: 2.5vw;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 0.2vw 0.65vw;
    text-decoration: none;
    display: block;
    text-align: left;
}

.topnav a.item-menu:hover, .dropdown:hover .dropbtn {
  background-color: #e3b802;
  color: white;
}

.dropdown-content a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown:hover .dropdown-content {
    display: block;
}

@media screen and (max-width: 940px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 940px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

div.super-super-container {
  max-width: 75%;
  margin: auto;
  margin-top: 0px;
  outline: 1px solid lightgray;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.1);
  margin-bottom: 60px;
}

.super-slideshow {
  border: 1px solid #ddd;
  border-radius: 4px;
  background-color: #E6E6FA;
}

.tra-row-1 {
  display: flex;
  border-bottom: 1px solid #ccc;
}

.tra-column-01 {
  flex: 25%;
  padding: 0px;
}

button#sdDV:hover {
    background-color: #6495ED;
    border: 1px solid #6495FF;
    color: white;
}

button#xoaTD:hover {
    background-color: Tomato;
    border: 1px solid #6495FF;
    color: white;
}

div.no-item {
  border: 1px solid blue;
  background-color: red;
  border-radius: 3px;
  text-align: center;
}

.chip {
    display: inline-block;
    padding: 0 25px;
    height: 43px;
    font-size: 13px;
    line-height: 45px;
    border-radius: 25px;
    background-color: #f1f1f1;
    margin-bottom: 15px;
}

.chip img {
    float: left;
    margin: 0 10px 0 -25px;
    height: 43px;
    width: 43px;
    border-radius: 50%;
}

.tra-column-02 {
  flex: 75%;
  padding-top: 2px;
  padding-left: 10px;
}

.vitri-thoigian {
  font-weight:100;
  font-size:12px;
  font-family:Arial;
}

.fade-1 {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

.img-container {
    position: relative;
}

.img-container .img-content {
    position: absolute;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5); /* Black background with transparency */
    color: #f1f1f1;
    width: 100%;
    padding: 5px;
}

.img-container {
    text-align: right;
}
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

div.row-num-1 {
  display: flex;
}

div.column-tra-luan {
  flex: 20%;
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav" style="outline-bottom: 1px solid black;">
  <div class="container-topnav">
    <a href="trang-chu-admin" class="cho-tot"><img src="img/Cplus.png" alt="Chợ tốt" style="width:100px;height:32px;"></a>
    <a class='item-menu' href="trang-chu-admin"><i class="fa fa-apple" style="font-size:24px"></i> Duyệt tin</a>
    {{-- <a class='item-menu' href="quan-li-tin-dang"><i class="fa fa-github-alt" style="font-size:24px"></i> Tôi bán</a> --}}
    <?php
          if (Session::has('sdt')) {
              $name_acc = Session::get('name');
              $words = Array();
              $word = "";
              $j = 0;
              for ($i = 0; $i < strlen($name_acc); ++$i)
              {
                  if ($name_acc[$i] != ' ')
                      $word .= $name_acc[$i];
                  else 
                  {
                      if ($word != "")
                      {
                          $words[$j] = $word;
                          $word = "";
                          $j++; 
                      } 
                  }
              }
              if ($word != "")
                  $words[$j] = $word;
              $name_final = "";
              if(count($words) == 1)
                  $name_final = $words[0];
              else
                  $name_final = $words[0]." ".$words[count($words) - 1];
              $GLOBALS['my-name'] = $name_final;
              echo "<a class='item-menu' onclick=\"Hello('".$name_final."')\"><i class='fa fa-user-circle' style='font-size:24px'></i> ".$name_final."</a><a class='item-menu' href='dang-xuat'><i class='fa fa-sign-out' style='font-size:24px'></i>Đăng Xuất</a>";
          }
          else
              echo "<a class='item-menu' href='dang-nhap'><i class='fa fa-sign-in' style='font-size:24px'></i> Đăng ký / Đăng nhập</a>";
    ?>
    <a class="dang-tin" href="{{url('dang-tin')}}">ĐĂNG TIN</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
</div>
<div class="main-content" style="margin: 50px;">
@yield('content')
</div>
<script>
  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
      showSlides(slideIndex += n);
  }

  function currentSlide(n) {
      showSlides(slideIndex = n);
  }

  function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) 
          slideIndex = 1;  
      if (n < 1)
          slideIndex = slides.length;
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" v-active", "");
      }
      dots[slideIndex-1].className += " v-active";
      slides[slideIndex-1].style.display = "block";  
      
  }

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function Hello(name) {
    alert("Chợ tốt Bách Khoa xin chào " + name);
}
</script>
</body>
</html>