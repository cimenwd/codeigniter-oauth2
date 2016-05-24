<?php
class Social extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');

        $this->load->library('session');
        $this->load->helper('url');


    }//end __construct()

    public function session($provider) {
        $this->load->helper('url_helper');
        if($this->input->get("referer"))$this->session->set_tempdata("referer",$this->input->get("referer"));

        //facebook

        if($provider == 'facebook') {
            $app_id = $this->config->item('fb_appid');
            $app_secret = $this->config->item('fb_appsecret');

            $provider	= $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
            ));
        }
        //google
        else if($provider == 'google'){

            $app_id 		= $this->config->item('googleplus_appid');
            $app_secret 	= $this->config->item('googleplus_appsecret');
            $provider 		= $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
            ));
        }

        //foursquare
        else if($provider == 'foursquare'){

            $app_id 	= $this->config->item('foursquare_appid');
            $app_secret = $this->config->item('foursquare_appsecret');
            $provider 	= $this->oauth2->provider($provider, array(
                'id' => $app_id,
                'secret' => $app_secret,
            ));
        }

        if ( ! $this->input->get('code')  )
        {
            if(strstr($this->agent->referrer(),base_url()))$provider->authorize();
            redirect($this->session->tempdata("referer")."/socialreturn?error");
        }
        else
        {
            // Howzit?
            try
            {
                $token = $provider->access($_GET['code']);
                if($this->uri->segment(3) == 'facebook')
                   $user = $provider->get_fbuser_info($token,$this->config->item('fb_appsecret'));
                    else
               $user = $provider->get_user_info($token);

                if($this->uri->segment(3) == 'google'){
                    //Your code stuff here
                    $this->session->set_flashdata(array("user"=>$user));
                    redirect($this->session->tempdata("referer")."/socialreturn");
                }

                elseif($this->uri->segment(3) == 'facebook'){
                    //your facebook stuff here
                    $this->session->set_flashdata(array("user"=>$user));
                    redirect($this->session->tempdata("referer")."/socialreturn");

                }elseif($this->uri->segment(3) == 'foursquare'){
                    // your code stuff here
                }


                redirect($this->session->tempdata("referer"));



            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    }}