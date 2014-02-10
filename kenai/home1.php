﻿<!DOCTYPE HTML>
<!--
	Prologue 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>科耐软件</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
        <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>

		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
            <link rel="stylesheet" href="css/bootstrap.min.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body>

      
		<!-- Header -->
			<div id="header" class="skel-panels-fixed">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
                            <?php
							//  session_start();
							  $conn=oci_connect('system','1234',"ORCL");
							  if (!$conn) 
							  {
								  $e = oci_error();
								  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
							  }
							  else
							  {
								  if (!empty($_POST[UserName]))
								  {
									   //echo $_POST[PassWord];
							
									//  $_pw= substr(md5($_POST['PassWord']),8,16);
									  $_UN=$_POST['UserName'];
									//  echo substr(md5("admin"),8,16);
									 // echo $_POST[PassWord];
									 // $stid = oci_parse($conn, 'select * from USER$ where PASSWORD=$_pw');
									  $sql1='SELECT * FROM CLIMB.DATABASES_USERS WHERE USER_NAME=\''.$_POST['UserName'].'\'';
									//    $sql1='select * from sys.user$  where PASSWORD=\'' . $_pw .'\'';
									 //echo $sql1;
									 // $sql1='SELECT * FROM ice.test where id=1';
									//  $sql1='select * from sys.user$  where PASSWORD=\'' . $_pw .'\'';
									//  oci_bind_by_name($stmt, ':pw', $_pw, -1);  
										$sql = iconv("utf-8","gb2312",$sql1);
										$stid = oci_parse($conn,$sql);
									   // echo $sql;
										oci_execute($stid,OCI_DEFAULT);
										$nrows = oci_fetch_all($stid, $results);
										if ($nrows > 0 && $_POST["PassWord"]=="123") 
										{
										   $login='Correct';
										}
										else
										{
										   $login='Error';
										}
									}
								}
							  if (!isset($login))
							  {
								  echo '<h1 id="title">登入名</h1>';
							  } 
							  else if ($login=='Correct')
							  {
								 echo $_POST[UserName]; 
							  }
							  else
							  {
								 echo '<h1 id="title">登入名</h1>'; 
							  }
							  
							?>
    							<span class="byline">Hyperspace Engineer</span>
						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                                <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="icon icon-user">用户登入</span></a></li>
								<!--<li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="icon icon-user">用户登入</span></a></li>-->
								<li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="icon icon-home">房源查询</span></a></li>
								<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="icon icon-th">客户查询</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">帮助文档</span></a></li>
							</ul>
						</nav>
						
				</div>
				 
				<!-- <div class="bottom"> 

					 Social Icons
					  <ul class="icons">
							<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
							<li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
							<li><a href="#" class="icon icon-github"><span>Github</span></a></li>
							<li><a href="#" class="icon icon-dribbble"><span>Dribbble</span></a></li>
							<li><a href="#" class="icon icon-envelope"><span>Email</span></a></li>
						</ul>
				
				</div> -->
			
			</div>
	<!-- Main -->
  <?php
  
  if ($login=='Error')
  {
    echo '<div class="alert alert-danger" align="center"> 
      <a class="close" data-dismiss="alert">×</a>
      <span class="label label-warning">警告</span>
         用户名或密码错误
    </div>';
  }
  ?>
  <div id="main">		
      <!-- Contact -->
          <section id="top" class="four">
              <div class="container">
  
                  <header>
                      <h2>用户登入</h2>
                  </header>
  
                  <p>科耐软件</p>
              <?php
			 
             if ($login=='Correct' )     
              {  
				 echo $_POST["UserName"];  
				 echo ' <form method="post" action="#">
				 <div class="row"> 
				       <input type="submit" class="button submit" value="登出" />
					   </div> </form> ';
			     unset($_POST['PassWord']);
				 unset($login);
              }
			  else
			  {
				  echo '<form method="post" action="#">
                      <div class="row half">
                          
                      <!--	<div class="6u"><label>登入名：</label><input type="text" class="text" name="UserName" placeholder="Name" readonly disabled /></div> -->
                          <div class="6u"><label>登入名：</label><input type="text" class="text" name="UserName" placeholder="Name" /></div>
                          <div class="6u"><label>密码：</label><input type="password" class="text" name="PassWord" placeholder="PASSWORD"  /></div>
                      </div>
                      <!--<div class="row half">
                          <div class="12u">
                              <textarea name="message" placeholder="Message"></textarea>
                          </div>
                      </div> -->
                      <div class="row">
                          <div class="12u">
                            <!--  <a href="#" class="button submit">取消</a>  -->
                          <!-- <a href="#" class="button submit">登入</a> -->
                              <input type="submit" class="button submit" value="登入" />
                          </div>
                      </div>
                  </form>';  
			  }
              ?>
              </div>
          </section>
  
  </div>

<!--<select multiple="multiple" size="2">
  <option value ="volvo">Volvo</option>
  <option value ="saab">Saab</option>
  <option value="opel">Opel</option>
  <option value="audi">Audi</option>
</select> 

   a b c
id  3 4 5
赵远景  22:22:26
foreach($iii as $k=>$v){
echo "<a href='detail.php?id=".$v."'>title</a>";
}
赵远景  22:24:00
detail.php

$_GET

ec ho 
-->

		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<div class="copyright">
						<p>&copy; 2013 Jane Doe. All rights reserved.</p>
						<ul class="menu">
							<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							<li>Images: <a href="http://ineedchemicalx.deviantart.com">Felicia Simion</a></li>
						</ul>
					</div>
				
			</div>



	</body>
</html>