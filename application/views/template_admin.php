<!DOCTYPE html>
<html>
    <head>
        <!-- THE CSS FILES -->
        <?php $this->load->view('common/css_files_includes'); ?>
    </head>
    <body>
        <div class="wrapper">
            <?php $this->load->view('common/navigationbar_top'); ?>

            <div class="main-content main-content-padding">
                <?php
                    switch($curpage) {
                        case 'Dashboard':
                            echo $content;
                            break;
                    }
                ?>
            </div>

        </div>


        <?php $this->load->view('common/js_files_includes_admin'); ?>
    </body>
</html>