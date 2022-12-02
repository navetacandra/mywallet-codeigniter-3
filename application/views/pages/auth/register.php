<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mt-5">
            <div class="card bg-dark shadow-lg">
                <div class="card-body">
                    <h3 class="h3 mb-4 card-title text-center text-uppercase text-white">register</h3>
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
                    <form action="<?= base_url('register'); ?>" class="form" method="post">
                        <div class="mb-3">
                            <label for="nama" class="d-none">Nama</label>
                            <input class="form-control bg-transparent text-white" name="nama" id="nama" type="text" value="<?= set_value('nama') ?>" placeholder="Nama.." />
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="nomor" class="d-none">Nomor Telepon</label>
                            <input class="form-control bg-transparent text-white" name="nomor" id="nomor" type="number" value="<?= set_value('nomor') ?>" placeholder="Nomor Telepon.." />
                            <?= form_error('nomor', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="d-none">Email</label>
                            <input class="form-control bg-transparent text-white" name="email" id="email" type="email" value="<?= set_value('email') ?>" placeholder="Alamat Email.." />
                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-6 mb-3">
                                <label for="password1" class="d-none">Password1</label>
                                <input class="form-control bg-transparent text-white" name="password1" id="password1" type="password" value="<?= set_value('password1') ?>" placeholder="Password.." />
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password2" class="d-none">Password2</label>
                                <input class="form-control bg-transparent text-white" name="password2" id="password2" type="password" value="<?= set_value('password2') ?>" placeholder="Repeat Password.." />
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-danger text-uppercase">register</button>
                        </div>
                    </form>
                    <hr />
                    <span class="text-sm">
                        <a href="<?= base_url('login') ?>">Punya akun? Masuk disini!</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>