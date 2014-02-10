<!DOCTYPE HTML>
<!--
	Prologue 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>科耐软件</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
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
								  if (!empty($_POST[name]))
								  {
									   //echo $_POST[PassWord];
									  $_pw=md5($_POST['PassWord']);
									  echo $_POST[PassWord];
									 // $stid = oci_parse($conn, 'select * from USER$ where PASSWORD=$_pw');
									  $stid = oci_parse($conn,'SELECT * FROM ice.test where id=4');
									  //$stid = oci_parse($conn, 'SELECT * FROM climb.客户关系管理_客户_类别_楼盘');
									  oci_execute($stid,OCI_DEFAULT);
									  $nrows = oci_fetch_all($stid, $results);
									  if ($nrows > 0) {
										 echo '我们';//"<table border=\"1\">\n";
									  }
									  else
									  {
										  echo '我';
									  }
								  }
							  }
							  if (empty($_POST[name]))
							  {
							    echo '<h1 id="title">登入名</h1>';
							  }
							  else
							  {
								 echo $_POST[name] . $_POST[PassWord] . '<br/>'.$_pw; 
							  }
							?>
							<span class="byline">Hyperspace Engineer</span>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="icon icon-home">用户登入</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="icon icon-th">房源查询</span></a></li>
								<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="icon icon-user">客户界面设计</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">详细信息</span></a></li>
							</ul>
						</nav>
						
				</div>
				
				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
							<li><a href="#" class="icon icon-facebook"><span>Facebook</span></a></li>
							<li><a href="#" class="icon icon-github"><span>Github</span></a></li>
							<li><a href="#" class="icon icon-dribbble"><span>Dribbble</span></a></li>
							<li><a href="#" class="icon icon-envelope"><span>Email</span></a></li>
						</ul>
				
				</div>
			
			</div>

		<!-- Main -->
			<div id="main">		
				<!-- Contact -->
					<section id="top" class="four">
						<div class="container">

							<header>
								<h2>用户登入</h2>
							</header>

							<p>售楼软件</p>
							
							<form method="post" action="#">
								<div class="row half">
                                    
									<div class="6u"><label>登入名：</label><input type="text" class="text" name="name" placeholder="Name" /></div>
                                    
									<div class="6u"><label>密码：</label><input type="password" class="text" name="PassWord" placeholder="PASSWORD" /></div>
								</div>
								<!--<div class="row half">
									<div class="12u">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
								</div> -->
								<div class="row">
									<div class="12u">
                                        <a href="#" class="button submit">取消</a>
									<!-- <a href="#" class="button submit">登入</a> -->
                                        <input type="submit" class="button submit" value="登入" />
									</div>
								</div>
							</form>

						</div>
					</section>
			
			</div>

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