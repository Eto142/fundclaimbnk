<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Account | Fundclaim Bank</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      margin: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #0a1f3d, #003682);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .register-card {
      background: #ffffff;
      width: 100%;
      max-width: 420px;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    .register-card h1 {
      text-align: center;
      margin-bottom: 0.5rem;
      color: #0a1f3d;
    }

    .register-card p {
      text-align: center;
      margin-bottom: 2rem;
      color: #666;
      font-size: 0.95rem;
    }

    .form-group {
      margin-bottom: 1.4rem;
    }

    label {
      display: block;
      margin-bottom: 0.4rem;
      font-weight: 600;
      font-size: 0.9rem;
    }

    input, select {
      width: 100%;
      padding: 0.8rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    input:focus, select:focus {
      outline: none;
      border-color: #00aaff;
      box-shadow: 0 0 0 2px rgba(0,170,255,0.2);
    }

    button {
      width: 100%;
      padding: 0.9rem;
      background: #0a1f3d;
      color: #fff;
      font-size: 1.05rem;
      font-weight: 600;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #00aaff;
    }

    .message {
      margin-top: 1rem;
      text-align: center;
      font-size: 0.9rem;
    }

    .success {
      color: #155724;
    }

    .error {
      color: #b00020;
    }

    .footer-link {
      margin-top: 1.8rem;
      text-align: center;
      font-size: 0.85rem;
    }

    .footer-link a {
      color: #00aaff;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <div class="register-card">
    <h1>Create Account</h1>
    <p>Open your Fundclaim Bank account in seconds</p>

    <form id="registerForm">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" required placeholder="Enter Full Name">
      </div>

       <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" required placeholder="Enter Email">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" required minlength="6" placeholder="••••••••">
      </div>

      <div class="form-group">
        <label for="country">Country</label>
        <select id="country" required>
          <option value="">Select country</option>
          <option>United States</option>
          <option>United Kingdom</option>
          <option>Canada</option>
          <option>South Africa</option>
          <option>Australia</option>
          <option>Other</option>
        </select>
      </div>

      <button type="submit">Register</button>

      <div id="formMessage" class="message"></div>
    </form>

    <div class="footer-link">
      Already have an account? <a href="{{ route('login') }}">Login</a>
    </div>
  </div>

  <script>
    document.getElementById("registerForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const name = document.getElementById("name").value.trim();
      const password = document.getElementById("password").value;
      const country = document.getElementById("country").value;
      const message = document.getElementById("formMessage");

      if (!name || !password || !country) {
        message.innerHTML = "<span class='error'>Please fill in all fields.</span>";
        return;
      }

      // Simulated success response
      message.innerHTML = "<span class='success'>Registration successful! Redirecting...</span>";

      setTimeout(() => {
        window.location.href = "../login/index.html";
      }, 1500);
    });
  </script>

</body>
</html>
