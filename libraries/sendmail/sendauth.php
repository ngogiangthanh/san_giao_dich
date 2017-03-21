                                
<?php
    require_once 'PHPMailerAutoload.php';

    $results_messages = array();

    $mail = new PHPMailer(true);
    $mail->CharSet = 'utf-8';

    class phpmailerAppException extends phpmailerException {
        
    }

    try {
        $to = $_POST['email'];
        if (!PHPMailer::validateAddress($to)) {
            throw new phpmailerAppException("Email address " . $to . " is invalid -- aborting!");
        }
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = "ssl://ns89104.dotvndns.vn";
        $mail->Port = "465";
        $mail->SMTPSecure = "none";
        $mail->SMTPAuth = true;
        $mail->Username = "bluedolp";
        $mail->Password = "Blue2014";
        $mail->addReplyTo($_POST['email'], $_POST['email']);
        $mail->From = "inquiry@bluedolphin.com.vn";
        $mail->FromName = "Blue Dolphin's Customer Service";
        $mail->addAddress($_POST['email'], $_POST['email']);
        $mail->Subject = $_POST['title'];
        $body = $_POST['respone'];
        $mail->WordWrap = 50;
        $mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images
        //
//        $mail->isSMTP();
//        $mail->SMTPDebug = 2;
//        $mail->Host = "mx1.hostinger.vn";
//        $mail->Port = "2525";
//        $mail->SMTPSecure = "none";
//        $mail->SMTPAuth = true;
//        $mail->Username = "thanhthanh1516@testcode.meximas.com";
//        $mail->Password = "dyNujy";
//        $mail->addReplyTo("thanhthanh1516@testcode.meximas.com", "thanh");
//        $mail->From = "thanhthanh1516@testcode.meximas.com";
//        $mail->FromName = "thanh";
//        $mail->addAddress($_POST['email'], "moon");
//        $mail->Subject = $_POST['title'];
//        $body = $_POST['respone'];
//        $mail->WordWrap = 80;
//        $mail->msgHTML($body, dirname(__FILE__), true); //Create message bodies and embed images
      //  $mail->addAttachment('images/phpmailer_mini.png', 'phpmailer_mini.png');  // optional name
       // $mail->addAttachment('images/phpmailer.png', 'phpmailer.png');  // optional name

        try {
            $mail->send();
            echo "<script>location.href='admin.php?controller=contact&action=respone&cid=".$id."&statusupdate=true'</script>";
            $results_messages[] = "Message has been sent using SMTP";
        } catch (phpmailerException $e) {
         //   throw new phpmailerAppException('Unable to send to: ' . $to . ': ' . $e->getMessage());
        }
    } catch (phpmailerAppException $e) {
       // $results_messages[] = $e->errorMessage();
    }

//    if (count($results_messages) > 0) {
//        echo "<h2>Run results</h2>\n";
//        echo "<ul>\n";
//        foreach ($results_messages as $result) {
//            echo "<li>$result</li>\n";
//        }
//        echo "</ul>\n";
//    }
?>
                            