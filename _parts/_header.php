<?php 
//where all the head files are
/*load the user stuff*/
$user_curl = new Curl();
$result = $user_curl->get_auth($site_url."mobile_app/get_user_details.php?user_id=".$user);
 
$firstname = '';
$surname = '';
$phone = '';
$email = '';
$location_index = '';
if(!$user_curl->get_error()){

$user_details = explode($delimiter,$result);
$firstname = $user_details[1];
$surname = $user_details[0];
$phone = $user_details[2];
$email = $user_details[3];
$location_index = $user_details[4];
$location = get_location($location_index);
}
else{
	//header("location:".$_SERVER["REQUEST_URI"]);
//exit; 

}

?>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
	
	<?php //STYLE SHEETS ?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/main.css">
	            <script type="text/javascript" src="<?php base_url("assets/js/jquery.js"); ?>"></script>
