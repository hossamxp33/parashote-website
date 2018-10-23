          <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
      

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div style="float: left">
                                <span>فترة عرض التقارير</span>
                                <select>
                                     <option>24ساعة</option>
                                </select>
                                </div>

                                <div style="float: right"> 
                                   <h4 class="page-title">لوحة التحكم / الرئيسية</h4> 
                                   
                                </div>
                            
                            </div>
                        </div>
                         <!-- end Page-Title -->

                        <div class="row" style="    margin-top: 15px;">
                            
                            <div class="col-md-6 col-sm-6 col-lg-3 lenovo ">
                                <div class="widget-bg-color-icon  fadeInDown animated">
                                    <div class="col-sm-12 box" style="background: #0bc4e0;">
                                           <div class="col-sm-6"></div>
                                        <img class="imgcalc col-sm-6" src="<?= URL ?>img/clients-main.png">
                                    </div>
                              <div class="col-sm-12 whitebox">
                                  <h4 class="texty isa" style=" padding-right: 17px;">عدد العملاء</h4>
                                   <div class="text-right">  <h3 class="text-dark"><b  style="color: #0bc4e0;" class="counter"><?= $customerCount ?></b></h3>  </div> 
                              </div>
 
 
                                   
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3 smallscreen lenovo">
                                <div class="widget-bg-color-icon ">
                               <div class="col-sm-12 box " style="background: #f1a80b;">
                                      <div class="col-sm-6"></div>
                                   <img class="imgcalc col-sm-6"  src="<?= URL ?>img/drivers-main.png"></div>
                              <div class="col-sm-12 whitebox">
                                  <h4 class="texty isa" style="padding-right: 13px;" >عدد المندوبين</h4>
                                     <div class="text-right " >  <h3 class="text-dark"><b style="color: #f1a80b;" class="counter"><?= $driverCount ?></b></h3>  </div>
                              </div>
                                  
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3 smallscreen lenovo">
                                <div class="widget-bg-color-icon ">
                                             <div class="col-sm-12 box" style="background: #1e74eb ;">
                                                 <div class="col-sm-6"></div>
                                                 <img  class="imgcalc col-sm-6" style="" src="<?= URL ?>img/orders-main.png">
                                             
                                             </div>
                            <div class="col-sm-12 whitebox">
                                <h4 class="texty isa" style="    padding-right: 17px;">عدد الطلبات</h4>
                                
                                     <div class="text-right ">      <h3   class="text-dark"><b style="color: #1e74eb ;" class="counter"><?= $ordersCount ?></b></h3>  </div>
                            </div>
                                
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 col-lg-3 smallscreen lenovo">
                                <div class="widget-bg-color-icon ">
                                        <div class="col-sm-6"></div>         
                                    <div class="col-sm-12 box" style="background: #85c976;">
                                        <div  class="col-sm-6"></div>        
                                        <img class="imgcalc"  src="<?= URL ?>img/money-main.png"></div>
                            <div class="col-sm-12 whitebox">
                                <h4 class="texty isa" >التحويلات (ريال)</h4>
                                 <div class="text-right "> <h3 class="text-dark"><b  style="color: #85c976;" class="counter"><?= $allah[0]['transfer_amount'] ?></b></h3>  </div>
                            </div>
                                  
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                     
                        <!-- end row -->
                 <!--------------- Cricel ------------------>
                 <div class="row">
                 <div class="col-sm-12 maincol12"  style="    margin-top: 30px;" > 
                       
                        <div class="col-sm-6 col-xs-12 cricright" style=""> <div class="circle" id="circles-2" data-value='<?= $percentDone ?>'></div>
                            <h4 class="crictxtrig" style=" ">طلبات تمت بنجاح</h4>
                        </div>
                      <div class="col-sm-6 col-xs-12 criclef" style=" "> <div class="circle" id="circles-1" data-value='<?= $percentFail ?>'> </div>
                            <h4  class="crictxtlef" style=""> طلبات ملغاه</h4>
                        </div>
                       
                    </div>
                     </div> 
                      <!---------------end Cricel ------------------>

 
<style>
   .gm-style .gm-style-iw {   text-align: left; }
</style>
<div class="row" style=" background: white">     
                   
                          <div class="card-box">
                              <div class="col-sm-12">
                                 
                                  <div class="col-sm-6">
                              
                              <div>خريطة ريدى</div>
 <script src="http://maps.google.com/maps/api/js?key=AIzaSyBFaP5fZMKOIsXCJ2xFkobpjd32nkanwCM&callback=initMap" 
          type="text/javascript"></script> 
 

