<?php
// Optional session if needed in the future
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us - MIND BOOST</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="static/css/styles.css?=v2">
  <style>
    .feedback-message {
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      color: #fff;
      font-weight: 500;
      text-align: center;
    }

    .feedback-message.success {
      background-color: #28a745;
    }

    .feedback-message.error {
      background-color: #dc3545;
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

<!-- Contact Section -->
<main id="page-content" class="container" style="padding-top: 100px; padding-bottom: 40px;">
  <section id="contact-content" class="contact-page-section" style="text-align: center;">
    <h1 style="font-size: 2.5rem; margin-bottom: 2rem; color: var(--primary-light);">Contact Us</h1>

    <div style="max-width: 800px; margin: 0 auto; background: var(--medium-dark); padding: 2rem; border-radius: 10px; box-shadow: var(--shadow); text-align: left;">
      
      <!-- Feedback Message -->
      <?php
      if (isset($_GET['status']) && isset($_GET['msg'])) {
          $status = htmlspecialchars($_GET['status']);
          $message = htmlspecialchars($_GET['msg']);
          $class = $status === 'success' ? 'success' : 'error';
          echo '<div class="feedback-message ' . $class . '">' . $message . '</div>';
      }
      ?>

      <p style="color: var(--light-gray); margin-bottom: 1.5rem; text-align: center;">
        We'd love to hear from you! Whether you have questions, feedback, or partnership inquiries, please don't hesitate to reach out.
      </p>

      <form class="contact-form" action="submit_contact.php" method="POST">
        <div class="input-group">
          <input type="text" id="name" name="name" placeholder=" " required>
          <label for="name">Full Name</label>
        </div>

        <div class="input-group">
          <input type="email" id="email" name="email" placeholder=" " required>
          <label for="email">Email Address</label>
        </div>

        <div class="input-group">
          <textarea id="message" name="message" rows="5" placeholder=" " required></textarea>
          <label for="message">Message</label>
        </div>

        <button type="submit">Send Message</button>
      </form>

      <div class="contact-details" style="margin-top: 3rem; text-align: center; color: var(--light-gray);">
        <p>Alternatively, you can reach us at:</p>
        <p><strong>Email:</strong> support@mindboost.example.com</p>
        <p><strong>Phone:</strong> +1 (555) 123-4567</p>
        <p><strong>Address:</strong> 123 Wellness Drive, Innovation City, Tech State</p>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<footer>
  <div class="footer-container">
    <div class="footer-about">
      <strong>MIND-BOOST</strong>
      <p>Your companion in mental wellness and self-care.</p>
    </div>
    <ul class="footer-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="features.html">Features</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="contact.php">Contact</a></li>
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
