<!DOCTYPE html>
<html lang="en">
<head>
  <title>UniLink - Login</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background-color: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 420px;
      text-align: center;
      align-content: center;
    }

    .login-box img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-bottom: 20px;
      object-fit: cover;
      border: 2px solid #2980b9;
    }

    .login-box h1 {
      margin-bottom: 25px;
      color: #2c3e50;
    }

    .login-box input {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    .login-box button {
      width: 300px;
      padding: 12px;
      background-color: #2980b9;
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      font-size: 15px;
      cursor: pointer;
    }

    .login-box button:hover {
      background-color: #1f618d;
    }

  </style>
</head>
<body>
  <div class="login-box">
    <img src="/logo.png" alt="UniLink Logo" />
    <h1 style="font-family:'Segoe UI',sans-serif;font-weight:700;letter-spacing:1px;">UniLink Login</h1>
    <form action="{{ route('login.submit') }}" method="post">
      @csrf
      <input type="text" name="student_staff_id" placeholder="Student/Staff ID" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>

  
</body>
</html>
