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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
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
                <div class="logo col-xs-6">
                    <h3>لوجو</h3>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-success pull-left publish">نشر</button>

                </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Start Content Section -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <aside class="col-md-2">
                    <nav>
                        <ul>
                            <li>
                                <div class="collapse-in" data-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    <a href="">صفحة الرئيسية</a>
                                </div>
                                <ul class="collapse dashboard-content" id="collapseExample">
                                    <li data-dashboard-content="#structureContent">اختيار الهيكل </li>
                                    <li data-dashboard-content="#headerContent">الهيدر</li>
                                    <li data-dashboard-content="#bodyContent">الهيكل</li>
                                    <li data-dashboard-content="#footerContent">الفوتر</li>
                                </ul>
                            </li>
                            <li>
                                <div class="collapse-in" data-toggle="collapse" href="#collapseExample2" aria-expanded="false"
                                    aria-controls="collapseExample2">
                                    <a href="">صفحة المنتجات</a>
                                </div>

                                <ul class="collapse dashboard-content" id="collapseExample2">
                                    <li data-dashboard-content="#structureProductContent">اختيار الهيكل </li>
                                    <li data-dashboard-content="#productBodyContent"> تعديلات الهيكل </li>
                                </ul>
                            </li>
                            <li>
                                <div class="collapse-in" data-toggle="collapse" href="#collapseExample3" aria-expanded="false"
                                    aria-controls="collapseExample3">
                                    <a href="">صفحة القائمة الجانبية</a>
                                </div>

                                <ul class="collapse dashboard-content" id="collapseExample3">
                                    <li data-dashboard-content="#structureMenuContent">اختيار الهيكل </li>
                                    <li data-dashboard-content="#sideMenuBodyContent">تعديلات الهيكل </li>
                                </ul>
                            </li>
                            <li>
                                <div class="collapse-in" data-toggle="collapse" href="#collapseExample4" aria-expanded="false"
                                    aria-controls="collapseExample4">
                                    <a href="">اعدادات المتجر</a>
                                </div>

                                <ul class="collapse dashboard-content" id="collapseExample4">
                                    <li data-dashboard-content="#mainStoreSetting">الاساسية </li>
                                    <li data-dashboard-content="#contactStoreSetting">التواصل </li>
                                    <li data-dashboard-content="#datesStoreSetting">المواعيد </li>
                                    <li data-dashboard-content="#placeStoreSetting">المكان </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </aside>
                <main class="col-md-6">
                    <div class="section col-xs-12" id="structureContent">
                        <div class="section-title col-md-12">
                            <h4>اختيار الهيكل</h4>
                        </div>
                        <div class="form col-md-12">
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure1.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="1">
                            </div>
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure2.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="2">
                            </div>
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure3.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="3">
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="headerContent">
                        <div class="section-title col-md-12">
                            <h4>الهيدر</h4>
                        </div>
                        <div class="form form-horizontal col-md-12">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="headerColor"> الهيدر</label>
                                <div class="col-sm-2">
                                    <div class="form-control" id="headerColor">
                                        <div style="background-color: #67236c;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="favourite">صوره المفضلة</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="favourite">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="chatting">صوره الدردشة</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="chatting">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="bodyContent">
                        <div class="section-title col-md-12">
                            <h4>الهيكل</h4>
                        </div>
                        <div class="form form-horizontal col-md-12">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bodyColor"> خلفية الهيكل</label>
                                <div class="col-sm-2">
                                    <div class="form-control" id="bodyColor">
                                        <div style="background-color: #e6eaed;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="bodyFontColor"> خط الهيكل</label>
                                <div class="col-sm-2">
                                    <div class="form-control" id="bodyFontColor">
                                        <div style="background-color: #333333;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title1">العنوان الاول</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title1" placeholder="العنوان الاول">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title2">العنوان الثاني</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title2" placeholder="العنوان الثاني">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="title3">العنوان الثالث</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="title3" placeholder="العنوان الثالث">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="categoryColor"> خلفية القسم</label>
                                <div class="col-sm-2">
                                    <div class="form-control" id="categoryColor">
                                        <div style="background-color: #ffffff;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="datesStoreSetting">
                        <div class="section-title col-md-12">
                            <h4>اعدادات المتجر</h4>
                        </div>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        مواعيد المتجر
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appOpenStart">ميعاد فتح
                                            المتجر</label>
                                        <div class="col-sm-10">
                                            <input type="time" class="form-control timepicker" id="appOpenStart" name="timepicker-one"
                                                placeholder="ميعاد فتح المتجر">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appOpenEnd">ميعاد اغلاق
                                            المتجر</label>
                                        <div class="col-sm-10">
                                            <input type="time" class="form-control timepicker" id="appOpenEnd" name="timepicker-two"
                                                placeholder="ميعاد اغلاق المتجر">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="placeStoreSetting">
                        <div class="section-title col-md-12">
                            <h4>اعدادات المتجر</h4>
                        </div>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        مكان المتجر
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appCity">اختار المدينه</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="appCity">
                                                <option disabled selected>المحافظه</option>
                                                <option city-id="1">القاهره</option>
                                                <option city-id="2">اسكندريه</option>
                                                <option city-id="3">السويس</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appLocation">موقع المتجر</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appLocation">
                                        </div>
                                    </div>
                                    <div id="storeMap" style="height: 400px;margin-bottom: 20px"></div>
                                    <div>
                                        <input type="text" id="latitude" hidden>
                                        <input type="text" id="longitude" hidden>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="contactStoreSetting">
                        <div class="section-title col-md-12">
                            <h4>اعدادات المتجر</h4>
                        </div>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        بيانات التوصل مع المتجر
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appPhone">رقم الهاتف</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appPhone" placeholder="رقم الهاتف">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appPhoneAlternative">رقم
                                            الهاتف البديل</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appPhoneAlternative"
                                                placeholder="رقم الهاتف البديل">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appWebsite">الموقع
                                            الاليكتروني للمتجر</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appWebsite" placeholder="الموقع الاليكتروني للمتجر">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="mainStoreSetting">
                        <div class="section-title col-md-12">
                            <h4>اعدادات المتجر</h4>
                        </div>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        بيانات المتجر الاساسية
                                    </h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appName">اسم المتجر</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appName" placeholder="اسم المتجر">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appIcon">ايقونه المتجر</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="appIcon">
                                        </div>
                                    </div>
                                    <div class="app-icon-preview row">
                                        <img src="<?=URL?>img/logo.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appDescription">وصف المتجر</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="appDescription" rows="5" placeholder="وصف المتجر"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appCommericalRegisterNo">رقم
                                            السجل التجاري</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appCommericalRegisterNo"
                                                placeholder="رقم السجل التجاري">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appCommericalRegisterImg">صوره
                                            السجل التجاري</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="appCommericalRegisterImg">
                                        </div>
                                    </div>
                                    <div class="app-commerical-register-preview row">
                                        <img src="<?=URL?>img/logo.png" alt="" class="img-responsive">
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appbranches">عدد الفروع</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appbranches" placeholder="عدد الفروع">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appBankAccount">الحساب البنكي</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="appBankAccount" placeholder="الحساب البنكي">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-12">صور الشاشة الافتتاحية</label>
                                    </div>
                                    <div class="loading-app-icon-preview row">
                                        <div>
                                            <img src="<?=URL?>img/logo.png" alt="" class="img-responsive" id="firstSplash"
                                                style="cursor: pointer;">
                                            <p class="text-center">640x960 <i class="fa fa-warning" data-toggle="tooltip"
                                                    data-placement="top" title="بعض اجهزه الاندرويد والتابلت"></i></p>
                                            <input type="file" class="form-control" id="splashOne" style="display:none">
                                        </div>
                                        <div>
                                            <img src="<?=URL?>img/logo.png" alt="" class="img-responsive" id="secondSplash"
                                                style="cursor: pointer;">
                                            <p class="text-center">1242x2208 <i class="fa fa-warning" data-toggle="tooltip"
                                                    data-placement="top" title="بعض اجهزه الاندرويد والتابلت"></i></p>
                                            <input type="file" class="form-control" id="splashTwo" style="display:none">
                                        </div>
                                        <div>
                                            <img src="<?=URL?>img/logo.png" alt="" class="img-responsive" id="thirdSplash"
                                                style="cursor: pointer;">
                                            <p class="text-center">1536x2048 <i class="fa fa-warning" data-toggle="tooltip"
                                                    data-placement="top" title="بعض اجهزه الاندرويد والتابلت"></i></p>
                                            <input type="file" class="form-control" id="splashThree" style="display:none">
                                        </div>
                                        <div>
                                            <img src="<?=URL?>img/logo.png" alt="" class="img-responsive" id="fourthSplash"
                                                style="cursor: pointer;">
                                            <p class="text-center">1600x2560 <i class="fa fa-warning" data-toggle="tooltip"
                                                    data-placement="top" title="بعض اجهزه الاندرويد والتابلت"></i></p>
                                            <input type="file" class="form-control" id="splashFour" style="display:none">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="paymentMethods">طرق الشراء</label>
                                        <div class="col-sm-10" id="paymentMethods">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appFont">خط المتجر</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="appFont">
                                                <!-- <option disabled selected>الخط</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="visibility">
                                        <label class="control-label col-sm-2" for="appVisibility">المتجر متاح</label>
                                        <div class="col-sm-10">
                                            <div class="checkbox row">
                                                <input type="checkbox" value="" class="col-xs-4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="footerContent">
                        <div class="section-title col-md-12">
                            <h4>تاثيرات الفوتر</h4>
                        </div>
                        <div class="form form-horizontal col-md-12">
                            <div class="form-group">
                                <div class="form-check form-check-inline col-xs-6" id="border">
                                    <label for="inlineCheckbox1">اطار</label>
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                </div>
                                <div class="form-check form-check-inline col-xs-6" id="shadow">
                                    <label for="inlineCheckbox2">ظل</label>
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option1">
                                </div>
                            </div>
                        </div>
                        <div class="section-title col-md-12">
                            <h4>الفوتر</h4>
                        </div>
                        <div class="form form-horizontal col-md-12">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="footerColor"> الفوتر</label>
                                <div class="col-sm-2">
                                    <div class="form-control" id="footerColor">
                                        <div style="background-color: #ffffff;height: 20px;border: 1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fontFooterColor"> الخط</label>
                                <div class="col-sm-2">
                                    <div class="form-control" id="fontFooterColor">
                                        <div style="background-color: #333333;height: 20px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="homeIconLabel">اسم صورة الرئيسية</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="homeIconLabel" placeholder="اسم صورة الرئيسية">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="homeIcon">صوره الرئيسيه</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="homeIcon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="myOrdersIconLabel">اسم صوره طلباتي</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="myOrdersIconLabel" placeholder="اسم صوره طلباتي">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="myOrdersIcon">صوره طلباتي</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="myOrdersIcon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="offersIconLabel">اسم صوره عروض</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="offersIconLabel" placeholder="اسم صوره عروض">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="offersIcon">صوره عروض</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="offersIcon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="notificationsIconLabel"> اسم صوره
                                    اشعارات</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="notificationsIconLabel" placeholder="اسم صوره اشعارات">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="notificationsIcon">صوره اشعارات</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="notificationsIcon">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="moreIconLabel"> اسم صوره المزيد</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="moreIconLabel" placeholder="اسم صوره المزيد">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="moreIcon">صوره المزيد</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" id="moreIcon">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="structureProductContent">
                        <div class="section-title col-md-12">
                            <h4>اختيار الهيكل</h4>
                        </div>
                        <div class="form col-md-12">
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure4.jpeg" alt="" class="img-responsive custom-height"
                                    product-structure-id="1">
                            </div>
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure5.jpeg" alt="" class="img-responsive custom-height"
                                    product-structure-id="2">
                            </div>
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure6.jpeg" alt="" class="img-responsive custom-height"
                                    product-structure-id="3">
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="productBodyContent">
                        <div class="section-title col-md-12">
                            <h4>الهيكل</h4>
                        </div>
                        <div class="form form-horizontal col-md-12">
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="storeTitleFontColor"> عنوان المتجر</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="storeTitleFontColor">
                                        <div style="background-color: #333333;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="storeFontColor"> خط المنتجات</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="storeFontColor">
                                        <div style="background-color: #333333;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="storeArowColor"> الاسهم</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="storeArowColor">
                                        <div style="background-color: #830157;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="msgColor"> خلفية الرسالة</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="msgColor">
                                        <div style="background-color: #ffffff;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="msgColorFont"> خط الرسالة</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="msgColorFont">
                                        <div style="background-color: #b77f93;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="btnMsgColor"> خلفية الزر</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="btnMsgColor">
                                        <div style="background-color: #ec466a;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="btnMsgColorFont"> خط الزر</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="btnMsgColorFont">
                                        <div style="background-color: #ffffff;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="productColor">خلفية المنتج</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="productColor">
                                        <div style="background-color: #ffffff;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="productBorderColor"> اطار المنتج</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="productBorderColor">
                                        <div style="background-color: #aaa;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="btnAddColor"> خلفية زر اضف الي السلة</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="btnAddColor">
                                        <div style="background-color: #ec466a;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="btnAddColorFont"> خط زر اضف الي السلة</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="btnAddColorFont">
                                        <div style="background-color: #ffffff;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="freeShippingBackground"> خلفية الشحن المجاني</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="freeShippingBackground">
                                        <div style="background-color: #f5c914;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label class="control-label col-sm-7" for="freeShippingColor"> خط الشحن المجاني</label>
                                <div class="col-sm-5">
                                    <div class="form-control" id="freeShippingColor">
                                        <div style="background-color: #333;height: 20px;border:1px solid #ccc"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section col-xs-12" id="structureMenuContent">
                        <div class="section-title col-md-12">
                            <h4>اختيار الهيكل</h4>
                        </div>
                        <div class="form col-md-12">
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure7.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="4">
                            </div>
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure8.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="5">
                            </div>
                            <div class="col-xs-4">
                                <img src="<?=URL?>img/structure/structure9.jpeg" alt="" class="img-responsive custom-height"
                                    structure-id="6">
                            </div>
                        </div>
                    </div>
                </main>

                <div class="simulator-screens col-md-4">
                    <div id="screens">
                            
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="<?=URL?>slick/slick.min.js"></script>
    <script type="text/javascript" src="<?=URL?>js/colorpicker.js"></script>
    <script type="text/javascript" src="<?=URL?>js/jquery.switcher.js"></script>
    <script type="text/javascript" src="<?=URL?>js/wickedpicker.min.js"></script>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?key=AIzaSyD2TDovK1nzuQ8m0SY3SOQ_u-H6RS7JgfY&sensor=false&libraries=places'></script>
    <script src="<?=URL?>js/locationpicker.jquery.js"></script>
    <!-- Customize script -->
    <script src="<?=URL?>js/script.js"></script>
    <script src="<?=URL?>js/editStore.js"></script>
    <script>
        
        $('[data-toggle="tooltip"]').tooltip();
      
        $('.mob-slider').slick({
            arrows: false,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            rtl: true,
            autoplay: true,
            autoplaySpeed: 3000,
        });

    </script>
</body>

</html>


 