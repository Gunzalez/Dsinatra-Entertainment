<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>D.Sinatra Entertainment</title>
    
	<meta name="Description" content="D-Sinatra Entertainment is a leading professional entertainment and pageant company in Nigeria" />
	<meta name="Keywords" content="D-Sinatra, Entertainment, D.Sinatra, D.Sinatraent, D-Sinatraent, Pageantry, Nigeria, Segun Konibire" />
    <link rel="shortcut icon" type="image/x-icon" href="http://www.dsinatraent.com/images/favicon.ico">    
    
    <link rel="stylesheet" type="text/css" href="css/dsinatra.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />
    <script src="js/modernizr-latest.js"></script>
    
    <!-- Social Facebook -->
    <meta property="og:title" content="D-Sinatra Entertainment" />
    <meta property="og:type" content="company" />
    <meta property="og:url" content="http://www.dsinatraent.com" />
    <meta property="og:image" content="http://www.dsinatraent.com/images/logo-fb-like.png" />
    <meta property="og:description" content="D-Sinatra Entertainment is a leading professional entertainment and pageant company in Nigeria" />
    <meta property="og:site_name" content="D-Sinatra Entertainment" />
    <meta property="fb:admins" content="708500515" />
</head>
<body>

<?php require_once('html/header-area.php'); ?>

