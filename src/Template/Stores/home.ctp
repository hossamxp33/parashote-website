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
                                    <li data-dashboard-content="#structureSideMenuContent">اختيار الهيكل </li>
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
                                            <input type="text" class="form-control timepicker" id="appOpenStart" name="timepicker-one"
                                                placeholder="ميعاد فتح المتجر">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-2" for="appOpenEnd">ميعاد اغلاق
                                            المتجر</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control timepicker" id="appOpenEnd" name="timepicker-two"
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
                                        <img src="img/logo.png" alt="" class="img-responsive">
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
                                        <img src="img/logo.png" alt="" class="img-responsive">
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
                                            <img src="img/logo.png" alt="" class="img-responsive" id="firstSplash"
                                                style="cursor: pointer;">
                                            <p class="text-center">640x960 <i class="fa fa-warning" data-toggle="tooltip"
                                                    data-placement="top" title="بعض اجهزه الاندرويد والتابلت"></i></p>
                                            <input type="file" class="form-control" id="splashOne" style="display:none">
                                        </div>
                                        <div>
                                            <img src="img/logo.png" alt="" class="img-responsive" id="secondSplash"
                                                style="cursor: pointer;">
                                            <p class="text-center">1242x2208 <i class="fa fa-warning" data-toggle="tooltip"
                                                    data-placement="top" title="بعض اجهزه الاندرويد والتابلت"></i></p>
                                            <input type="file" class="form-control" id="splashTwo" style="display:none">
                                        </div>
                                        <div>
                                            <img src="img/logo.png" alt="" class="img-responsive" id="thirdSplash"
                                                style="cursor: pointer;">
                                            <p class="text-center">1536x2048 <i class="fa fa-warning" data-toggle="tooltip"
                                                    data-placement="top" title="بعض اجهزه الاندرويد والتابلت"></i></p>
                                            <input type="file" class="form-control" id="splashThree" style="display:none">
                                        </div>
                                        <div>
                                            <img src="img/logo.png" alt="" class="img-responsive" id="fourthSplash"
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
                                                <option disabled selected>الخط</option>
                                                <option style="font: normal normal 12px/30px DroidArabicKufiRegular">DROID
                                                    ARABIC KUFI</option>
                                                <option>jf flat</option>
                                                <option>ge ss</option>
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
                                <img src="img/structure/structure4.jpeg" alt="" class="img-responsive custom-height"
                                    product-structure-id="1">
                            </div>
                            <div class="col-xs-4">
                                <img src="img/structure/structure5.jpeg" alt="" class="img-responsive custom-height"
                                    product-structure-id="2">
                            </div>
                            <div class="col-xs-4">
                                <img src="img/structure/structure6.jpeg" alt="" class="img-responsive custom-height"
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
                </main>

                <div class="simulator-screens col-md-4">
                    <div id="screens">
                        <!-- First Product -->
                        <!-- <div class="mobile-simualtion no-padding row ">
                            <div class="mobile-container">
                                <div class="mobile-main no-margin row">
                                    <div class="main">
                                        <div class="logo-preview">
                                            <img src="img/logo.png" alt="" class="img-responsive center-block">
                                        </div>
                                        <div class="categories2 row no-margin">
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class=" category col-xs-12">
                                                    <div class="col-xs-12">
                                                        <div class="category-icon center-block">
                                                            <img src="img/1233.png" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <div class="category-title text-center">
                                                            <span>حسابي</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="mobile-main no-margin row product-main">
                                    <div class="main">
                                        <div class="logo-preview">
                                            <img src="img/logo.png" alt="" class="img-responsive center-block">
                                        </div> 
                                        <ul>
                                            <li class="side-list row">
                                                <div class="side-list-icon col-xs-3">
                                                    <img src="img/12.png" alt="" class="img-responsive pull-left">
                                                </div>
                                                <div class="side-list-label col-xs-9">
                                                    <p>حسابي</p>
                                                </div>
                                            </li>
                                            <li class="side-list row">
                                                <div class="side-list-icon col-xs-3">
                                                    <img src="img/Untitled-3.png" alt="" class="img-responsive pull-left">
                                                </div>
                                                <div class="side-list-label col-xs-9">
                                                    <p>اتصل بنا</p>
                                                </div>
                                            </li>
                                            <li class="side-list row">
                                                <div class="side-list-icon col-xs-3">
                                                    <img src="img/1.png" alt="" class="img-responsive pull-left">
                                                </div>
                                                <div class="side-list-label col-xs-9">
                                                    <p>من نحن</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> --
                                <div class="mobile-main no-margin row product-main side-menu-3">
                                    <div class="main">
                                        <!-- <ul>
                                            <li class="side-list row">
                                                <div class="side-list-icon col-xs-3">
                                                    <img src="img/12.png" alt="" class="img-responsive pull-left">
                                                </div>
                                                <div class="side-list-label col-xs-9">
                                                    <p>حسابي</p>
                                                </div>
                                            </li>
                                            <li class="side-list row">
                                                <div class="side-list-icon col-xs-3">
                                                    <img src="img/Untitled-3.png" alt="" class="img-responsive pull-left">
                                                </div>
                                                <div class="side-list-label col-xs-9">
                                                    <p>اتصل بنا</p>
                                                </div>
                                            </li>
                                            <li class="side-list row">
                                                <div class="side-list-icon col-xs-3">
                                                    <img src="img/1.png" alt="" class="img-responsive pull-left">
                                                </div>
                                                <div class="side-list-label col-xs-9">
                                                    <p>من نحن</p>
                                                </div>
                                            </li>
                                        </ul> --
                                    </div>
                                </div>
                                <div class="mobile-footer row no-margin">
                                    <div class="footer-icons">
                                        <div class="icon">
                                            <div class="icon-img center-block">
                                                <img src="img/home.png" alt="" class="center-block" id="icon-img-home">
                                            </div>
                                            <div class="icon-title text-center">
                                                <span id="icon-title-home">الرئيسية</span>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <div class="icon-img center-block">
                                                <img src="img/shopping-cart.png" alt="" class="center-block" id="icon-img-myorder">
                                            </div>
                                            <div class="icon-title text-center">
                                                <span id="icon-title-myorder">طلباتي</span>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <div class="icon-img center-block">
                                                <img src="img/discount.png" alt="" class="center-block" id="icon-img-offer">
                                            </div>
                                            <div class="icon-title text-center">
                                                <span id="icon-title-offer">عروض</span>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <div class="icon-img center-block">
                                                <img src="img/notification.png" alt="" class="center-block" id="icon-img-notification">
                                            </div>
                                            <div class="icon-title text-center">
                                                <span id="icon-title-notification">إشعارات</span>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <div class="icon-img center-block">
                                                <img src="img/more.png" alt="" class="center-block" id="icon-img-more">
                                            </div>
                                            <div class="icon-title text-center">
                                                <span id="icon-title-more">المزيد</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content Section -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="js/colorpicker.js"></script>
    <script type="text/javascript" src="js/jquery.switcher.js"></script>
    <script type="text/javascript" src="js/wickedpicker.min.js"></script>
    <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
    <script src="js/locationpicker.jquery.js"></script>
    <!-- Customize script -->
    <script src="js/script.js"></script>
    <script src="js/editStore.js"></script>
    <script>
        $('#appOpenStart.timepicker').wickedpicker()
        $('#appOpenEnd.timepicker').wickedpicker()
        $('[data-toggle="tooltip"]').tooltip();
        $('#storeMap').locationpicker(
            {
                location: {
                    latitude: 40.7324319,
                    longitude: -73.82480777777776
                },
                locationName: "",
                radius: 500,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [],
                mapOptions: {},
                scrollwheel: true,
                inputBinding: {
                    latitudeInput: $('#latitude'),
                    longitudeInput: $('#longitude'),
                    radiusInput: null,
                    locationNameInput: $('#appLocation')
                },
                enableAutocomplete: true,
                enableAutocompleteBlur: true,
                autocompleteOptions: null,
                addressFormat: 'postal_code',
                enableReverseGeocode: true,
                draggable: true,
                onchanged: function (currentLocation, radius, isMarkerDropped) { },
                onlocationnotfound: function (locationName) { },
                oninitialized: function (component) { },
                // must be undefined to use the default gMaps marker
                markerIcon: undefined,
                markerDraggable: true,
                markerVisible: true
            }
        );
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