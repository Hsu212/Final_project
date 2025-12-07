<?php
session_start();
// Database connection details
$servername = "localhost";
$username = "localhost";
$password = "1234";
$dbname = "user_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search parameters from the form
$from = $_GET['from'];
$to = $_GET['to'];
$date = $_GET['date'];

// Fetch the flights based on the search parameters
$sql = "SELECT FlightID, FlightName, Dept, Arr, Time, Date, Price, Airline, Seats 
        FROM Flights
        WHERE Dept = ? 
        AND Arr = ?
        AND Date = ?
        ORDER BY Price ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $from, $to, $date);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query to check if the username, email, and password match
    $stmt = $conn->prepare("SELECT * FROM Users WHERE Username = ? AND Email = ? AND Password = ?");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Login successful, save the user information in the session
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['UserID'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['username'] = $row['Username'];
        header("Location: index.php");
        exit();
    } else {
        // Login failed, display an error message
        echo "Invalid username, email, or password.";
    }
}

// Get the search parameters from the form
$from = $_GET['from'];
$to = $_GET['to'];
$date = $_GET['date'];

// Fetch the flights based on the search parameters
$sql = "SELECT FlightID, FlightName, Dept, Arr, Time, Date, Price, Airline, Seats 
        FROM Flights
        WHERE Dept = ? 
        AND Arr = ?
        AND Date = ?
        ORDER BY Price ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $from, $to, $date);
$stmt->execute();
$result = $stmt->get_result();
?>







<!DOCTYPE HTML>

<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Traveler &mdash; Free Website Template, Free HTML5 Template by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="../css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<style>
		btn btn-primary{
			color: white;
		}
</style>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">

	
	<!-- <div class="page-inner"> -->
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="">Traveler <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="searchflight.php">Search Flight</a></li>
						<li class="has-dropdown">
							<a href="#">Setting</a>
							<ul class="dropdown">
								<li><a href="home.php">Payment</a></li>
								<li><a href="home.php">Dashboard</a></li>
								<li><a href="setting.php">Change Password</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
						<li><a href="home.php">Tickets</a></li>
						<li><a href="login.php"><?php if (isset($_SESSION['username'])) { ?>
            <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <?php } else { ?>
            <p>Please log in.</p>
        <?php } ?>

	</a></li>
					</ul>	
				</div>
			</div>
			
		</div>
	</nav>
	
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">
					

					<div class="row row-mt-15em">
						<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
							<h1>Planing Trip To Anywhere in The World?</h1>	
						</div>
						<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
							<div class="form-wrap">
								<div class="tab">
									
									<div class="tab-content">
										<div class="tab-content-inner active" data-content="signup">
											<h3>Book Your Trip</h3>
                                            <div class="row form-group">
        <h1>Search Flights</h1>
        <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="from">From:</label>
                <input type="text" class="form-control" id="from" name="from" required>
            </div>
            <div class="form-group">
                <label for="to">To:</label>
                <input type="text" class="form-control" id="to" name="to" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form
												
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='flight-card'>";
                echo "<h3>" . $row["FlightName"] . "</h3>";
                echo "<p>From: " . $row["Dept"] . " to " . $row["Arr"] . "</p>";
                echo "<p>Departure Time: " . $row["Time"] . "</p>";
                echo "<p>Departure Date: " . $row["Date"] . "</p>";
                echo "<p>Price: $" . $row["Price"] . "</p>";
                echo "<p>Airline: " . $row["Airline"] . "</p>";
                echo "<p>Seats Available: " . $row["Seats"] . "</p>";
                echo "<form action='connect.php' method='post'>";
                echo "<input type='hidden' name='flightID' value='" . $row["FlightID"] . "'>";
                echo "<input type='hidden' name='flightName' value='" . $row["FlightName"] . "'>";
                echo "<input type='hidden' name='dept' value='" . $row["Dept"] . "'>";
                echo "<input type='hidden' name='arr' value='" . $row["Arr"] . "'>";
                echo "<input type='hidden' name='time' value='" . $row["Time"] . "'>";
                echo "<input type='hidden' name='date' value='" . $row["Date"] . "'>";
                echo "<input type='hidden' name='price' value='" . $row["Price"] . "'>";
                echo "<input type='hidden' name='airline' value='" . $row["Airline"] . "'>";
                echo "<input type='hidden' name='seats' value='" . $row["Seats"] . "'>";
                echo "<button type='submit' class='btn btn-primary'>Book Flight</button>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>No flights found.</p>";
        }
        ?>
        






    </div>
											</form>	
										</div>

										
									</div>
								</div>
							</div>
						</div>
					</div>
							
					
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Most Popular Destination</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_1.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img width="400px" height="300px" src="https://etrip4utravel.s3-ap-southeast-1.amazonaws.com/images/article/2021/12/1267779e-6072-4223-818a-6f4e57282efa.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>New York, USA</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="https://metaeventtravel.vn/wp-content/uploads/2023/10/10-Dieu-Nen-Lam-Khi-Qua-Canh-O-Seoul-Han-Quoc.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img width="400px" height="300px" src="https://bazantravel.com/cdn/medias/uploads/52/52347-seoul-han-quoc.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Seoul, South Korea</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span href="" class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img width="400px" height="300px" src="https://res.klook.com/image/upload/Mobile/City/swox6wjsl5ndvkv5jvum.jpg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Paris, France</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>


				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="https://vitracotour.com/wp-content/uploads/2024/02/Sydney-Opera-House.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img width="400px" height="300px" src="https://vitracotour.com/wp-content/uploads/2024/02/Sydney-Opera-House.jpg">
						</figure>
						<div class="fh5co-text">
							<h2>Sydney, Australia</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img width="400px" height="300px" src="https://www.odysseys-unlimited.com/wp-content/uploads/2023/05/Lead-AdobeStock_134362781-scaled.jpeg" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Greece, Europe</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="https://static.independent.co.uk/s3fs-public/thumbnails/image/2021/06/02/20/istock-833264986.jpg" class="fh5co-card-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img width="400px" height="400px" src="https://i.natgeofe.com/k/e800ca90-2b5b-4dad-b4d7-b67a48c96c91/spain-madrid_16x9.jpg?w=1200" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Spain, Europe</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
							<p><span class="btn btn-primary">Schedule a Trip</span></p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>
	
	<div id="gtco-features">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>How It Works</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>1</i>
						</span>
						<h3>Lorem ipsum dolor sit amet</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>2</i>
						</span>
						<h3>Consectetur adipisicing elit</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i>3</i>
						</span>
						<h3>Dignissimos asperiores vitae</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				

			</div>
		</div>
	</div>


	<div class="gtco-cover gtco-cover-sm" style="background-image: url(images/img_bg_1.jpg)"  data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="gtco-container text-center">
			<div class="display-t">
				<div class="display-tc">
					<h1>We have high quality services that you will surely love!</h1>
				</div>	
			</div>
		</div>
	</div>

	<div id="gtco-counter" class="gtco-section">
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Our Success</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="196" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Destination</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Hotels</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Travelers</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
					<div class="feature-center">
						<span class="counter js-counter" data-from="0" data-to="12202" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Happy Customer</span>

					</div>
				</div>
					
			</div>
		</div>
	</div>

	

	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscribe</h2>
					<p>Be the first to know about the new templates.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

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
							<li><a href="#"><i class="icon-mail2"></i> kienbrowns1129@gmail.com </a></li>
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
	<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

