<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card mt-5 mx-auto w-25">
            <div class="card-body">
                <h1 class="text-center mb-4"><?= $title ?></h1>
                
                <?php if(!empty(session()->getFlashData('message'))): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashData('message') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <form action="login_action" method="post">
                    <div class="mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-4"> <!-- Increased bottom margin for spacing -->
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required> <!-- Added required attribute -->
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Masuk</button> <!-- Full-width button -->
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>