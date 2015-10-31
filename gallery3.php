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
                <h2 class="clearfix"><span>Queen Globe Event</span></h2>
                <div id="photos" class="copy galleries">
                	<?php require_once('gallery/grand-finale.php'); ?>
                </div>
            </div>
            
            <div class="content-box sidebar" id="photo-nav">
            	<h2 class="clearfix"><span>Photo galleries</span></h2>
                <ul class="newslist">
                	<li class="active"><a href="gallery/grand-finale.php" id="grand-finale">The Grand Finale, August 17th 2013 at the Grand Hotel, Asaba. Hosted by Derele and Promise GUS8.</a></li>
                    <li><a href="gallery/grand-finale-2.php" id="grand-finale-2">The Grand Finale: Performance by Slim Joe, Museba, Pryse, Meshack, 2Sec and Kcee D Limpopo Master.</a></li>
                    <li><a href="gallery/grand-finale-3.php" id="grand-finale-3">The Grand Finale: Comedy by Frank D Don and many more side attraction.</a></li>
                    <li><a href="gallery/iceberg-hosting.php" id="iceberg-hosting">Iceberg Hosting: Iceberg lounge hosted contestants to a light dinner and dancing.</a></li>
                    <li><a href="gallery/golf-day-fun.php" id="golf-day-fun">Golf Day: Photo shoot taken at Ibori Golf Club in Asaba. Contestants get taught a little about the game.</a></li>
                   	<li><a href="gallery/poolside-shoot.php" id="poolside-shoot">Pool photographs of Queen Globe Contestants taken at Kim Royal Hotel on Day 2 of camping</a></li>
                	<li><a href="gallery/welcome-party.php" id="welcome-party">Welcome Party Hosted by Whistle Lounge, Asaba on Day1 in Camp.</a></li>
                </ul>
                <p class="more-galleries">
                    <a href="gallery.php">Rachel Ikehwame - Dsinatra queen</a>
                    <a href="gallery4.php">Queens of Nigerian</a>
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
