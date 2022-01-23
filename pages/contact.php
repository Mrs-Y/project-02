<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>

<body>
    <div>
        <h1>Contact Us</h1>
        <p>We would love to hear from you!</p>
        <p>Email: something@sunrise.com | Tel: +381 012345678</p>
    </div>
    <div>
        <form action="./contact.php" method="get">
            <label for="firstname">First Name*</label><br>
            <input type="text" name="firstname" id="firstname" placeholder="Enter your first name" required /><br>
            <label for="lastname">Last Name*</label><br>
            <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" required /><br>
            <label for="email">Email*</label><br>
            <input type="email" name="email" id="email" placeholder="Enter email" required /><br>
            <label for="subject">Subject*</label><br>
            <input type="text" name="subject" id="subject" placeholder="Give a title to your request" required /><br>
            <label for="message">Message*</label><br>
            <textarea name="message" id="message" cols="80" rows="10" placeholder="Type your message" required style="resize: none;"></textarea><br>
            <input type="checkbox" name="checkbox" id="checkbox" required />
            <label for="checkbox" class="ckbx-left">I agree to the privacy policy and consent to my data beeing used to contact
                me.*</label><br>
            <input type="submit" value="Send!" class="btn-send" /><br>
        </form>
    </div>
    <?php
    if (isset($_GET['submit']) && (isset($_GET['checkbox']))) {
        $first_name = $_GET['firstname'];
        $last_name = $_GET['lastname'];
        $subject = $_GET['subject'];
        $mailFrom = $_GET['email'];
        $message = $_GET['message'];

        $mailTo = "something@sunrise.com";
        $headers = "From: " . $mailFrom;
        $txt = "You have recived a e-mail from " . $first_name . $last_name . ".\n\n" . $message;

        mail($mailTo, $subject, $txt, $headers);
        header("Location: index.php?mailsend");
    }
    ?>

</body>

</html>