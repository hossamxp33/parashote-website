<?php
/* Cakephp 3.x User Management Premium Version (a product of Ektanjali Softwares Pvt Ltd)
Website- http://ektanjali.com
Plugin Demo- http://cakephp3-user-management.ektanjali.com/
Author- Chetan Varshney (The Director of Ektanjali Softwares Pvt Ltd)
Plugin Copyright No- 11498/2012-CO/L

UMPremium is a copyrighted work of authorship. Chetan Varshney retains ownership of the product and any copies of it, regardless of the form in which the copies may exist. This license is not a sale of the original product or any copies.

By installing and using UMPremium on your server, you agree to the following terms and conditions. Such agreement is either on your own behalf or on behalf of any corporate entity which employs you or which you represent ('Corporate Licensee'). In this Agreement, 'you' includes both the reader and any Corporate Licensee and Chetan Varshney.

The Product is licensed only to you. You may not rent, lease, sublicense, sell, assign, pledge, transfer or otherwise dispose of the Product in any form, on a temporary or permanent basis, without the prior written consent of Chetan Varshney.

The Product source code may be altered (at your risk)

All Product copyright notices within the scripts must remain unchanged (and visible).

If any of the terms of this Agreement are violated, Chetan Varshney reserves the right to action against you.

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Product.

THE PRODUCT IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE PRODUCT OR THE USE OR OTHER DEALINGS IN THE PRODUCT. */
?>
            <!------------------- Right --------------------->

            <div class="login-section">
              <div class="container">
              	<div class="row">
                  <div class="loginSectionForm">
              			<div class="panel panel-default">
              				<div class="panel-heading">
                            		<?php echo __('تسجيل حساب جديد'); ?>
              				</div>
              				<div class="panel-body">
              				<?php echo $this->element('Usermgmt.ajax_validation', ['formId'=>'registerForm', 'submitButtonId'=>'registerSubmitBtn']);?>
              					<?php echo $this->Form->create($userEntity, ['id'=>'registerForm', 'class'=>'form-horizontal']); ?>
                            <form class="form-horizontal" id="registerForm">
                              <div class="um-form-row form-group">
                                <label for="user" class="col-sm-3 control-label"><?php echo __('اسم المستخدم'); ?></label>

                                <div class="col-sm-9">
              					 	<?php echo $this->Form->input('Users.username', ['type'=>'text', 'label'=>false, 'div'=>false, 'placeholder'=>__('اسم المستخدم'), 'class'=>'form-control','id'=>"user"]); ?>
                                </div>
                              </div>
                              <div class="um-form-row form-group">
                                <label for="password" class="col-sm-3 control-label"><?php echo __('كلمه السر'); ?></label>

                                <div class="col-sm-9">
              					<?php echo $this->Form->input('Users.password', ['type'=>'password', 'label'=>false, 'div'=>false, 'placeholder'=>__('كلمه السر'), 'class'=>'form-control','id'=>'password']); ?>
                                </div>
                              </div>
                              <div class="um-form-row form-group">
                                <label for="confirmpassword" class="col-sm-3 control-label"><?php echo __('تاكيد كلمة السر'); ?></label>

                                <div class="col-sm-9">
              					<?php echo $this->Form->input('Users.cpassword', ['type'=>'password', 'label'=>false, 'div'=>false, 'placeholder'=>__('تاكيد كلمة السر'), 'class'=>'form-control','id'=>'confirmpassword']); ?>
                                </div>
                              </div>

                              <div class="um-form-row form-group">
                                <label for="email" class="col-sm-3 control-label"><?php echo __('البريد الإليكتروني'); ?></label>

                                <div class="col-sm-9">
              					<?php echo $this->Form->input('Users.email', ['type'=>'email', 'label'=>false, 'div'=>false, 'placeholder'=>__('البريد الإليكتروني'), 'class'=>'form-control','id'=>'email']); ?>
                                </div>
                              </div>
                              <div class=" um-form-row form-group">
                                <div class="col-sm-offset-3 col-sm-9">
              					 <?php echo $this->Form->Submit(__('تسجيل حساب جديد'), ['div'=>false, 'class'=>'btn btn-default', 'id'=>'newAccountBtn']); ?>
                                </div>
                              </div>
                            </form>
              				<?php echo $this->Form->end(); ?>
              				<?php echo $this->element('Usermgmt.provider'); ?>
                          </div>
              			</div>

              		</div>
                </div>
                </div>
            </div>
