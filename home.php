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



<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <style>/* Reset styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  
  /* Global styles */
  body {
    font-family: "Lato", Arial, sans-serif;
  font-weight: 400;
  font-size: 16px;
  line-height: 1.7;
  color: #777;
  background: #ffffff;
 
  background-repeat: no-repeat;
  }
  
  a {
    text-decoration: none;
    color: #007bff;
    padding: none;
  }
  
  /* Header styles */
  h1 {
    background-color: #007bff;
    color: #fff;
    padding-left: none;
    padding-right: none;
    padding: 1rem;
  }
  
  /* Table styles */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 2rem;
  }
  
  th, td {
    padding: 0.5rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  
  th {
    background-color: #f2f2f2;
  }
  
  /* Form styles */
  form {
    max-width: 600px;
    margin: 0 auto;
    padding: 2rem;
    background-color: #f2f2f2;
    border-radius: 4px;
  }
  
  form label {
    display: block;
    margin-bottom: 0.5rem;
  }
  
  form input,
  form select {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    margin-bottom: 1rem;
  }
  
  form input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  
  /* Logout link styles */
  .logout {
    display: block;
    text-align: center;
    margin-top: none;

  }
  
  
  /* Payment Settings Form Styles */
.payment-settings {
  max-width: 600px;
  margin: 0 auto;
  padding: 2rem;
  background-color: #f2f2f2;
  border-radius: 4px;
}

.payment-settings label {
  display: block;
  margin-bottom: 0.5rem;
}

.payment-settings input,
.payment-settings select {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ddd;
  border-radius: 4px;
  margin-bottom: 1rem;
}

.payment-settings input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  cursor: pointer;
}
  
  
  
  
  
  </style>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Welcome, <?php if (isset($_SESSION['username'])) { ?>
            <p><?php echo $_SESSION['username']; ?>!</p>
        <?php } else { ?>
            <p>Please log in.</p>
        <?php } ?>

      </h1>
    <form action="login.php">
      <button type="submit" class="btn btn-secondary"><i class="fas fa-sign-out-alt"></i> Logout</button>
    </form>

    <div class="row mt-4">
      <div class="col-md-6">
        <h2>Payment Settings</h2>
        <form method="post" action="update_payment.php">
          <div class="form-group">
            <label for="payment_method"><i class="fas fa-credit-card"></i> Payment Method:</label>
            <select id="payment_method" name="payment_method" class="form-control">
              <option value="credit_card">Credit Card</option>
              <option value="debit_card">Debit Card</option>
              <option value="paypal">PayPal</option>
            </select>
          </div>
          <div class="form-group">
            <label for="card_number"><i class="fas fa-credit-card"></i> Card Number:</label>
            <input type="text" class="form-control" id="card_number" name="card_number" value="<?php echo $user['CardNumber']; ?>">
          </div>
          <div class="form-group">
            <label for="expiration_date"><i class="far fa-calendar-alt"></i> Expiration Date:</label>
            <input type="month" class="form-control" id="expiration_date" name="expiration_date" value="<?php echo date('Y-m', strtotime($user['ExpirationDate'])); ?>">
          </div>
          <button type="submit" class="btn btn-primary">Update Payment Settings</button>
        </form>
      </div>
      <div class="col-md-6">
        <h2>Recent Tickets</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Flight Number</th>
              <th>Flight Name</th>
              <th>Departure</th>
              <th>Price</th>
              <th>Seat Type</th>
              <th>Total Cost</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($ticket = $recentTickets->fetch_assoc()) { ?>
            <tr>
              <td> <p><?php echo $flightID; ?></p></td>
              <td><?php echo $flightName; ?></td>
              <td><?php echo $dept; ?></td>
              <td><?php echo $price; ?></td>
              <td><?php echo $seats; ?></td>
              <td><?php echo $airline; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <div class="col-md-6">
        <form action="searchflight.php" method="get" class="mt-4">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Flights" name="search_query">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit"><i class="fas fa-plane-departure"></i> Search</button>
            </div>
          </div>
        </form>
      </div>

    <div class="row mt-4">
      <div class="col-md-6">
        <h2>Upcoming Trips</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Flight Number</th>
              <th>Departure Date</th>
              <th>Arrival Date</th>
              <th>Passengers</th>
              <th>Seat Type</th>
              <th>Total Cost</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($trip = $upcomingTrips->fetch_assoc()) { ?>
            <tr>
              <td><?php echo $trip['FlightNumber']; ?></td>
              <td><?php echo $trip['DepartureDate']; ?></td>
              <td><?php echo $trip['ArrivalDate']; ?></td>
              <td><?php echo $trip['Passengers']; ?></td>
              <td><?php echo $trip['SeatType']; ?></td>
              <td><?php echo $trip['TotalCost']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
     
    </div>

    <a href="logout.php" class="btn btn-secondary mt-4"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>