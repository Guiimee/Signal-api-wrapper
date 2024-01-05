<?php
namespace guime\Signal_api_wrapper;

require_once('CallApi.php');
Class Profiles extends CallApi {
    public function update_profile($number, $base64_avatar=NULL, $name=NULL) {
        $request = $this->base_url . '/v1/profiles/' . $number;

        $data = [];

        if ($base64_avatar != NULL) {
            $data["base64_avatar"] = $base64_avatar;
        }

        if ($name != NULL) {
            $data["name"] = $name;
        }

        $data = json_encode($data);

        return $this->call_to_api('PUT', $request, $data);
    }
}

?>