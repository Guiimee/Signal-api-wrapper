<?php
namespace Signal_api_wrapper;

require_once('CallApi.php');
class General extends CallApi {
    public function about() {
        //This function returns a dict containing information about the api.
        $request = $this->base_url . '/v1/about';

        return $this->call_to_api('GET', $request, NULL);
    }

    public function get_api_configuration() {
        // This function returns the current configuration of the api (info, debug or warn).
        $request = $this->base_url . '/v1/configuration';

        return $this->call_to_api('GET', $request, NULL);
    }

    public function set_api_configuration($config) {
        // This function sets the configuration of the api as info, debug or warn.

        $request = $this->base_url . '/v1/configuration';

        $data = [
            "logging" => ["Level" => $config]
        ];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function get_account_trust($number) {
        // This function returns the current trust setting of the number account.

        $request = $this->base_url . '/v1/configuration/' . $number . '/settings';

        return $this->call_to_api('GET', $request, NULL);
    }
    
    public function set_account_trust($number, $trust) {
        // This function sets the trust setting of the number account as on-first-use, always or never.
        $request = $this->base_url . '/v1/configuration/' . $number . '/settings';

        $data = ["trust_mode" => $trust];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function get_api_health() {
        // Not sure what it does
        $request = $this->base_url . '/v1/health';

        return $this->call_to_api('GET', $request, NULL);
    }
}

?>
