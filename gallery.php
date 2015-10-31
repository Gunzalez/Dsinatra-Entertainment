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
    
    <div id="gallerypage" class="content">
    	<div class="centered clearfix">
            
            <div class="content-box wide"> 
                <h2 class="clearfix"><span>Miss Rachel Ikehwame - Dsinatra queen</span></h2>
                <div id="photos" class="copy galleries">
                    
				<?php require_once('gallery/rachel-ikehwame.php'); ?>
                
                </div>
            </div>
            
            <div class="content-box sidebar" id="photo-nav">
            	<h2 class="clearfix"><span>Photo galleries</span></h2>

                <p class="more-galleries">
                    <a href="gallery4.php">Queens of Nigerian</a>
                	<a href="gallery3.php">The Queen Globe Event</a>
                	<a href="gallery2.php">Miss West Africa Nigeria Photos</a>
                </p>    
            </div>
            
            <div id="viewed-galleries" class="displayNone"></div>                      
            
        </div>
    </div>
</div>

<?php require_once('html/footer.php'); ?>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/dsinatra.js"></script>
<script src="js/jquery.lightbox-0.5.js"></script>
</body>
</html>
