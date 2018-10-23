<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>User</title>
    <!-- Bootstrap -->
    <link href="<?=URL?>css1/bootstrap.min.css" rel="stylesheet">
    <!-- RTL Version Bootstrap -->
    <link href="<?=URL?>css1/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <!-- Animate css -->
    <link href="<?=URL?>css1/animate.css" rel="stylesheet" />
    <!-- Custom css -->
    <link href="<?=URL?>css1/style.css" rel="stylesheet" />
    <!-- Media Query Css -->
    <link href="<?=URL?>css1/media-Query.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<?php
debug($payment);
?>

<body>
        <!-- Start NavBar -->
        <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                            aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="<?=URL?>img/logo.png" alt="">
                        </a>
                    </div>
        
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="index.html">الرئيسية</a>
                            </li>
                            <li>
                                <a href="#">منتجات</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">الدعم الفني
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#technical-support">الإتصال بالدعم الفني</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="about.html">كوانت</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
    <!-- Start Social Section-->
    <!-- <div class="social-icons">
        <div class="container">
            <div class="row">
                <ul>
                    <li style="background:#3b5998">
                        <a href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li style="background:#dd4b39">
                        <a href="">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li style="background:#56a3d9">
                        <a href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li style="background:#bf221f">
                        <a href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li style="background:#2acf66">
                        <a href="">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- End Social Section-->
    <!-- Start User -->
    <div class="user">
        <div class="container">
            <div class="row">
                <!-- Nav tabs -->
                <div class="user-nav-list col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active col-md-8 col-xs-12 col-md-push-4">
                            <a href="#home" aria-controls="home" role="tab" data-toggle="tab">الرئيسيه</a>
                        </li>
                        <li role="presentation" class="col-md-8 col-xs-12 col-md-push-4">
                            <a href="#active-subscription" aria-controls="active-subscription" role="tab" data-toggle="tab">تفعيل اشتراك</a>
                        </li>
                        <li role="presentation" class="col-md-8 col-xs-12 col-md-push-4">
                            <a href="#confirm-phone" aria-controls="confirm-phone" role="tab" data-toggle="tab">تاكيد رقم الجوال</a>
                        </li>
                        <li role="presentation" class="col-md-8 col-xs-12 col-md-push-4">
                            <a href="#change-password" aria-controls="change-password" role="tab" data-toggle="tab">تغيير كلمه السر</a>
                        </li>
                        <li role="presentation" class="col-md-8 col-xs-12 col-md-push-4">
                            <a href="#club" aria-controls="club" role="tab" data-toggle="tab">نادي العملاء</a>
                        </li>
                        <li role="presentation" class="col-md-8 col-xs-12 col-md-push-4">
                            <a href="#signOut" aria-controls="signOut" role="tab" data-toggle="tab">خروج</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content col-md-9">
                    <!-- Home Tab -->
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="alerts">
                                        <div class="col-sm-4">
                                            <p class="points">
                                                <a href="#">
                                                    بقي
                                                    <span>25 نقطه</span> للحصول على لايف للأجهزة الذكية - سوق الأسهم السعودي -
                                                    يومين
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <p class="my-points">
                                                <a href="#">لا يوجد لديك نقاط</a>
                                            </p>
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="<?=URL?>img/membership-card-new-lg.png" alt="عضو جديد" class="img-responsive" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="user-info">
                                        <?php
   						foreach ($Data as $data){?>


<h4 >اهلا<?=$data["username"]?></h4>

                                        <p>اسم المستخدم :
                                            <span><?=$data["first_name"]?></span>
                                        </p>
                                                    <?php
                                                    }
                                                    ?>		
                                      
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="current-subscription table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <caption>الإشتراكات الحالية</caption>
                                            <thead>
                                                <tr>
                                                    <th>السوق</th>
                                                    <th>نوع الإشتراك</th>
                                                    <th>رقم التفعيل </th>
                                                             <?php
   						foreach ($Payment as $payment){?>


<th >تاريخ البدايه<?=$payment["created"]?></th>

                                        
                                                    <?php
                                                    }
                                                    ?>	
                                                    <th>تاريخ النهاية</th>
                                                </tr>
                                       
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">لا يوجد إشتراكات</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="past-subscription table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <caption>الإشتراكات السابقة</caption>
                                            <thead>
                                                <tr>
                                                    <th>السوق</th>
                                                    <th>نوع الإشتراك</th>
                                                    <th>رقم التفعيل </th>
                                                    <th>تاريخ البداية</th>
                                                    <th>تاريخ النهاية</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="5">لا يوجد إشتراكات</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Active Subsription -->
                    <div role="tabpanel" class="tab-pane" id="active-subscription">
                        <div class="panel panel-default">
                            <section class="panel-body">
                                <div class="subscription-content">
                                    <h4 class="text-center">تفعيل الإشتراك</h4>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="number" class="col-sm-2 control-label">رقم التفعيل</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="number" placeholder="رقم التفعيل">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-9">
                                                <button type="submit" class="btn btn-default">تفعيل</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- Confirm Phone -->
                    <div role="tabpanel" class="tab-pane" id="confirm-phone">
                        <div class="panel panel-default">
                            <section class="panel-body">
                                <div class="confirm-content">
                                    <h4 class="text-center">تأكيد رقم الجوال</h4>
                                    <form class="form-horizontal">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="col-sm-8">
                                                    <span>رقم الجوال</span>
                                                    <span>201141087755+</span>
                                                    <span class="btn btn-success">
                                                        <i class="icon-ok"></i> محقق
                                                    </span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button class="btn btn-warning edits text-left"> تعديل الجوال
                                                        <i class="icon-edit"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default hide-element edit-form">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-2 control-label">الدولة</label>
                                                    <div class="col-sm-7">
                                                        <select class="form-control" id="country">
                                                            <option selected disabled>اختار الدولة</option>
                                                            <option>السعودية</option>
                                                            <option>الامارات</option>
                                                            <option>الكويت</option>
                                                            <option>قطر</option>
                                                            <option>مصر</option>
                                                            <option>الاردن</option>
                                                            <option>سلطنة عمان</option>
                                                            <option>البحرين</option>
                                                            <option>دولة اخري</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-sm-2 control-label">رقم الجوال</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="phone" placeholder="رقم الجوال">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-9">
                                                        <button type="submit" class="btn btn-primary">استمرار</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- Change Password -->
                    <div role="tabpanel" class="tab-pane" id="change-password">
                        <div class="panel panel-default">
                            <section class="panel-body">
                                <div class="change-password-content">
                                    <h4 class="text-center">تغيير كلمة السر</h4>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="oldPassword" class="col-sm-2 control-label">كلمةالسر القديمة</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="oldPassword" placeholder="كلمةالسر القديمة">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="newPassword" class="col-sm-2 control-label">كلمة السر الجديدة</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="newPassword" placeholder="كلمةالسر الجديدة">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmNewPassword" class="col-sm-2 control-label">إعادة كلمةالسر الجديدة</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="confirmNewPassword" placeholder="إعادة كلمةالسر الجديدة">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-9">
                                                <button type="submit" class="btn btn-default">تغيير كلمة السر</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- Club -->
                    <div role="tabpanel" class="tab-pane" id="club">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="user-club">
                                    <div class="row">
                                        <div class="section-img">
                                            <img src="<?=URL?>img/membership-card-new-lg.png" class="img-responsive center-block" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="alerts">
                                            <div class="col-sm-4">
                                                <div class="points">
                                                    <span>
                                                        بقي
                                                        <span>25 نقطه</span> للحصول على لايف للأجهزة الذكية - سوق الأسهم السعودي
                                                        - يومين
                                                        <a href="#" data-toggle="modal" data-target=".get-points">كيف أحصل على النقاط؟</a>

                                                        <!--Get Points Modal-->
                                                        <div class="modal fade get-points" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title" id="gridSystemModalLabel">نادي عملاء</h4>
                                                                    </div>
                                                                    <div class="modal-body text-right">
                                                                        <div class="row">
                                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                                <div class="panel panel-default">
                                                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                                                        <h4 class="panel-title">
                                                                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#intro-club" aria-expanded="true" aria-controls="intro-club">
                                                                                                مقدمة عن النادي
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="intro-club" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                                        <div class="panel-body">
                                                                                            ادي عملاء تكرتشارت يهدف إلى شكر وتكريم عملائنا على ثقتهم الغالية في منتجات تكرتشارت. من خلال هذاالنادي، يمكن لعميلنا الكريم
                                                                                            الحصول على النقاط مقابل إشتراكاته،
                                                                                            ومن ثم إستبدال هذه النقاط بإشتراكات
                                                                                            مجانية يمكن للعميل الإستفادة
                                                                                            منها. بالإضافة إلى برنامج النقاط،
                                                                                            فأن النادي يقدم عضويات خاصة لعملاء
                                                                                            تكرتشارت، وهي برونزية، فضية وذهبية.
                                                                                            هذه العضويات تمكن العملاء الكرام
                                                                                            من الإستفادة من عروض و خصومات
                                                                                            خاصة فقط متوفرة لأصحاب العضوية.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="panel panel-default">
                                                                                    <div class="panel-heading" role="tab" id="headingTwo">
                                                                                        <h4 class="panel-title">
                                                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
                                                                                                aria-controls="collapseTwo">
                                                                                                كيف أحصل على النقاط؟
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                                        <div class="panel-body">
                                                                                            يمكنك الحصول على النقاط في نادي عملاء تكرتشارت من خلال الإشتراك في منتجات تكرتشارت. الجدول التالي يوضح النقاط التي يمكن الحصول
                                                                                            عليها بناء على الخدمة التي يتم
                                                                                            الإشتراك بها:
                                                                                            <a href="#">سوق الأسهم السعودي</a>
                                                                                            <a href="#">سوق الإمارات</a>
                                                                                            <a href="#">سوق الكويت للأوراق المالية</a>
                                                                                            <a href="#">بورصة قطر</a>
                                                                                            <a href="#">بورصة عمان</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="panel panel-default">
                                                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                                                        <h4 class="panel-title">
                                                                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#exchange-points" aria-expanded="false"
                                                                                                aria-controls="exchange-points">
                                                                                                كيف يمكن إستبدال النقاط؟
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="exchange-points" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                                                        <div class="panel-body">
                                                                                            عندما يصبح عدد النقاط كافيا لإستبدالها بإشتراك مجاني لأحد منتجات تكرتشارت، فإنه يظهر في أسفل الصفحة قائمة بالإشتراكات التي
                                                                                            يمكن الإستبدال بها و قيمتها بالنقاط.
                                                                                            ما عليك إلا إختيار الإشتراك المجاني
                                                                                            الذي ترغبه و الضغط على "إستبدال
                                                                                            النقاط". بالإضافة إلى ذلك، يظهر
                                                                                            لديك عدد النقاط المتبقية التي
                                                                                            تمكنك من الحصول على خيارت إستبدال
                                                                                            إضافية في المستقبل.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="my-points">
                                                    <span>لا يوجد لديك نقاط</span>
                                                    <a href="#">كيف أستخدم النقاط؟</a>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="new-user text-center">
                                                    <h3>عضوية جديدة</h3>
                                                    <span>بقي 8 نقاط للحصول على عضوية برونزية</span>
                                                    <a href="#">كيف أستخدم النقاط؟</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="signOut">...</div>
                </div>
            </div>
        </div>
    </div>
    <!-- End User -->

    <!-- Start Footer -->
    <footer>
        <div class="quick-links">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-xs-6 col-md-push-1">
                        <h4><a href="#">المنتجات</a></h4>
                        <ul class="col-xs-6">
                            <li><a href="#">منتج</a></li>
                            <li><a href="#">منتج</a></li>
                            <li><a href="#">منتج</a></li>
                            <li><a href="#">منتج</a></li>
                        </ul>
                        <ul class="col-xs-6">
                            <li><a href="#">منتج</a></li>
                            <li><a href="#">منتج</a></li>
                            <li><a href="#">منتج</a></li>
                            <li><a href="#">منتج</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <h4><a href="#">الخدمات</a></h4>
                        <ul>
                            <li><a href="#">خدمة</a></li>
                            <li><a href="#">خدمة</a></li>
                            <li><a href="#">خدمة</a></li>
                            <li><a href="#">خدمة</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <h4><a href="#">الدعم الفني</a></h4>
                        <ul>
                            <li><a href="#">خدمة</a></li>
                            <li><a href="#">خدمة</a></li>
                            <li><a href="#">خدمة</a></li>
                            <li><a href="#">خدمة</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 col-xs-6">
                        <h4><a href="#">الشركة</a></h4>
                        <ul>
                            <li><a href="#">خدمة</a></li>
                            <li><a href="#">خدمة</a></li>
                            <li>
                                <a href="#">خدمة</a>
                            </li>
                            <li>
                                <a href="#">خدمة</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>&copy; حقوق الموقع محفوظة</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=URL?>js1/bootstrap.min.js"></script>
    <!-- Nice Scroll -->
    <script src="<?=URL?>js1/jquery.nicescroll.min.js"></script>
    <!--Includer Custom Js file -->
    <script src="<?=URL?>js1/script.js"></script>
</body>

</html>
