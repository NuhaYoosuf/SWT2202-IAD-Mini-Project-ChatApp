<?php 
session_start();
include_once "php/config.php";


if(!isset($_SESSION['unique_id'])){
  header("location: index.php");
  
}

$sql_sender = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql_sender) > 0) {
  $sender_row = mysqli_fetch_assoc($sql_sender);
}

$user_id = isset($_GET['user_id']) ? mysqli_real_escape_string($conn, $_GET['user_id']) : null;

if ($user_id) {
  
  $sql_receiver = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
  if (mysqli_num_rows($sql_receiver) > 0) {
    $receiver_row = mysqli_fetch_assoc($sql_receiver);
  } else {
   
    header("location: chat.php");
    exit(); 
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat App</title>
  <link rel="stylesheet" href="styles/style2.css">
  <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
</head>
<body >
  <div class="wrapper">
    <nav class="menu">
        <ul class="items">
          <li class="item">
            <i class="fa fa-home" aria-hidden="true"></i>
          </li>
          <li class="item">
            <i class="fa fa-user" aria-hidden="true"></i>
          </li>
          <li class="item">
            <i class="fa fa-pencil" aria-hidden="true"></i>
          </li>
          <li class="item item-active">
            <i class="fa fa-commenting" aria-hidden="true"></i>
          </li>
          <li class="item">
            <i class="fa fa-file" aria-hidden="true"></i>
          </li>
          <li class="item">
            <i class="fa fa-cog" aria-hidden="true"></i>
          </li>
        </ul>
      </nav>

    <section class="users">
      <header>
        <div class="content">
          <!-- Display current user details -->
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $sender_row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $sender_row['uname'];  ?></span>
            <p><?php echo $sender_row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $sender_row['unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select a user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
        <!-- Display list of users -->
      </div>
    </section>


   <section class="chat-area">
  <header>
    <a href="chat.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
    <!-- Display user details -->
    <?php if(isset($receiver_row) && !empty($receiver_row)): ?>
      <img src="php/images/<?php echo $receiver_row['img']; ?>" alt="">
      <div class="details">
        <span><?php echo $receiver_row['uname']; ?></span>
        <p><?php echo $receiver_row['status']; ?></p>
      </div>
    <?php else: ?>
      <!-- Handle case when receiver details are not available -->
      <!-- <p>Receiver details not found.</p> -->
    <?php endif; ?>
    <!-- <div class="ibtn">
      <button><i class="fa fa-phone"></i></button>
      <button><i class="fa fa-video-camera"></i></button>
    </div> -->
  </header>
  <div class="chat-box">
    <!-- Display chat messages -->
  </div>
  <!-- Hidden field to store incoming user ID -->
  <form action="#" class="typing-area">
    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
    <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
    <button><i class="fab fa-telegram-plane"></i></button>
  </form>
</section>
  </div>

  <script src="javascript/users.js"></script>
  <script src="javascript/chat.js"></script>
</body>
</html>
