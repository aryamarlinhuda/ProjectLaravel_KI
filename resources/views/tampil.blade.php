<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Berhasil Login</title>
        
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h3>Login Berhasil</h3>
                            <h5 class="my-4">Data Yang Di Input : </h5>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $data->email }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Password</td>
                                    <td>{{ $data->password }}</td>
                                </tr>
                            </table>
                            <a href="/masuk" class="btn btn-primary">Logout</a>
                            <a href="/informasi" class="btn btn-primary">Selanjutnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>