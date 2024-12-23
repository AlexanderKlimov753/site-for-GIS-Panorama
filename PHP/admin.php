<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ./auth.php');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <h1>Welcome to the Admin Panel, <?php echo $user['username']; ?>!</h1>
    <nav>
        <ul>
            <li><a href="createPost.php">Create Post</a></li>
            <li><a href="manage_posts.php">Manage Posts</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>