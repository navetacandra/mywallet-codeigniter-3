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