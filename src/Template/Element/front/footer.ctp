  <script>
    
    
    
$(document).ready(function(){

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};


    $('.addemail').click(function(){
    if (!isValidEmailAddress($('#email').val())) {alert("من فضلك أدخل إيميل صحيح")}else{

            $.ajax({url: "<?= URL ?>/emailsubs/add",type:"post",accept:"application/json",
          data:{"email":$('#email').val()}
        
          ,success: function(result){
              
         
  
              $('.cart_popups').show(500).delay(5000).hide(500);   
      
  
    },error:function(err){
        
        console.log(err)
    }});
 }
    })
   
    })
 


</script>


        <section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="content4-9" style="border-top: black 1px solid;z-index: 99999;    width: 100%;
        background-image: url(http://medical-appoint.com/images/footer-Bg.png);">


            <div class="mbr-section__container container mbr-section__container--std-top-padding" style="padding-top: 93px;">
                <div class="mbr-section__row row">
                    <div class="mbr-section__col col-xs-12 col-lg-3 col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="2s" style="text-align: center;">

                        <div class="mbr-section__container mbr-section__container--middle">
                            <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                                                         <div class="cart_popups" style="top: 27px; overflow: hidden; display: none;    color: white;">تم الاشتراك في الخدمة شكرا لك</div>

                                                         <h3 class="mbr-header__text"style="    color: white;font-size: 14px;">أكتب بريدك إلاكترونى أو رقم الهاتف</h3>
                            </div>
                        </div>
                        <div class="mbr-section__container mbr-section__container--last" >
                            <div class="mbr-article mbr-article--wysiwyg">
                                <p style="    color: white;">!لتصلك نصائحنا كل أسبوع&nbsp;</p>
                            </div>
                        </div>

                        <div class="joinus" style="float: right;">
                            <div>
                                <span class="fieldRow" style="width:260px;">
                                    <input id="email" type="email" data-fv-emailaddress-message="The value is not a valid email address" class="form-control" placeholder="اكتب بريدك الاكترونى " />
                                    <label for="email"></label>
                                    <i for="email" class="fa fa-envelope-o"></i>
                                    <i id="iconWrong" class="iconCheck fa fa-times"></i> 
                                    <i id="iconPassed" class="iconCheck fa fa-check"></i> 
                                </span>

                            </div>
                            <div class="btn-container addemail" style="    margin-top: -13px;width: 100%;">
                                <span  class="go center "style="cursor: pointer;    background-color: #3f93c2!important; ">موافق</span>
                            </div>

                            <div style="margin-top: 10px;margin-left: -10px;">
                                <a href="https://www.facebook.com/medical.appoint">
                                    <div class="buttonsocial">
                                        <img src="<?= URL ?>images/fb.png" height="31" width="31" alt="" />
                                    </div>
                                </a>
                                <a href="https://www.twitter.com/medicalappoint">
                                    <div class="buttonsocial">
                                        <img src="<?= URL ?>images/tw.png" height="31" width="31" alt="" />
                                    </div>
                                </a>
                                <a href="https://www.youtube.com/medicalappoint">
                                    <div class="buttonsocial">
                                        <img src="<?= URL ?>images/youtube.png" height="31" width="31" alt="" />
                                    </div>
                                </a>
                                <a href="https://www.telegram.me/medicalappoint">
                                    <div class="buttonsocial">
                                        <img src="<?= URL ?>images/telegram.png" height="31" width="31" alt="" />
                                    </div>
                                </a>

                                <a href="https://www.instagram.com/medical.appoint">
                                    <div class="buttonsocial">
                                        <img src="<?= URL ?>images/insta.png" height="31" width="31" alt="" id="img_2"/>
                                    </div>
                                </a>
                                   <a href="+٩٦٨٩٧٨٠٧٧٧٧" style="font-family: serif !important;">
                                    <div class="buttonsocial">
                                        <img src="<?= URL ?>images/whatsapp_logo.jpg" height="31" width="31" alt="" id="img_2"/>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="mbr-section__col col-xs-12 col-lg-4 col-md-4 col-sm-6 wow fadeInLeft" data-wow-duration="2s" style="text-align: center;">

                       <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fmedical.appoint&tabs=timeline&width=340&height=450&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="auto" height="450" style="border:none;overflow:hidden;width: calc(100% - 2px);" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

                    </div>
                    
                    <div class="mbr-section__col col-xs-12 col-lg-3 col-md-3 col-sm-6 wow fadeInLeft" data-wow-duration="2s">


                        <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BQSSkgygsKp/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">الموقـــــع : http://medical-appoint.com التطبيق للإيفـــون : https://goo.gl/qxrZcn ‏التطبيق للأندرويد : https://goo.gl/utDgYj</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A photo posted by مواعيد طبية (@medical.appoint) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2017-02-09T09:27:09+00:00">Feb 9, 2017 at 1:27am PST</time></p></div></blockquote>
<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>

                    </div>
                    
                    


                    <div class="mbr-section__col col-xs-12 col-lg-2 col-md-2 col-sm-6  wow fadeInRight" data-wow-duration="2s">

                        <div class="mbr-section__container mbr-section__container--middle">
                            <div class="mbr-header mbr-header--reduce mbr-header--center mbr-header--wysiwyg">
                                <h3 class="mbr-header__text" style="text-align: center;    color: white;">مواعيد طبية</h3>
                            </div>
                        </div>
                        <div class="mbr-section__container mbr-section__container--last" style="padding-bottom: 93px;">
                            <div class="mbr-article mbr-article--wysiwyg">
                                <p></p><p style="text-align: center;">
                                    <a href="<?= URL ?>/hospitals/aboutus" style="font-size: 14px;    color: white;">من نحن</a><br>
                                    <a href="<?= URL ?>/hospitals/terms" style="font-size: 14px;    color: white;">الشروط والقوانين</a><br>
                                    <a href="<?= URL ?>/hospitals/contactus" style="font-size: 14px;    color: white;">إتصل بنا</a><br></p><p></p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <footer class="mbr-section mbr-section--relative mbr-section--fixed-size" id="footer1-2" style="background-color: rgb(3, 125, 202);">

            <div class="mbr-section__container container">
                <div class="mbr-footer mbr-footer--wysiwyg row" style="padding-top: 24.6px; padding-bottom: 24.6px;">
                    <div class="col-sm-12">
                       <div>
                        <p class="mbr-footer__copyright" style=" text-align:center;   margin-top: -32px;    color: white;  padding-top: 31px;  font-size:15px;font-weight: normal;">جميع الحقوق محفوظة © لموقع مواعيد طبية 2016-2017 </p></div><br><div><p style=" text-align:center; font-size:10px;">
المواد المنشورة في موقع - مواعيد طبية - ومواقع التواصل التابعة لنا هي بمثابة معلومات ودراسات فقط ولا يجوز إعتبارها إستشارة طبية أو توصية علاجية ما لم يتم تشخيصك من قبل الطبيب</p></div>

 <p class="mbr-footer__copyright" style="font-weight: normal;float: left;color: white;"> <strong><em><a href="http://www.codesroots.com/" target="_blank" class="text-warning" style="text-decoration: blink;">Codesroots </a></em></strong>تصميم وبرمجة  </p>
                    </div>
                </div>
            </div>
         

        </footer>


        
   <script src="<?= URL ?>web/jquery/jquery.min.js"></script>
        <script src="<?= URL ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= URL ?>smooth-scroll/SmoothScroll.js"></script>
        <script src="<?= URL ?>js/script.js"></script>
        <script src="<?= URL ?>js/wow.min.js"></script>
        <script>
            new WOW().init();
            
            
            
            
            
          
        </script>
     

    </body>
</html>