<?php

if(!$_POST) exit;

$email = $_POST['email'];


//$error[] = preg_match('/\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i', $_POST['email']) ? '' : 'INVALID EMAIL ADDRESS';
if(!preg_match('/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i',$email )){
	$error.="Invalid email address entered";
	$errors=1;
}
if($errors==1) echo $error;
else{
	$values = array ('comment', 'name','email', 'number',);
	$required = array('comment', 'name','email', 'number',);

	$your_email = "info@shribalajiinstitutepune.com,sales@netcom-india.com";
	$email_subject = "New Message: ".$_POST['subject'];
	$email_content = "Shri Balaji Institute Pune (SBIP) (Website) new message:\n";

	foreach($values as $key => $value){
		if(in_array($value,$required)){
			if ($key != 'subject' && $key != 'company') {
				if( empty($_POST[$value]) ) { echo 'PLEASE FILL IN REQUIRED FIELDS'; exit; }
			}
			$email_content .= $value.': '.$_POST[$value]."\n";
		}
	}

	if(@mail($your_email,$email_subject,$email_content)) {
		header("Location:thanks.html");
	} else {
		echo 'ERROR!';
	}

}
?>