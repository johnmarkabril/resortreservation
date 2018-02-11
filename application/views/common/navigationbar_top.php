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
                    <li class="nav-item <?php echo ($curpage == 'Rates') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>rates">Rates</a>
                    </li>
                    <?php
                        if ( empty($this->session->user_session) ) {
                    ?>
                            <li class="nav-item <?php echo ($curpage == 'Login') ? 'active' : ''; ?>">
                                <a class="nav-link-cstm" href="<?php echo base_url(); ?>login">Log In</a>
                            </li>
                    <?php
                        } else {
                            $bin2hex_no_email   =   bin2hex($this->session->user_session->USERS_NO . '|' . $this->session->user_session->USERS_EMAILADDRESS);
                    ?>
                            <li class="nav-item">
                                <a class="nav-link-cstm" href="<?php echo base_url(); ?>user/profile/<?php echo $bin2hex_no_email; ?>">Profile</a>
                            </li>
                            <li class="nav-item <?php echo ($curpage == 'User Profile') ? 'active' : ''; ?>">
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
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item <?php echo ($curpage == 'Rates') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>rates">Rates</a>
                    </li>
                    <li class="nav-item <?php echo ($curpage == 'Dashboard') ? 'active' : ''; ?>">
                        <a class="nav-link-cstm" href="<?php echo base_url(); ?>admin/dashboard">Dashboard</a>
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