<div id="content">   
    <div class="content">
    	<div class="centered clearfix">
        
            <div class="content-box wide"> 
            	<h2 class="clearfix">
                    <span>Register - Application form</span>
                </h2>
                <div class="sub-page-nav clearfix">
                    <ul>
                        <li><a href="register.php">Contestant criteria</a></li>
                        <li><a href="judging.php">Judging criteria</a></li>
                        <li><a class="current-page">Application form</a></li>
                    </ul>
                </div>
                <form name="application-form" id="application-form" action="apply-wsn.php" method="post" enctype="multipart/form-data">

				<fieldset>

                	<legend>Personal details</legend>
                    <div class="row">
                    	<label for="firstname" title="mandatory field">First name *</label>
                        <input type="text" value="" class="text" id="firstname" name="firstname" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="lastname" title="mandatory field">Last name *</label>
                        <input type="text" value="" class="text" id="lastname" name="lastname" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="email" title="mandatory field">Email address *</label>
                        <input type="text" value="" class="text" id="email" name="email" data-validate="email" />
                    </div>
                    <div class="row">
                    	<label for="phone">Phone number *</label>
                        <input type="text" value="" class="text" id="phone" name="phone" data-validate="text" />
                    </div>
                    <div class="row">
                        <label for="mobile">Mobile *</label>
                        <input type="text" value="" class="text" id="mobile" name="mobile" data-validate="text" />
                    </div>

                    <div class="row">
						<?php $months = array("select..", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"); ?>
						<div id="date_select" >
							<label for="dob">Date of birth *</label>

							<select name="date_day" id="day_select" data-validate="select"><option>-</option>
							<?php for ($day = 1; $day <= 31; $day++) : ?>
								<option><?php echo $day?></option>
							<?php endfor; ?>
							</select>

							<select name="date_month" id="month_select" data-validate="select"><option>-</option>
							<?php foreach ($months as $key => $month) : ?>
								<option value="<?php echo $key+1?>"><?php echo $month?></option>
							<?php endforeach; ?>
							</select>

							<select name="date_year" id="year_select" data-validate="select"><option>19..</option>
							<?php for ($year = 1984; $year <= (date("Y") - $year_limit); $year++) : ?>
								<option><?php echo $year?></option>
							<?php endfor; ?>
							</select>

						</div>
                    </div>
                    <div class="row">
                    	<label for="place-of-birth">Place of Birth *</label>
                        <input type="text" value="" class="text" id="place-of-birth" name="place-of-birth" data-validate="text" />
                    </div>

                    <div class="row">
                        <label for="address1">Postal Address *</label>
                        <input type="text" value="" class="text" id="address1" name="address1" data-validate="text" />
                    </div>
                    <div class="row">
                        <label for="address2">&nbsp;</label>
                        <input type="text" value="" class="text" id="address2" name="address2" />
                    </div>
                    <div class="row">
                        <label for="address3">&nbsp;</label>
                        <input type="text" value="" class="text" id="address3" name="address3" />
                    </div>
                </fieldset>

                <fieldset class="inputs">
                	<legend>Physical details</legend>

                    <div class="row">
                    	<label for="file">Headshot *</label>
                        <div class="upload-box">
                        	<input type="file" name="headshot" id="headshot" class="upload" data-validate="upload">
                        </div>
                        <p class="helpText" style="clear:left; font-size: 12px; padding-left: 146px; color: #999;">JPEGs only, Clear view of your face, Less than 500KB file size</p>
                    </div>

                    <div class="row">
                        <label for="file">Swimwear photo *</label>
                        <div class="upload-box">
                            <input type="file" name="swimwear" id="swimwear" class="upload" data-validate="upload">
                        </div>
                        <p class="helpText" style="clear:left; font-size: 12px; padding-left: 146px; color: #999;">JPEGs only, Clear view of your face, Less than 500KB file size</p>
                    </div>

                    <div class="row">
                        <label for="file">Evening gown photo *</label>
                        <div class="upload-box">
                            <input type="file" name="evening-gown" id="evening-gown" class="upload" data-validate="upload">
                        </div>
                        <p class="helpText" style="clear:left; font-size: 12px; padding-left: 146px; color: #999;">JPEGs only, Clear view of your face, Less than 500KB file size</p>
                    </div>

                    <div class="row">
                    	<label for="height">Height (cm) *</label>
                        <input type="text" value="" class="text" id="height" name="height" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="weight">Weight (kg) *</label>
                        <input type="text" value="" class="text" id="weight" name="weight" data-validate="text" />
                    </div>
                    <div class="row captcha">
                        <label for="captcha">Enter number shown *</label>
                        <input type="text" value="" class="text" id="captcha" name="captcha" data-validate="text" />
                        <img src="captcha.php" />
                    </div>
                    <div class="row no-label">
                        <label><input type="checkbox" value="Yes, I agree" class="checkbox" id="terms-and-conditions" name="terms-and-conditions" data-validate="checkbox" /> I agree to the <a href="rules-and-conditions.php">rules and conditions</a>.</label>
                    </div>

                </fieldset>

                <div class="row submit">
                	<input type="submit" value="Apply now" id="submit-button" class="submit disabled" disabled="disabled" />
                </div>
                </form>


            </div>
            
            <div class="content-box sidebar">
                <div class="header-image">
                	<a href="news/miss-west-africa.php">
                        <img src="images/miss-westafrica-nigeria.jpg" width="260" height="170" alt="Miss West Africa Nigeria" class="imagery" />
                        <h2 class="clearfix"><span>Miss West Africa Nigeria</span></h2>
                    </a>
                </div>
                <div class="copy">
                    <p>On the 23rd of Feb 2013 26 contestants gathered at Grand Hotel, Asaba, Delta State for the Miss West Africa Nigeria beauty pageant.</p>
                </div>
                <h2 class="clearfix"><span>Latest News</span></h2>
                <ul class="newslist">
                	<li><a href="JavaScript:html5Lightbox.showLightbox(3, 'http://youtu.be/0_5nB2qJUyE', 'Queen Globe');" data-width="880">Watch the new Queen Globe video for full details.</a></li>
                    <li><a href="JavaScript:html5Lightbox.showLightbox(3, 'http://youtu.be/h5NnFezuAhs', 'MWAN - LYNNXX EDIT');" data-width="880">Watch Miss West African Nigeria <br />- MWAN, LYNNXX EDIT</a></li>
                    <li><a href="news/queen-globe.php">The Queen Globe event will see the winner representing Nigeria at the world supermodel international event</a></li>
                    <li><a href="news/miss-west-africa.php">Miss West Africa Nigeria conculded at the grande finale on the 23rd of February.</a></li>                                               
                </ul>            
            </div>
            
        </div>
    </div>
</div>

<?php require_once('html/footer.php'); ?>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="html5lightbox/html5lightbox.js"></script>
<script src="js/dsinatra.js"></script>
</body>
</html>