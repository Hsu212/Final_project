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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Generate a random user ID
    $user_id = uniqid();

    // Prepare the SQL query
    $sql = "INSERT INTO Users (UserID, Username, Email, Password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user_id, $username, $email, $password);

    if ($stmt->execute()) {
        // Redirect to the home page
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>body {
  font-family: 'Roboto', sans-serif; /* Choose a modern font like Roboto */
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #fff;
  background-image: url('https://images.hdqwalls.com/download/foggy-mountains-yj-1920x1080.jpg');
  background-size: cover; /* Cover the entire background */
}

h1 {
  text-align: top;
  color: white; /* Set text color to white */
  font-family: Times; /* Choose a modern font like Poppins */
  font-weight: 700; /* Make the font bold */
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


input[type="text"],
input[type="email"],
input[type="password"] {
  font-family: Times;
  width: 100%;
  padding: 10px;
  background-color: rgba(0, 0, 0, 0.4);
  backdrop-filter: blur(20px);
  margin: 10px 0;
  border: 4px solid #black ;
  border-radius: 5px;
  box-sizing: border-box;
  color: white; /* Set input text color to white */
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  backdrop-filter: blur(50px) ;
  margin: 10px 0;
  border: 1px solid #black;
  border-radius: 4px;
  box-sizing: border-box;
  background-color: white; /* Set input background to black */
  color: white; /* Set input text color to white */
}

input[type="submit"]:hover {
  background-color: #45a049;
  backdrop-filter: blur(50px) ;
  
}</style>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<h1 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 700;">
  <i class="fas fa-plane-departure"></i> Sign Up
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>