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

div.container-final-form {
  box-sizing: border-box;
  outline: 1px solid lightblue;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.1);
  max-width: 65%;
  padding: 10px 25px;
  margin: auto;
  margin-top: 20px;
  margin-bottom: 60px;
}

div.container-final-form form {
  border: none;
}

div.container-final-form form input[type=text]{
  border: none;
  color: black;
  padding-top: 2px;
  padding-bottom: 2px;
  padding-left: 0px;
  font-family: Arial;
  width: 100%;
}

div.container-final-form form label{
  margin-bottom: 0px;
  font-weight: normal;
  color: gray;
  font-size: 14px;
  font-family: "Times New Roman";
  display: block;
}

div.love-div {
  border: none;
  display: block;
  border-bottom: 2px solid lightgray;
  margin-bottom: 10px;
}

.tra-row-1 {
  display: flex;
  border-bottom: 1px solid #ccc;
}

.tra-column-01, .tra-column-03 {
  flex: 25%;
  padding: 0px;
}

.tra-column-02, .tra-column-04 {
  flex: 75%;
  padding-top: 2px;
  padding-left: 10px;
}

.vitri-thoigian {
  font-weight:100;
  font-size:12px;
  font-family:Arial;
}

button.xx-btn {
  margin: 0;
  width: 23%;
  height: 100%;
  border: none;
  font-family: arial;
  background-color: transparent;
  cursor: pointer;
}

button.xx-btn:hover {
  background-color: #eee;
}

.xx-btn.xx-active {
    border-bottom: 2px solid #ffba00;
}

.luan-btn.luan-active {
    background-color: #666;
    color: white;
}

.select-items {
  position: absolute;
  background-color: white;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
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

div.myTitle a:hover {
  text-decoration: none;
}

div.best-column-1 {
  flex: 30%;
  background-color: white;
  padding-left: 10px;
  padding-right: 10px;
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav" style="outline-bottom: 1px solid black;">
  <div class="container-topnav">
    <a href="trang-chu" class="cho-tot"><img src="img/Cplus.png" alt="Chợ tốt" style="width:100px;height:32px;"></a>
    <a class='item-menu' href="quan-li-tin-dang"><i class="fa fa-github-alt" style="font-size:24px"></i> Tôi bán</a>
    <div class="dropdown">
      <button class="dropbtn"> 
        <i class="fa fa-chevron-circle-down" style="font-size:24px"></i> Thêm
      </button>
      <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div> 
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
              echo "<a class='item-menu' onclick=\"Hello('".$name_final."')\"><i class='fa fa-user-circle-o' style='font-size:24px'></i> ".$name_final."</a><a class='item-menu' href='dang-xuat'><i class='fa fa-sign-out' style='font-size:24px'></i>Đăng Xuất</a>";
          }
          else
              echo "<a class='item-menu' href='dang-nhap'><i class='fa fa-sign-in' style='font-size:24px'></i> Đăng ký / Đăng nhập</a>";
    ?>
    <a class="dang-tin" href="{{url('dang-tin')}}">ĐĂNG TIN</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
</div>

<div class="main-content" style="margin:50px;">
@yield('content')
</div>
<script>
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

var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 0; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
</body>
</html>