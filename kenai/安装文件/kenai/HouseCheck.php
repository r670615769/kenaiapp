<!DOCTYPE HTML>
<!--
	Prologue 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
session_start(); ?>
<script>Response.AddHeader("P3P", "CP=CAO PSA OUR");</script>
<html>
	<head>
		<title>�������</title>
        <link rel="shortcut icon" href="favicon.ico" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
		<meta http-equiv="content-type" content="text/html; charset=gb2312" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/mytable.css"/>
		<link rel="stylesheet" type="text/css" href="menu/css/default.css" />
		<link rel="stylesheet" type="text/css" href="menu/css/component.css" />
        <link rel="stylesheet" type="text/css" href="css/MyStyle.css" />
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
         <script type="text/javascript">
 <?php
// set_time_limit(0);
function ChangeCol($CID,$CST)
{
    if ($CST=='����')
    {
        echo '<td bgcolor="green"><a href="House.php?CID='.$CID.'">'.$CST.'<a></td>';
    }
    else
    {
         if ($CST=='ǩ��ͬ')
        {
           $ChST='ǩ��';
        }
        else if($CST=='�ѽ�¥')
        {
           $ChST='�ѽ�';
        }
        else if($CST=='���Ȩ֤')
        {
           $ChST='��Ȩ';
        }
        else
        {
           $ChST=$CST;  
        }
        echo '<td bgcolor="#b70000"><a href="House.php?CID='.$CID.'">'.$ChST.'</a></td>';
    }

}
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

     echo"<li><a href='HouseCheck.php?LID=".$resu[$res1][$j]."'>".$resu[$res2][$j]."</a></li>";
     }
     echo '</ul>';
}
 oci_free_statement($stmt1);
}

