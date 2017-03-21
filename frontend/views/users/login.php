<div id="contact-page" class="container">
    <div class="bg">  	
        <div class="row">  	
            <div class="col-sm-6">
                <div class="contact-form">
                    <h2 class="title text-center"><?=LOGIN?></h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        
                        <div class="form-group col-md-12">
                            <input type="email" name="email" class="form-control" required="required" placeholder="<?=LOGIN_USERNAME?>">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="password" name="password" class="form-control" required="required" placeholder="<?=LOGIN_PASSWORD?>">
                        </div>                      
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="<?=LOGIN_BUTTON?>">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="contact-info">
                    <h2 class="title text-center"><?=CONTACT_INFO?></h2>
                    <address>
                        <p>E-Shopper Inc.</p>
                        <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                        <p>Newyork USA</p>
                        <p>Mobile: +2346 17 38 93</p>
                        <p>Fax: 1-714-252-0026</p>
                        <p>Email: info@e-shopper.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center"><?=CONTACT_SOCIAL_NETWORK?></h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>    			
        </div>  
    </div>	
</div><!--/#contact-page-->
