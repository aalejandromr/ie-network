<div id="dhiwrap">
    <?php screen_icon(); ?>
   <h2>Dynamic Header Image - User Guide</h2>
   <div id="instructions">
   <ul>
   <li>Login to wordpress admin</li>
   <li>Go to Pages menu  --> Add New</li>
   <li>See Dynamic Header Image meta box</li>
	<li>Upload your header image and publish post</li>
   </ul>
   </div>
   <div class="option_wrap">
    <h4>Show Page Header Image with img tag</h4>
    <p>
    	copy and Paste below function to your theme header.php
        <span>Theme Path: wp-content/themes/your-current-theme/header.php</span> <br /> <br />
        <code>
            if(function_exists('dhi_get_headerimage_withtag'))<br />
            { <br />
                &nbsp;&nbsp;&nbsp;echo dhi_get_headerimage_withtag(); <br />
            }
        </code>
    </p>
    </div>
    <div class="option_wrap">
    <h4>Get Page Header Image Url </h4>
    <p>
    	copy and Paste below function to your theme header.php or where ever you want to get image url use this function.<br /> <br />
        <code>
            if(function_exists('dhi_get_headerimage_url'))<br />
            { <br />
               &nbsp;&nbsp;&nbsp; echo dhi_get_headerimage_url(); <br />
            }
        </code>
    </p>
    </div>
    <div class="option_wrap">
    <h4>Get Page Header Image Using Shortcode</h4>
    <p>
    	<ul>
        <li>Login to your wordpress admin</li>
        <li>Go to Pages -> All Pages</li>
        <li>Click Edit link of any one page</li>
         <li>Paste below shortcode</li>
        </ul>
        <code>
            [dhi_headerimage] --> Get image with image tag <br /> <br />
            [dhi_headerimage img_tag='false'] -- > Get Image Url Only
        </code>
    </p>
    </div>
   <div>
    
	

   
    