function UpDown($GID)
{
    global $conntest,$DBID ;
    $ASql="select b.¥��ID,b.���� from climb.¥�̳�ʼ_¥��2 b where b.DB_ID='$DBID'AND b.�ϼ�¥��id='$GID'";
    $ACon = oci_parse($conntest,$ASql);
    oci_execute($ACon);
    $Arow = oci_fetch_all($ACon, $ARes);
    if($Arow>0)
    {
        echo'<div class="btn-group" >
       <a class="btn dropdown-toggle mya"  data-toggle="dropdown" href="#">
       ����
       <span class="caret"></span>
       </a>
       <ul class="dropdown-menu">';
     // <ul class="dropdown-menu">';

       for($a=0;$a<$Arow;$a++)
       {
          echo'<li><a href="HouseCheck.php?LID='.$ARes['¥��ID'][$a].'">'.$ARes['����'][$a].'</a></li>';
       }
      echo'</ul>
       </div>' ;
    }
    oci_free_statement($ACon);
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

                            <?php
                            //if (!empty($_POST['UserName']))
                           // echo $_SESSION['DBID'];
                            if (!empty($_SESSION['DBID']))
                            {
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
                          <!--  <span class="byline">UserName</span>  -->

						</div>

					<!-- Nav -->
                   
						<nav id="nav">
							<ul>
                                <?php
                                if ($login=='Correct')
                                {
                                    echo '<li><a href="UserLogin.php" id="UserLogin-link" ><span class="icon icon-user">�û��ǳ�</span></a></li>';
                                }
                                else
                                {
                                    echo'<li><a href="UserLogin.php" id="UserLogin-link" ><span class="icon icon-user">�û�����</span></a></li>';
                                }
                                ?>
								<li><a href="HouseCheck.php" id="HouseCheck-link" ><span class="icon icon-home">��Դ��ѯ</span></a></li>
                                <li><a href="ClientCheck.php" id="about-link"><span class="icon icon-th">�ͻ���ѯ</span></a></li>
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

                $conntest=oci_connect('ϵͳ����Ա','shclimb',"ORCL");
             //   $GLOBALS["con"]=$conntest;
                if (!$conntest)
                {
                    echo'�������ݿ�ʧЧ';
                }
                if (!$conntest) {
                    $e = oci_error();
                    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }
                 $DBID=$_SESSION['DBID'];

                $sqlstr='select a.¥��ID,a.���� from climb.¥�̳�ʼ_¥��2 a where a.DB_ID=\''.$DBID.'\' and a.�ϼ�¥��id is null order by a.˳��';
            //    $sqlstr = iconv("utf-8","gb2312",$sqlstr1);
              //  echo $sqlstr;
                $stmt = oci_parse($conntest,  $sqlstr);
                oci_execute($stmt);
                $nrows = oci_fetch_all($stmt, $res);
               // print_r( $nrows);    //<a href="//www.baidu.com?unitno='.$Value['UNITNO'].'">'.$Value['STATUS'].'</a>
                 echo' <div class="row half">
				 <div class="6u">
				  <div id="dl-menu" class="dl-menuwrapper ">
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



              if (!empty($_GET['LID']))
              {
                 $GLID=$_GET['LID'];
                 UpDown($GLID);
                  echo'</ul></div><!-- /dl-menuwrapper -->
				</div>';
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
             //    print_r($sumres);

            if ($sumrow>0)
            {
                  $MaxHouseNo=0;
                  for ($h=0;$h<$sumrow;$h++)
                  {
                      if($MaxHouseNo<strlen($sumres['����'][$h]))
                      {
                          $MaxHouseNo=strlen($sumres['����'][$h]);
                          $Sumar=explode(',',$sumres['����'][$h]);
                      }
                  } ?>

              <?php $SumCou=count($Sumar);
               $PageCou=ceil($SumCou / 4);
           //    print_r($PageCou);
               $CheNaSql="select ���� from climb.¥�̳�ʼ_¥��2 where ¥��id='$GLID'";
               $CheNaSum = oci_parse($conntest,$CheNaSql);
                oci_execute($CheNaSum);
                oci_fetch_all($CheNaSum,$CheNaRes);
               echo '<div class="6u"> <h2 >'.$CheNaRes['����'][0].'</h2>';
               for ($l=0;$l<$PageCou;$l++)
               {
                   if($l==0)
                   {
                       $l4=$l;
                       echo ' <table  border="1" class="features-table PageDemo" id='.$l.'> <tr>
                      <th>¥��</th>';
                   }else
                   {
                       $l4=$l*4;
                       echo '<table  border="1" class="features-table PageDemo"  style="display:none"id='.$l.'> <tr>
                      <th>¥��</th>';
                   }
               //    echo '$l4:'.$l4;
                  // $MaxHouseNo=0;
                   $sumary=array_slice($Sumar, $l4, 4);
                  // print_r($Sumar);
              //     print_r($sumres);
                   //echo '<br/>';

                   foreach ($sumary as $Key => $Value)
                       // foreach($sumary as $key=>$value)
                   {
                       echo '<th>'.$Value.'</th> ';
                       // echo '<th>ccc</th>';
                   }
                   echo'</tr>';
                       for ($k=0;$k<$sumrow;$k++)
                       {
                           echo'<tr>';
                           echo '<td>'.$sumres['¥��'][$k].'</td>';
                           //  echo $sumres['״̬'][$k];
                           $STATUSsu1=explode(',',$sumres['״̬'][$k]) ;
                           $IDsu1=explode(',',$sumres['��ԪID'][$k]) ;
                           $STATUSsu=array_slice($STATUSsu1, $l4, 4);
                           $IDsu=array_slice($IDsu1, $l4, 4);
                           $SIsum=array();
                           for ($m=0;$m<count($STATUSsu);$m++)
                           {
                               $SIsum[$IDsu[$m]]=$STATUSsu[$m];
                           }

                        //   $SIsum=array_merge($STATUSsu,$IDsu);
                        //   print_r($SIsum);
                           foreach ($SIsum as $key => $Value)
                           {
                               ChangeCol($key,$Value);                               //echo '<td>'.$Value.'</td>';
                           }
                           echo'</tr>';
                       }
                   echo '</table>';

               }    //#00b4ae
             if($PageCou>1)
             {
                 echo' <div>
                    <ul  class="pagination">
                        <li><a onClick="PrePage()">��һҳ</a></li>';
                 for ($l=0;$l<$PageCou;$l++)
                 {
                     $l1=$l+1;
                     if($l==0)
                     {
                         echo '<li class="active liAct" onClick="ChooseTable('.$l.')"><a>'.$l1.'</a></li>';
                     } else
                     {
                         echo '<li class="liAct" onClick="ChooseTable('.$l.')"><a>'.$l1.'</a></li>';
                     }

                 }
                  echo  '<li><a onClick="AftPage()">��һҳ</a></li>
                  </ul></div></div></div>';
               }
              }else
              {
                 echo'�޴˼�¼';
              }
                  oci_free_statement($sum);
            }
                oci_close($conntest);

     ?>
            </div>
          </section>
        </div>

		<?php
        include("foot.php");
        ?>
      <script src="js/icepage.js"></script>
		<script src="menu/js/jquery.dlmenu.js"></script>
            <script>
                $(function() {
                    $( '#dl-menu' ).dlmenu({
                        animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
                    });
                });
		</script>

	</body>
</html>