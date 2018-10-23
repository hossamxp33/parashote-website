<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>لوحة تحكم باراشوت</title>

    <!-- Bootstrap -->
    <link href="<?=URL?>css/bootstrap.css" rel="stylesheet">

    <!-- Bootstrap RTL -->
    <link href="<?=URL?>css/bootstrap-rtl.min.css" rel="stylesheet">

    <!-- Fontawesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/<?=URL?>css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">

    <!-- Cairo Font -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <link href="<?=URL?>slick/slick.css" rel="stylesheet" />
    <link href="<?=URL?>slick/slick-theme.css" rel="stylesheet" />
    <link href="<?=URL?>css/wickedpicker.min.css" rel="stylesheet">
    <link href="<?=URL?>css/colorpicker.css" rel="stylesheet" />
    <link href="<?=URL?>css/switcher.css" rel="stylesheet">
    <link href="https://fontlibrary.org/face/droid-arabic-kufi" rel="stylesheet" media="screen" />

    <!-- Main style -->
    <link href="<?=URL?>css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Start Header -->
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="logo col-xs-4">
                    <h3>لوجو</h3>
                </div>
                <div class="col-xs-6">
                    <ul id="steps">
                        <li class="step"></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Start Content Section -->
    <div class="content" id="addStore">
        <div class="container-fluid">
            <div class="row">
                <aside class="col-md-2">
                    <nav>
                        <ul class="text-center ">
                            <li>
                                <div>
                                    <h3>الاقسام</h3>
                                </div>
                                <ul class="dashboard-content">
                                    <li data-dashboard-content="#eCommerceContent">Ecommerce </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </aside>
                <main class="col-md-6">
                    <div class="section col-xs-12" id="eCommerceContent">
                        <div class="section-title col-md-12">
                            <h4>اختيار الهيكل</h4>
                        </div>
                        <div class="form col-md-12">
                            <div class="col-xs-4">
                                <img src="img/structure/structure1.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="1">
                            </div>
                            <div class="col-xs-4">
                                <img src="img/structure/structure2.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="2">
                            </div>
                            <div class="col-xs-4">
                                <img src="img/structure/structure3.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="3">
                            </div>
                        </div>
                        <button class="btn btn-default addStructure center-block">اختيار الهيكل <i class="fa fa-angle-double-left"></i></button>
                    </div>
                </main>
            </div>
            <div class="row" id="store-info">
                <div class="white-section">
                    <div class="store-name text-center">
                        <h4></h4>
                    </div>
                    <div class="selectedStrucuture-img">
                        <img src="img/structure/structure3.jpeg" alt="" class="img-responsive custom-height previewSelected">
                    </div>
                </div>
                <div class="gray-section">
                    <div class="form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="اسم المتجر" id="store-name">
                        </div>
                        <p>يمكنك تغير هذه الاعدادات لاحقا</p>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="اسم المستخدم" id="userName">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="البريد الاليكتروني" id="userEmail">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="الهاتف" id="userPhone">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="كلمة المرور" id="userPassword">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default center-block addStoreInfo">حفظ </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="finish">
                <div class="finish-section">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="finish-img">
                                <img src="img/38207412_1795163087235215_2131077611663654912_n.png" alt="" class="img-responsive center-block ">
                            </div>
                            <div class="last-section-description text-center">
                                <h2> مبروك! </h2>
                                <p>الان بامكانك ادارة تطبيق كاملا من خلال لوحة التحكم</p>
                                <p> للمزيد من المعلومات يرجي مراجعة هذا <a href="#">اللينك</a></p>
                            </div>
                            <button class="btn btn-default center-block dashboard"> الانتقال الي لوحة التحكم</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Section -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=URL?>js/bootstrap.min.js"></script>
    <!-- Customize script -->
    <script src="<?=URL?>js/script.js"></script>
    <script src="<?=URL?>js/addStore.js"></script>
</body>

</html>