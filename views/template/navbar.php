<nav class="navbar navbar navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#">
            <!-- <img src="image/liverpoolfc.png" alt="Logo" width="30" class="d-inline-block "> -->
            <span>Liverpool</span>
        </a>

        <?php if ($currentPage != 'login') { ?>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a 
                        class="nav-link <?php if ($currentPage == 'dashboard') echo 'active'; ?>" aria-current="page" 
                        href="index.php?action=list_member">
                            <i class="bi bi-house"></i> Dashboard
                    </a>
                    <a
                        class="nav-link <?php if ($currentPage == 'input') echo 'active'; ?>"
                        href="index.php?action=input_member&mode=add">
                            <i class="bi bi-plus-circle"></i>
                        Input
                    </a>
                    <a
                        class="nav-link <?php if ($currentPage == 'logout') echo 'active'; ?>" 
                        href="index.php?action=logout">
                            <i class="bi bi-box-arrow-in-right"></i> 
                            Logout
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</nav>