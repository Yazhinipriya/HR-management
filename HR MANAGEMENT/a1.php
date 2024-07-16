<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Animated Sidebar Menu | CodingLab</title>
      <link rel="stylesheet" href="homepage.css">
      <link rel="stylesheet" href="Aboutus.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style>
        section{
          height:100vh;
          width:100vw;
          display:flex;
          align-items:center;
          justify-content:center;
          text-transform: uppercase;
        }
        h2{
          padding-top: 10px;
          align-items:center;
        }
        #section1{  
          background-color:cadetblue;
        }
        #section2{
          background: linear-gradient(-45deg, white 30%, purple 0%);
        }
        #section3{
          background-color:cadetblue;
        }
        #section4{  
          background: linear-gradient(-45deg, white 30%, red 0%);
        }
        #section5{
          background: linear-gradient(-45deg, white 30%, blue 0%);
        }
        #section6{
          background-image:url('background.jpg');
          background-repeat: no-repeat;
          background-position: 100%; 
          background-size: 100%;
        }
        #section7{
          background: linear-gradient(-45deg, white 30%, lightblue 0%);
        }
        #section8{
          background: linear-gradient(-45deg, white 30%, white 0%);
        }
        .box{
          margin-left: 200px;
          background-color:white;
          height:500px;
          width: 500px;
          border-radius: 8px;
          padding: 100px 50px;
          box-shadow: 20px 20px 20px rgb(10, 61, 77);
        }
        .box1{
          margin-left: 200px;
          background-color:white;
          height:600px;
          width: 1000px;
          border-radius: 8px;
          padding: 100px 50px;
          box-shadow: 20px 20px 20px rgb(10, 61, 77);
        }
        .but1:hover{
          background-color:#676869;
          color:white;
        }
        .but1{
          cursor: pointer;
            border: 1px solid #2a2a2b;
            background-color: transparent;
            height: 50px;
            width: 400px;
            color: #676869;
            font-size: 1.7em;
            box-shadow: 0 6px 6px rgba(0, 0, 0, 0.6);
        }
      </style>
   </head>
   <body>
      <div class="wrapper">
         <input type="checkbox" id="btn" hidden>
         <label for="btn" class="menu-btn">
         <i class="fas fa-bars"></i>
         <i class="fas fa-times"></i>
         </label>
         <nav id="sidebar">
            <div class="title">
               Side Menu
            </div>
            <ul class="list-items">
               <li><a href="#section1"><i class="fas fa-home"></i>Home</a></li>
               <li><a href="#section2"><i class="fas fa-sliders-h"></i>Employee Details</a></li>
               <li><a href="#section3"><i class="fas fa-address-book"></i>Services</a></li>
               <li><a href="#section4"><i class="fas fa-cog"></i>Settings</a></li>
               <li><a href="#section5"><i class="fas fa-stream"></i>Features</a></li>
               <li><a href="#section6"><i class="fas fa-user"></i>About us</a></li>
               <li><a href="#section7"><i class="fas fa-globe-asia"></i>Languages</a></li>
               <li><a href="#section8"><i class="fas fa-envelope"></i>Contact us</a></li>
               <div class="icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
               </div>
            </ul>
         </nav>
      </div>
      <div class="content">
         <div class="header">
            Animated Side Navigation Menu
         </div>
         <p>
            using only HTML and CSS
         </p>
      </div>
      <section id="section1">
        <div class="box1">
          
        </div>
     </section>
     <section id="section2">
      <h2>section 2</h2>
   </section>
   <section id="section3">
      <div class="box">
        <a href="dbms_mini1.php"><button class="but1">INSERT RECORDS</button></a><br><br>
        <a href="dbms_mini2.php"><button class="but1">DELETE RECORDS</button></a><br><br>
        <button class="but1">UPDATE RECORDS</button><br><br>
        <button class="but1">VIEW RECORDS</button>
      </div>
       
 </section>
 <section id="section4">
  <h2>section 4</h2>
  </section>
  <section id="section5">
    <h2>section 5</h2>
</section>

<section id="section6">
     <!--image slider start-->
     <div class="slider">
      <div class="slides">
        <!--radio buttons start-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
        <!--radio buttons end-->
        <!--slide images start-->
        <div class="slide first">
          <img src="1.jpg" alt="">
        </div>
        <div class="slide">
          <img src="2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="3.jpg" alt="">
        </div>
        <div class="slide">
          <img src="4.jpg" alt="">
        </div>
        <!--slide images end-->
        <!--automatic navigation start-->
        <div class="navigation-auto">
          <div class="auto-btn1"></div>
          <div class="auto-btn2"></div>
          <div class="auto-btn3"></div>
          <div class="auto-btn4"></div>
        </div>
        <!--automatic navigation end-->
      </div>
      <!--manual navigation start-->
      <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
        <label for="radio4" class="manual-btn"></label>
      </div>
      <!--manual navigation end-->
    </div>
    <!--image slider end-->

    <script type="text/javascript">
    var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 4){
        counter = 1;
      }
    }, 5000);
    </script>
    
</section>
<section id="section7">
  <h2>section 7</h2>
</section>
<section id="section8">
<h2>section 8</h2>
</section>

      
   </body>
</html>