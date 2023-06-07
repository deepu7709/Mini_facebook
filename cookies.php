<?php
// Check if cookies are enabled
if (isset($_COOKIE['test_cookie'])) {
$cookies_enabled = true;
} else {
$cookies_enabled = false;
setcookie('test_cookie', 'test', time() + 3600); // Set a test cookie
}
// Retrieve cookie data
if (isset($_COOKIE['user_name'])) {
 
$user_name = $_COOKIE['user_name'];
} else {
$user_name = '';
}
// Display page content
?>
<!DOCTYPE html>
<html>
<head>
<title>Accepting Cookies</title>
</head>
<body>
<?php if ($cookies_enabled) { ?>
<p>Cookies are enabled.</p>
<?php } else { ?>
<p>Cookies are disabled. Please enable cookies to use this site.</p>
<?php } ?>
<form method="post">
<label for="user_name">Enter your name:</label>
<input type="text" name="user_name" id="user_name" value="<?php echo
$user_name; ?>">
<input type="submit" name="submit" value="Submit">
</form>
<?php
// Process form data
if (isset($_POST['submit'])) {
$user_name = $_POST['user_name'];
setcookie('user_name', $user_name, time() + 3600); // Set a cookie with user's name
echo "<p>Welcome, $user_name!</p>";
}
?>
</body>
</html>

