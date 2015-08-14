<?
  require '/root/aws.phar';

  $ec2_instance = \Aws\Common\InstanceMetadata\InstanceMetadataClient::factory()
    ->get('dynamic/instance-identity/document')
    ->send()
    ->json();

  date_default_timezone_set('UTC');
  echo "<h2>$ec2_instance['privateIp']:</h2>";
  echo "<p>Today is " . date('l, F jS, Y.') . " Right now it's " .  date('h:i:s A') . " UTC</p>\n";
?>
