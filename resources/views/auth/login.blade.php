<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Fundclaim Bank</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }

    body {
      margin: 0;
      min-height: 100vh;
      background: linear-gradient(135deg, #003682, #0a1f3d);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-card {
      background: #ffffff;
      width: 100%;
      max-width: 400px;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    }

    .login-card h1 {
      text-align: center;
      color: #0a1f3d;
      margin-bottom: 0.5rem;
    }

    .login-card p {
      text-align: center;
      color: #666;
      font-size: 0.95rem;
      margin-bottom: 2rem;
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

    input {
      width: 100%;
      padding: 0.8rem;
      font-size: 1rem;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    input:focus {
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

    .footer-links {
      margin-top: 1.8rem;
      text-align: center;
      font-size: 0.85rem;
    }

    .footer-links a {
      color: #00aaff;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h1>Welcome Back</h1>
    <p>Login to your Fundclaim Bank account</p>

    <form id="loginForm">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Enter Email" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="••••••••" required>
      </div>

      <button type="submit">Login</button>

      <div id="formMessage" class="message"></div>
    </form>

    <div class="footer-links">
      Don’t have an account?
      <a href="{{ route('show.register') }}">Create one</a>
    </div>
  </div>

  <script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const name = document.getElementById("name").value.trim();
      const password = document.getElementById("password").value;
      const message = document.getElementById("formMessage");

      if (!name || !password) {
        message.innerHTML = "<span class='error'>Please enter your name and password.</span>";
        return;
      }

      // Simulated login check
      message.innerHTML = "<span class='success'>Login successful! Redirecting...</span>";

      setTimeout(() => {
        window.location.href = "../dashboard/index.html";
      }, 1500);
    });
  </script>

</body>
</html>
