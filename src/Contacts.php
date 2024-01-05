<?php
namespace guime\Signal_api_wrapper;

require_once('CallApi.php');
Class Contacts extends CallApi {
    public function update_contact_info($number, $expiration_in_seconds, $name, $recipient) {
        // A tester, si le changement de nom est visible dans la contact list du docker
        /*
        This function is used to update contact list information.

        number: Phone number of the user.
        expiration_in_seconds: Change the time for disappearing messages. 0 means messages won't disappear.
        name: New name for the recipient in the device contact list.
        recipient: Phone number of the recipient.
        */

        $request = $this->base_url . '/v1/contacts/' . $number;

        $data = [
            "expiration_in_seconds" => $expiration_in_seconds,
            "name" => $name,
            "recipient" => $recipient
        ];
        $data = json_encode($data);

        return $this->call_to_api('PUT', $request, $data);
    }

    public function send_synchronization($number) {
        // No test done

        // Pas vraiment sure de qu'est-ce que ca fait
        $request = $this->base_url . '/v1/contacts/' . $number . '/sync';

        return $this->call_to_api('POST', $request, NULL);
    }
}

?>