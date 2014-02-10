<!DOCTYPE HTML>
<!--
	Prologue 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php session_start(); ?>
<html>
	<head>
		<title>科耐软件</title>
        <link rel="shortcut icon" href="favicon.ico" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
		<meta http-equiv="content-type" content="text/html; charset=gb2312" />
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
							<span class="image avatar48"><img src="images/logo1.jpg" alt="" /></span>
                            <?php
                            //"."$_SESSION['DBID']" ;

							  if (isset($_POST))
							  { // print_r($_POST);
                                  if (!empty($_POST['Del']))
                                  {
                                     //  echo $_POST['Del'];
                                      unset($_POST['UserName']);
                                      unset($_SESSION['UserName']);
                                      unset($_SESSION['DBID']);
                                  }
								if (!empty($_POST['UserName']))
								{
								 //  $PUserName=iconv("utf-8","gb2312",$_POST['UserName']);

								   $PUserName=$_POST['UserName'];
								   $PPassWord=$_POST['PassWord'];
								   $conntest=@oci_connect($PUserName,$PPassWord,"ORCL");
								   if (!$conntest) 
								   {
									   $login='Error';
         						   }
								   else
								   {
									  	$login='Correct';
									   oci_close($conntest);
                                       $_SESSION['UserName']=$_POST['UserName'] ;
								   $_SESSION['UserName']=$_POST['UserName'];
								   $conn=oci_connect('系统管理员','shclimb',"ORCL");
                                   if (!$conn)
                                   {
                                       echo'连接数据库失效';
                                   }
								   $sql='SELECT DB_ID FROM CLIMB.DATABASES_USERS WHERE USER_NAME=\''.$_POST['UserName'].'\'';
                                  // echo $sql;
										  $stid = oci_parse($conn,$sql);
										  oci_define_by_name($stid, "DB_ID", $DBID); 
										 // echo $sql;
										  oci_execute($stid,OCI_DEFAULT);
										 while (oci_fetch($stid)) {
											  //echo "DB_ID:" . $DBID . "\n";
											  $_SESSION['DBID']=$DBID;
                                      //       echo $_SESSION['DBID'] ;
										  }
										  
										  oci_free_statement($stid);
										  oci_close($conn);
								    }
								    }
                                    else if(isset($_SESSION['UserName']))
                                   {
                                      $login='Correct';
                                    //   echo $_SESSION['UserName'].$_SESSION['DBID'];
                                   }
							      }

								
							  if (!isset($login))
							  {
								  echo '<h1 id="title">登入名</h1>';
							  } 
							  else if ($login=='Correct')
							  {
								 echo $_SESSION['UserName'];
							  }
							  else
							  {
								 echo '<h1 id="title">登入名</h1><span class="byline">UserName</span>';
							  }
							  
							?>

						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                 
                                <li><a href="UserLogin.php" id="UserLogin-link" class="skel-panels-ignoreHref"><span class="icon icon-user">用户登入</span></a></li>
								<li><a href="HouseCheck.php" id="HouseCheck-link" ><span class="icon icon-home">房源查询</span></a></li>
                                <li><a href="ClientCheck.php" id="about-link"><span class="icon icon-th">客户查询</span></a></li>
								<li><a href="Help.php" id="contact-link" ><span class="icon icon-envelope">帮助文档</span></a></li>
							</ul>
						</nav>
						
				</div>

			
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
  <div id="main">		
      <!-- Contact -->
          <section id="top" class="four">
              <div class="container">
  
                  <header>
                      <h2>用户登入</h2>
                  </header>
              <?php
				 if (isset($login)&&$login=='Correct' )     
				  {  
					 echo '<p>'.$_SESSION["UserName"].'</p>';
					 echo ' <form method="post" action="">
					 <div class="row"> 
						   <input type="submit" class="button submit" value="登出" />
						    <input type="hidden" name="Del" value="PLog" />
						   </div> </form> ';
					  unset($login);
                      unset($_POST['PassWord']);
				  }
				  else
				  {
					  echo '<form method="post" action="#">
						  <div class="row half">

							  <div class="6u"><label>登入名：</label><input type="text" class="text" name="UserName" placeholder="Name" /></div>
							  <div class="6u"><label>密码：</label><input type="password" class="text" name="PassWord" placeholder="PASSWORD"  /></div>
						  </div>

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

        <?php
        include("foot.php");
        ?>



	</body>
</html>