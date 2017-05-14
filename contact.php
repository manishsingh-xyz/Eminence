<?php
include 'smtp/Send_Mail.php';

/* Set e-mail recipient */
$myemail  = "manish8081@gmail.com";
$to=$myemail;

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$phone  = check_input($_POST['phone'], "Enter your Phone Number");
$email    = check_input($_POST['email']);
$message = check_input($_POST['message'], "Write your message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* If URL is not valid set $website to empty */
if (!preg_match("/^(https?:\/\/+[\w\-]+\.[\w\-]+)/i", $website))
{
    $website = '';
}

/* Let's prepare the message for the e-mail */
$message = "Hello! <br/> <br/>

Your contact form has been submitted by: <br/> <br/>

Name: $name <br/> <br/>
E-mail: $email <br/> <br/>
Phone Number: $phone <br/> <br/>

<br/> <br/>

Message: <br/> <br/>
$message <br/> <br/>

End of message
<br/> <br/>
This message is sent by you website (www.eminenceultra.com) by a vistor. Respond to him or her as accordingly.
";

/* Send the message using mail() function */
Send_Mail($to, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thanks.htm');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>