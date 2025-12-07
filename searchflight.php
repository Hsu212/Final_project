<?php

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Flights</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
.btn-primary {
  background-color: #09C6AB;
  border-color: #09C6AB;
}

.btn-primary:hover {
  background-color: #08b1a0;
  border-color: #08b1a0;
}
    


        .flight-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .flight-card h3 {
            margin-top: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .flight-card p {
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .flight-card .btn {
            background-color: #09C6AB;

            font-size: 0.9rem;
        }

        @media (max-width: 767px) {
            .flight-card {
                padding: 15px;
            }

            .flight-card h3 {
                font-size: 1.2rem;
            }

            .flight-card p {
                font-size: 0.85rem;
            }

            .flight-card .btn {
              
                font-size: 0.8rem;
            }
        }



        
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Search Flights</h1>
        <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mb-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="from" class="form-label">From:</label>
                    <input type="text" class="form-control" id="from" name="from" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="to" class="form-label">To:</label>
                    <input type="text" class="form-control" id="to" name="to" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

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
</body>
</html>