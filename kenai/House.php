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
    <meta http-equiv="content-type" content="text/html; charset=gb2312" />
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
            <span class="image avatar48"><img src="images/logo1.jpg" alt="" /></span>
            <?php
            if (!empty($_SESSION['UserName']))
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
<div id="main">

    <!-- Contact -->
    <section id="contact" class="four">
        <div class="container">

            <header>
                <?php
                  if (!empty($_GET['CID']))
                  {
                    $SqlStr="SELECT A.��Ԫ��� AS ����,A.������� AS ���,A.�ܼ�,A.����,A.���,A.���� FROM CLIMB.¥�̳�ʼ_��Ԫ A WHERE A.��ԪID='".$_GET['CID']."'";
                    $conntest=oci_connect('ϵͳ����Ա','shclimb',"ORCL");
                    $stmt = oci_parse($conntest,  $SqlStr );
                    oci_execute($stmt);
                    $nrows = oci_fetch_all($stmt, $res);
                   // print_r($res) ;
                    if ($nrows>0)
                    {
                        echo"<h2>".$res['����'][0] ."</h2>";
                    }else
                    {
                        echo"<h2>�޴˼�¼</h2>";
                    }

                  }

            echo'</header>
                <div class="row half">
                    <div class="6u"><h3>'."  ".'���ţ�'.$res['����'][0].'</h3></div>
                    <div class="6u"><h3>  �����'.$res['���'][0].'</h3></div>
                </div>

            <div class="row half">
                <div class="6u"><h3>  �ܼۣ�'.$res['�ܼ�'][0].'</h3></div>
                <div class="6u"><h3>  ���ܣ�'.$res['����'][0].'</h3></div>
            </div>

            <div class="row half">
                <div class="6u"><h3>  ���'.$res['���'][0].'</h3></div>
                <div class="6u"><h3>  ���ͣ�'.$res['����'][0].'</h3></div>
            </div>   '
          ?>
                <input type="button" value="����ǰһҳ" class="button submit" onclick="javascript:window.history.go(-1)";
        </div>
    </section>

</div>

<?php
include("foot.php");
?>

</body>
</html>