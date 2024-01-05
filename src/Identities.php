<?php
namespace Signal_api_wrapper;

require_once('CallApi.php');
Class Identities extends CallApi {
    public function get_identities($number) {
        // Get a list of every known identities for the user.

        $request = $this->base_url . '/v1/identities/' . $number;

        return $this->call_to_api('GET', $request, NULL);
    }

    public function trust_identity($number, $number_to_trust, $trust_all_known_keys, $verified_safety_number) {
        // Need to test.

        $request = $this->base_url . '/v1/identities/' . $number . '/trust/' . $number_to_trust;

        $data = [
            "trust_all_known_keys" => $trust_all_known_keys,
            "verified_safety_number" => $verified_safety_number
        ];
        $data = json_encode($data);

        return $this->call_to_api('PUT', $request, $data);
    }
}

?>