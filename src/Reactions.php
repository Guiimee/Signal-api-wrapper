<?php
namespace Signal_api_wrapper;

require_once('CallApi.php');
Class Reactions extends CallApi {
    public function send_reaction($number, $reaction, $recipient, $target_author, $timestamp) {
        // Need to test.

        $request = $this->base_url . '/v1/reactions/' . $number;

        $data = [
            "reaction" => $reaction,
            "recipient" => $recipient,
            "target_author" => $target_author,
            "timestamp" => $timestamp
        ];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function remove_reaction($number, $reaction, $recipient, $target_author, $timestamp) {
        // Need to test.

        $request = $this->base_url . '/v1/reactions/' . $number;

        $data = [
            "reaction" => $reaction,
            "recipient" => $recipient,
            "target_author" => $target_author,
            "timestamp" => $timestamp
        ];
        $data = json_encode($data);

        return $this->call_to_api('DELETE', $request, $data);
    }
}

?>