<?php 
    include 'header.php';
?>

<div class="py-5 text-center quck-check-out-container container">
    <h2>Checkout form</h2>
    <p class="lead">Please, ensure that you have selected correct items before pursuing to the payment. The payment details are not required as the check-out page is under testing now and is not connected to a payment API.</p>
  </div>

<?php 
    echo '<div class="container margin-bottom">
    <form action="../includes/insert.php" method="POST" class="needs-validation" autocomplete="off" novalidate>';
    include 'includes/booking.php';
?>



<?php 
    include 'footer.php';
?>