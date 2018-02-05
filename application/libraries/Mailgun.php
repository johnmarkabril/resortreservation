<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    *   This file contains the routines that load the terms page
    * 
    *   Created by: John Mark Abril
    *
*/

class Mailgun {


    public function __construct()
    {
        // parent::__construct();
        $this->CI =& get_instance();

        include_once'./vendor/autoload.php';
    }

    public function send_mail($to, $subject, $header, $body)
    {
        $mgClient = new Mailgun\Mailgun('key-ad61a18f786a0d540ed68bf5bb6335ae');
        $domain = "sandbox2c2c55a87359492fbee4b5aade3c496d.mailgun.org";

        $template   =   '';
        $template  .=   '<div style="background-color:#FAFAFA;line-height:1.5;">';
        $template  .=   '   <div style="padding:0 20px;">';
        $template  .=   '       <center>';
        $template  .=   '           <div style="margin:auto;min-width:450px;max-width: 650px;background-color: #FFFFFF;font-size: 15px;border-radius:0px;">';
        $template  .=   '               <div style="color:#FFFFFF;background:#4695F0;letter-spacing: 1px;text-align:center;font-size:28px;padding: 20px 0px;font-weight: 600;">' . $header . '</div>';  
        $template  .=   '                   <div style="padding: 30px 20px;text-align:left;">';
        $template  .=                           $body;
        $template  .=   '                   </div>';
        $template  .=   '               <div style="color:#FFFFFF;background:#4695F0;text-align:center;font-size:12px;padding: 20px 0px;font-weight:600;">';
        $template  .=   '                   <div>&copy; ' . current_year . ' Antigo Resort - All Rights Reserved</div>';
        $template  .=   '               </div>';
        $template  .=   '           </div>';
        $template  .=   '       </center>';
        $template  .=   '   </div>';

        $options    =   array(
            'from'      =>  'testing <jmabril@teko.ph>',
            'to'        =>  $to,
            'subject'   =>  $subject,
            'html'      =>  $template,
            'bcc'       =>  'jmabril@teko.ph'
        );

        $result = $mgClient->sendMessage($domain, $options);

        return $result;
    }
} 