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
                                    echo '<meta http-equiv="Refresh" content="0,url=UserLogin.php"/>';//5����Զ���ת��aURLָ��ҳ��
                                   // echo "<script>alert('���ȵ���')</script>";
                                    exit;
								}

								
							  if ($login=='Correct')
							  {
								// echo $_POST['UserName'];
								  echo $_SESSION['UserName']; 
							  }
							  else
							  {
								 echo '<h1 id="title">������</h1>'; 
							  }
							  
							?>
    							<!--<span class="byline">UserName</span> -->
						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                                <li><a href="UserLogin.php" id="UserLogin-link" ><span class="icon icon-user">�û�����</span></a></li>
								<li><a href="HouseCheck.php" id="HouseCheck-link" ><span class="icon icon-home">��Դ��ѯ</span></a></li>
                                <li><a href="ClientCheck.php" id="about-link"><span class="icon icon-th">�ͻ���ѯ</span></a></li>
								<li><a href="Help.php" id="contact-link"><span class="icon icon-envelope">�����ĵ�</span></a></li>
                                <!--<li><a href="Help.php" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">�����ĵ�</span></a></li>-->
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
		<a class="close" data-dismiss="alert">��</a>
		<span class="label label-warning">����</span>
		   �û������������
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
                   <div class="6u"><input type="submit" class="button submit" value="����" /></div>
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
							  <a class="close" data-dismiss="alert">��</a>
							  <span class="label label-warning">����</span>
								 �������벻ȫ�����������룡
							  </div>';
                                exit;
                            }
                            else
                            {
                                echo '<div class="alert alert-danger" align="center">
							  <a class="close" data-dismiss="alert">��</a>
							  <span class="label label-warning">����</span>
								 ������������������ֻ������������
							  </div>';
                                exit;
                            }

						}else 
						 if (substr($PSearch,0,1)==1 && strlen($PSearch)<11)
						{							  
							echo '<div class="alert alert-danger" align="center"> 
							  <a class="close" data-dismiss="alert">��</a>
							  <span class="label label-warning">����</span>
								 �ֻ�����λ��С��11λ
							</div>';
							exit;
						}
						else if (is_numeric($PSearch)&& strlen($PSearch)<7 )
						{							  
							echo '<div class="alert alert-danger" align="center"> 
							  <a class="close" data-dismiss="alert">��</a>
							  <span class="label label-warning">����</span>
								 �绰����λ��С��7λ
							</div>';
							exit;
						}

                        $conn=oci_connect('ϵͳ����Ա','shclimb',"ORCL");
                        if (!$conn)
                        {
                            echo'�������ݿ�ʧЧ';
                        }
                        $sql="select ����,�ƶ��绰||' '||�绰 as �绰  ,���� as ��������,�Ӵ�Ա from climb.�ͻ���ϵ����_�ͻ� where (�ƶ��绰 ='$PSearch' or �绰 ='$PSearch'or ���� like '$PSearch%') and (¥��ID in (select distinct(¥��ID) from climb.¥�̳�ʼ_¥��2 where DB_ID='$SDBID'))order by �������� desc";
			            //	$sql1="select * from climb.¥�̳�ʼ_¥��2 ";
						//echo $sql;
						//$sql='select * from climb.������_����';
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
						//   echo "<th>��ϸ��Ϣ</th></tr>\n";
                            if (!empty($_GET['all'])|| $nrows<6)
                            {
                                isset($_GET['all']);
                                $rows=true;
                                for ($i = 0; $i < $nrows; $i++)
                                {
                                    echo "<tr>\n";
                                    foreach ($results as $k => $data)
                                    {
                                        if($k=='��������')
                                        {
                                            $Sumar=explode('-',$data[$i]);
                                            $CData=$Sumar[2].'��'. trim($Sumar[1]).$Sumar[0].'��' ;
                                            echo "<td align=\"left\">$CData</td>\n";
                                        }
                                        else
                                        {
                                            echo "<td align=\"left\">$data[$i]</td>\n";
                                        }

                                      //  $data1 = iconv("gb2312","utf-8",$data[$i]);
                                     //   $Sumar=explode(',',$sumres['����'][$h]);
                                      //  echo "<td align=\"left\">$data1</td>\n";
                                    }
                                    //  echo "<td><a href=\"#\">��ѯ</a></td></tr>\n";
                                    //  echo "<td align=\"left\"><button onclick=\"myFunction()\">�������</button>";
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
                                        if($k=='��������')
                                        {
                                            $Sumar=explode('-',$data[$i]);
                                            $CData=$Sumar[2].'��'. trim($Sumar[1]).$Sumar[0].'��' ;
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
                               echo '<a href="ClientCheck.php?all=6">�鿴ȫ��</a><br/>';
                            }

						} 
						else 
						{
						   echo "�޴˼�¼<br />\n";
						}
						echo "$nrows �м�¼���ҵ�<br />\n";
						oci_free_statement($stmt);
						oci_close($conn);
					}
                  }
						?>
					
					
           <!--       <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>���Ӿ�</th>
                      <th>����</th>
                      <th>���</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>���鹫Ԣ</td>
                      <td>���а���ϲ��</td>
                      <td>2010</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>а������</td>
                      <td>����ħ��</td>
                      <td>2005</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>��̽٤����</td>
                      <td>����̽��</td>
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
��Զ��  22:22:26
foreach($iii as $k=>$v){
echo "<a href='detail.php?id=".$v."'>title</a>";
}
��Զ��  22:24:00
detail.php

$_GET

ec ho 
-->

        <?php
        include("foot.php");
        ?>


	</body>
</html>