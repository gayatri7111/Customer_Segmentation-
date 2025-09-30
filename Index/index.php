<?php
session_start();
$loggedIn = isset($_SESSION['email']);
$email = $loggedIn ? $_SESSION['email'] : '';
$userType = $loggedIn ? $_SESSION['user_type'] : '';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer segmentation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/style.css" />
    <style>
      html {
        scroll-behavior: smooth;
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="container">
        <div class="logo">
          <a href="index.html">
            <img src="Images/segmentation.jpg" alt="logo" height="70px" />
          </a>
        </div>

        <div class="main-menu">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a class="btn" href="Login.html"><i class="fas fa-user"></i> Log In</a></li>
          </ul>
        </div>

        <!-- Hamburger Button -->
        <button class="hamburger-button">
          <div class="hamburger-line"></div>
          <div class="hamburger-line"></div>
          <div class="hamburger-line"></div>
        </button>

        <div class="mobile-menu">
          <ul>
            <li><a href="index.html">Home</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero -->
    <section class="hero">
      <div class="container">
        <div class="hero-content">
          <h1 class="hero-heading text-xxl">
            Discover Smarter Customer Insights with Segmentation!
          </h1>
          <p class="hero-text">
            Group customers based on data-driven patterns using our K-Means clustering model. 
            Enhance targeting, increase engagement, and grow your business intelligently.
          </p>

          <?php if ($loggedIn): ?>
            <div style="color: white; font-weight: bold;">
              <?php echo htmlspecialchars($email); ?> (<?php echo ucfirst($userType); ?>)
            </div>
          <?php else: ?>
            <li>
              <a class="btn" href="Login.html"><i class="fas fa-user"></i> Log In</a>
            </li>
          <?php endif; ?>

        </div>
      </div>
    </section>

    <!-- Video Section -->
    <section id="about" class="video bg-black">
      <div class="container-sm">
        <h2 class="video-heading text-xl text-center">
          See Customer Segmentation in Action - Just 2 Minutes to Insights
        </h2>
        <div class="video-content">
          <a href="https://youtu.be/zPJtDohab-g?si=I792yIcmI5unRuvW">
            <img src="Images/video.png" alt="video" class="video-preview" />
          </a>
          <a href="https://www.youtube.com/watch?si=I792yIcmI5unRuvW&v=zPJtDohab-g&feature=youtu.be" class="btn btn-primary">Get Started</a>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials bg-dark">
      <div class="container">
        <h3 class="testimonials-heading text-xl">Real-world Impact of Customer Segmentation</h3>
        <div class="testimonials-grid">
          <div class="card">
            <p>“Using segmentation, we increased campaign conversion by 28%. Understanding our high-value customers made a huge difference.”</p>
            <p>Aarav Shah</p>
            <p>Retail Solutions Ltd.</p>
          </div>
          <div class="card">
            <p>“The K-Means model gave us clarity. We now deliver personalized offers to different customer groups effectively..”</p>
            <p>Emily Tran</p>
            <p>SmartMarket Inc.</p>
          </div>
          <div class="card">
            <p>"We used to market to everyone the same way. Now with segmentation, our sales team knows exactly who to target and how."</p>
            <p>Mohammed Rizwan </p>
            <p>ShopGenie</p>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="faq bg-light">
      <div class="container-sm">
        <h3 class="text-xl text-center">Frequently Asked Questions</h3>
        <ul class="faq-menu">
          <li class="active">All</li>
          <li>Getting Started</li>
          <li>Pricing</li>
        </ul>
        <div class="faq-content">
          <!-- FAQ Items -->
          <div class="faq-group">
            <div class="faq-group-header">
              <h4 class="text-md">How does customer segmentation help me keep track of different types of customers?</h4>
              <i class="fas fa-minus"></i>
            </div>
            <div class="faq-group-body open">
              <p>Customer segmentation enables you to group customers based on similar characteristics, making it easier to understand their needs, preferences, and behaviors for targeted marketing.</p>
            </div>
          </div>
          <div class="faq-group">
            <div class="faq-group-header">
              <h4 class="text-md">Can I customize the clustering to focus on specific customer behaviors or attributes?</h4>
              <i class="fas fa-plus"></i>
            </div>
            <div class="faq-group-body">
              <p>Yes, our tool allows you to choose which attributes (like age, spending score, income) to include in the clustering process.</p>
            </div>
          </div>
          <div class="faq-group">
            <div class="faq-group-header">
              <h4 class="text-md">How does the segmentation dashboard help me track and manage my customer data?</h4>
              <i class="fas fa-plus"></i>
            </div>
            <div class="faq-group-body">
              <p>The dashboard provides visual insights, such as scatter plots and bar charts, so you can easily monitor and compare different customer groups.</p>
            </div>
          </div>
          <div class="faq-group">
            <div class="faq-group-header">
              <h4 class="text-md">Can I collaborate with my team when analyzing segmented data?</h4>
              <i class="fas fa-plus"></i>
            </div>
            <div class="faq-group-body">
              <p>Absolutely. You can export the results and visualizations, which makes it easy to share insights with your team for strategy planning.</p>
            </div>
          </div>
          <div class="faq-group">
            <div class="faq-group-header">
              <h4 class="text-md">Is the tool accessible on all devices?</h4>
              <i class="fas fa-plus"></i>
            </div>
            <div class="faq-group-body">
              <p>Yes, the customer segmentation tool is web-based and works on desktops, tablets, and smartphones.</p>
            </div>
          </div>
          <div class="faq-group">
            <div class="faq-group-header">
              <h4 class="text-md">How does the segmentation tool support businesses working with diverse customer bases?</h4>
              <i class="fas fa-plus"></i>
            </div>
            <div class="faq-group-body">
              <p>It helps businesses identify patterns in customer behavior, allowing for more personalized marketing, better product recommendations, and improved customer satisfaction.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-black">
      <div class="container">
        <div class="footer-grid">
          <div>
            <a href="index.html">
              <img src="Images/segmentation.jpg" alt="logo" height="70px" />
            </a>
            <br /><br />
            <i class="fab fa-linkedin"></i>
            <i class="fab fa-twitter"></i>
          </div>
          <div>
            <h4>Company</h4>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Our Process</a></li>
              <li><a href="#">Join Our Team</a></li>
            </ul>
          </div>
          <div>
            <h4>Resources</h4>
            <ul>
              <li><a href="#">News</a></li>
              <li><a href="#">Research</a></li>
              <li><a href="#">Recent Projects</a></li>
            </ul>
          </div>
          <div>
            <h4>Contact</h4>
            <ul>
              <li><a href="#">hello@segmentapp.com</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/main.js"></script>
  </body>
</html>
