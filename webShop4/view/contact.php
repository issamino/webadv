<?php
include_once "../helper/init.php";
include_once "../controller/ProductController.php";
include_once './header.php';
?>
<?php
if (isset($_POST['action'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if (($name == "") || ($email == "") || ($message == "")) {
        echo "All fields are required, please fill <a href=\"\">the form</a> again.";
    } else {
        $from = "From: $name<$email>\r\nReturn-path: $email";
        $subject = "Message sent using your contact form";
        // mail("info@webshop.com", $subject, $message, $from);
        echo "Email sent!";
    }
}
?>
<?php
if (isset($_SESSION['admin']) && $_SESSION['admin'] === '1') {
    ?>
    You don't have access!
    <?php
} else {
    ?>
    <div class="container">
        <form  action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="submit">
            Your name:
            <br>
            <input name="name" type="text" value="" size="30" required/>
            <br>
            Your email:
            <br>
            <input name="email" type="email" value="" size="30" required/>
            <br>
            Your message:
            <br>
            <textarea name="message" rows="7" cols="30"></textarea>
            <br>
            <input name="action" type="submit" value="Send email"/>
        </form>
    </div>
    <?php
}
?>
<?php
include_once './footer.php';
?>
