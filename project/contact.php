<?php  

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['send'])){

   $msg_id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $message = $_POST['message'];
   $message = filter_var($message, FILTER_SANITIZE_STRING);

   $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
   $verify_contact->execute([$name, $email, $number, $message]);

   if($verify_contact->rowCount() > 0){
      $warning_msg[] = 'message sent already!';
   }else{
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact Us</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>get in touch</h3>
         <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="enter your number" class="box">
         <textarea name="message" placeholder="enter your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>how to cancel booking?</span><i class="fas fa-angle-down"></i></h3>
         <p>Canceling a real estate booking typically involves following a specific process outlined in the booking agreement or memorandum of understanding. The exact steps may vary depending on the developer or builder, but the general process is as follows:<br>

<b>Notify the Developer:</b> Inform the developer or builder of your intention to cancel the booking. This can be done in writing, either via email or registered letter, clearly stating your reasons for cancellation.<br>

<b>Submit a Cancellation Request:</b> Provide a formal cancellation request to the developer or builder. This request should include your booking reference number, property details, and the date of booking.<br>

<b>Adhere to the Cancellation Clause:</b> Refer to the cancellation clause in the booking agreement or memorandum of understanding. This clause typically outlines the terms and conditions for canceling the booking, including any applicable penalties or deductions.<br>

<b>Pay Cancellation Fees:</b> Depending on the developer's policy and the cancellation clause, you may be charged a cancellation fee. This fee is typically a percentage of the booking amount, often around 10%.<br>

<b>Receive Refund:</b> Once the developer or builder acknowledges your cancellation request and processes the necessary paperwork, you should receive a refund for the remaining booking amount, minus any applicable penalties or deductions.<br>

<b>Retain Documentation:</b> Keep copies of all correspondence, documentation, and receipts related to the booking and cancellation process. This may be helpful in case of any disputes or discrepancies.</p>
      </div>

      <div class="box active">
         <h3><span>when will I get the possession?</span><i class="fas fa-angle-down"></i></h3>
         <p>The possession date in real estate is the day when the buyer legally takes ownership of the property. This date is typically specified in the purchase agreement and can vary depending on several factors, including the type of property, the complexity of the transaction, and the availability of financing.<br>

In general, the possession date for a resale property will be sooner than the possession date for a new construction property. This is because resale properties are already built and ready to move in, while new construction properties need to be completed before the buyer can take possession.<br>

Here are some of the factors that can affect the possession date in real estate:<br>

<b>Type of property:</b> Resale properties typically have a shorter possession date than new construction properties.<br>
<b>Complexity of the transaction:</b> If the transaction is complex, such as if there are multiple owners or liens on the property, the possession date may be delayed.<br>
<b>Availability of financing:</b> If the buyer is financing the purchase of the property, the possession date may be delayed until the financing is finalized.
<table style="border-collapse: collapse; width: 100%;">
<tr><th style="border: 1px solid #ddd; text-align: center; padding: 8px;">Transaction type</th><th style="border: 1px solid #ddd; text-align: center; padding: 8px;">Average possession date</th></tr>
<tr><td style="border: 1px solid #ddd; text-align: center; padding: 8px;">Resale property</td><td style="border: 1px solid #ddd; text-align: center; padding: 8px;">30-60 days</td></tr>
<tr><td style="border: 1px solid #ddd; text-align: center; padding: 8px;">New construction property</td><td style="border: 1px solid #ddd; text-align: center; padding: 8px;">6-12 months</td></tr>
<tr><td style="border: 1px solid #ddd; text-align: center; padding: 8px;">Short sale property</td><td style="border: 1px solid #ddd; text-align: center; padding: 8px;">3-6 months</td></tr>
</table>
</p>
      </div>

      <div class="box">
         <h3><span>where can I pay the rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box">
         <h3><span>how to contact with the buyers?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box">
         <h3><span>why my listing not showing up?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box">
         <h3><span>how to promote my listing?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->










<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/message.php'; ?>

</body>
</html>