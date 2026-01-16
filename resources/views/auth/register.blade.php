<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Account | Fundclaim Bank</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>


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


.input-with-icon {
  position: relative;
}

.input-with-icon input {
  width: 100%;
  padding-right: 44px;
  box-sizing: border-box;
}

.eye-icon {
  position: absolute;
  right: 12px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  color: #777;
}

.eye-icon:hover {
  color: #000;
}


  </style>
</head>
<body>

  <div class="register-card">
    <h1>Create Account</h1>
    <p>Open your Fundclaim Bank account in seconds</p>
<form method="POST" action="{{ route('register.submit') }}">
  @csrf

  <div class="form-group">
    <label for="name">Full Name</label>
    <input
      type="text"
      id="name"
      name="name"
      value="{{ old('name') }}"
      required
      placeholder="Enter Full Name"
    >
    @error('name')
      <span class="error">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input
      type="email"
      id="email"
      name="email"
      value="{{ old('email') }}"
      required
      placeholder="Enter Email"
    >
    @error('email')
      <span class="error">{{ $message }}</span>
    @enderror
  </div>

  <div class="form-group">
    <label for="country">Country</label>
    <input
      type="text"
      id="country"
      name="country"
      value="{{ old('country') }}"
      required
      placeholder="Enter Country"
    >
    @error('country')
      <span class="error">{{ $message }}</span>
    @enderror
  </div>

  <!-- Password -->
  <div class="form-group">
    <label for="password">Password</label>
    <div class="input-with-icon">
      <input
        type="password"
        id="password"
        name="password"
        required
        minlength="6"
        placeholder="••••••••"
      >
      <i class="fa-solid fa-eye eye-icon" onclick="togglePassword('password', this)"></i>
    </div>
    @error('password')
      <span class="error">{{ $message }}</span>
    @enderror
  </div>

  <!-- Confirm Password -->
  <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <div class="input-with-icon">
      <input
        type="password"
        id="password_confirmation"
        name="password_confirmation"
        required
        minlength="6"
        placeholder="••••••••"
      >
      <i class="fa-solid fa-eye eye-icon" onclick="togglePassword('password_confirmation', this)"></i>
    </div>
  </div>

  <button type="submit">Register</button>

  <!-- Success / General Message -->
  @if(session('success'))
    <div class="success">{{ session('success') }}</div>
  @endif

  <!-- Optional form message for errors -->
  @if($errors->any())
    <div class="error">
      Please fix the errors above and try again.
    </div>
  @endif
</form>



<!-- Optional CSS for Errors -->
<style>
.error {
  color: #b00020;
  font-size: 0.85rem;
  margin-top: 0.25rem;
  display: block;
}

.success {
  color: #155724;
  font-size: 0.9rem;
  margin-top: 0.5rem;
  text-align: center;
}
</style>





    <div class="footer-link">
      Already have an account? <a href="{{ route('login') }}">Login</a>
    </div>
  </div>

  <script>
function togglePassword(inputId, icon) {
  const input = document.getElementById(inputId);

  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    input.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}
</script>


</body>
<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'd13000971d4e1970e558ab70fb3b2168792ebe75';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
</html>
