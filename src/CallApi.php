<?php
namespace Signal_api_wrapper;

class CallApi {
    // This class is the base for every other class in src (except SignalObject) for the use of call_to_api().
    public $base_url;

    function __construct($base_url) {
        $this->base_url = $base_url;
    }

    public function set_base_url($base_url) {
        $this->base_url = $base_url;
    }

    public function get_base_url() {
        return $this->base_url;
    }

    public function call_to_api($method, $url, $data) {
        $curl = curl_init();

        switch ($method) {
            case "GET":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
                break;
            case "POST":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $server_response = curl_exec($curl);
        curl_close($curl);
        
        return $server_response;
    }
}

?>


