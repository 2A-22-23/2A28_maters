<?php
$con=mysqli_connect("localhost","root","","REVERSO2a28");
if(!$con){
    die("connexion invalid");

// Check if the connection was successful
}

// Define the SQL query to retrieve the top 3 users with the highest sales
$sql = "SELECT *
        FROM user
        ORDER BY identity_card DESC
        LIMIT 3";

// Execute the query and retrieve the results
$result = mysqli_query($con, $sql);

// Check if the query was executed successfully
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Loop through the results and display the entire row for each of the top 3 users with the highest sales
while ($row = mysqli_fetch_assoc($result)) {
    echo "User email: " . $row["Email"] . " - User Name: " . $row["Name"] . " - Sales: " . $row["identity_card"] . "<br>";
}

// Close the database connection
mysqli_close($con);
?>
