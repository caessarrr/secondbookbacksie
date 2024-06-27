<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard Seller</div>

                    <div class="card-body">
                        <p>Selamat datang, {{ auth()->guard('seller')->user()->name }}!</p>
                        <!-- Tambahkan konten dashboard sesuai kebutuhan -->
                        
                        <!-- Tombol untuk logout -->
                        <form id="logout-form" action="{{ route('seller.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>