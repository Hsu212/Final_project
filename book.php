<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "localhost";
$password = "1234";
$dbname = "user_login";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve the flight information from the session variables
$flightID = $_SESSION['flightID'];
$flightName = $_SESSION['flightName'];
$dept = $_SESSION['dept'];
$arr = $_SESSION['arr'];
$time = $_SESSION['time'];
$date = $_SESSION['date'];
$price = $_SESSION['price'];
$airline = $_SESSION['airline'];
$seats = $_SESSION['seats'];

// Retrieve user information from the form
$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : '';
$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : '';
$passport = isset($_POST['passport']) ? $_POST['passport'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : '';

// Prepare the SQL query to insert both flight and user information
$bookingSql = "INSERT INTO Booking (FlightID, FlightName, Dept, Arr, Time, Date, Price, Airline, Seats, FirstName, LastName, Passport, Address, Phone, PaymentMethod)
               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($bookingSql);
$stmt->bind_param("issssdssissssss", $flightID, $flightName, $dept, $arr, $time, $date, $price, $airline, $seats, $firstName, $lastName, $passport, $address, $phone, $paymentMethod);

// Execute the query
if ($stmt->execute()) {
    echo "Booking created successfully!";
    

} else {
    echo "Error: " . $bookingSql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>/* Footer Styles */
#gtco-footer {
  background-color: #333;
  color: #fff;
  padding: 80px 0;
  backdrop-filter: blur(1px);
  margin-top: 300px;

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
</head>
<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Booking Confirmation</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Flight Information</h5>
                        <p>Flight ID: <?php echo $flightID; ?></p>
                        <p>Flight Name: <?php echo $flightName; ?></p>
                        <p>Departure: <?php echo $dept; ?></p>
                        <p>Arrival: <?php echo $arr; ?></p>
                        <p>Time: <?php echo $time; ?></p>
                        <p>Date: <?php echo $date; ?></p>
                        <p>Price: <?php echo $price; ?></p>
                        <p>Airline: <?php echo $airline; ?></p>
                        <p>Seats: <?php echo $seats; ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Passenger Information</h5>
                        <p>First Name: <?php echo $firstName; ?></p>
                        <p>Last Name: <?php echo $lastName; ?></p>
                        <p>Passport: <?php echo $passport; ?></p>
                        <p>Address: <?php echo $address; ?></p>
                        <p>Phone: <?php echo $phone; ?></p>
                        <p>Payment Method: <?php echo $paymentMethod; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

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

</html>
