<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chatbot - MIND BOOST</title>

  <!-- Font Awesome for mic icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="static/css/styles.css?=v2">
  <style>
    .input-area button {
      border: none;
      color: #fff;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    #mic-btn {
      background-color: #333;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      padding: 0;
    }

    #mic-btn i {
      color: white;
      font-size: 18px;
    }

    #send-btn {
      background-color: #28a745;
      padding: 0 16px;
    }
  </style>
  
</head>

<body>
<!-- Navigation Bar -->
<header class="navbar">
  <div class="logo">MIND-BOOST</div>
  <nav>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li> 
      <li><a href="features.html">Features</a></li> 
      <li><a href="about.html">About</a></li> 
      <li><a href="contact.php">Contact</a></li> 
    </ul>
  </nav>
</header>

<!-- Hero Section -->
<section id="home" class="hero">
  <div class="hero-content">
    <div class="hero-text">
      <h1>Welcome to <span>MIND-BOOST</span></h1>
      <p>Your Personal Mental Wellness Companion</p>
      <button class="cta-button">Get Started</button>
    </div>
    <div class="hero-image">
      <img src="613943b8bfc81.image.jpg" alt="Mind Boost Illustration">
    </div>
  </div>
</section>

  <!-- Chatbot Interface -->
  <section id="chatbot" class="chatbot-section">
    <div class="chatbot-container">
      <h2>Chat with MIND-BOOST</h2>
      <div class="chat-window" role="log" aria-live="polite">
        <div class="messages">
          <div class="message bot-message">Hello! How can I assist you today?</div>
        </div>
        <div class="input-area">
          <input 
            type="text" 
            id="user-input" 
            placeholder="Type your message..." 
            aria-label="Type your message here"
          />
          <button id="mic-btn" type="button" aria-label="Speak">
            <i class="fas fa-microphone"></i>
          </button>
          <button id="send-btn" type="button">Send</button>
        </div>
      </div>
    </div>
  </section>

<!-- Features Section -->
<section id="features" class="features">
  <div class="features-heading">
    <h2>Key Features</h2>
    <div class="feature-grid">
      <div class="feature-item">
        <h3>Personalized Support</h3>
        <p>Receive tailored therapy recommendations based on your needs.</p>
      </div>
      <div class="feature-item">
        <h3>AI-Powered Chatbot</h3>
        <p>Instant emotional support and guidance whenever you need it.</p>
      </div>
      <div class="feature-item">
        <h3>Progress Tracking</h3>
        <p>Monitor your mental wellness journey over time.</p>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section id="about" class="about">
  <h2>About MIND-BOOST</h2>
  <p>MIND-BOOST is designed to provide accessible and personalized mental health support using cutting-edge technologies like machine learning and natural language processing.</p>
</section>

<!-- Contact Section -->
 <?php
if (isset($_GET['status']) && isset($_GET['msg'])) {
    $status = htmlspecialchars($_GET['status']);
    $msg = htmlspecialchars($_GET['msg']);
    $color = $status === 'success' ? '#28a745' : '#dc3545';
    echo "<div style='background-color: $color; color: white; padding: 10px; border-radius: 5px; margin-bottom: 15px;'>$msg</div>";
}
?>

<section id="contact" class="contact">
  <h2>Contact Us</h2>
    <!-- In your HTML form -->
    <form class="contact-form" action="submit_contacthome.php" method="POST">
      <input type="text" name="name" placeholder="Your Name" required />
      <input type="email" name="email" placeholder="Your Email" required />
      <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
      <button type="submit">Send Message</button>
    </form>

  </form>
</section>

<!-- Footer -->
<footer>
  <div class="footer-container">
    <div class="footer-about">
      <strong>MIND-BOOST</strong>
      <p>Your companion in mental wellness and self-care.</p>
    </div>
    <ul class="footer-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#features">Features</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <div class="footer-social">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <p>&copy; 2025 <strong>MIND-BOOST</strong>. All rights reserved.</p>
  </div>
</footer>

<!-- JavaScript -->
<script src="static/js/script.js"></script>
<script src="static/js/script2.js"></script>
</body>
</html>


