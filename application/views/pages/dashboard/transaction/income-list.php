<div class="container mt-5 text-white">
    <h2 class="text-center mb-5">Incomes List</h2>
    <div class="row justify-content-center">
        <?php if (count($income_transactions) > 0) { ?>
            <?php foreach ($income_transactions as $income) : ?>
                <div class="col-10 col-md-8 mb-3">
                    <div class="card bg-dark shadow-lg">
                        <div class="card-body mb-1">
                            <div class="card-title mb-1 mx-3">
                                <div class="d-flex">
                                    <h4 class="me-2"><?= $income['name']; ?></h4>
                                    <span class="me-3 badge bg-<?= ($income['type'] == "debit" ? "primary" : "warning"); ?>" style="max-height: 1.25rem;">
                                        <?= $income['type'] ?>
                                    </span>
                                    <div class="ms-auto me-2" style="margin-top: -.5rem;">
                                        <div class="row">
                                            <a href="<?= base_url("download-income-invoice-pdf/" . $income['id']); ?>" class="col text-center text-decoration-none" style="color: #3bef2b; display: block;">
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
                                <p class="mb-1" style="margin-top: -.5rem;"><?= $income['created_at']; ?></p>
                                <h5 class="mb-2">Rp. <?= $income['amount']; ?></h5>
                                <div class="border border-2 px-2" style="max-height: 5rem; overflow: hidden; white-space: normal; text-overflow: ellipsis;">
                                    <p class="fs-6">
                                        <?= $income['description']; ?>
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