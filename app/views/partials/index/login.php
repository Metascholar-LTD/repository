
<div class="container" style="padding-top:50px;padding-bottom:50px; background-color:#F0F4F9 !important;">
    <div class="row justify-content-center">
        <div class="col-sm-6 shadow-lg curve" style="background-color: #ffffff !important;">
            <div class="my-4 p-3">
                
                <div>
                    <h4 class="text-center" style="font-weight:bolder;font-size:22px;">Login to Your Account</h4>
                    <hr />
                    <?php 
                    $this :: display_page_errors(); 
                    ?>
                    <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-append">
                                <span class="input-group-text input-icon"><i class="form-control-feedback fa fa-user"></i></span>
                            </div>
                            <input placeholder="Username Or Email" name="username" required="required" class="form-control input-height" type="text"  />
                          
                        </div>
                        
                        <div class="input-group form-group">
                            <div class="input-group-append">
                                <span class="input-group-text input-icon"><i class="form-control-feedback fa fa-key"></i></span>
                            </div>
                            <input  placeholder="Password" required="required" v-model="user.password" name="password" class="form-control input-height" type="password" />
                          
                        </div>
                        <div class="row clearfix mt-3 mb-3 pl-5">
                            
                            <div class="col-6">
                                <label class="">
                                    <input value="true" type="checkbox" name="rememberme" />
                                   &nbsp; Remember Me
                                </label>
                            </div>
                            
                            <div class="col-6 text-right">
                                <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Reset Password?</a>
                            </div>
                            
                        </div>
                        
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                <i class="load-indicator">
                                    <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                </i>
                                LOGIN
                            </button>
                        </div>
                        <hr />
                        
                        <div class="text-center">
                            Don't Have an Account? &nbsp; <a href="<?php print_link("index/register") ?>" style="color:#004C23;font-weight:bold;">REGISTER
                            
                        </div>
                        
                    </form>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
<style>
    .input-height{
        height: 50px !important;
    }
    .input-icon{
        background-color:#ffffff !important;"
    }
    .curve{
        border-radius: 20px;
    }
</style>
