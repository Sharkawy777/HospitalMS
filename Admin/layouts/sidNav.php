<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="http://localhost/Hospital-MS/admin/">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <?php

                    if ($_SESSION['user']['role_id'] == 1) {
                        $modules = ['Roles', 'admins', 'doctors', 'patients', 'appointments', 'reservations'];
                    } else if ($_SESSION['user']['role_id'] == 2) {
                        $modules = ['patients', 'appointments'];
                    } else {
                        $modules = [];
                        header("Location: " . Url('login.php'));
                    }
                    foreach ($modules as $key => $module) {
                        ?>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse"
                           data-target="#collapseLayouts<?php echo $key; ?>" aria-expanded="false"
                           aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            <?php echo $module; ?>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts<?php echo $key; ?>" aria-labelledby="headingOne"
                             data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <?php if ($module == 'reservations') { ?>
                                    <a class="nav-link" href="<?php echo Url($module . '/'); ?>">Control</a>
                                <?php } else { ?>
                                    <a class="nav-link" href="<?php echo Url($module . '/create.php'); ?>"> + Create</a>
                                    <a class="nav-link" href="<?php echo Url($module . '/'); ?>">Control</a>
                                <?php } ?>


                            </nav>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?php echo $_SESSION['user']['name'] ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">