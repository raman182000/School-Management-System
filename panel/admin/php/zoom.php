<?php 
$conn = mysqli_connect('localhost', 'root', '','cpi');
include_once 'Zoom_Api.php';

$zoom_meeting = new Zoom_Api();
$title=$_POST["title"];
$date=$_POST["s_date"];
$timeto=$_POST["s_time"];
$data = array();
$data['topic'] 		= $title;
$data['start_date'] = $date." ".$timeto;
$data['duration'] 	= 30;
$data['type'] 		= 2;
//$data['password'] 	= "12345";(

try {
	$response = $zoom_meeting->createMeeting($data);
	$url_web="https://us04web.zoom.us/wc/join/".$response->id;
	$passcode=$response->password;
	$query="insert into ptm values('', '$title', '$date', '$timeto','$url_web', '$passcode')";
	$res=mysqli_query($conn,$query) or die("connection error");
	if($res)
	{
		echo "added";
	}
	
	
} catch (Exception $ex) {
    echo "error";
}


?>