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
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/mytable.css"/>
		<link rel="stylesheet" type="text/css" href="menu/css/default.css" />
		<link rel="stylesheet" type="text/css" href="menu/css/component.css" />
         <link rel="stylesheet" type="text/css" href="css/pagestyle.css" media="screen"/>
                 <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
		<script src="js/jquery.paginate.js" type="text/javascript"></script>
		<script src="menu/js/modernizr.custom.js"></script>
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
        <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script> 
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
       
  <!--       <script type="text/javascript">-->
 <?php
// set_time_limit(0);
function found($ID1,$ID2)
{
global $conntest ;
global $DBID,$res1,$res2,$res3 ;
 $sqlstr=' select a.¥��id,a.���� from climb.¥�̳�ʼ_¥��2 a where DB_ID=\''.$DBID.'\'and a.�ϼ�¥��id=\''.$ID1.'\' order by a.˳��';
// $sqlstr = iconv("utf-8","gb2312",$sqlstr1);
  $stmt1 = oci_parse($conntest,$sqlstr);
 oci_execute($stmt1);
 $nrows1 = oci_fetch_all($stmt1, $resu);


           //<a href="www.baidu.com?unitno='.$ID1.'">'.$ID2.'</a>
if ($nrows1>0)
{
                   // echo $res[$res1][0];
     echo'<ul class="dl-submenu">';
    for($j=0;$j<$nrows1;$j++)
     {

    //  found($resu[$res1][$j],$resu[$res2][$j]) ;

      echo"<li>
           <a href='HouseCheck.php?LID=".$resu[$res1][$j]."'>".$resu[$res2][$j]."</a></li>";
            //echo "<a href='detail.php?id=".$v."'>title</a>";
     }
     echo '</ul>';
}
 oci_free_statement($stmt1);
}
?>
  
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

    							<span class="byline">UserName</span>
						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                                <li><a href="UserLogin.php?id=UserLogin" id="UserLogin-link" ><span class="icon icon-user">�û�����</span></a></li>
								<li><a href="HouseCheck.php?id=HouseCheck" id="HouseCheck-link" ><span class="icon icon-home">��Դ��ѯ</span></a></li>
                                <li><a href="ClientCheck.php?id=portfolio" id="about-link"><span class="icon icon-th">�ͻ���ѯ</span></a></li>
								<li><a href="Help.php" id="contact-link"><span class="icon icon-envelope">�����ĵ�</span></a></li>
                                <!--<li><a href="Help.php" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">�����ĵ�</span></a></li>-->
							</ul>
						</nav>
						
				</div>
				 
			</div>

  <div id="main">		
      <!-- Contact -->
          <section id="top" class="four">
         
           	<div class="container demo-3">	
			<!--<div class="main clearfix">-->
                <?php
               // $user = iconv("utf-8","gb2312",'ϵͳ����Ա');

                $conntest=oci_connect('ϵͳ����Ա','123',"ORCL");
                $GLOBALS["con"]=$conntest;
              //  print_r()
                if (!$conntest) {
                    $e = oci_error();
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                 $DBID='1936667';
                $sqlstr='select a.¥��ID,a.���� from climb.¥�̳�ʼ_¥��2 a where a.DB_ID=\''.$DBID.'\' and a.�ϼ�¥��id is null order by a.˳��';
            //    $sqlstr = iconv("utf-8","gb2312",$sqlstr1);
             //   echo $sqlstr;
                $stmt = oci_parse($conntest,  $sqlstr);

                oci_execute($stmt);
                $nrows = oci_fetch_all($stmt, $res);
               // print_r( $nrows);    //<a href="//www.baidu.com?unitno='.$Value['UNITNO'].'">'.$Value['STATUS'].'</a>
                 echo' <div id="dl-menu" class="dl-menuwrapper">
						<button class="dl-trigger dl-active">Open Menu</button>
						<ul class="dl-menu dl-menuopen">';
                if ($nrows>0)

                {
                 //   $res1 = iconv("utf-8","gb2312",'¥��ID');
                  //  $res2 = iconv("utf-8","gb2312",'����');
                   // echo $res[$res1][0];
                    $res1='¥��ID';
                    $res2='����';
                    for($i=0;$i<$nrows;$i++)
                    {
                        echo '<li> <a href="#">'.$res[$res2][$i].'</a>';
                        found($res[$res1][$i],$res[$res2][$i]) ;
                        echo '</li>';

                    }

                }
                oci_free_statement($stmt);

                 echo'</ul></div><!-- /dl-menuwrapper -->
				</div>';

              if (!empty($_GET['LID']))
              {
                 $GLID=$_GET['LID'];
                $sumsql="select one.¥��,one.����,one.״̬,two.��ԪID from (select c.¥��, max(c.����) as ����, max(c.״̬) as ״̬
                from (select b.¥��,
                wm_concat(b.����) over(partition by b.¥�� ORDER BY b.����) as ����,
                wm_concat(b.״̬) over(partition by b.¥�� ORDER BY b.����) as ״̬
                from climb.¥�̳�ʼ_��Ԫ b
                where b.¥��ID = '$GLID' ) c
                GROUP BY c.¥��) one , (select c.¥��, max(c.��ԪID) as ��ԪID
                from (select b.¥��,
                wm_concat(b.��ԪID) over(partition by b.¥�� ORDER BY b.����) as ��ԪID
                from climb.¥�̳�ʼ_��Ԫ b
                where b.¥��ID = '$GLID' ) c
                GROUP BY c.¥��) two where two.¥��=one.¥�� ORDER BY one.¥�� ";
                //echo $sumsql;
                $sum = oci_parse($conntest,  $sumsql);

                oci_execute($sum);
                $sumrow = oci_fetch_all($sum, $sumres);
                $sumary=explode(',',$sumres['����'][0]);
               //print_r($sumres);
                echo '<br/>';
              //  echo $sumres['״̬'][0];
                echo '<div class="12u"><table  border="1" class="features-table"> <tr>
                      <th>¥��</th>';
               foreach ($sumary as $Key => $Value)
               // foreach($sumary as $key=>$value)
                {
                    echo '<th>'.$Value.'</th> ';
                   // echo '<th>ccc</th>';
                }
                echo'</tr>';
               if ($sumrow>0)
               {

                   for ($k=0;$k<$sumrow;$k++)
                   {
                       echo'<tr>';
                       echo '<td>'.$sumres['¥��'][$k].'</td>';
                     //  echo $sumres['״̬'][$k];
                       $STATUSsum=explode(',',$sumres['״̬'][$k]) ;
                       foreach ($STATUSsum as $key => $Value)
                       {
                           echo '<td>'.$Value.'</td>';
                       }
                       echo'</tr>';
                   }

               }
                    //    <th>Savings</th>
                echo '</table></div>';

              }
                oci_close($conntest);
            ?>
            <!--
			<p>Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum
                etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus
                in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum
                sollicitudin accumsan elementum.Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum
                etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus
                in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum
                sollicitudin accumsan elementum.Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum
                etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus
                in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum
                sollicitudin accumsan elementum.Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum
                etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus
                in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum
                sollicitudin accumsan elementum.Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum
                etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus
                in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum
                sollicitudin accumsan elementum.Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum
                etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus
                in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum
                sollicitudin accumsan elementum.Ligula scelerisque justo sem accumsan diam quis. Vitae natoque dictum
                etiam semper magnis enim feugiat convallis convallis egestas rhoncus ridiculus
                in quis risus curabitur tempor. Orci penatibus quisque laoreet condimentum
                sollicitudin accumsan elementum.</p> -->
           
      
          </section>
  
  </div>
