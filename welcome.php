<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Simple Page with Logout</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    /* Navbar */
    .navbar {
      background-color: #333;
      color: white;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar .nav-left,
    .navbar .nav-right {
      display: flex;
      align-items: center;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      margin-left: 15px;
    }

    .navbar a:hover {
      text-decoration: underline;
    }

    .logout-btn {
      background-color: #f44336;
      color: white;
      border: none;
      padding: 8px 15px;
      margin-left: 15px;
      cursor: pointer;
      border-radius: 4px;
    }

    .logout-btn:hover {
      background-color: #d32f2f;
    }

    /* Main Content */
    .content {
      padding: 20px;
      min-height: 70vh;
    }

    /* Footer */
    .footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 15px 0;
      position: relative;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="navbar">
    <div class="nav-left">
      <div class="logo">MySite</div>
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </div>
    <div class="nav-right">
      <form action="logout.php" method="POST">
        <button class="logout-btn" type="submit">Logout</button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h1>Welcome to My Simple Page</h1>
    <p>This is a basic layout with a navbar, footer, and a logout button.</p>
  </div>

  <!-- Footer -->
  <div class="footer">
    &copy; 2025 MySite. All rights reserved.
  </div>
</body>
</html>
