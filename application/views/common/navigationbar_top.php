<nav class="navbar navbar-expand-md navbar-cstm navbar-light fixed-top">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">La Casa Antigo Resort</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
        $showstatus     =   1;

        if ( !empty($this->session->user_session) ) {
            if ( $this->session->user_session->USERS_TYPE == 1 ) {
                $showstatus     =   1;
            } else {
                $showstatus     =   2;
            }
        } else {
            $showstatus         =   1;
        }

        if ( $showstatus == 1 ) {
    ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo ($curpage == 'Template') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link-cstm dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >
                            About
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">History</a>
                            <a class="dropdown-item" href="#">Team</a>
                            <a class="dropdown-item" href="#">FAQs</a>
                        </div>
                    </li>
                    <li class="nav-item <?php echo ($curpage == 'Rates') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>rates">Rates</a>
                    </li>
                    <li class="nav-item <?php echo ($curpage == 'Gallery') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>gallery">Gallery</a>
                    </li>
                    <?php
                        if ( empty($this->session->user_session) ) {
                    ?>
                            <li class="nav-item <?php echo ($curpage == 'Login') ? 'active' : ''; ?>">
                                <a class="nav-link-cstm" href="<?php echo base_url(); ?>login">Log In</a>
                            </li>
                    <?php
                        } else {
                    ?>
                            <li class="nav-item">
                                <a class="nav-link-cstm" href="<?php echo base_url(); ?>logout">Log-out</a>
                            </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
    <?php
        } else {
    ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?php echo ($curpage == 'Template') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item <?php echo ($curpage == 'Rates') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>rates">Reservation</a>
                    </li>
                    <li class="nav-item <?php echo ($curpage == 'Gallery') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>gallery">Sales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>logout">Log-out</a>
                    </li>
                </ul>
            </div>
    <?php
        }
    ?>
</nav>

