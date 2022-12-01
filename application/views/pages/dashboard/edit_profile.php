<style>
    .edit-input {
        border-radius: 20px;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
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
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card my-3 p-0 bg-dark shadow-lg">
                <div class="card-body">
                    <h3 class="card-title text-center">Edit Profile</h3>
                    <form action="<?= base_url('edit-profile'); ?>" method="post">
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item bg-dark text-white">
                                <div class="d-flex justify-content-center"><img class="rounded-circle shadow-sm profile-image" width="200" height="200" src="https://firebasestorage.googleapis.com/v0/b/photosheets.appspot.com/o/profilePict%2FDefaultUser.jpg?alt=media&token=78c7b801-5793-4ffe-8b7b-cebfc8c0cb33" alt="Profile Image"></div>
                            </li>
                            <li class="list-group-item bg-dark text-white">Nama :
                                <br />
                                <input type="text" name="nama" id="nama" value="<?= $this->session->userdata('nama'); ?>" class="form-control edit-input mt-2 bg-transparent text-white" />
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white">Nomor Telepon :
                                <br />
                                <input type="number" name="nomor" id="nomor" value="<?= $this->session->userdata('nomor'); ?>" class="form-control edit-input mt-2 bg-transparent text-white" />
                                <?= form_error('nomor', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white">Email :
                                <br />
                                <input type="email" name="email" id="email" value="<?= $this->session->userdata('email'); ?>" class="form-control edit-input mt-2 bg-transparent text-white" readonly />
                            </li>
                            <li class="list-group-item bg-dark text-white">
                                <button type="submit" class="text-uppercase btn btn-primary" style="width: 80%; border-radius: 20px;">edit</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>