<?php
namespace Signal_api_wrapper;

require_once('CallApi.php');
Class Search extends CallApi {
    public function check_registered($numbers) {
        // Need to test.

        $request = $this->base_url . '/v1/search?numbers=' . $numbers[0];
        if (count($numbers) > 1) {
            for ($x = 1; $x < count($numbers); $x++) {
                $request = $request . '&numbers=' . $numbers[$x];
            }
        }
        
        return $this->call_to_api('GET', $request, NULL);
    }
}

?>