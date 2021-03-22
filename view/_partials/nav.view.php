<ul class="nav justify-content-end navbar-dark bg-primary">

    <?php if(isset($_SESSION['login'])):?>
        <li class="nav-item">
            <a class="nav-link text-white active" href="/company">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/company/companies">Companies</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/company/logout">Logout</a>
        </li>
    <?php else:?>
        <li class="nav-item">
            <a class="nav-link text-white" href="/company/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="/company/register">Register</a>
        </li>
    <?php endif; ?>


</ul>