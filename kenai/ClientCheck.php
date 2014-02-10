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
         <script type="text/javascript">
  
</script>
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
								//if (!empty($_POST['UserName']))
								if (!empty($_SESSION['DBID']))
								{
								//	echo $_SESSION['DBID'];
									$SDBID=$_SESSION['DBID'];
								    $login='Correct';
								 }
							    else
								{
									$login='Error';
                                    echo '<meta http-equiv="Refresh" content="0,url=UserLogin.php"/>';//5秒后自动跳转到aURL指定页面
                                   // echo "<script>alert('请先登入')</script>";
                                    exit;
								}

								
							  if ($login=='Correct')
							  {
								// echo $_POST['UserName'];
								  echo $_SESSION['UserName']; 
							  }
							  else
							  {
								 echo '<h1 id="title">登入名</h1>'; 
							  }
							  
							?>
    							<!--<span class="byline">UserName</span> -->
						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                                <li><a href="UserLogin.php" id="UserLogin-link" ><span class="icon icon-user">用户登入</span></a></li>
								<li><a href="HouseCheck.php" id="HouseCheck-link" ><span class="icon icon-home">房源查询</span></a></li>
                                <li><a href="ClientCheck.php" id="about-link"><span class="icon icon-th">客户查询</span></a></li>
								<li><a href="Help.php" id="contact-link"><span class="icon icon-envelope">帮助文档</span></a></li>
                                <!--<li><a href="Help.php" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">帮助文档</span></a></li>-->
							</ul>
						</nav>
						
				</div>

			
			</div>
	<!-- Main -->
 <?php
