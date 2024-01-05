<?php
namespace guime\Signal_api_wrapper;

require_once('CallApi.php');
Class Devices extends CallApi {
    public function link_device($number, $uri) {
        // No test done

        $request = $this->base_url . '/v1/devices/' . $number;

        $data = ["uri" => $uri];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function link_device_QR($device_name, $QR_version=10) {
        /*
        Creates a QR code to scan with the main device to create a new linked device.

        device_name: Name of the new linked device (this device is the docker).
        QR_version: QR code version (goes from 0 to 10).
        */

        // Cree un code QR a scanner sur l'appareil principal. Le nom du nouvelle apparei; est device_name.
        $request = $this->base_url . '/v1/qrcodelink?device_name=' . $device_name . '&qrcode_version=' . $QR_version;

        return $this->call_to_api('GET', $request, NULL);
    }

    public function register_phone_number($number, $captcha, $use_voice) {
        // No test done

        $request = $this->base_url . '/v1/register/' . $number;

        $data = [
            "captcha" => $captcha,
            "use_voice" => $use_voice
        ];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function verify_phone_number($number, $token, $pin) {
        // No test done

        // Verification avec un numero recu par message vocal/SMS
        $request = $this->base_url . '/v1/register/' . $number . '/verify/' . $token;

        $data = ["pin" => $pin];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function unregister_phone_number($number, $delete_account, $delete_local_data) {
        // No test done

        $request = $this->base_url . '/v1/unregister/' . $number;

        $data = [
            "delete_account" => $delete_account,
            "delete_local_data" => $delete_local_data
        ];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }


}

?>
