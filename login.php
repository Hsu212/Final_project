<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "localhost";
$password = "1234";
$dbname = "user_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form was submitted
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
        // Login successful, start the session and redirect the user to the home page
        $row = $result->fetch_assoc();
        session_start();
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

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login to Traveler.com</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Choose a modern font like Roboto */
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #fff;
  background-image: url('https://images.hdqwalls.com/download/foggy-mountains-yj-1920x1080.jpg');
  background-size: cover;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 5px ;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) ;
            border: 2px solid #333 ;
        }

        h1 {
            text-align: top;
  color: white; /* Set text color to white */
  font-family: Times; /* Choose a modern font like Poppins */
  margin-right: 400px;
  margin-bottom: 20px;
        }

        form {
            font-family: Times;
  background-color: rgba(0, 0, 0, 0.4); /* 40% opacity black background */
  backdrop-filter: blur(20px) ; /* Apply blur effect to the background */
  padding: 30px;
  color: white;

  border: 2px solid #black; /* Add a white border */
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  width: 350px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            font-family: Times;
  width: 100%;
  padding: 10px;
  background-color: rgba(0, 0, 0, 0.4);
  backdrop-filter: blur(20px);
  margin: 10px 0;
  border: 4px solid #black ;
  border-radius: 5px;
  box-sizing: border-box;
  color: white; 
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            width: 100%;
  padding: 10px;
  backdrop-filter: blur(50px) ;
  margin: 10px 0;
  border: 1px solid #black;
  border-radius: 4px;
  box-sizing: border-box;
  background-color: white; /* Set input background to black */
  color: white;
        }

        .create_acc {
  position: fixed;
  bottom: 20px;
  right: 20px;
}

    </style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 700;">
<i class="fas fa-user"></i> Login



</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
    <label for="username"><i class="fas fa-user"></i> Username:</label>
    <input type="text" class="form-control" id="username" name="username" required>
  </div>
  <div class="form-group">
    <label for="email"><i class="fas fa-envelope"></i> Email:</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="password"><i class="fas fa-lock"></i> Password:</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
    </form>

    <div class="d-flex justify-content-end my-3">
  <a class="create_acc btn btn-primary btn-sm" href="signup.php">Create an account</a>
</div>

</body>
</html>