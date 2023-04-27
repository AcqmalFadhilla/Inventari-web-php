<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Inventaris</a>

        <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <?php if($model['user']['status'] == "Admin"){ ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php }?>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/datas/create">Data From</a>
                </li>
                <?php if($model['user']["status"]){?>
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
                            <?= $model['user']['nama'] ?>
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
<!--offcanvas-->
<div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">Database</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a class="btn" href="/databases/jenis" role="button">Jenis</a>
                        <!--end-->
                </li>
                <li class="list-group-item">
                    <a class="btn" href="/databases/merek" role="button">Merek</a>
                </li>
                <li class="list-group-item">
                    <a class="btn" href="/databases/gudang" role="button">Gudang</a>
                </li>
                <li class="list-group-item">
                    <a class="btn" href="/databases/rak" role="button">Rak</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--offcanvas end-->

<!--table-->
<!--jenis-->
<div class="card mt-3 mx-3">
    <div class="card-body">
        <h3 class="text-center">Database jenis</h3>
        <table id="" class="display" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model['dataJenis'] as $item): ?>
            <tr>
                <td><?= $item['id_jenis'];?></td>
                <td><?= $item['nama_jenis'];?></td>
                <td>
                    <div class="d-flex justify-content-center align-item-center">
<!--                        <div class="me-2">-->
<!--                            <a href="/datas/update/>" class="btn btn-warning">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">-->
<!--                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>-->
<!--                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </div>-->
                        <div class="mx-2">
                            <a href="/deleteJenis?id=<?= $item["id_jenis"]?>"  class="btn btn-danger" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<!--jenis end-->
<!--merek-->
<div class="card mt-3 mx-3">
    <div class="card-body">
        <h3 class="text-center">Database Merek</h3>
        <table id="" class="display" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model['dataMerek'] as $item): ?>
            <tr>
                <td><?= $item["id_merek"]; ?></td>
                <td><?= $item["nama_merek"]; ?></td>
                <td>
                    <div class="d-flex justify-content-center align-item-center">
<!--                        <div class="me-2">-->
<!--                            <a href="/datas/update/>" class="btn btn-warning">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">-->
<!--                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>-->
<!--                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </div>-->
                        <div class="mx-2">
                            <a href="/deleteMerek?id=<?= $item["id_merek"]?>"  class="btn btn-danger" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<!--merek end-->
<!--gudang-->
<div class="card mt-3 mx-3">
    <div class="card-body ">
        <h3 class="text-center">Database Gudang</h3>
        <table id="" class="display" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model["dataGudang"] as $item): ?>
            <tr>
                <td><?= $item['id_gudang'];?></td>
                <td><?= $item['nama_gudang'];?></td>
                <td>
                    <div class="d-flex justify-content-center align-item-center">
<!--                        <div class="me-2">-->
<!--                            <a href="/datas/update/>" class="btn btn-warning">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">-->
<!--                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>-->
<!--                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </div>-->
                        <div class="mx-2">
                            <a href="/deleteGudang?id=<?= $item["id_gudang"]?>"  class="btn btn-danger" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

<!--gudang end-->
<!--rak-->
<div class="card mt-3 mx-3">
    <div class="card-body">
        <h3 class="text-center">Database rak</h3>
        <table id="" class="display" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($model['dataRak'] as $item): ?>
            <tr>
                <td><?= $item['id_rak'];?></td>
                <td><?= $item['nama_rak'];?></td>
                <td>
                    <div class="d-flex justify-content-center align-item-center">
<!--                        <div class="me-2">-->
<!--                            <a href="/datas/update/>" class="btn btn-warning">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">-->
<!--                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>-->
<!--                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                        </div>-->
                        <div class="mx-2">
                            <a href="/deleteRak?id=<?= $item["id_rak"]?>"  class="btn btn-danger" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<!--rak end-->

<!--script-->
<script>
    $(document).ready(function () {
        $('table.display').DataTable();
    });

    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>
