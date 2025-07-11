<!DOCTYPE html>
<html lang="en">
<head>
  <title>UniLink - Login</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      min-height: 100vh;
      animation: fadeInBg 1s ease;
    }

    @keyframes fadeInBg {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .login-box {
      background: rgba(255,255,255,0.95);
      padding: 48px 36px 36px 36px;
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(44,62,80,0.12);
      width: 400px;
      text-align: center;
      position: relative;
      animation: fadeInUp 0.8s cubic-bezier(.68,-0.55,.27,1.55);
    }

    @keyframes fadeInUp {
      from { transform: translateY(40px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .login-box img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      margin-bottom: 18px;
      object-fit: cover;
      border: 2.5px solid #2980b9;
      box-shadow: 0 2px 8px rgba(44,62,80,0.08);
      background: #f4f6f9;
    }

    .login-box h1 {
      margin-bottom: 22px;
      color: #2c3e50;
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 1.5px;
      text-shadow: 0 1px 0 #fff;
    }


    .login-box input,
    .login-box button {
      width: 100%;
      box-sizing: border-box;
      display: block;
    }
    .login-box input {
      padding: 13px 14px;
      margin-bottom: 16px;
      border: 1.5px solid #b2bec3;
      border-radius: 8px;
      font-size: 15px;
      background: #f8fafc;
      transition: border-color 0.2s;
      box-shadow: 0 1px 2px rgba(44,62,80,0.04);
    }
    .login-box input:focus {
      border-color: #2980b9;
      outline: none;
      background: #eaf6fb;
    }
    .login-box button {
      padding: 13px;
      margin-bottom: 0;
      background: linear-gradient(90deg, #2980b9 0%, #6dd5fa 100%);
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 16px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(44,62,80,0.08);
      transition: background 0.2s, box-shadow 0.2s;
    }
    .login-box button:hover {
      background: linear-gradient(90deg, #1f618d 0%, #2980b9 100%);
      box-shadow: 0 4px 16px rgba(44,62,80,0.12);
    }

    .login-box form {
      margin-top: 10px;
    }

    .login-box .footer {
      margin-top: 18px;
      font-size: 13px;
      color: #7f8c8d;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <img src="/logo.png" alt="UniLink Logo" />
    <h1>UniLink Login</h1>
    <form action="{{ route('login.submit') }}" method="post">
      @csrf
      <input type="text" name="student_staff_id" placeholder="Student/Staff ID" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
    <div class="footer">&copy; {{ date('Y') }} UniLink. All rights reserved.</div>
  </div>

  
</body>
</html>
