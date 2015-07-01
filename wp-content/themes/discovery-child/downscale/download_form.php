<?php
require('/../../../../wp-blog-header.php'); 
get_header();
?>
<!-- It should be a recommendation on how to organize the files, once downloaded for work with Analogues-->

<div id="download_form" style="height: 300px; background:#F7F5ED;">
    <div id="message">
        To continue downloading your files, please first fill in your email and then some basic information. This information will be used by CCAFS solely for impact assessment and CGIAR and Center level reporting purposes. Filling it in will greatly help us to track the use of the portal and keep improving it. This portal provides data to a very large community of users and improving its usability and efficiency is a key aspect we work on continuously. However, you may click on <a onclick="anonymousDownload()">skip</a> to download links directly.
    </div>
    <div id="email">
        <label>Email:</label>
        <input type="text" name="email" id="email">
        <input type="button" name="searchemail" id="searchemail" onclick="searchEmail();" value="Search">
    </div>
    
</div>

<?php
 get_footer();
?>