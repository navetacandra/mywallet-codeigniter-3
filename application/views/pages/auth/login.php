<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h3 class="h3 mb-4 card-title text-center text-uppercase">login</h3>
                    <?php if ($this->session->flashdata('success_msg')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('success_msg') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error_msg')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $this->session->flashdata('error_msg') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>
                    <form action="" class="form" method="post">
                        <div class="mb-3">
                            <label for="email" class="d-none">Email</label>
                            <input class="form-control" name="email" id="email" type="email" value="<?= set_value('email') ?>" placeholder="Alamat Email.." />
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="d-none">Password</label>
                            <input class="form-control" name="password" id="password" type="password" placeholder="Password.." />
                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-danger text-uppercase">login</button>
                        </div>
                    </form>
                    <hr />
                    <span class="text-sm">
                        <a href="<?= base_url('register') ?>">Belum punya akun? Daftar disini!</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>