/*  if (isset($login))
  {
	if ($login=='Error')
	{
	  echo '<div class="alert alert-danger" align="center"> 
		<a class="close" data-dismiss="alert">×</a>
		<span class="label label-warning">警告</span>
		   用户名或密码错误
	  </div>';
	}
  }*/
  ?>
  <div id="main">		
      <!-- Contact -->
          <section id="top" class="four">
              <div class="container">
                 <header>
                    <form method="post" action="#" class="well form-search">
                  <div class="row half">
                   <div class="6u"><input type="text" class="text" name="PSearch" placeholder="Search" /></div>
                   <div class="6u"><input type="submit" class="button submit" value="搜索" /></div>
                   </div>                   
                </form>
                
                  </header>
                  <div>
                  <?php
					/* oci_fetch_all example mbritton at verinet dot com (990624) */
					if ($login=='Correct')
                  {
					if (!empty($_POST['PSearch'])||!empty($_GET['all']) )
					{
                        if (!empty($_POST['PSearch']))
                        {
                            $_SESSION['SSearch']=$_POST['PSearch'];
                        }
                        $PSearch= $_SESSION['SSearch'];
						if (strlen($PSearch)<4)
						{
                            if(!is_numeric($PSearch))
                            {
                                echo '<div class="alert alert-danger" align="center">
							  <a class="close" data-dismiss="alert">×</a>
							  <span class="label label-warning">警告</span>
								 姓名输入不全，请重新输入！
							  </div>';
                                exit;
                            }
                            else
                            {
                                echo '<div class="alert alert-danger" align="center">
							  <a class="close" data-dismiss="alert">×</a>
							  <span class="label label-warning">警告</span>
								 输入错误，请重新输入手机号码或姓名！
							  </div>';
                                exit;
                            }

						}else 
						 if (substr($PSearch,0,1)==1 && strlen($PSearch)<11)
						{							  
							echo '<div class="alert alert-danger" align="center"> 
							  <a class="close" data-dismiss="alert">×</a>
							  <span class="label label-warning">警告</span>
								 手机号码位数小于11位
							</div>';
							exit;
						}
						else if (is_numeric($PSearch)&& strlen($PSearch)<7 )
						{							  
							echo '<div class="alert alert-danger" align="center"> 
							  <a class="close" data-dismiss="alert">×</a>
							  <span class="label label-warning">警告</span>
								 电话号码位数小于7位
							</div>';
							exit;
						}

                        $conn=oci_connect('系统管理员','shclimb',"ORCL");
                        if (!$conn)
                        {
                            echo'连接数据库失效';
                        }
                        $sql="select 姓名,移动电话||' '||电话 as 电话  ,日期 as 来访日期,接待员 from climb.客户关系管理_客户 where (移动电话 ='$PSearch' or 电话 ='$PSearch'or 姓名 like '$PSearch%') and (楼盘ID in (select distinct(楼盘ID) from climb.楼盘初始_楼盘2 where DB_ID='$SDBID'))order by 来访日期 desc";
			            //	$sql1="select * from climb.楼盘初始_楼盘2 ";
						//echo $sql;
						//$sql='select * from climb.工作流_类型';
						//$sql = iconv("utf-8","gb2312",$sqlvvvvvv1);
						$stmt = oci_parse($conn,$sql);
						
						oci_execute($stmt);
						
						$nrows = oci_fetch_all($stmt, $results);
                      //  print_r($results);
						if ($nrows > 0) 
						{
						   echo "<table border=\"1\" class=\"table table-striped\">\n";
						   echo "<tr>\n";
						   foreach ($results as $key => $val) 
						   {
							//  $key = iconv("utf-8","gb2312",$key1);
							  echo "<th align=\"center\"><b>$key</b></th>\n";
						   }
						//   echo "<th>详细信息</th></tr>\n";
                            if (!empty($_GET['all'])|| $nrows<6)
                            {
                                isset($_GET['all']);
                                $rows=true;
                                for ($i = 0; $i < $nrows; $i++)
                                {
                                    echo "<tr>\n";
                                    foreach ($results as $k => $data)
                                    {
                                        if($k=='来访日期')
                                        {
                                            $Sumar=explode('-',$data[$i]);
                                            $CData=$Sumar[2].'年'. trim($Sumar[1]).$Sumar[0].'日' ;
                                            echo "<td align=\"left\">$CData</td>\n";
                                        }
                                        else
                                        {
                                            echo "<td align=\"left\">$data[$i]</td>\n";
                                        }

                                      //  $data1 = iconv("gb2312","utf-8",$data[$i]);
                                     //   $Sumar=explode(',',$sumres['房号'][$h]);
                                      //  echo "<td align=\"left\">$data1</td>\n";
                                    }
                                    //  echo "<td><a href=\"#\">查询</a></td></tr>\n";
                                    //  echo "<td align=\"left\"><button onclick=\"myFunction()\">点击这里</button>";
                                    echo '</tr>';
                                }
                            }else
                            {
                                $rows=False;
                                for ($i = 0; $i < 6; $i++)
                                {
                                    echo "<tr>\n";
                                   /* foreach ($results as $data)
                                    {
                                        echo "<td align=\"left\"> $data[$i]</td>\n";
                                    }   */
                                    foreach ($results as $k => $data)
                                    {
                                        if($k=='来访日期')
                                        {
                                            $Sumar=explode('-',$data[$i]);
                                            $CData=$Sumar[2].'年'. trim($Sumar[1]).$Sumar[0].'日' ;
                                            echo "<td align=\"left\">$CData</td>\n";
                                        }
                                        else
                                        {
                                            echo "<td align=\"left\">$data[$i]</td>\n";
                                        }
                                    }
                                    echo '</tr>';
                                }
                            }

						   echo "</table>\n";
                            if (!$rows)
                            {
                               echo '<a href="ClientCheck.php?all=6">查看全部</a><br/>';
                            }

						} 
						else 
						{
						   echo "无此记录<br />\n";
						}
						echo "$nrows 行记录被找到<br />\n";
						oci_free_statement($stmt);
						oci_close($conn);
					}
                  }
						?>
					
					
           <!--       <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>电视剧</th>
                      <th>类型</th>
                      <th>年代</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>爱情公寓</td>
                      <td>都市爱情喜剧</td>
                      <td>2010</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>邪恶力量</td>
                      <td>悬疑魔幻</td>
                      <td>2005</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>神探伽俐略</td>
                      <td>推理探案</td>
                      <td>2008</td>
                    </tr>
                  </tbody>
                </table>-->
    </div>            
              <!--  <div class="btn-group">
                <button class="btn">Action</button>
                <button class="btn dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>Coffee</li>
                  <li>Tea</li>
                  <li>Milk</li>
                </ul>
               </div>
              </div>-->
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