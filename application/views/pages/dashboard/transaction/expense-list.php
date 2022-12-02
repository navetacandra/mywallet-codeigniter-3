<div class="container mt-5 text-white">
    <h2 class="text-center mb-5">Expenses List</h2>
    <div class="row justify-content-center">
        <?php if (count($expense_transactions) > 0) { ?>
            <?php foreach ($expense_transactions as $expense) : ?>
                <div class="col-10 col-md-8 mb-3">
                    <div class="card bg-dark shadow-lg">
                        <div class="card-body mb-1">
                            <div class="card-title mb-1 mx-3">
                                <div class="d-flex">
                                    <h4 class="me-2"><?= $expense['name']; ?></h4>
                                    <span class="badge bg-<?= ($expense['type'] == "debit" ? "primary" : "warning"); ?>" style="max-height: 1.25rem;">
                                        <?= $expense['type'] ?>
                                    </span>
                                    <div class="ms-auto me-2" style="margin-top: -.5rem;">
                                        <div class="row">
                                            <a href="<?= base_url("print-expense-invoice/" . $expense['id']); ?>" class="col text-center text-decoration-none" style="color: #3bef2b; display: block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                    <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                    <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                </svg>
                                                <p style="font-size: .8rem;">PRINT</p>
                                            </a>
                                            <a href="<?= base_url("download-expense-invoice-pdf/" . $expense['id']); ?>" class="col text-center text-decoration-none" style="color: #3bef2b; display: block;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                </svg>
                                                <p style="font-size: .8rem;">PDF</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mx-1">
                                <h5 class="mb-2">Rp. <?= $expense['amount']; ?></h5>
                                <div class="border border-2 px-2" style="max-height: 5rem; overflow: hidden; white-space: normal; text-overflow: ellipsis;">
                                    <p class="fs-6">
                                        <?= $expense['description']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } else { ?>
            <div class="col-10 col-md-8 mb-3">
                <h3 class="text-center text-white">No History Yet.</h3>
            </div>
        <?php } ?>
    </div>
</div>