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
            	<h2 class="clearfix"><span>Queen Globe Online Registration</span></h2>           	
                <form name="application-form" id="application-form" action="apply.php" method="post">
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
                    <div class="row">
                        <?php
						function date_dropdown($year_limit = 0){
								$html_output = '    <div id="date_select" >'."\n";
								$html_output .= '        <label for="dob">Date of birth *</label>'."\n";
						
								/*days*/
								$html_output .= '           <select name="date_day" id="day_select" data-validate="select">'."\n";
									$html_output .= '               <option>-</option>'."\n";
									for ($day = 1; $day <= 31; $day++) {
										$html_output .= '               <option>' . $day . '</option>'."\n";
									}
								$html_output .= '           </select>'."\n";
						
								/*months*/
								$html_output .= '           <select name="date_month" id="month_select" data-validate="select">'."\n";
								$months = array("select..", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
									for ($month = 0; $month <= 12; $month++) {
										$html_output .= '               <option value="' . $month . '">' . $months[$month] . '</option>'."\n";
									}
								$html_output .= '           </select>'."\n";
						
								/*years*/
								$html_output .= '           <select name="date_year" id="year_select" data-validate="select">'."\n";
									$html_output .= '               <option>19..</option>'."\n";
									for ($year = 1975; $year <= (date("Y") - $year_limit); $year++) {
										$html_output .= '               <option>' . $year . '</option>'."\n";
									}
								$html_output .= '           </select>'."\n";
						
								$html_output .= '   </div>'."\n";
							return $html_output;
						}
						?>
						<?php echo date_dropdown(); ?>
                    </div>
                    <div class="row">
                    	<label for="country">Country of Birth *</label>
                        <input type="text" value="" class="text" id="country" name="country" data-validate="text" />
                    </div> 
                    <div class="row">
                    	<label for="qualifications">Qualifications *</label>
                        <input type="text" value="" class="text" id="qualifications" name="qualifications" data-validate="text" />
                    </div> 
                    <div class="row">
                    	<label for="job">Job *</label>
                        <input type="text" value="" class="text" id="job" name="job" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="state">West African State *</label>
                        <select id="state" name="state" class="select" data-validate="select">
                            <option value="0" selected="selected">select...</option>
                            <option value="Benin">Benin</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea Bissua">Guinea Bissua</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Mali">Mali</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Togo">Togo</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="inputs">
                	<legend>Physical details</legend>
                    <div class="row">
                    	<label for="dress">Dress size *</label>
                        <select id="dress" name="dress" class="select" data-validate="select">
                            <option value="0" selected="selected">select...</option>
                            <option value="6">6</option>
                            <option value="8">8</option>
                            <option value="10">10</option>
                            <option value="12">12</option>
                            <option value="More than 12">More than 12</option>
                        </select>
                    </div>
                    <div class="row">
                    	<label for="height">Height (feet + inches) *</label>
                        <input type="text" value="" class="text" id="height" name="height" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="weight">Weight (kg) *</label>
                        <input type="text" value="" class="text" id="weight" name="weight" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="bust">Bust (inches) *</label>
                        <input type="text" value="" class="text" id="bust" name="bust" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="hips">Hips (inches) *</label>
                        <input type="text" value="" class="text" id="hips" name="hips" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="waist">Waist (inches) *</label>
                        <input type="text" value="" class="text" id="waist" name="waist" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="head">Head (inches) *</label>
                        <input type="text" value="" class="text" id="head" name="head" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="shoe">Shoe size *</label>
                        <select id="shoe" name="shoe" class="select" data-validate="select">
                            <option value="0" selected="selected">select...</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                        </select>
                    </div>
                    <div class="row">
                    	<label for="hair">Hair colour *</label>
                        <input type="text" value="" class="text" id="hair" name="hair" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="eyes">Eyes colour *</label>
                        <input type="text" value="" class="text" id="eyes" name="eyes" data-validate="text" />
                    </div>
                    <div class="row">
                    	<label for="hat">Hat size *</label>
                        <select id="hat" name="hat" class="select" data-validate="select">
                            <option value="0" selected="selected">select...</option>
                            <option value="Small">Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset class="textareas">
                	<legend>Preferences</legend>                    
                    <div class="row">
                    	<label for="food">Top 3 food types? (italian, chinese, traditional..)</label>
                        <textarea name="food" id="food" cols="20" rows="7" data-validate="text"></textarea>
                    </div>
                    <div class="row">
                    	<label for="music"><span>Top 3 music genres? (rock, pop, classical, rap...)</span></label>
                        <textarea name="music" id="music" cols="20" rows="7" data-validate="text"></textarea>
                    </div>
                    <div class="row">
                    	<label for="hobbies"><span>Favourite hobbies or pastime?</span></label>
                        <textarea name="hobbies" id="hobbies" cols="20" rows="7" data-validate="text"></textarea>
                    </div>
                    <div class="row">
                    	<label for="why"><span>Why would you like to be Queen Globe?</span></label>
                        <textarea name="why" id="why" cols="20" rows="7" data-validate="text"></textarea>
                    </div>
                    <div class="row">
                    	<label for="president"><span>First course of action if president?</span></label>
                        <textarea name="president" id="president" cols="20" rows="7" data-validate="text"></textarea>
                    </div>
                    <div class="row">
                    	<label for="marks"><span>Any tattoos, piercings or scars?</span></label>
                        <textarea name="marks" id="marks" cols="20" rows="7" data-validate="text"></textarea>
                    </div>
                    <div class="row">
                    	<label for="how"><span>How did you hear about Queen Globe?</span></label>
                        <textarea name="how" id="how" cols="20" rows="7" data-validate="text"></textarea>
                    </div>
                </fieldset>
                <div class="row submit">
                	<input type="submit" value="Apply now" class="submit" />
                </div>
                <div class="disclaimer">
                	DISCLAIMER: This message is intended only for the use of the persons ("Intended Recipient") to whom it is addressed. It may contain information, which is privileged
                    and confidential. Accordingly any dissemination, distribution, copying or other use of this message or any of its content by person other than the intended Recipient
                    may constitute a breach of civil or criminal law and is strictly prohibited. If you are not the Intended Recipient, please contact the sender as soon as possible.
                    Commercial-in-Confidence / Without Prejudice.
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
                    <li><a href="pageantry.php">The Queen Globe event will see the winner representing Nigeria at the world supermodel international event</a></li>
                    <li><a href="news/miss-west-africa.php">Miss West Africa Nigeria conculded at the grande finale on the 23rd of February.</a></li>                                               
                </ul>            
            </div>
            
        </div>
    </div>
</div>

<?php require_once('html/footer.php'); ?>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/dsinatra.js"></script>
</body>
</html>
