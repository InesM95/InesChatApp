<?php
session_start();
include_once "connection.php";
if (!isset($_SESSION['id'])) {
  header("location: ../src/login-user.php");
}
?>

<head>
  <link rel="stylesheet" href="../css/chatbox.css">
</head>

<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php
        $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
        $sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: users.php");
        }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <div class="details">
          <span><?php echo $row['name'] ?></span>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button>Send</button>
      </form>
    </section>
  </div>

  <script src="../js/chat.js"></script>

</body>

</html>