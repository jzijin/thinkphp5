<?php
require("./lib/init.php");
$sql = "select *from art";
$arts = mQuery($sql);

require(ROOT.'/view/front/index.html');