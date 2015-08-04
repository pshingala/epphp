<?php
include 'connectdb.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Free Css Template #190 - Computer Store</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- begin #container -->
<div id="container">
	<!-- begin #header -->
    <div id="header">
    	<div class="logo"><a href=""><img src="images/logo.png" alt="" /></a></div>
        <div class="menuContainer">
            <div class="menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="">SERVICES</a></li>
                    <li><a href="">THERAPIES</a></li>
                    <li><a href="">STAFF PROFILE</a></li>
                    <li id="active"><a href="secrets.php">SECRETS</a></li>
                </ul>
            </div>
                <ul class="icons">
                    <li><a href=""><img src="images/twitter.png" alt="" /></a></li>
                    <li><a href=""><img src="images/delicious.png" alt="" /></a></li>
                    <li><a href=""><img src="images/facebook.png" alt="" /></a></li>
                    <li><a href=""><img src="images/feed.png" alt="" /></a></li>
                    <li><a href=""><img src="images/flickr.png" alt="" /></a></li>
                    <li><a href=""><img src="images/linkedin.png" alt="" /></a></li>
                    <li><a href=""><img src="images/myspace.png" alt="" /></a></li>
                    <li><a href=""><img src="images/stumble.png" alt="" /></a></li>
                </ul>
            <div class="clearfloat"></div>
        </div>
        <div class="clearfloat"></div>
        <div class="headerPic">
        	<div class="headerText1">Gateway</div>
            <div class="headerText2">E-155C is a Thin &#38; Light<br />Convertible notebook</div>
            <div><input type="button" value="SHOP TODAY!" class="buttonHeader" /></div>
        </div>
    </div>
    <!-- end #mainContent -->
    
    
    <form action="#" method="post">
        <table><tr><td>Client ID:</td><td><input type="text" name="id"></td></tr>
        <tr><td>Client Secret:</td><td><input type="text" name="secret"</td></tr>
        <tr><td>App Name:</td><td><input type="text" name="name"></td></tr>
        <tr><td></td><td><input type="submit"></td></tr></table>
        
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!(empty($_POST["id"]) || empty($_POST["secret"])) ) {
            $sql = "INSERT INTO secrets (client_id, client_secret, appname)
                    VALUES ('$_POST[id]', '$_POST[secret]', '$_POST[name]')";
            $conn = createConnection();

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            closeConnection($conn);
          }
      }
    ?>
    
    
    <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
    <!-- begin #footer -->
    <div id="footer">
		<p>
        	Terms of Use | <a title="This page validates as XHTML 1.0 Strict" href="http://validator.w3.org/check/referer" class="footerLink"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | 
        <a title="This page validates as CSS" href="http://jigsaw.w3.org/css-validator/check/referer" class="footerLink"><abbr title="Cascading Style Sheets">CSS</abbr></a>  |  Copyright &copy; Computer Store. Design by <a href="http://www.facebookpagetemplates.com">Free Facebook Templates</a>
        </p>
	</div>
    <!-- end #footer -->
</div>
<!-- end #container -->
</body>
</html>


