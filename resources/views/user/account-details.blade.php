<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Akun Berhasil Dibuat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      padding: 20px;
    }
    .email-container {
      background-color: #ffffff;
      border: 1px solid #dee2e6;
      padding: 30px;
      border-radius: 10px;
      max-width: 600px;
      margin: auto;
    }
    .logo {
      max-height: 60px;
      margin-bottom: 15px;
    }
    .header-text {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #0d6efd;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <!-- Header Logo & Nama Perusahaan -->
    <div class="text-center mb-4">
      <img src="../assets/img/logo.jpg" alt="Logo PT Concord Consulting Indonesia" class="logo">
      <div class="header-text">PT Concord Consulting Indonesia</div>
    </div>

    <p>Akun Anda berhasil dibuat. Berikut detail login Anda:</p>

    <ul class="list-group mb-4">
      <li class="list-group-item"><strong>Email:</strong> {{ $email }}</li>
      <li class="list-group-item"><strong>Password:</strong> {{ $password }}</li>
    </ul>

    <h6>Silakan login dan segera ubah password Anda untuk menjaga keamanan akun.</h6>

    <hr class="my-4">

    <p class="text-muted">Terima kasih telah bergabung bersama kami.<br>Salam hangat,<br><strong>PT Concord Consulting Indonesia</strong></p>
  </div>
</body>
</html>