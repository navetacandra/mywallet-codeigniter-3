<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">MyWallet</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/login') ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/register') ?>">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    const full_url = `${window.location.protocol}//${window.location.host}${window.location.pathname}`;
    document.querySelectorAll('.nav-link').forEach(el => {
        const text = el.getAttribute('href').toLowerCase();
        if (text !== full_url) el.classList.remove('active');
        else el.classList.add('active');
    })
</script>