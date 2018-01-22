<div class="landing-image-parent">
    <div class="landing-image-child">
        <div class="landing-image-text">     
            <div class="landing-image-title no-padding">
                Reserve now
            </div>       
            <div class="padding-top-normal">
                <?php
                    $this->load->view('reservation_form');
                ?>
            </div>
        </div>
    </div>
</div>

<!-- WELCOME -->
<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="main-title">Welcome!</div>

            <div class="row">
                <div class="col-md-6 padding-top-large">
                    <div class="media">
                      <img class="mr-3" src="<?php echo base_url(); ?>public/img/home/icon-1.png" alt="Registration">
                      <div class="media-body">
                        <div class="text-subtopic">Registration</div>
                        <div class="text-subtopic-description">
                            Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet domis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie conse
                        </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-6 padding-top-large">
                    <div class="media">
                      <img class="mr-3" src="<?php echo base_url(); ?>public/img/home/icon-2.png" alt="Online consultation">
                      <div class="media-body">
                        <div class="text-subtopic">Online consultation</div>
                        <div class="text-subtopic-description">
                            Dempor cum soluta nobis eleifend option congue nihil imperdiet domis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie conse
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="col-md-6 padding-top-large">
                    <div class="media">
                      <img class="mr-3" src="<?php echo base_url(); ?>public/img/home/icon-3.png" alt="Write a letter">
                      <div class="media-body">
                        <div class="text-subtopic">Write a letter</div>
                        <div class="text-subtopic-description">
                            Dempor cum soluta nobis eleifend option congue nihil imperdiet domis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie conse
                        </div>
                      </div>
                    </div>
                </div>
                
                <div class="col-md-6 padding-top-large">
                    <div class="media">
                      <img class="mr-3" src="<?php echo base_url(); ?>public/img/home/icon-4.png" alt="Gallery">
                      <div class="media-body">
                        <div class="text-subtopic">Gallery</div>
                        <div class="text-subtopic-description">
                            We m liber tempor cum soluta nobis eleifend option congue nihil imperdiet domis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie conse
                        </div>
                      </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- TESTIMONIALS -->
<div class="landing-image-parent">
    <div class="landing-image-child-testimonial">
        <div class="landing-image-text"> 
            <div class="landing-image-title">Testimonials</div>           
        </div>
    </div>
</div>

<!-- rates -->
<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="main-title">rates</div>
            <div class="row">
                <?php
                    if ( !empty($get_rates_best) ) {
                        foreach ( $get_rates_best as $rates ) {
                            $md5_rates_no_name     =   md5($rates->RATES_NO . '-' . $rates->RATES_NAME);
                ?>
                            <div class="col-md-4 padding-top-large">
                                <div class="rates-image">
                                    <a href="<?php echo base_url(); ?>rates/details/<?php echo str_replace(' ', '-', strtolower($rates->RATES_NAME));?>/<?php echo $rates->RATES_NO; ?>">
                                        <img src="<?php echo base_url(); ?>public/img/<?php echo $rates->RATES_IMAGE; ?>" alt="<?php echo $rates->RATES_NAME; ?>" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="rates-title">
                                    <a href="<?php echo base_url(); ?>rates/details/<?php echo str_replace(' ', '-', strtolower($rates->RATES_NAME));?>/<?php echo $rates->RATES_NO; ?>">
                                        <?php echo $rates->RATES_NAME; ?>
                                    </a>
                                </div>
                                <div class="rates-description">
                                    <?php echo $rates->RATES_DESCRIPTION; ?>
                                </div>
                                <div class="rates-price">
                                    ₱ <?php echo number_format($rates->RATES_PRICE, 2); ?>
                                </div>
                               <!--  <a href="<?php echo base_url(); ?>rates/reservation/<?php echo $rates->RATES_NO; ?>/<?php echo $md5_rates_no_name; ?>">
                                    <div class="rates-book">
                                        Reserve now
                                    </div>
                                </a> -->
                            </div>
                <?php
                        }
                    }
                ?>
                <div class="col-md-12 padding-top-large">
                    <div class="align-right">
                        <a href="<?php echo base_url(); ?>rates">see more rates...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WE ARE WAITING FOR YOU -->
<div class="landing-image-parent">
    <div class="landing-image-child-we-are-waiting">
        <div class="landing-image-text"> 
            <div class="landing-image-title">We are waiting for you</div>           
        </div>
    </div>
</div>

<!-- NEWS -->
<div class="card card-cstm">
    <div class="card-body">
        <div class="container">
            <div class="main-title">News</div>

            <div class="row">
                <div class="col-md-3 padding-top-large">
                    <div class="news-image">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>public/img/home/news-1.jpg" alt="..." class="img-thumbnail">
                        </a>
                    </div>
                    <div class="news-title">
                        <a>Duis autem vel eum iriure dolor</a>
                    </div>
                    <div class="news-date">November 17, 2017</div>
                    <div class="news-description">
                        Nam liber tempor cum soluta nobis eleifend option
                    </div>
                </div>

                <div class="col-md-3 padding-top-large">
                    <div class="news-image">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>public/img/home/news-2.jpg" alt="..." class="img-thumbnail">
                        </a>
                    </div>
                    <div class="news-title">
                        <a>Fe weoloto</a>
                    </div>
                    <div class="news-date">November 18, 2017</div>
                    <div class="news-description">
                        Veiber tempor cum soluta nobis eleifend option
                    </div>
                </div>
                
                <div class="col-md-3 padding-top-large">
                    <div class="news-image">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>public/img/home/news-3.jpg" alt="..." class="img-thumbnail">
                        </a>
                    </div>
                    <div class="news-title">
                        <a>Opuilorer</a>
                    </div>
                    <div class="news-date">November 18, 2017</div>
                    <div class="news-description">
                        Mompor cum soluta nobis eleifend option
                    </div>
                </div>
                
                <div class="col-md-3 padding-top-large">
                    <div class="news-image">
                        <a href="<?php echo base_url(); ?>">
                            <img src="<?php echo base_url(); ?>public/img/home/news-4.jpg" alt="..." class="img-thumbnail">
                        </a>
                    </div>
                    <div class="news-title">
                        <a>Xwe</a>
                    </div>
                    <div class="news-date">November 18, 2017</div>
                    <div class="news-description">
                        Cum soluta nobis eleifend option congue nihil
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- CONTACT US -->
<div class="landing-image-parent">
    <div class="landing-image-child-newsletter">
        <div class="landing-image-text"> 
            <div class="landing-image-title">Contact Us</div>     
            <div class="row justify-content-md-center">
                <div class="col-md-4 offset-md-4 align-left">
                    <label>Email Address</label>
                    <input type="text" class="form-control" placeholder="example@abc.com" />
                    <label>Comment</label>
                    <textarea class="textarea-formcontrol" placeholder="Comment here..."></textarea>
                    <div class="padding-top-normal">
                        <button class="btn btn-primary">Email Us</button>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</div>