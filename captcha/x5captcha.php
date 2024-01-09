<?php
include("../res/x5engine.php");
$nameList = array("5at","us2","8zp","vkl","krg","28j","72v","wuc","ess","65v");
$charList = array("V","S","R","M","D","7","4","P","8","G");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
