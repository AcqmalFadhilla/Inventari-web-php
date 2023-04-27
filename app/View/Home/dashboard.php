

<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3" xmlns="http://www.w3.org/1999/html">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Inventaris</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/datas/create">Data From</a>
                </li>
                <?php if($model["status"] == "Admin") {?>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/users/register">Registrasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/databases/database">Database</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <div class="dropdown dropstart">
                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $model['name'] ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/users/profile">Profile</a></li>
                            <li><a class="dropdown-item" href="/users/password">Password</a></li>
                            <li><a class="dropdown-item text-danger" href="/users/logout">keluar</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--dasboard-->
<div class="card mt-3 mx-3">
    <div class="card-body">
        <h3 class="text-center">Barang</h3>
        <table id="myTable" class="display" style="width:100%">
            <thead>
            <tr>
<!--                <th class="text-center" colspan="5">ID</th>-->
                <th class="text-center">Id-Jenis</th>
                <th class="text-center">Id-Merek</th>
                <th class="text-center">Id-Id-Ruangan</th>
                <th class="text-center">Id-Rak</th>
                <th class="text-center">Id-Barang</th>
                <th class="text-center" >Nama Barang</th>
                <th class="text-center" >Status</th>
                <th class="text-center"></th>
            </tr>
<!--            <tr>-->
<!--             -->
<!--            </tr>-->
            </thead>
            <tbody>
            <?php foreach($model["dataBarang"] as $item): ?>
                <tr>
                    <td><?= $item["id_jenis"]?></td>
                    <td><?= $item["id_merek"]?></td>
                    <td><?= $item["id_gudang"]?></td>
                    <td><?= $item["id_rak"]?></td>
                    <td><?= $item["id_barang"]?></td>
                    <td><?= $item["nama_barang"]?></td>
                    <td><?= $item["status"]?></td>
                    <td>
                        <div class="d-flex justify-content-center align-item-center">
                            <div class="me-2">
                                <a href="/datas/update?id=<?= $item["id_barang"]?>" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="mx-2">
                                <a href="/hapus?id=<?= $item["id_barang"]?>"  class="btn btn-danger" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </a>
                            </div>
<!--                            <div class="ms-2">-->
<!--                                <a href="#" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdropScan">-->
<!--                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-qr-code-scan" viewBox="0 0 16 16">-->
<!--                                        <path d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0v-3Zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5ZM.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5Zm15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5ZM4 4h1v1H4V4Z"/>-->
<!--                                        <path d="M7 2H2v5h5V2ZM3 3h3v3H3V3Zm2 8H4v1h1v-1Z"/>-->
<!--                                        <path d="M7 9H2v5h5V9Zm-4 1h3v3H3v-3Zm8-6h1v1h-1V4Z"/>-->
<!--                                        <path d="M9 2h5v5H9V2Zm1 1v3h3V3h-3ZM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8H8Zm2 2H9V9h1v1Zm4 2h-1v1h-2v1h3v-2Zm-4 2v-1H8v1h2Z"/>-->
<!--                                        <path d="M12 9h2V8h-2v1Z"/>-->
<!--                                    </svg>-->
<!--                                </a>-->
<!--                            </div>-->
                        </div>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <th class="text-center">Jenis</th>
                <th class="text-center">Merek</th>
                <th class="text-center">Ruangan</th>
                <th class="text-center">Rak</th>
                <th class="text-center">Barang</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Status</th>
                <th class="text-center">Status</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<!--dashboard end-->
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>


