<!DOCTYPE HTML>
<!--
	Prologue 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		
	</head>
	<body>

      
		<!-- Header -->
			<div id="header" class="skel-panels-fixed">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/logo1.jpg" alt="" /></span>
                            <?php
							//  session_start();
							 // $conn=oci_connect('system','1234',"ORCL");
							// $name= iconv("utf-8","gb2312",'system');
							  $conn=oci_connect('system','123',"ORCL");
							  if (!$conn) 
							  {
								  $e = oci_error();
								  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
							  }
							  else
							  {   
							      if (!isset($_POST))
								  { echo '我们';
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
    							<span class="byline">UserName</span>
						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                                <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="icon icon-user">用户登入</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="icon icon-home">房源查询</span></a></li>
                                <li><a href="ClientCheck.php??id=portfolio" id="about-link" class="skel-panels-ignoreHref"><span class="icon icon-th">客户查询</span></a></li>
								<li><a href="Help.php" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">帮助文档</span></a></li>
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
  if (isset($login))
  {
	if ($login=='Error')
	{
	  echo '<div class="alert alert-danger" align="center"> 
		<a class="close" data-dismiss="alert">×</a>
		<span class="label label-warning">警告</span>
		   用户名或密码错误
	  </div>';
	}
  }
  ?>
  
  
	</body>
</html>