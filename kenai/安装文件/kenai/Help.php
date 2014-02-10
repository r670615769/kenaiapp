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
                //if (!empty($_POST['UserName']))
                if (!empty($_SESSION['UserName']))
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
                     <?php
                     if (!empty($_SESSION['UserName']))
                     {
                         echo '<li><a href="UserLogin.php" id="UserLogin-link" ><span class="icon icon-user">用户登出</span></a></li>';
                     }
                     else
                     {
                         echo'<li><a href="UserLogin.php" id="UserLogin-link" ><span class="icon icon-user">用户登入</span></a></li>';
                     }
                     ?>
                    <li><a href="HouseCheck.php" id="HouseCheck-link" ><span class="icon icon-home">房源查询</span></a></li>
                    <li><a href="ClientCheck.php" id="about-link"><span class="icon icon-th">客户查询</span></a></li>
                    <li><a href="Help.php" id="contact-link"><span class="icon icon-envelope">帮助文档</span></a></li>
                    <!--<li><a href="Help.php" id="contact-link" class="skel-panels-ignoreHref"><span class="icon icon-envelope">帮助文档</span></a></li>-->
                </ul>
            </nav>

        </div>


    </div>
        <!-- Main -->
        <div id="main">



            <!-- Portfolio -->
            <section id="portfolio" class="two">
                <div class="container">

                    <header>
                        <h2>建立手机桌面快捷方式</h2>
                    </header>
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1" data-toggle="tab">IOS版</a></li>
                            <li><a href="#2" data-toggle="tab">Android版</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="1">
                                <p>

                    <div class="row">
                        <div class="4u">
                            <article class="item">
                            <!--    <a href="http://ineedchemicalx.deviantart.com/art/A-million-suns-384369739" class="image full"><img src="images/Idome1.jpg" alt="" /></a>  -->
                                <a class="image full"><img src="images/Idome1.jpg" alt="" /></a>
                                <header>
                                    <h3>一、打开Safari</h3>
                                </header>
                            </article>
                            <article class="item">
                                <a  class="image full"><img src="images/Idome2.jpg" alt="" /></a>
                                <header>
                                    <h3>二、输入IP地址搜索</h3>
                                </header>
                            </article>
                        </div>
                        <div class="4u">
                            <article class="item">
                                <a class="image full"><img src="images/Idome3.jpg" alt="" /></a>
                                <header>
                                    <h3>三、点击向上弹出框</h3>
                                </header>
                            </article>
                            <article class="item">
                                <a class="image full"><img src="images/Idome4.jpg" alt="" /></a>
                                <header>
                                    <h3>四、添加到主屏幕</h3>
                                </header>
                            </article>
                        </div>
                        <div class="4u">
                            <article class="item">
                                <a class="image full"><img src="images/Idome5.jpg" alt="" /></a>
                                <header>
                                    <h3>五、添加桌面标签</h3>
                                </header>
                            </article>
                            <article class="item">
                                <a class="image full"><img src="images/Idome6.jpg" alt="" /></a>
                                <header>
                                    <h3>六、添加成功</h3>
                                </header>
                            </article>
                        </div>
                    </div>
                                </p>
                            </div>
                            <div class="tab-pane" id="2">
                                <p>
                                <div class="row">
                                    <div class="4u">
                                        <article class="item">
                                            <!--    <a href="http://ineedchemicalx.deviantart.com/art/A-million-suns-384369739" class="image full"><img src="images/Idome1.jpg" alt="" /></a>  -->
                                            <a class="image full"><img src="images/Adome1.jpg" alt="" /></a>
                                            <header>
                                                <h3>一、打开浏览器</h3>
                                            </header>
                                        </article>
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome2.jpg" alt="" /></a>
                                            <header>
                                                <h3>二、输入IP地址搜索</h3>
                                            </header>
                                        </article>
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome3.jpg" alt="" /></a>
                                            <header>
                                                <h3>三、点击右上角弹出菜单栏</h3>
                                            </header>
                                        </article>
                                    </div>
                                    <div class="4u">
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome4.jpg" alt="" /></a>
                                            <header>
                                                <h3>四、保存到书签</h3>
                                            </header>
                                        </article>
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome5.jpg" alt="" /></a>
                                            <header>
                                                <h3>五、点击右上角弹出菜单栏书签</h3>
                                            </header>
                                        </article>
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome6.jpg" alt="" /></a>
                                            <header>
                                                <h3>六、按住科耐书签不放将会弹出菜单</h3>
                                            </header>
                                        </article>
                                    </div>
                                    <div class="4u">
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome7.jpg" alt="" /></a>
                                            <header>
                                                <h3>七、向主屏幕添加快捷方式</h3>
                                            </header>
                                        </article>
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome8.jpg" alt="" /></a>
                                            <header>
                                                <h3>八、创建完成</h3>
                                            </header>
                                        </article>
                                        <article class="item">
                                            <a class="image full"><img src="images/Adome9.jpg" alt="" /></a>
                                            <header>
                                                <h3>九、添加成功</h3>
                                            </header>
                                        </article>
                                    </div>


                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>



    <?php
    include("foot.php");
    ?>

       </div>

	</body>
</html>