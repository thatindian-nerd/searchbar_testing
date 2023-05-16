$sql = "INSERT INTO users (id, username, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    $id = 1; // Set an initial value for the id column
    mysqli_stmt_bind_param($stmt, "iss", $id, $param_username, $param_password);

    // Set these parameters
    $param_username = $username;
    $param_password = password_hash($password, PASSWORD_DEFAULT);

    // Try to execute the query
    if (mysqli_stmt_execute($stmt)) {
        header("location: login.php");
    } else {
        echo "Something went wrong... cannot redirect!";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);