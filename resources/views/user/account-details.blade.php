<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Akun Berhasil Dibuat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
          <div class="card-body p-4">

            <div class="text-center mb-4">
              <h5 class="text-primary fw-bold mb-0">PT Concord Consulting Indonesia</h5>
            </div>

            <p class="mb-3">Akun Anda berhasil dibuat. Berikut detail login Anda:</p>

            <ul class="list-group mb-4">
              <li class="list-group-item"><strong>Email:</strong> {{ $email }}</li>
              <li class="list-group-item"><strong>Password:</strong> {{ $password }}</li>
            </ul>

            <p class="mb-4 fw-bold">Silakan login dan segera ubah password Anda untuk menjaga keamanan akun.</p>

            <hr>

            <p class="text-muted small mb-0">
              Terima kasih telah bergabung bersama kami.<br>
              Salam hangat,<br>
              <strong>PT Concord Consulting Indonesia</strong>
            </p>

          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
