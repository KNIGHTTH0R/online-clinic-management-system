<?php
	session_start();

	 mysql_connect('localhost', 'root', '');
	 mysql_select_db('project');

	$sos=$_SESSION['patmail'];
	$dept=$_SESSION['doc_dept'];

	$sql_docname="SELECT doc_name FROM doc_registration where doc_dept='$dept' AND status='present' ";
	$result_docname=mysql_query($sql_docname);

   if(isset($_POST) & !empty($_POST))
   {
        $selected_doctor=$_POST['doctor'];


        $_SESSION['selected_doctor']=$selected_doctor;

        $sql_docid="SELECT doc_id FROM doc_registration WHERE doc_name='$selected_doctor'  ";
        $result_docid=mysql_query($sql_docid);
        $obj_docid= mysql_fetch_object($result_docid);
        $docid= $obj_docid->doc_id; 

        $_SESSION['docid'] = $docid;
        header("Location:patappointtime.php");
    }





?>



<!DOCTYPE html>
<html>
<head>
  <title><?php 

   $sql_name="SELECT pat_name FROM pat_registration where pat_mail='$sos' ";
   $result_name=mysql_query($sql_name);
    $obj=mysql_fetch_object($result_name);      
  echo $obj->pat_name; 
  ?>
    
  </title>
  <link rel="stylesheet" type="text/css" href="patienthomestyle.css">


</head>
<body>

<div class="containertop">
  <div class="wrapper"> 
    <div id="topright">
      <h4>Contact Us:</h4> onecaremedicalclinic@gmail.com<br>
     033-244268/235263/345654<br>
    <form>
      <input id="topsearch" type="text" name="toptext">
      <input id="topbtn" type="button" name="topbutton" value="Search">
    </form>

    <!--<br> <a id="makeapp" href="patientregistration.php"><strong>Get Appointment</strong></a>-->

    </div>



    <div id="topleft">
    <img src="OneCareLogo.jpg">
      
    </div>
  </div> 
</div>


<div class="menubar"> 
   <div class="wrapper">
    <ul>
      <li><a href="patienthome.php">Home</a></li>
      <li><a href="patdetails.php">My Details</a></li>
      <li><a href="patapp.php">Make Appoinment</a></li>
      <li><a href="patappview.php">View Booking</a></li>
      <li><a href="patappcancel.php">Cancel Booking</a></li>
      
      <li><a href="patlogout.php">Logout</a></li>
    </ul>
  </div>
</div> 

<br>
	
	

	<div style="color: #09AD3D ;">
	<h2 id="head" style="font-size: 25px; " > Find your doctor <?php echo $obj->pat_name;  ; ?> </h2>
	</div>
<br>	



	<div style="height: 250px;width: 550px;background-color: #bdc3c7;margin: auto; "><br>
    <form method="POST">

	  <label style="font-size: 22px;margin-left: 20px; color: #050559 ">Selected Department:</label>&nbsp &nbsp &nbsp &nbsp
		<label style="font-size: 20px;">	<?php echo $dept; ?> </label>
		<br>

      <label style="font-size: 22px;margin-left: 20px;color: #050559 " for="doctor">Select Doctor: &nbsp </label>

      <select style="width: 300px;height: 38px;border-radius: 5px;margin-top: 25px; " name="doctor" id='doctor' required>
      <option selected="selected" disabled="disabled">select your doctor</option>


      <?php
      while ($list = mysql_fetch_array($result_docname, MYSQL_ASSOC)) {
      ?>
      <option> <?php echo $list['doc_name'];?> </option>
       
      <?php
      }
      ?>
      </select>
      

      <br></br><br>
      <p class="sub">
                  <!--<a href="patapptime.php">--><input type="submit" name="sub" id="sub" value="Proceed" >
                  
       </p>
 </form>
    </div> 
  





<footer style="height: 300px;width: 100%;background-color: #35342F;margin-top: 100px; ">
  <div style="height: 240px;width: 100%; " ><br>
    <div style="height: 200px;width: 1200px;margin-left: 60px;  ">
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 20px;color: #F1BF04; ">Quick Navigation</p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="aboutus.html">About Us</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="patientregistration.php">Make Appointment</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="help.html">Contact Us</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="feedback.php">Feedback</a> </p>

      </div>
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 20px;color: #F1BF04; ">Related Links</p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="https://www.aiimsexams.org/">AIIMS</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="http://www.cmch-vellore.edu/">CMC Vellore</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="http://www.allindiadrug.in/">All India Drug Supply Co.</a> </p>
      </div>
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 21px;color: #F1BF04; ">One Care Medical Clinic</p><br>
        <p style="color: #fff;font-size: 15px;font-family: arial, helvetica; ">8B Gangadhar Benerjee lane,<br>25 Pally,Diamond Harbour Road,<br>Kolkata-700023<br>West Bengal. <br><br>onecaremedicalclinic@gmail.com<br>033-244268 / 235263 / 345654</p>

        
      </div>
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 20px;color: #F1BF04; ">Other Links</p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="###">Privacy Policy</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="####">FAQ</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="####">Site Map</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="developers.html">Developers</a> </p>
        
      </div>

    </div>

  </div>

  <div style="height: 60px;width: 100%;background-color: #0F0D03; " >
      <div style="margin-left: 20px; " >
      <p style="color: #fff;font-size: 13px;font-family: arial, helvetica; "> Copyright &copy; 2017 One Care Medical Clinic. &nbsp &nbsp All Rights Reserved</p>
      </div>

    <div style="margin-left: 950px; ">
      <a href="https://www.facebook.com/subhajit.khan.56"><img src="fb.png" width="30" height="30" title="facebook"></a>&nbsp &nbsp
      <a href="https://in.pinterest.com/subhajitkhan888/"><img src="pin.png" width="30" height="30" title="pinterest" ></a>&nbsp &nbsp
      <a href="https://www.twitter.com"><img src="tw.png" width="30" height="30" title="twitter"></a>&nbsp&nbsp
      <a href="https://www.youtube.com/channel/UCtvqyS3QCllWovcDYqRdnFw"><img src="ytb.png" width="30" height="30" title="youtube"></a>&nbsp&nbsp
      <a href="https://www.linkedin.com/in/subhajit-khan-b0838a119/"><img src="lnk.png" width="30" height="30" title="linkedin"></a>&nbsp&nbsp
      <a href="https://www.instagram.com"><img src="ins.jpg" width="30" height="30" title="instagram"></a>
    </div>
  </div>
</footer>





</body>
</html>