<div id="map" style=" height: 400px;"></div>

  <script type="text/javascript">
     
     
    var locations = [
         <?php  if($mapType == 1 ||  $mapType == 2) { ?>
      <?php foreach($deliveryMaps as $deliveryMapss){ 
         if($mapType == 1){?> 
               [
                  '<?= $deliveryMapss['photo'] ; ?>', <?= $deliveryMapss['delivry_long'] ?>  ,  <?= $deliveryMapss['delivry_lat'] ?> 
               ] ,
                <?php } elseif($mapType == 2){?>
                     [
                  '<?= $deliveryMapss['photo'] ;?>', <?= $deliveryMapss['user_long'] ?>  ,  <?= $deliveryMapss['user_lat'] ?> 
               ] ,
               <?php } ?>
                
      <?php }?>
             <?php }   else{ ?>
                 
                             <?php foreach($deliveryMaps as $deliveryMapsss){  ?>
                 [ 
                      
                         '<?= $deliveryMapsss['photo'] ; ?>', <?= $deliveryMapsss['user_long'] ?>  ,  <?= $deliveryMapsss['user_long'] ?>  
                      ,  
                  '<?= $deliveryMapsss['photo'] ; ?>', <?= $deliveryMapsss['delivry_long'] ?>  ,  <?= $deliveryMapsss['delivry_lat'] ?> ,
                
               ],
             <?php } ?>
                          
                <?php } ?>
                     ];
                  

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(31.23, 29.97),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
var iconBase = '<?=URL?>dashboard/img/';

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map 
         ,  icon: iconBase + 
                 <?php if($mapType == 1){?> 'driver-on-map.png'  <?php } ?>
                 <?php if($mapType == 2){?> 'client-on-map.png' <?php } ?>
                 <?php if($mapType == 3){?> 'driver-on-map.png' <?php } ?>
                   
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
      }
 
    
  </script>
     </div> 
                                  <div class="col-sm-6" style="  margin-top: 25px; ">
                                      <div class="col-sm-6" style="    margin-top: 350px;">
                                         
                                          <div class="col-sm-12">
                                              <div class="col-sm-6" style="color: greenyellow">
                                                
                                                  <img  class="col-sm-4" style="float:right;    width: 29px;"  src="<?=URL?>dashboard/img/client-on-map.png">
                                                  <span class="col-sm-4" style="float:right !important;text-align: right " >عميل </span>
                                              </div>
                                          <div class="col-sm-6" style="color:red">
                                            
                                              <img class="col-sm-4" style="float:right;    width: 29px;" src="<?=URL?>dashboard/img/driver-on-map.png">
                                                <span style="float:left;text-align: right !important"  class="col-sm-4">مندوب</span>
                                          </div>
                                          </div>
                                      </div> 
                                      <div class="col-sm-6">
                                          <div class="col-sm-12" style="color:greenyellow;    padding-top: 21px;">
                                            
                                     <img class="col-sm-4" style="float:right; max-width: 30px" src="<?=URL?>dashboard/img/client-on-map.png">
                                     <a class="col-sm-8" href="http://localhost/ready/usermgmt/users/dashboard/2" style="cursor: pointer;">عرض العملاء فقط</a>
                                          </div>
                                          <div class="col-sm-12" style="color:red;    padding-top: 21px;">
                                           
                                         <img class="col-sm-4" style="float:right; max-width: 30px" src="<?=URL?>dashboard/img/driver-on-map.png">
                                                <a class="col-sm-8" href="http://localhost/ready/usermgmt/users/dashboard/1" style="cursor: pointer;">عرض المناديب فقط</a>
                                          </div>
                                          <div class="col-sm-12" style="    padding-top: 21px;">
                                          <img  class="col-sm-2" style="float:right;max-width: 30px"  src="<?=URL?>dashboard/img/client-on-map.png">
                                         <img class="col-sm-2" style="float:right; max-width: 30px" src="<?=URL?>dashboard/img/driver-on-map.png">

                                              <a class="col-sm-8" href="http://localhost/ready/usermgmt/users/dashboard/3" style="cursor: pointer;">عرض الكل</a>
                                          </div>
                                      </div> 
                                      
                                  </div>
                                      
                                  
                              </div>   
                          </div>
    
                          </div>
               <!-----------------end map ---------->
               
               
               
               <!-----------------orderDetails ---------->
               <div class="row" style="background: white;border-radius: 6px;">
                 
      
		 
            <div class="col-sm-12 headbg">
                
               <h2 class="headtxt col-sm-2"> جميع الطلبات </h2>  
              
              <div class="col-sm-5 ">  
                  <div class="col-sm-3"></div>
                      <div class="col-sm-9">
                  <h2 class="headtxt2 col-sm-7"> فترة عرض الطلبات</h2> 
                  <select class=" col-sm-5 selection"> 
                      <option>24 ساعة</option>
                      <option>شهر</option>
                  </select> 
                  </div>
              </div>
               
               <div class="col-sm-5" style="    padding: 0;">
                  <div class="col-sm-7" style="    padding: 0;"> 
                      <div  class="col-sm-12">
                      <h2 class="col-sm-4 headtxt2"> أو من تاريخ</h2>
                      <div class="col-sm-8 selection"> 
                         <img class="col-sm-4 icons" src="<?=URL?>dashboard/img/date-icon.png">
                         <input type="date" class="col-sm-8 dating unstyled">  
                      </div>
                  </div>
                  </div>
                  
                <div class="col-sm-5" style="    padding: 0;">
                     <div  class="col-sm-12">
                      <h2 class="col-sm-3 headtxt"> إلى</h2>
                      <div class="col-sm-9 selection"> 
                          <img class="col-sm-4 icons" src="<?=URL?>dashboard/img/date-icon.png" width="40">
                          <input type="date" class="col-sm-8 dating unstyled"> 
                      </div>
                  </div>   </div>
               
             
              </div>
             
            </div> 
            <!-----end headbg-->
               
              
		<div class="panel-body col-sm-12">
                    
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead >
    
			<tr class="sortHeader">
                            <th style=" text-align: right;padding-right:20px">م</th>                             
                                <th ><?php echo $this->Paginator->sort('id', ___('رقم الطلب')); ?></th>			      
                                <th><?php echo $this->Paginator->sort('description', ___('الطلب')); ?></th>                              
                                <th><?php echo $this->Paginator->sort('user_id', ___('العميل')); ?></th>
                                <th><?php echo $this->Paginator->sort('delivery_id', ___('المندوب')); ?></th>
                                <th><?php echo $this->Paginator->sort('store_details', ___('تفاصيل المتجر')); ?></th>
                                <th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('التاريخ')); ?></th>   
                                <th><?php echo $this->Paginator->sort('price', ___('تكلفة التوصيل')); ?></th>
                                <th><?php echo $this->Paginator->sort('order_status', ___('الحالة')); ?></th>
 			<th class="actions"></th>
			</tr>
			<tr class="filterHeader">
				<td>
				<?php
				//echo $this->AlaxosForm->checkbox('_Tech.selectAll', ['id' => 'TechSelectAll']);
				
				echo $this->AlaxosForm->create($orderDetailss,  ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
				?>
				</td>
                                <td> <?php echo $this->AlaxosForm->filterField('id'); ?>   </td>
                                <td> <?php echo $this->AlaxosForm->filterField('description'); ?> </td>
                                <td><?php echo $this->AlaxosForm->filterField('user_id'); ?> </td>
                                <td> <?php echo $this->AlaxosForm->filterField('delivery_id'); ?> </td>    
                                <td> <?php echo $this->AlaxosForm->filterField('store_details'); ?> 	</td>
                                <td><?php echo $this->AlaxosForm->filterDate('created'); ?> </td>
                                <td> <?php echo $this->AlaxosForm->filterField('price'); ?> </td>
                                <td> <?php echo $this->AlaxosForm->filterField('order_status'); ?> </td>
	 
				<td>
					<?php
					echo $this->AlaxosForm->button(___('بحث'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($orderDetailss as $i => $orderDetail): 
                            
  //   debug($orderDetail);
                            ?>
                           
				<tr>
                                    <td>
                                            <?php
                                            echo $this->AlaxosForm->int('Order Detail.' . $i . '.id', array('value' => 1+$i, 'class' => 'model_id'));
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $orderDetail['id']; ?>
                                        </td>
                                        <td>
                                            <?php  $orderDetail['description'] ; ?>
                                        </td>
                                        <td>
                                       <?php echo $orderDetail['user']['username']; 
                                       debug($orderDetail['user']['username']);
                                       ?>
                                        </td>

                                        <td>
                                            <?php echo $orderDetail['delivery']['name']; ?>
                                        </td>

                                        <td>
                                            <?php echo $orderDetail['store_details'] ; ?>
                                        </td>
 

                                        <td>
                                       <?php echo $orderDetail['created'] ; ?>
                                        </td> 
                                        
                                            
                                       
                                        <td>
                                       <?php echo $orderDetail['price'] ; ?>
                                            
                                        </td>
                                            <td>
                                            <?php 
                                            
//                                        
                                            if($orderDetail->order_status == 0){
                                                ?>
                                                   <button class="btn-default">قيد الانتظار</button>
                                                   <?php
                                            }elseif($orderDetail->order_status==1){
                                                ?>
                                                   <button class="btn-info">تم قبول الطلب</button>
                                                   <?php
                                            }
                                            elseif($orderDetail->order_status==2){
                                                  ?>
                                                   <button class="btn-warning">فى الطريق</button>
                                                   <?php
                                            }
                                            elseif($orderDetail->order_status==3){
                                                  ?>
                                                   <button class="btn-danger">تم الإلغاء</button>
                                                   <?php
                                            }elseif($orderDetail->order_status==4){
                                                   ?>
                                                   <button class="btn-success">تم التوصيل</button>
                                                   <?php
                                            }
                                            ?>
                                            
                               
                                        </td>


			 	        <td class="actions" >
             <a  class='dropdown-toggle col-sm-12' data-toggle='dropdown'  style="    margin: 1px;width: 50px;cursor: pointer;">
                  
                    <span  class="col-sm-12 actionsheight">.</span>
                    <span  class="col-sm-12 actionsheight" >.</span>
                    <span  class="col-sm-12 actionsheight">.</span>
              
             </a>
                    
                           <?php
                            echo "<ul class='dropdown-menu'>";
                             echo "<li>" . $this->Html->link(__('تعديل بيانات الطلب '), ['controller' => 'OrderDetails', 'action' => 'edit', $orderDetail['id'],'plugin'=>null, ['escape' => false]]) . "</li>";
                            echo "<li>" . $this->Html->link(__('عرض بيانات الطلب '), ['controller' => 'OrderDetails', 'action' => 'view', $orderDetail['id'],'plugin'=>null, ['escape' => false]]) . "</li>";
                            echo "</ul>";
                            ?>

					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
		
			
			<div class="paging text-center">
				<ul class="pagination pagination-sm">
				<?php
				$this->Paginator->templates(['ellipsis' => '<li class="ellipsis"><span>...</span></li>']);
				echo $this->Paginator->prev('< ' . __('السابق'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('التالى') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	 
 
 
<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>
                       
                       
                       
                       
                
                   
                   
               </div>
               <!-----------------end index ---------->
               
               
                       <!-----------------chats ---------->
               <div class="row" style="background: white;border-radius: 6px;">
                  
                       
      
		 
            <div class="col-sm-12 headbg">
                <div class="col-sm-6" style="    padding: 0;">
               <h2 class="headtxt "> المحادثات</h2>  
              
            </div>
               
               <div class="col-sm-6" style="    padding: 0;">
                  <div class="col-sm-7" style="    padding: 0;"> 
                      <h2 class="headtxt ">  <span  style="     font-size: large;   padding: 0;"><</span>  <span style="margin-right:5px">فراس بالهول  </span></h2>
                  </div>
                  
                   <div class="col-sm-5 headtxt" style="text-align: left" >
                    <a href="#" style=" color:white;    margin-left: 15px;">
                     <span  style="     font-size: xx-large;       margin-top: 5px; position: absolute;   padding: 0;">.</span> 
                    <span  style="     font-size: xx-large;        margin-top: 10px; position: absolute;  padding: 0;">.</span> 
                    <span style="     font-size: xx-large;     margin-top: 0px;  position: absolute;  padding: 0;">.</span> 
                    
              </a>
                        </div>
               
             
              </div>
             
            </div> 
            <!-----end headbg-->
            <!------ BODY-------->
            
            <div class="col-sm-12">
                <div class="col-sm-6" style="      padding: 0;  border-left: 1px solid #ddd;    border-right: 1px solid #ddd;"> 
                <div class="col-sm-12 chatP">
                    <div class="col-sm-2"><img class="chatimg" src="<?= URL ?>dashboard/img/chat-ppl.jpg"></div>
                    <div class="col-sm-8 ">
                        <h4>أحمد عبد الله</h4>
                        <p>ما هو متوسط توقيت التوصيل من فضلك ؟</p>
                    </div>
                    <div class="col-sm-2"><h5>2 mins</h5></div>
                </div>
                <div class="col-sm-12 chatP">
                    <div class="col-sm-2"><img class="chatimg" src="<?= URL ?>dashboard/img/chat-ppl2.jpg"></div>
                    <div class="col-sm-8 ">
                        <h4>أحمد عبد الله</h4>
                        <p>ما هو متوسط توقيت التوصيل من فضلك ؟</p>
                    </div>
                    <div class="col-sm-2"><h5>2 mins</h5></div>
                </div>
                   <div class="col-sm-12 chatP">
                    <div class="col-sm-2"><img class="chatimg" src="<?= URL ?>dashboard/img/chat-ppl3.jpg"></div>
                    <div class="col-sm-8 ">
                        <h4>أحمد عبد الله</h4>
                        <p>ما هو متوسط توقيت التوصيل من فضلك ؟</p>
                    </div>
                    <div class="col-sm-2"><h5>2 mins</h5></div>
                </div>
            <div class="col-sm-12 chatP">
                    <div class="col-sm-2"><img class="chatimg" src="<?= URL ?>dashboard/img/chat-ppl4.png"></div>
                    <div class="col-sm-8 ">
                        <h4>أحمد عبد الله</h4>
                        <p>ما هو متوسط توقيت التوصيل من فضلك ؟</p>
                    </div>
                    <div class="col-sm-2"><h5>2 mins</h5></div>
                </div>
                    </div>
               
                <div class="col-sm-6" style="    margin-top: 20px;">
                   <div class="col-sm-12">
                    <div class="col-sm-4"></div>
                     <div class="col-sm-6">
                         <p class="pCHAT">لو سمحت أخى طلبت طلبا ولكن تأخر كثيرا <span><br>هل يمكنك مساعدتى من فضلك ؟</span><br>
                             <span style="    float: left;">19:25</span></p>
                     </div>
                     <div class="col-sm-2">
                         <img class="chatimg2" src="<?= URL ?>dashboard/img/chat-ppl4.png"
                     </div>
                    </div>
                    </div>
                
                <!------------------------->
                <div class="col-sm-12">
                     <div class="col-sm-8">
                         <p class="pCHAT2">بالطبع أخى نأسف على ذلك<span><br>ما هو أسم المندوب ؟</span><br>
                             <span style="    float: left;">19:26</span></p>
                     </div>
                      <div class="col-sm-4"></div>
                      </div>
                      <!------------------------->
                         <div class="col-sm-12">
                           <div class="col-sm-4"></div>
                     <div class="col-sm-6">
                         <p class="pCHAT">المدثر<br>
                             <span style="    float: left;">19:29</span></p>
                     </div>
                     <div class="col-sm-2">
                         <img class="chatimg2" src="<?= URL ?>dashboard/img/chat-ppl4.png"
                     </div>
                    </div>
                 </div>
            <!---------------------->
                 <!------------------------->
                <div class="col-sm-12">
                     <div class="col-sm-8">
                         <p class="pCHAT2"><span>يحاول الاتصال بك ولكن هاتفك مغلق </span><br>
                             <span style="    float: left;">19:35</span></p>
                     </div>
                      <div class="col-sm-4"></div>
                      </div>
                      <!------------------------->
                      <div class="col-sm-12" style="padding: 0;">
                           <div class="col-sm-12" style="    margin-top: 20px;">
                         <input class="pCHAT2 col-sm-12"  style="border: none;color:#a09c9c !important" placeholder=" إكتب رسالتك"> 
                        
                         
                         
                     </div>
                      
                      </div>
                      <!------- end chat---------->
            </div>
         
 
 
<!--<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>-->
                       
                       
                       
                       
                   
                   
                   
               </div>
                </div> 
               <!-----------------end index ---------->
               <!---------------- end ---------------->
               
               <div class="row">
                   <div class="col-sm-12 maincol12">
                  
                  
                  <div class="panel panel-primary">

	<div class="panel-body dashboard-section">
<h4><span class="label label-default"> المستخدمين</span>
</h4><br>
<a href="<?=URL?>users/add" class="btn btn-default um-btn">إضافة مستخدم </a>
<a href="<?=URL?>usermgmt/users" class="btn btn-default um-btn">كل المستخدمين </a>
<a href="<?=URL?>usermgmt/users/online" class="btn btn-default um-btn">المستخدمين الحاليين </a>
<hr><h4><span class="label label-default">المجموعات </span>
</h4><br><a href="<?=URL?>usermgmt/user_group_permissions/permissionGroupMatrix" class="btn btn-default um-btn">صلاحيات المجموعات </a>
<hr><h4><span class="label label-default">البريد الإلكترونى </span></h4><br>
<a href="<?=URL?>usermgmt/user_emails/send" class="btn btn-default um-btn">إرسال بريد إلكترونى </a>
<a href="<?=URL?>usermgmt/user_emails" class="btn btn-default um-btn">عرض المرسل  </a>
<a href="<?=URL?>usermgmt/scheduled_emails" class="btn btn-default um-btn">طلبات الإتصال </a>
<a href="<?=URL?>usermgmt/user_email_templates" class="btn btn-default um-btn"> جدولة البريد</a>
<a href="<?=URL?>usermgmt/user_email_signatures" class="btn btn-default um-btn">إرسال تنيه </a><hr>	</div>
</div> 
                  
                  
              </div>
                   
               </div>
                        <!-- end row -->

                        

             
  <!-- ==========================ENDENDEND ENDENDEND ENDENDEND==================================== -->

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
              <!--------------end orders------------->          
<!--              <div class="col-sm-12 maincol12">
                  
                  
                  <div class="panel panel-primary" >

	<div class="panel-body dashboard-section">
<?php	if($this->UserAuth->isLogged()) {
	
                        if($this->UserAuth->isAdmin()) {
                        			echo "<h4><span class='label label-default'> المستخدمين</span></h4><br/>";
				if($this->UserAuth->HP('Users', 'addUser', 'Usermgmt')) {
					echo $this->Html->link(__('إضافة مستخدم '), ['controller'=>'Users', 'action'=>'addUser', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}

				if($this->UserAuth->HP('Users', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('كل المستخدمين '), ['controller'=>'Users', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('Users', 'online', 'Usermgmt')) {
					echo $this->Html->link(__('المستخدمين الحاليين '), ['controller'=>'Users', 'action'=>'online', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
		 
				echo "<hr/>";

				echo "<h4><span class='label label-default'>المجموعات </span></h4><br/>";
				if($this->UserAuth->HP('UserGroupPermissions', 'permissionGroupMatrix', 'Usermgmt')) {
					echo $this->Html->link(__('صلاحيات المجموعات '), ['controller'=>'UserGroupPermissions', 'action'=>'permissionGroupMatrix', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
                        }
                                
                        echo "<hr/>";
	

			if($this->UserAuth->isAdmin()) {
	 
				echo "<h4><span class='label label-default'>البريد الإلكترونى </span></h4><br/>";
				if($this->UserAuth->HP('UserEmails', 'send', 'Usermgmt')) {
					echo $this->Html->link(__('إرسال بريد إلكترونى '), ['controller'=>'UserEmails', 'action'=>'send', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('عرض المرسل  '), ['controller'=>'UserEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('ScheduledEmails', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('طلبات الإتصال '), ['controller'=>'ScheduledEmails', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
			
				if($this->UserAuth->HP('UserEmailTemplates', 'index', 'Usermgmt')) {
					echo $this->Html->link(__(' جدولة البريد'), ['controller'=>'UserEmailTemplates', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				if($this->UserAuth->HP('UserEmailSignatures', 'index', 'Usermgmt')) {
					echo $this->Html->link(__('إرسال تنيه '), ['controller'=>'UserEmailSignatures', 'action'=>'index', 'plugin'=>'Usermgmt'], ['class'=>'btn btn-default um-btn']);
				}
				echo "<hr/>";

			}
		} ?>
	</div>
</div> 
                  
                  
              </div>-->
                <!--------------end admin settings------------->          
            
        <!------------ end container ---------->

    
  
           <style>
   @media  (min-width :1024px) and (max-width :1300px)
{
              
                 .datepicker{ 
                      width: 250px;
                     top: 682px !important;
    right: 84px !important;
      margin-right: 613px !important; margin-top: 300px;
              
               }
               
}

             
@media  (min-width :768px) and (max-width :1024px){
   .datepicker{
        display: block;
    top: 1127px !important;
    
    width: 250px;
        margin-right: 613px !important;
    margin-top: 300px;
    }  
}
        .datepicker{ 
                      width: 250px;
                     top: 682px !important;
    right: 84px !important;
      margin-right: 613px !important; margin-top: 300px;
              
               }
   
    </style> 
<!--    <script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>-->