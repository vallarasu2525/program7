<?php 
function validatePinCode($pincode) { 
return preg_match("/^\d{6}$/", $pincode); 
} 
function validatePhoneNumber($phone) { 
return preg_match("/^\d{10}$/", $phone); 
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$name = trim($_POST['name']); 
$city = trim($_POST['city']); 
$pincode = trim($_POST['pincode']); 
$phone = trim($_POST['phone']); 
$email = trim($_POST['email']); 
$errors = []; 
if (empty($name)) { 
$errors[] = "Name is a mandatory field."; 
} 
if (empty($city)) { 
$errors[] = "City cannot be empty."; 
} 
if (!empty($pincode) && !validatePinCode($pincode)) { 
$errors[] = "Pin Code must be exactly 6 digits."; 
89 
} 
if (!empty($phone) && !validatePhoneNumber($phone)) { 
$errors[] = "Phone Number must be exactly 10 digits."; 
} 
if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) { 
$errors[] = "Invalid Email Address."; 
} 
if (!empty($errors)) { 
echo "<h2>Validation Errors</h2>"; 
echo "<ul>"; 
foreach ($errors as $error) { 
echo "<li>$error</li>"; 
} 
echo "</ul>"; 
echo "<a href='index.html'>Go Back</a>"; 
} else { 
echo "<h2>Customer Details Submitted Successfully</h2>"; 
echo "<p>Name: $name</p>"; 
echo "<p>City: $city</p>"; 
echo "<p>Pin Code: $pincode</p>"; 
echo "<p>Phone Number: $phone</p>"; 
echo "<p>Email Address: $email</p>"; 
} 
} 
?>