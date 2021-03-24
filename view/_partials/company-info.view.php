<div class="text-dark">
    <p> Company name: <span class="font-weight-bold"><?= htmlspecialchars(strtoupper($_SESSION['data']['company_name'])) ?></span></p>
    <p>Company code: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data']['code']) ?></span></p>
    <p>Company vat code: <span class="font-weight-bold">LT-<?= htmlspecialchars($_SESSION['data']['vat_code']) ?></span></p>
    <p>Company address: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data']['address']) ?></span></p>
    <p>Company phone: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data']['phone']) ?></span></p>
    <p>Company email: <span class="font-weight-bold"><?= htmlspecialchars($_SESSION['data']['email']) ?></span></p>
    <p>Company activity: <span class="font-weight-bold"><?= htmlspecialchars(ucfirst(strtolower($_SESSION['data']['activities']))) ?></span></p>
    <p>Company manager: <span class="font-weight-bold"><?= htmlspecialchars(ucwords($_SESSION['data']['manager'])) ?></span></p>
</div>
