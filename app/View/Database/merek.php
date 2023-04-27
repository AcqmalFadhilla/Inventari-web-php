<!-- css -->
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
<!--css end-->
<!-- alert -->
<?php if(isset($model["error"])) {?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div><?=  $model['error']?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }?>

<!-- alert end -->
<section class="vh-100 mx-auto" style="background-color: hsl(0, 0%, 96%)">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <!--card from-->
                <div class="card">
                    <!--card body-->
                    <div class="card-body py-5 px-md-5">
                        <form method="post" action="/databases/merek">
                            <h3 class="text-center">Create Merek</h3>
                            <!-- id input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="id_merek">Id Merek</label>
                                <input type="text" name="id_merek" id="id_merek" class="form-control form-control-lg"
                                       placeholder="Masukan Id merek" value="<?= $_POST["id_merek"] ?? "" ?>"/>
                            </div>

                            <!-- nama input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="nama_merek">Nama merek</label>
                                <input type="text" name="nama_merek" id="nama_merek" class="form-control form-control-lg"
                                       placeholder="Masukan nama merek" value="<?= $_POST["nama_merek"] ?? "" ?>"/>
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <a  href="/databases/database" type="button" class="btn btn-dark">Close</a>
                                <button type="submit" class="btn btn-warning "
                                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
