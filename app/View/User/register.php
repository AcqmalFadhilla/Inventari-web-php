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
                <h1 class="text-center">Registrasi</h1>
                <form method="post" action="/users/register">
                    <!-- id input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="name">Id</label>
                        <input name="id" type="text" id="id"  class="form-control form-control-lg"
                               placeholder="Masukan Id" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input name="email" type="email" id="email"  class="form-control form-control-lg"
                               placeholder="Masukan Email" />
                    </div>

                    <!-- status input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Status</label>
                        <select name="status" id="status" class="form-select form-select-lg mb-3">
                            <option selected>Status</option>
                            <option value="Admin">Admin</option>
                            <option value="Asisten">Asisten</option>
                            <option value="CA">Calon Asisten</option>
                        </select>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control form-control-lg"
                               placeholder="Masukan password" />
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <a  href="/" type="button" class="btn btn-dark">Close</a>
                        <button type="submit" class="btn btn-warning"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>