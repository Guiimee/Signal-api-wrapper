<?php
namespace guime\Signal_api_wrapper;

require_once('CallApi.php');
Class Accounts extends CallApi {
    public function get_all_accounts() {
        // This function returns a list of string that contains all the numbers associated to the docker.
        $request = $this->base_url . '/v1/accounts';

        return $this->call_to_api('GET', $request, NULL);
    }

    public function lift_rate_limit($number, $captcha, $challenge_token) {
        $request = $this->base_url . '/v1/accounts/' . $number . '/rate-limit-challenge';

        $data = [
            "captcha" => $captcha,
            "challenge_token" => $challenge_token
        ];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }
}

?>