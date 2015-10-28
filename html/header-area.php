<?php
$pagesArr = array("index.php","pageantry.php","blog.php","events.php","gallery.php","about.php","gallery2.php");
function isActive($value1, $value2, $classStr){
	if($value1 == $value2){
		return $classStr;	
	};
};
$classStr = ' class="active"';
$currPage = str_replace('/', '', $_SERVER["SCRIPT_NAME"]);
// echo $_SERVER["SCRIPT_NAME"]; = '/websites/DSinatra/' or '/pp/dsinatra/' or '/'
?>

<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<script>
!function(d,s,id){
var js,fjs=d.getElementsByTagName(s)[0];
if(!d.getElementById(id)){
	js=d.createElement(s);
	js.id=id;
	js.src="//platform.twitter.com/widgets.js";
	fjs.parentNode.insertBefore(js,fjs);
}}(document,"script","twitter-wjs");
</script>
<div id="header">    
    <div class="container">
    	<div class="content">
        <h1><a href="http://www.dsinatraent.com">DSinatra</a></h1>
        <ul id="main-nav">
            <li class="mn-item-1">
                <a href="http://www.dsinatraent.com"<?php echo isActive($currPage, $pagesArr[0], $classStr) ?>>
                    <strong>Home</strong>
                    <span>Site homepage</span>
                </a>
            </li>
            <li class="mn-item-2">
                <a href="pageantry.php"<?php echo isActive($currPage, $pagesArr[1], $classStr) ?>>
                    <strong>Pageantry</strong>
                    <span>Queen Globe</span>
                </a>
            </li>
            <li class="mn-item-3">
                <a href="gallery.php"<?php echo isActive($currPage, $pagesArr[4], $classStr) ?><?php echo isActive($currPage, $pagesArr[6], $classStr) ?>>
                    <strong>Gallery</strong>
                    <span>Images &amp; Video</span>
                </a>
            </li>    
            <li class="mn-item-4">
                <a href="events.php"<?php echo isActive($currPage, $pagesArr[3], $classStr) ?>>
                    <strong>Events</strong>
                    <span>Past and Future</span>
                </a>
            </li>  
            <li class="mn-item-5">
                <a href="http://www.dsinatraent.com/blog/"<?php echo isActive($currPage, $pagesArr[2], $classStr) ?>>
                    <strong>Blog</strong>
                    <span>See what they say</span>
                </a>
            </li>  
            <li class="mn-item-6">
                <a href="about.php"<?php echo isActive($currPage, $pagesArr[5], $classStr) ?>>
                    <strong>About</strong>
                    <span>D-Sinatra Ent.</span>
                </a>
            </li>    
        </ul>
        <div id="phone-numbers">
            <p><strong>+234&nbsp;705&nbsp;077&nbsp;8749 &nbsp;&nbsp; +234&nbsp;803&nbsp;764&nbsp;6093 &nbsp;&nbsp; +234&nbsp;808&nbsp;543&nbsp;7008</strong></p>
        </div>
        <ul id="social-nav">
        	<li class="fb"><a href="https://www.facebook.com/pages/DSinatra/300785450024245?fref=ts" target="_blank">Facebook</a></li>
        	<li class="tw"><a href="https://mobile.twitter.com/DsinatraE" target="_blank">Twitter</a></li>
            <li class="pi"><a href="http://pinterest.com/pin/create/button/?media=http://www.dsinatraent.com/images/dsinatra-pinterest.jpg&amp;url=http://www.dsinatraent.com/" target="_blank">Pinterest</a></li>
            <li class="gg"><a href="https://plus.google.com/share?url=http://www.dsinatraent.com/" target="_blank">googleplus</a></li>
        	<li class="em"><a href="mailto:?subject=Currently viewing http://www.dsinatraent.com/&amp;body=Currently viewing http://www.dsinatraent.com/">Email</a></li>
        </ul>
        
    	</div>
    </div>        
</div>