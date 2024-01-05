<?php
namespace guime\Signal_api_wrapper;

require_once('CallApi.php');
Class Attachments extends CallApi {
    public function get_attachments() {
        // Returns a list of strings that contains the ids of attachments in the docker.
        // The docker gains attachments when it receives messages that contain them.
        $request = $this->base_url . '/v1/attachments';

        return $this->call_to_api('GET', $request, NULL);
    }

    public function serve_attachment($attachment_id) {
        // This function returns an attachment (its content)
        $request = $this->base_url . '/v1/attachments/' . $attachment_id;

        return $this->call_to_api('GET', $request, NULL);
    }

    public function remove_attachment($attachment_id) {
        // This function removes an attachment from the docker.
        $request = $this->base_url . '/v1/attachments/' . $attachment_id;

        return $this->call_to_api('DELETE', $request, NULL);
    }
}

?>