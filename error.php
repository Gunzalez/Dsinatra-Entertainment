<?php
session_start();
$error = 'none';
if(isset($_SESSION["error"])){
    $error = $_SESSION["error"];
}

?>
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
            	<h2 class="clearfix"><span class="<?php echo $error; ?>">Registration error</span></h2>
                <p>Your application has not been sent due to a technical error. <br />Please <a href="entry-form.php">try again</a>.</p>
                <?php
                $errorSummary = '';
                switch ($error) {
                    case "711":
                        $errorSummary = 'Numbers entered did not match numbers shown';
                        break;
                    case "500":
                        $errorSummary = 'Error with headshot image';
                        break;
                    case "400":
                        $errorSummary = 'Error with swimwear image';
                        break;
                    case "300":
                        $errorSummary = 'Error with evening gown image';
                        break;
                    case "111":
                        $errorSummary = 'Error with sending email';
                        break;
                    default:
                        $errorSummary = 'There was an error';
                }
                ?>
                <p><strong><?php echo $errorSummary; ?></strong></p>
            </div>

            <?php require_once('html/news-side-bar.php'); ?>
            
        </div>
    </div>
</div>

<?php require_once('html/footer.php'); ?>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/dsinatra.js"></script>
</body>
</html>
