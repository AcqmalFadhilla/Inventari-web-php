<!-- Alert danger-->
<?php if(isset($model["error"])) {?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div><?=  $model['error']?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }?>
<!-- Alet danger end-->

<div class="d-flex justify-content-center align-items-center">

    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 ">
        <!--card from-->
        <div class="card mt-5">
            <!--card body-->
            <div class="card-body py-5 px-md-5">
                <h1 class="text-center">Update Data</h1>
                <form method="post" action="/datas/update?id=<?= $model["data"]["id_barang"];?>" class="row g-3">
                    <!--id jenis-->
                    <div class="col-md-6">
                        <label for="id_jenis" class="form-label">Id-jenis</label>
                        <select name="id_jenis" id="id_jenis" class="form-select">
                            <option selected><?= $model["data"]["id_jenis"]?></option>
                            <?php foreach($model["dataJenis"] as $item){
                                echo '<option value="'.$item["id_jenis"].'">';
                                echo $item['id_jenis'];
                                echo '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!--id jenis end-->
                    <!--id merek-->
                    <div class="col-md-6">
                        <label for="id_merek" class="form-label">Id-merek</label>
                        <select name="id_merek" id="id_merek" class="form-select">
                            <option selected><?= $model["data"]["id_merek"]?></option>
                            <?php foreach($model['dataMerek'] as $item){
                                echo '<option value="'.$item['id_merek'].'">';
                                echo $item['id_merek'];
                                echo '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!--id merek end-->
                    <!--id gudang-->
                    <div class="col-md-6">
                        <label for="id_gudang" class="form-label">Id-gudang</label>
                        <select name="id_gudang" id="id_gudang" class="form-select">
                            <option selected><?= $model["data"]["id_gudang"]?></option>
                            <?php foreach($model["dataGudang"] as $item){
                                echo '<option value="'.$item['id_gudang'].'">';
                                echo $item['id_gudang'];
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!--id gudang end-->
                    <!--id rak-->
                    <div class="col-md-6">
                        <label for="id_rak" class="form-label">Id-rak</label>
                        <select name="id_rak" id="id_rak" class="form-select">
                            <option selected ><?= $model["data"]["id_rak"]?></option>
                            <?php foreach($model["dataRak"] as $item){
                                echo '<option value="'.$item['id_rak'].'">';
                                echo $item["id_rak"];
                                echo "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <!--id rak end-->
                    <!--id barang-->
                    <div class="col-md-12">
                        <label for="id_barang" class="from-label">Id-barang</label>
                        <input value="<?= $model["data"]["id_barang"]?>" name="id_barang" type="text" class="form-control" placeholder="Masukkan id barang">
                    </div>
                    <!--id barang end-->
                    <!--nama barang-->
                    <div class="col-md-12">
                        <label for="nama_barang" class="from-label">Nama barang</label>
                        <input value="<?= $model['data']["nama_barang"];?>" name="nama_barang" type="text" class="form-control" placeholder="Masukkan nama barang">
                    </div>
                    <!--nama barang end-->
                    <!--status-->
                    <div class="col-md-12">
                        <label for="status" class="from-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option selected><?= $model["data"]["status"]?></option>
                            <option value="Bagus">Bagus</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                    <!--status end-->
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <a  href="/" type="button" class="btn btn-dark">Close</a>
                        <button type="submit" class="btn btn-warning"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>