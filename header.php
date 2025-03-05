<?php 
session_start();
include 'koneksi/koneksi.php';
if(isset($_SESSION['kd_cs'])){

	$kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WORDING COMMISIONS</title>
	<link rel="stylesheet" href="css/slider.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<script  src="js/jquery.js"></script>
	<script  src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/botstyle.css">


</head>
<body>
	<div class="container-fluid">
		<div class="row top">
			<center>
				<div class="col-md-4" style="padding: 3px;">
					<span> <i class="glyphicon glyphicon-earphone"></i>085210001000</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span><i class="glyphicon glyphicon-envelope"></i> Wording@gmail.com</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span>Wording Langsa</span>
				</div>
			</center>
		</div>
	</div>

	<nav class="navbar navbar-default" style="padding: 5px;">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color: #ff8680"><b>WORDING COMMISIONS</b></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="produk.php">Produk</a></li>
					<li><a href="about.php">Tentang Kami</a></li>
					<li><a href="manual.php">Manual Aplikasi</a></li>
					<?php 
					if(isset($_SESSION['kd_cs'])){
					$kode_cs = $_SESSION['kd_cs'];
					$cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
					$value = mysqli_num_rows($cek);

						?>
						<li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i> <b>[ <?= $value ?> ]</b></a></li>

						<?php 
					}else{
						echo "
						<li><a href='keranjang.php'><i class='glyphicon glyphicon-shopping-cart'></i> [0]</a></li>

						";
					}
					if(!isset($_SESSION['user'])){
						?>

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> Akun <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="user_login.php">login</a></li>
								<li><a href="register.php">Register</a></li>
							</ul>
						</li>
						<?php 
					}else{
						?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <?= $_SESSION['user']; ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="proses/logout.php">Log Out</a></li>
							</ul>
						</li>

						<?php 
					}
					?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<button class="chat-toggle-button" onclick="toggleChatbox()">💬</button>

<!-- Chatbox -->
<div class="chatbox" id="chatbox">
	<div class="chatbox-header">
	<b>Chat Bot</b>
		<span onclick="toggleChatbox()" style="cursor: pointer;">&#10005;</span> <!-- Close icon -->
	</div>
	<div class="chatbox-messages" id="chat">
		<!-- Chat messages will appear here -->
	</div>
	<div class="input-area">
		<input type="text" id="userMessage" placeholder="Type a message..." onkeypress="checkEnter(event)">
		<button onclick="sendMessage()">&#9658; </button> <!-- Send icon -->
	</div>
</div>

<script>
	// Function to toggle chatbox visibility
	function toggleChatbox() {
		const chatbox = document.getElementById('chatbox');
		const chatToggleButton = document.querySelector('.chat-toggle-button');
		if (chatbox.style.display === 'none' || chatbox.style.display === '') {
			chatbox.style.display = 'flex';  // Show the chatbox
			chatToggleButton.style.display = 'none';  // Hide the toggle button
		} else {
			chatbox.style.display = 'none';  // Hide the chatbox
			chatToggleButton.style.display = 'block';  // Show the toggle button
		}
	}

	// Function to send the message
	
	function sendMessage() {
		const userMessage = document.getElementById('userMessage').value;
		if (userMessage.trim() !== "") {
			addMessage(userMessage, 'user');
			fetchResponse(userMessage);
			document.getElementById('userMessage').value = "";
		}
	}
	function checkEnter(event) {
		if (event.key === 'Enter') {
			sendMessage();  // Send message when Enter key is pressed
		}
	}

	// Function to display messages in chatbox
	function addMessage(message, sender) {
		const chat = document.getElementById('chat');
		const messageElement = document.createElement('div');
		messageElement.classList.add('message', sender);
		const bubbleElement = document.createElement('div');
		bubbleElement.classList.add('bubble');
		bubbleElement.textContent = message;
		messageElement.appendChild(bubbleElement);
		chat.appendChild(messageElement);
		chat.scrollTop = chat.scrollHeight;
	}

	// Fetch bot response from PHP backend
	function fetchResponse(userMessage) {
		fetch('chatbot.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded',
			},
			body: 'message=' + encodeURIComponent(userMessage)
		})
		.then(response => response.text())
		.then(data => addMessage(data, 'bot'))
		.catch(error => console.error('Error:', error));
	}
</script>