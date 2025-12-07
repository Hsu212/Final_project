<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flightID = $_POST['flightID'];
    $flightName = $_POST['flightName'];
    $dept = $_POST['dept'];
    $arr = $_POST['arr'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $price = $_POST['price'];
    $airline = $_POST['airline'];
    $seats = $_POST['seats'];
    // Redirect to book.php with the user data
    $redirect_url = "book.php?firstName=" . urlencode($firstName) .
    "&lastName=" . urlencode($lastName) .
    "&passport=" . urlencode($passport) .
    "&address=" . urlencode($address) .
    "&phone=" . urlencode($phone) .
    "&paymentMethod=" . urlencode($paymentMethod);
    
    $_SESSION['flightID'] = $flightID;
    $_SESSION['flightName'] = $flightName;
    $_SESSION['dept'] = $dept;
    $_SESSION['arr'] = $arr;
    $_SESSION['time'] = $time;
    $_SESSION['date'] = $date;
    $_SESSION['price'] = $price;
    $_SESSION['airline'] = $airline;
    $_SESSION['seats'] = $seats;

    
    if (!empty($firstName) && !empty($lastName) && !empty($passport) && !empty($address) && !empty($phone) && !empty($paymentMethod)) {
        header("Location: " . $redirect_url);
        exit;
    } else {
        echo "Please fill out all user information fields.";
    }
    }
    
    
    
    ?>

<style>/* Add custom styles */
body {
  font-family: 'Roboto', sans-serif;
  
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #fff;
  
  display: block;
  padding: 10px 20px 20px 20px;
  background: #fff
  margin: 0 0 -10px 0 !important;
  width: 100%;
  float: left;
  z-index: 12;
  position: relative;
}

.btn-primary {
  background-color: #09C6AB;
  border-color: #09C6AB;
}

.btn-primary:hover {
  background-color: #08b1a0;
  border-color: #08b1a0;
}

.container {
  max-width: 800px;

  margin-top: 50px;
  padding: 30px;
  background-color: #fff;
  
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

.input-group-text {
   
    backdrop-filter: blur(10px);
  background-color: #f5f5f5;
  border: none;
  font-size: 1.2rem;
  color: #555;
}

.form-control {

    padding: 0;
  margin: 0;
  list-style: none;
  display: inline;
  float: left;
  width: 50%;
  text-align: center;
  border: none;
  border-bottom: 2px solid #ddd;
  border-radius: 0;
  font-size: 1.1rem;
  padding: 10px 15px;
  transition: border-color 0.3s ease;
}

.form-control:focus {
    backdrop-filter: blur(10px);
  color: #09C6AB;
  box-shadow: none;
  border-color: #007bff;
}


.btn-primary {
  background-color: #09C6AB;
  border-color: #09C6AB;
  color: #fff; /* Set text color to white */
}

.btn-primary:hover {
  background-color: #08b1a0;
  border-color: #08b1a0;
  color: #fff; /* Keep text color white on hover */
}
/* Footer Styles */
#gtco-footer {
  background-color: #333;
  color: #fff;
  padding: 80px 0;
  backdrop-filter: blur(1px);
  margin-top: 400px;

  font-size: 14px;
}

#gtco-footer a {
  color: #09C6AB;

  text-decoration: none;
}

#gtco-footer a:hover {
  color: #08b1a0;
}

#gtco-footer h3 {
  color: #fff;
  margin-bottom: 20px;
  font-size: 18px;
  font-weight: bold;
}

.gtco-footer-links {
  padding: 0;
  margin: 0;
  list-style: none;
}

.gtco-footer-links li {
  margin-bottom: 10px;
}

.gtco-quick-contact {
  padding: 0;
  margin: 0;
  list-style: none;
}

.gtco-quick-contact li {
  margin-bottom: 10px;
}

.gtco-quick-contact li i {
  margin-right: 10px;
}

.copyright {
  margin-top: 50px;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding-top: 30px;
}

.copyright p {
  font-size: 12px;
}

.copyright .pull-left,
.copyright .pull-right {
  display: inline-block;
}

.gtco-social-icons {
  margin: 0;
  padding: 0;
  list-style: none;
}

.gtco-social-icons li {
  display: inline-block;
  margin-right: 10px;
}

.gtco-social-icons li a {
  color: #fff;
  font-size: 18px;
}

.gtco-social-icons li a:hover {
  color: #09C6AB;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

<form action="book.php" method="post" class="container my-5">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" name="firstName" placeholder="First Name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-passport"></i></span>
                <input type="text" class="form-control" name="passport" placeholder="Passport" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-house-door-fill"></i></span>
                <input type="text" class="form-control" name="address" placeholder="Address" required>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-credit-card-fill"></i></span>
                <input type="text" class="form-control" name="paymentMethod" placeholder="Payment Method" required>
            </div>
        </div>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-arrow-right-circle-fill"></i> Continue to Booking
        </button>
    </div>
</form>


<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Destination</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Europe</a></li>
							<li><a href="#">Australia</a></li>
							<li><a href="#">Asia</a></li>
							<li><a href="#">Canada</a></li>
							<li><a href="#">Dubai</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2 col-md-push-1">
					<div class="gtco-widget">
						<h3>Hotels</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Luxe Hotel</a></li>
							<li><a href="#">Italy 5 Star hotel</a></li>
							<li><a href="#">Dubai Hotel</a></li>
							<li><a href="#">Deluxe Hotel</a></li>
							<li><a href="#">BoraBora Hotel</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-md-push-1">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@freehtml5.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2024 Traveler.com All Rights Reserved.</small> 
						<small class="block">Designed by Htet Aung & Hsu Myat Wai Maung</small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>