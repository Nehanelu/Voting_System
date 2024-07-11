<?php
session_start();
include('connect.php');

$votes = $_POST['groupvotes'];
$totalvotes = $votes + 1;
$gid = $_POST['groupid'];
$uid = $_SESSION['id'];

// Update votes for the selected group
$updatevotes = mysqli_query($con, "UPDATE `userdata` SET votes = '$totalvotes' WHERE id = '$gid'");

// Update the voting status for the user
$updatestatus = mysqli_query($con, "UPDATE `userdata` SET status = 1 WHERE id = '$uid'");

if ($updatevotes && $updatestatus) {
    // Fetch all groups
    $getgroups = mysqli_query($con, "SELECT username, photo, votes, id FROM `userdata` WHERE standard = 'group'");
    $groups = mysqli_fetch_all($getgroups, MYSQLI_ASSOC);
    
    // Store groups and status in session
    $_SESSION['groups'] = $groups;
    $_SESSION['status'] = 1;

    // Redirect to dashboard
    echo '<script>
        alert("Voting successful");
        window.location = "../components/dashboard.php";
    </script>';
} else {
    // Handle errors and redirect
    echo '<script>
        alert("Technical error !! Vote after some time");
        window.location = "../components/dashboard.php";
    </script>';
}
?>
