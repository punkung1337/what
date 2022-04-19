<?php
$secret_key = "sekwetkeyuwu<3"; //Set this as your secret key, to prevent others uploading to your server.
$sharexdir = "attachments/"; //This is your file dir, also the link..
$domain_url = 'https://serverside.club/';
$lengthofstring = 10; //Length of the file name

// ERROR CODE
// 0xc0000D 'Temporary Disable'
// 0x70085C 'File upload failed - CHMOD/Folder doesn\'t exist?'

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));

    $key = '';
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}

if(isset($_POST['secret']))
{
    if($_POST['secret'] == $secret_key)
    {
        $filename = RandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType))
        {
            echo $domain_url.$sharexdir.$filename.'.'.$fileType;
            // echo 'Sorry, Something went wrong. Error: 0xc0000D - Please contact administrator.';
            // return false;  
        }
            else
        {
           echo 'Sorry, there was a problem uploading your file. Error: 0x70085C';
        }
    }
    else
    {
        echo 'Invalid Key';
    }
}
else
{
    header("Location: https://serverside.club", true, 301);
	exit();
}
?>
