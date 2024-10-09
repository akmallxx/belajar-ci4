<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambahModal">
        Tambah Data
    </button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($users as $usr): ?>
        <?php $modalId = $no; // Simpan nomor sebelum increment ?>
            <tr>
                <th scope="col"><?= $no++ ?></th>
                <td><?= $usr['username'] ?></td>
                <td><?= $usr['password'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $modalId ?>">
                        Edit
                    </button>
                    <!-- Tombol delete dengan SweetAlert2 -->
                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $usr['id'] ?>)">Delete</button>
                </td>
            </tr>

            <div class="modal fade" id="editModal<?= $modalId ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form  method="post" action="<?= base_url('home/update/'. $usr['id']) ?>">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input class="form-control" type="text" name="username" value="<?= $usr['username'] ?>" required />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="password" value="<?= $usr['password'] ?>" required />
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <!-- Tambah data modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form  method="post" action="<?= base_url('home/store')?>">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" required />
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end tambah data modal -->

    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script SweetAlert2 untuk konfirmasi delete -->
    <script>
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('home/delete/') ?>" + userId;
                }
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
