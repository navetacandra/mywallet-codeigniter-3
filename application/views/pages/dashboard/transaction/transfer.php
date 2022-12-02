<div class="container mt-5">
    <h2 class="my-5 text-center text-white">Transfer</h2>
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <div class="card bg-dark shadow-lg">
                <div class="card-body p-4">
                    <form action="<?= base_url('transfer'); ?>" method="post">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-white text-start">Recipient :
                                <br />
                                <input type="text" name="recipient" id="recipient" value="<?= set_value("recipient") ?>" class="form-control edit-input mt-2 bg-transparent text-white" placeholder="Enter recipient ID" />
                                <?= form_error('recipient', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white text-start">Message :
                                <br />
                                <textarea name="message" id="message" class="form-control edit-input mt-2 bg-transparent text-white" rows="5"><?= set_value('message') ?></textarea>
                                <?= form_error('message', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white text-start">Amount :
                                <br />
                                <input type="number" name="amount" id="amount" value="<?= set_value("amount") ?>" class="form-control edit-input mt-2 bg-transparent text-white" />
                                <?= form_error('amount', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white text-center">
                                <button type="submit" class="text-uppercase btn btn-primary" style="width: 80%; border-radius: 20px;">transfer</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>