<?
  EC2_INSTANCE_ID=`curl http://169.254.169.254/latest/dynamic/instance-identity/document|grep region|awk -F\" '{print $4}'`

  date_default_timezone_set('UTC');
  echo "<h2>$EC2_INSTANCE_ID:</h2>";
  echo "<p>Today is " . date('l, F jS, Y.') . " Right now it's " .  date('h:i:s A') . " UTC</p>\n";
?>