<div id="paginationdemo" class="demo">
                <div id="p1" class="pagedemo _current" style="">
                  page 1
                </div>
				<div id="p2" class="pagedemo" style="display:none;">Page ccc2</div>
				<div id="p3" class="pagedemo" style="display:none;">Page zz3</div>
				<div id="p4" class="pagedemo" style="display:none;">Pagexxx 4</div>
				<div id="p5" class="pagedemo" style="display:none;">Pagexx 5</div>
				<div id="p6" class="pagedemo" style="display:none;">Pagezz 6</div>
				<div id="p7" class="pagedemo" style="display:none;">Pagex 7</div>
				<div id="p8" class="pagedemo" style="display:none;">Page 8</div>
				<div id="p9" class="pagedemo" style="display:none;">Page x9</div>
				<div id="p10" class="pagedemo" style="display:none;">Page 10</div>
				<div id="demo55">             
                </div>
                   <button type="button" onclick="changeImage()">�������</button>
                   <?php $pagecount=3 ?>
                   <a href="#?ee=1">ccccccccccc</a>
     
    </div>

 <!--count :'".$pagecount."',-->
		<script src="menu/js/jquery.dlmenu.js"></script>
        
  
            <script>
                $(function() {
                    $( '#dl-menu' ).dlmenu({
                        animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
                    });
                });
		</script>
        	<?php	echo "<script type=\"text/javascript\">
		$(function() {
			$(\"#demo55\").paginate({
				
				count 		:'".$pagecount."',
				start 		: 1,
				display     : '".$pagecount."',
				border					: true,
				border_color			: '#fff',
				text_color  			: '#fff',
				background_color    	: 'black',	
				border_hover_color		: '#ccc',
				text_hover_color  		: '#000',
				background_hover_color	: '#fff', 
				images					: false,
				mouse					: 'press',
				onChange     			: function(page){
											$('._current','#paginationdemo').removeClass('_current').hide();
											$('#p'+page).addClass('_current').show();
										  }
			});
		});
	</script>"?> 

	</body>
</html>