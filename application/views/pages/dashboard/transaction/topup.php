<div class="container mt-5">
    <h2 class="my-5 text-center text-white">Top Up</h2>
    <div class="row justify-content-center">
        <div class="col-10 col-md-8">
            <div class="card bg-dark shadow-lg">
                <div class="card-body p-4">
                    <form action="<?= base_url('topup'); ?>" method="post">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-dark text-white text-start">Transaction Name :
                                <br />
                                <input type="text" name="name" id="name" class="form-control edit-input mt-2 bg-transparent text-white" />
                                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white text-start">Transaction Description :
                                <br />
                                <textarea name="description" id="description" class="form-control edit-input mt-2 bg-transparent text-white" rows="5"></textarea>
                                <?= form_error('description', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white text-start">Amount :
                                <br />
                                <input type="text" name="amount" id="amount" class="form-control edit-input mt-2 bg-transparent text-white" />
                                <?= form_error('amount', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white text-start">Type :
                                <br />
                                <select class="form-select mt-2 text-dark" name="type" style="background-color: rgba(200, 200, 200, .8) !important;">
                                    <option selected>Open this select menu</option>
                                    <option value="debit">Debit</option>
                                    <option value="kredit">Kredit</option>
                                </select>
                                <?= form_error('type', '<small class="text-danger">', '</small>'); ?>
                            </li>
                            <li class="list-group-item bg-dark text-white text-center">
                                <button type="submit" class="text-uppercase btn btn-primary" style="width: 80%; border-radius: 20px;">top up</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>