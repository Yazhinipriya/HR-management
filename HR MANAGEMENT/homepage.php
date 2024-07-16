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
          text-transform: uppercase;}
        h2{padding-top: 10px;align-items:center;}
        .inputContainer {
         position: relative;
         height: 45px;
         width: 100%;
         margin-bottom: 17px;
         }
         .label {
        position: absolute;
        top: 15px;
        left: 15px;
        padding: 0 4px;
        background-color: white;
        color: #DADCE0;
        font-size: 16px;
        transition: 0.5s;
        z-index: 0;
        }

        ::placeholder {
        color: transparent;
        }
        .input {
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 90%;
        border: 1px solid #DADCE0;
        border-radius: 7px;
        font-size: 16px;
        padding: 0 20px;
        outline: none;
        background: none;
        z-index: 1;
        }
 .input:focus + .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
  color:grey;
}

.input:not(:placeholder-shown)+ .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
}

.input:focus {
  border: 2px solid grey;
}
        .form {
            padding-top:70px;
            background-color:white;
            height:300px;
            width: 500px;
            border-radius: 8px;
            margin-top:50px;
            box-shadow: 0 10px 25px rgba(71, 128, 233, 0.2);
          }
        .form1{
            padding:20px;
            background-color:white;
            height:200px;
            width: 400px;
            border-radius: 8px;
            margin-top:50px;
            box-shadow: 0 10px 25px rgba(71, 128, 233, 0.2);}
          .container1{
            position: relative;
            height: 100vh;
          }
          .table1 {
            border-collapse: collapse;
            text-align: center;
            margin: 10px 10px 600px 380px;
            border: 1px solid;
            }
          .table1 th,.table1 td {
            padding: 10px;
            border: 1px solid;
          }
          .table1 th {
            font-weight: bold;
            background-color: #f2f2f2;
          }
        #section1{  
          background-color:cadetblue;
          background-image:url('background.jpg');
          background-repeat: no-repeat;
          background-position: 100%; 
          background-size: 100%;
        }
        #section2{
          background: linear-gradient(to bottom, #33ccff 0%, #333399 100%);
        }
        #section3{
          background: linear-gradient(to bottom, #33ccff 0%, #333399 100%);
        }
        #section4{  
          background: linear-gradient(to bottom, #33ccff 0%, #333399 100%);
        }
        #section5{
          background: linear-gradient(to bottom, #33ccff 0%, #333399 100%);
        }
        #section6{
          background: linear-gradient(to bottom, #33ccff 0%, #333399 100%);
        }
        #section7{
          background: linear-gradient(to bottom, #33ccff 0%, #333399 100%);
        }
        #section8{
          background: linear-gradient(to bottom, #33ccff 0%, #333399 100%);
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
               DASHBOARD
            </div>
            <ul class="list-items">
               <li><a href="#section1"><i class="fas fa-home"></i>Home</a></li>
               <li><a href="#section2"><i class="fas fa-sliders-h"></i>Employee Details</a></li>
               <li><a href="#section6"><i class="fas fa-address-book"></i>Department Details</a></li>
               <li><a href="#section4"><i class="fas fa-cog"></i>Attendance Details</a></li>
               <li><a href="#section5"><i class="fas fa-stream"></i>Salary Details</a></li>
               <li><a href="#section3"><i class="fas fa-user"></i>Project Details</a></li>
               <li><a href="#section7"><i class="fas fa-globe-asia"></i>Infrastructure</a></li>
               <li><a href="#section8"><i class="fas fa-envelope"></i>About us</a></li>
               <div class="icons">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
               </div>             </ul>
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
      
      <section style="align-items:center;justify-content:center;"id="section1">
      <img style="height: 105%;width: 100%; padding-left: 200px" src="stat.jpg" alt="statistics image">
    </section>
     <section style="align-items:center;justify-content:center;" id="section2">
     <div class="box">
        <center><h2>EMPLOYEE DETAILS</h2></center><br>
        <a href="dbms_mini1.php"><button class="but1">INSERT RECORDS</button></a><br><br>
        <a href="dbms_mini2.php"><button class="but1">DELETE RECORDS</button></a><br><br>
        <a href="dbms_mini3.php"><button class="but1">DISPLAY RECORDS</button></a><br><br>
        </div>
   </section>
   
 <section style="align-items:center;justify-content:center;"id="section4">
 <div class="box">
 <center><h2>ATTENDANCE DETAILS</h2></center><br>
        <a href="dbms_mini7.php"><button class="but1">INSERT RECORDS</button></a><br><br>
        <a href="pie.php"><button class="but1">DISPLAY RECORDS</button></a><br><br>
        </div>
  </section>
  

<section style="align-items:center;justify-content:center;" id="section3">
      <div class="box">
      <center><h2>PROJECT DETAILS</h2></center><br>
        <a href="dbms_mini4.php"><button class="but1">INSERT RECORDS</button></a><br><br>
        <a href="dbms_mini5.php"><button class="but1">DELETE RECORDS</button></a><br><br>
        <a href="dbms_mini6.php"><button class="but1">DISPLAY RECORDS</button></a><br><br>
        </div>
       
 </section>

 <section id="section5">
    <div class="container1">
  <table class="table1">
			<tr>
      <th>Package</th><th>Basic Salary</th><th>Housing Allowance</th><th>Transport Allowance</th><th>Total</th>
			</tr>
			<tr><td>1</td><td>$40,000</td><td>$8,000</td><td>$4,000</td><td>$52,000</td></tr>
			<tr><td>2</td><td>$60,000</td><td>$12,000</td><td>$6,000</td><td>$78,000</td></tr>
      <tr><td>3</td><td>$90,000</td><td>$20,000</td><td>$10,000</td><td>$1,20,000</td></tr>
      <tr><td>4</td><td>$1,20,000</td><td>$30,000</td><td>$15,000</td><td>$1,65,000</td></tr>	
		</table><br>
  <div class="form1" style="position:absolute;bottom:100px;left: 540px; text-align: center;">
    
        <div class="inputContainer">
        <input type="text" class="input" name="uname" placeholder="Enter ID">
        <label for="" class="label">EMPLOYEE ID:</label> 
        </div>
        <div class="inputContainer">
        <input type="text" class="input" name="psw" placeholder="Enter Package">
        <label for="" class="label">PACKAGE:</label> 
        </div>
        <a href="success.php">
        <button style="border-radius: 4px;width: 50%;background-color: white;color: black;border: 2px solid purple;">INSERT RECORDS</button></a><br><br>
      </div>
    </div>
</section>

 <section id="section6">
<a href="https://www.accountingtoday.com">
  <img src="account.jpg" alt="HTML tutorial" style="width:200px;height:200px;position: relative;top:50px;left:400px">
</a><a href="https://venngage.com/">
  <img src="marketing.jpg" alt="HTML tutorial" style="width:200px;height:200px;position: relative;top:50px;left:500px">
</a><a href="https://blog.hubspot.com/marketing/online-advertising">
  <img src="ad.jpg" alt="HTML tutorial" style="width:200px;height:200px;position: relative;top:50px;left:600px">
</a><a href="https://dharma-production.com/">
  <img src="production.jpg" alt="HTML tutorial" style="width:200px;height:200px;position: relative;top:280px;left:-200px">
</a><a href="https://www.rdworldonline.com/">
  <img src="RandD.jpeg" alt="HTML tutorial" style="width:200px;height:200px;position: relative;top:280px;left:-100px">
</a><a href="https://www.allcargologistics.com/">
  <img src="logistics.jpg" alt="HTML tutorial" style="width:200px;height:200px;position: relative;top:280px;left:0px">
</a>
</section>

<section style="align-items:right;justify-content:right;padding-right:100px;padding-top:100px;"id="section7">
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
<section style="align-items:center;justify-content:center;"id="section8">
  <div style="padding-left:300px;padding-top: 0px;color:white;">
  <h2>WHO ARE WE?</h2>
        <P>B&D is our private label – that’s designed by us, and owned by you. If you’re looking for head-turning styles that are one-of-a-kind, B&D is what you should stock up on.
        Since our launch, we have not only redefined the art of e-retailing beauty and personal care in India, but also have been instrumental in fostering the growth of a previously relatively nascent ecosystem. From bringing you 
            domestic brands, international brands, luxury and prestige brands, premium brands,
            niche and cult brands and expert advice and videos , coupled with our understanding of the needs and preferences of the consumers.</p>
        <h2>OUR VISION:</h2>
        <p>Bring inspiration and joy to people, everywhere, everyday.</P>
        <h4>OUR ADDRESS:</h4>
        <pre style="font-family: times_new_roman">
        B&D Companies,
        Grace Towers,
        K.K Nagar,
        Madurai 625001.</pre>
        <h2>NEED HELP!!</h2>
        <pre style="font-family: times_new_roman">
        Call us at Customer Care no. : 1800-419-6648
        Email us at: customercare@B&Dcompanies.com
        (Operational Timings: 08:00AM to 10:00PM)
        </pre>
        <h2>WHY CHOOSE US?</h2>
      <h3>B&D is specially curated to help you find the best field for all your interest</h3>
  </div>
</section>      
   </body>
</html>