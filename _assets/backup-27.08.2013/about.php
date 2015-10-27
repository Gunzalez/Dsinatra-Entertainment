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
<?php
$member1 = '<li><a href="#"><img src="images/members/member-01.jpg" alt="Stephen Iloba"  /></a>
				<div class="details">
					<h2 title="Stephen Iloba">Stephen Iloba</h2>
					<a href="mailto:s.iloba@dsinatraent.com">Director of Marketing</a>
				</div>
			</li>';					
$member2 = '<li><a href="#"><img src="images/members/member-02.jpg" alt="Kelvin Duke"  /></a>
				<div class="details">
					<h2 title="Kelvin Duke">Kelvin Duke</h2>
					<a href="mailto:k.duke@dsinatraent.com">Dir. of Development</a>
				</div>                    
			</li>';
$member3 = '<li><a href="#"><img src="images/members/member-03.jpg" alt="Chuks G. Benye"  /></a>
				<div class="details">
					<h2 title="Chuks G. Benye">Chuks G. Benye</h2>
					<a href="mailto:c.golden@dsinatraent.com">Dir. of Communications</a>
				</div>
			</li>';
$member4 = '<li><a href="#"><img src="images/members/member-04.jpg" alt="Odi Odigie"  /></a>
				<div class="details">
					<h2 title="Odi Odigie">Odi Odigie</h2>
					<a href="mailto:ceo@dsinatraent.com">Chief Executive Officer</a>
				</div>
			</li>';
/*$member5 = '<li><a href="#"><img src="images/members/member-05.jpg" alt=""  /></a>
				<div class="details">
					<h2 class="longName">Mudiaga Ogagifo</h2>
					<span class="role">Director of Operations</span>
					<span><a href="mailto:m.ogagifo@dsinatraent.com" class="email">email</a><a href="http://www.facebook.com?chuck" target="_blank" class="facebook">facebook link</a></span>
				</div>
			</li>';*/
$member6 = '<li><a href="#"><img src="images/members/member-06.jpg" alt="Donald Iloba"  /></a>
				<div class="details">
					<h2 title="Donald Iloba">Donald Iloba</h2>
					<a href="mailto:d.iloba@dsinatraent.com">Director of Finance</a>
				</div>
			</li>';
$member7 = ' <li><a href="#"><img src="images/members/member-07.jpg" alt="Koso Gwam"  /></a>
				<div class="details">
					<h2 title="Koso Gwam">Koso Gwam</h2>
					<a href="mailto:k.gwam@dsinatraent.com">Director of Logistics</a>
				</div>
			</li>';
$member8 = '<li><a href="#"><img src="images/members/member-08.jpg" alt="Gift Omo Idedia"  /></a>
				<div class="details">
					<h2 title="Gift Omo Idedia">Gift Omo Idedia</h2>
					<a href="mailto:g.omoidedia@dsinatraent.com">Executive Secretary</a>
				</div>
		   </li>';
$member5 = '<li><a href="#"><img src="images/members/member-09.jpg" alt="Akalaka Okeleke"  /></a>
				<div class="details">
					<h2 title="Akalaka Okeleke">Akalaka Okeleke</h2>
					<a href="mailto:o.andrew@dsinatraent.com">Director of Production</a>
				</div>
		   </li>';		   
$members = array($member1, $member2, $member3, $member4, $member5, $member6, $member7, $member8);
$memberslength = count($members);
shuffle($members);
?>

<div id="content">    
    <div class="content">
    	<div class="centered clearfix">
        
            <div class="content-box wide">
            	<h2 class="clearfix"><span>About D.Sinatra Entertainment</span></h2>
            	<div id="members" class="clearfix">
                <ul>
				<?php 
                for($m=0;$m<$memberslength;$m++){
                    echo $members[$m];
                };
                ?>
                </ul>
                </div>
                <div class="copy">
                    <p>D.Sinatra Entertainment is a leading professional entertainment and pageant company in Nigeria, Firmly at the forefront of a thriving entertainment sector in this region. Driven by an executive team that possesses both depth and dynamism, D-Sinatra Entertainment achieves world-class quality enhanced by an innovative afro-Politian sensibility.</p>
                    <p>Our forte is providing entertainment also to build a company that has the longevity and brand strength to promote the African entertainment landscape by providing entertainment and lifestyle products across multiple platforms, while remaining commercially profitable and culturally relevant. It is an initiative of D-Sinatra Entertainment, to create an exquisite Platform that will showcase the Beauty, Creativity and talents of African women/ladies. It's been categorized in a Runway Fashion Show, beauty pageant and campaign walks.</p>
                    <p>In collaboration with Delta state government and Kevs consults, we remain proud organizers of carnival on the Niger, Delta state. This event is a huge tourism attraction in the state and has witnessed an audience of over 6000 people.</p>
                    <p>In the pageantry world, D Sinatra Ent.are proud owners of world supermodel and MissWestAfrica (Nigeria), these events have also provided stuff competition, repositioned and restored integrity in the fashion world.</p>
                    <p><strong>Welcome to our world. You definitely are in the right place!</strong></p>
                </div>
            </div>
            
            <div class="content-box sidebar">
                <div class="copy">
                    
                    <form id="frmContact" name="frmContact" action="send.php" method="post">
                        <fieldset>
                            <legend>Get In Touch</legend>
                            <div class="row">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" value="" class="txt required" placeholder="Name" />                    
                            </div>
                            <div class="row">
                                <label for="email">Email address</label>
                                <input type="text" id="email" name="email" value="" class="txt email" placeholder="email address" />                    
                            </div>
                            <div class="row">
                                <label for="message">Message</label>
                                <textarea class="txtArea" id="message" name="message"></textarea>  
                            </div>
                            <div class="row submit">
                            	<input type="submit" value="Send" class="submit" />
                            </div>
                        </fieldset>
                    </form>
                    
                    <div id="sending">
                    	<div class="spinner">&nbsp;</div>
                    </div>
                    
                    <div id="sent">
                    	<h2>Thank you</h2>
                    	<p>Your message has been sent.<br />We will be in touch.</p>
                    </div>
                    
                    <div id="error">
                    	<h2>Error</h2>
                    	<p>An error occured, your message was not delivered, please <a href="#" class="tryagain">try again</a>.</p>
                        <p>Or use our email address below.</p>
                    </div>
                    
                    <div class="contact-details clearfix">
                    	<h4>Corporate Office</h4>
                        <address>
                            <strong>D.Sinatra Entertainment</strong>.<br />
                            Block 67 DDPA Housing Estate<br />
                            Opp Police Headquarters<br /> 
                            Asaba, Delta State.<br /> 
                        	Nigeria.    
                        </address>
                        <span class="phone-number">+234&nbsp;808&nbsp;543&nbsp;7008</span>
                        <a href="mailto:info@dsinatraent.com">info@dsinatraent.com</a>
                        <br /><br /><br />
                        <h4>Account Details</h4>
                        <address>                    
                            <strong>D.Sinatra Ent.</strong>,<br />
                            <strong>Guaranty Trust Bank</strong>,<br />
                            <strong>0111536848</strong>
                        </address>
                    </div>
                    
                </div>
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
