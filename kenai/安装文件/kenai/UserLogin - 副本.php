<!DOCTYPE HTML>
<!--
	Prologue 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php session_start(); ?>
<html>
	<head>
		<title>�������</title>
        <link rel="shortcut icon" href="favicon.ico" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
		<meta http-equiv="content-type" content="text/html; charset=gb2312" />
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
							<span class="image avatar48"><img src="images/logo1.jpg" alt="" /></span>
                            <?php
							  if (isset($_POST))
							  {
								if (!empty($_POST['UserName']))
								{  
								 //  $PUserName=iconv("utf-8","gb2312",$_POST['UserName']); 
								   $PUserName=$_POST['UserName'];
								   $PPassWord=$_POST['PassWord']; 
								//   echo $PUserName . '<br/>'.$_POST['UserName'].'<br/>'. $PPassWord;
								 //  $conn = oci_connect('hr', 'welcome', 'MYDB'); oci_new_connect() �����
								  //  $conntest =@oci_connect("system", "123s" , "ORCL");
								//   $conntest =@oci_connect(iconv("utf-8","gb2312",'���Ļ�԰'), "1234" , "ORCL");
								   $conntest=@oci_connect($PUserName,$PPassWord,"ORCL");
								   if (!$conntest) 
								   {
									   $login='Error';
									  // echo $login;
									   	
								   }
								   else
								   {
									  	$login='Correct';
									   oci_close($conntest); 							   
								   
								   $_SESSION['UserName']=$_POST['UserName'];
								   //echo  $_SESSION['UserName'];
								   //$conn=oci_connect('system','123',"ORCL");
								   $conn=oci_connect('ϵͳ����Ա','shclimb',"ZQ");
								   //$sql1='SELECT * FROM ice.test where id=1';
								   $sql='SELECT DB_ID FROM CLIMB.DATABASES_USERS WHERE USER_NAME=\''.$_POST['UserName'].'\'';
								  // echo $sql1;
										
										//  $sql = iconv("utf-8","gb2312",$sql1);
										  $stid = oci_parse($conn,$sql);
										  oci_define_by_name($stid, "DB_ID", $DBID); 
										 // echo $sql;
										  oci_execute($stid,OCI_DEFAULT);
										 while (oci_fetch($stid)) {
											  //echo "DB_ID:" . $DBID . "\n";
											  $_SESSION['DBID']=$DBID;
										  }
										  
										  oci_free_statement($stid);
										  oci_close($conn);
								    }
								    }
							      }
								
							  if (!isset($login))
							  {
								  echo '<h1 id="title">������</h1>';
							  } 
							  else if ($login=='Correct')
							  {
								 echo $_POST['UserName']; 
							  }
							  else
							  {
								 echo '<h1 id="title">������</h1>'; 
							  }
							  
							?>
    							<span class="byline">UserName</span>
						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                 
                                <li><a href="UserLogin.php" id="UserLogin-link" class="skel-panels-ignoreHref"><span class="icon icon-user">�û�����</span></a></li>
								<li><a href="HouseCheck.php??id=HouseCheck" id="HouseCheck-link" ><span class="icon icon-home">��Դ��ѯ</span></a></li>
                                <li><a href="ClientCheck.php??id=portfolio" id="about-link"><span class="icon icon-th">�ͻ���ѯ</span></a></li>
								<li><a href="Help.php" id="contact-link" ><span class="icon icon-envelope">�����ĵ�</span></a></li>
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
		<a class="close" data-dismiss="alert">��</a>
		<span class="label label-warning">����</span>
		   �û������������
	  </div>';
	}
  }
  ?>
  <div id="main">		
      <!-- Contact -->
          <section id="top" class="four">
              <div class="container">
  
                  <header>
                      <h2>�û�����</h2>
                  </header>
  
                  <p>�������</p>
              <?php
				 if (isset($login)&&$login=='Correct' )     
				  {  
					 echo $_POST["UserName"];  
					 echo ' <form method="post" action="#">
					 <div class="row"> 
						   <input type="submit" class="button submit" value="�ǳ�" />
						   </div> </form> ';
					 unset($_POST['PassWord']);
					 unset($login);
				  }
				  else
				  {
					  echo '<form method="post" action="#">
						  <div class="row half">
							  
						  <!--	<div class="6u"><label>��������</label><input type="text" class="text" name="UserName" placeholder="Name" readonly disabled /></div> -->
							  <div class="6u"><label>��������</label><input type="text" class="text" name="UserName" placeholder="Name" /></div>
							  <div class="6u"><label>���룺</label><input type="password" class="text" name="PassWord" placeholder="PASSWORD"  /></div>
						  </div>
						  <!--<div class="row half">
							  <div class="12u">
								  <textarea name="message" placeholder="Message"></textarea>
							  </div>
						  </div> -->
						  <div class="row">
							  <div class="12u">
								<!--  <a href="#" class="button submit">ȡ��</a>  -->
							  <!-- <a href="#" class="button submit">����</a> -->
								  <input type="submit" class="button submit" value="����" />
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
��Զ��  22:22:26
foreach($iii as $k=>$v){
echo "<a href='detail.php?id=".$v."'>title</a>";
}
��Զ��  22:24:00
detail.php

$_GET

ec ho 
-->

		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<div class="copyright">
						<p>&copy; �Ϻ��п��ͿƼ����޹�˾ ��Ȩ���� 1999��2014</p>
						<ul class="menu">
							<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							<li>Images: <a href="http://ineedchemicalx.deviantart.com">Felicia Simion</a></li>
						</ul>
					</div>
				
			</div>



	</body>
</html>