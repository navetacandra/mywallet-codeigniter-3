<style>
    .user-card {
        border-bottom-right-radius: 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 0;
        border-bottom-left-radius: 0;
    }
</style>
<div class="container mt-5">
    <div class="d-flex flex-wrap justify-content-center">
        <div class="col-12 col-md-6">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card bg-dark shadow-lg mb-3 mx-4">
                        <div class="card-body">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item bg-dark text-white shadow-sm">
                                    <div class="d-flex justify-content-center"><img class="rounded-circle shadow-sm profile-image" width="200" height="200" src="https://firebasestorage.googleapis.com/v0/b/photosheets.appspot.com/o/profilePict%2FDefaultUser.jpg?alt=media&token=78c7b801-5793-4ffe-8b7b-cebfc8c0cb33" alt="Profile Image"></div>
                                </li>
                                <li class="list-group-item bg-dark text-white shadow-sm">Nama :<br><?= $this->session->userdata('nama'); ?></li>
                                <li class="list-group-item bg-dark text-white shadow-sm">Nomor Telepon :<br><?= $this->session->userdata('nomor'); ?></li>
                                <li class="list-group-item bg-dark text-white shadow-sm">Email :<br><?= $this->session->userdata('email'); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <div class="card bg-dark text-white user-card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex mb-2">
                            <a href="<?= base_url("income-list") ?>" class="text-white text-decoration-none">
                                <h3 class="card-title me-2">Incomes</h3>
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.8rem" height="1.8rem" fill="#0D6EFD" class="bi bi-box-arrow-in-down-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M9.636 2.5a.5.5 0 0 0-.5-.5H2.5A1.5 1.5 0 0 0 1 3.5v10A1.5 1.5 0 0 0 2.5 15h10a1.5 1.5 0 0 0 1.5-1.5V6.864a.5.5 0 0 0-1 0V13.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                <path fill-rule="evenodd" d="M5 10.5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 0-1H6.707l8.147-8.146a.5.5 0 0 0-.708-.708L6 9.293V5.5a.5.5 0 0 0-1 0v5z" />
                            </svg>
                        </div>
                        <div class="mt-2 ms-2">
                            <h4><?= count($income_transactions); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="card bg-dark text-white user-card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col-8">
                                <div class="d-flex">
                                    <h3 class="card-title me-2">Ballance</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="#f72a2a" class="bi bi-wallet" viewBox="0 0 16 16">
                                        <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-end">
                                    <div class="text-center col ms-5" style="height: 1rem; margin-top: 1rem;">
                                        <a class="text-decoration-none text-center text-white" href="<?= base_url("topup") ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2rem" height="1.2rem" fill="#3bef2b" class="bi bi-plus-lg text-center" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                                            </svg>
                                            <p class="fs-6 text-center" style="color: #3bef2b;">TopUp</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 ms-2">
                            <h4>Rp. <?= $ballance; ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="card bg-dark text-white user-card shadow-lg">
                    <div class="card-body">
                        <div class="d-flex mb-2">
                            <a href="<?= base_url("expense-list") ?>" class="text-white text-decoration-none">
                                <h3 class="card-title me-2">Expenses</h3>
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="#0D6EFD" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                            </svg>
                        </div>
                        <div class="mt-2 ms-2">
                            <h4><?= count($expense_transactions); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>