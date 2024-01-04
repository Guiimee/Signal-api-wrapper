<?php
require_once('CallApi.php');
Class Messages extends CallApi {
    public function receive_messages($number, $timeout=NULL, $ignore_attachments=NULL, $ignore_stories=NULL, $max_messages=NULL) {
        // This function is used to receive message from the signal server. It needs to be done regularly.

        $request = $this->base_url . '/v1/receive/' . $number;

        if ($timeout != NULL or $ignore_attachments != NULL or $ignore_stories != NULL or $max_messages != NULL) {
            $request = $request . '?';

            if ($timeout != NULL) {
                $request = $request . "timeout=" . $timeout;

                if ($ignore_attachments != NULL or $ignore_stories != NULL or $max_messages != NULL) {
                    $request = $request . '&';
                }
            }

            if ($ignore_attachments != NULL) {
                $request = $request . 'ignore_attachments=' . $ignore_attachments;

                if ($ignore_stories != NULL or $max_messages != NULL) {
                    $request = $request . '&';
                }
            }

            if ($ignore_stories != NULL) {
                $request = $request . 'ignore_stories=' . $ignore_stories;

                if ($max_messages != NULL) {
                    $request = $request . '&';
                }
            }

            if ($max_messages != NULL) {
                $request = $request . 'max_messages=' . $max_messages;
            }
        }

        return $this->call_to_api('GET', $request, NULL);
    }

    public function show_typing_indicator($number, $recipient) {
        $request = $this->base_url . '/v1/typing_indicator/' . $number;

        $data = ["recipient" => $recipient];
        $data = json_encode($data);

        return $this->call_to_api('PUT', $request, $data);
    }
    
    public function hide_typing_indicator($number, $recipient) {
        $request = $this->base_url . '/v1/typing_indicator/' . $number;

        $data = ["recipient" => $recipient];
        $data = json_encode($data);

        return $this->call_to_api('DELETE', $request, $data);
    }

    public function send_message($number,
                                 $recipients,
                                 $message=NULL,
                                 $base64_attachments=NULL,
                                 $sticker=NULL,
                                 $mentions=NULL,
                                 $quote_timestamp=NULL,
                                 $quote_author=NULL,
                                 $quote_message=NULL,
                                 $quote_mentions=NULL,
                                 $text_mode=NULL) {
        $request = $this->base_url . '/v2/send';

        $data = [];

        if ($base64_attachments != NULL) {
            $data["base64_attachments"] = $base64_attachments;
        }

        if ($mentions != NULL) {
            $data["mentions"] = $mentions;
        }

        if ($message != NULL) {
            $data["message"] = $message;
        }

        $data["number"] = $number;

        if ($quote_author != NULL) {
            $data["quote_author"] = $quote_author;
        }

        if ($quote_mentions != NULL) {
            $data["quote_mentions"] = $quote_mentions;
        }

        if ($quote_message != NULL) {
            $data["quote_message"] = $quote_message;
        }

        if ($quote_timestamp != NULL) {
            $data["quote_timestamp"] = $quote_timestamp;
        }

        $data["recipients"] = $recipients;

        if ($sticker != NULL) {
            $data["sticker"] = $sticker;
        }

        if ($text_mode != NULL) {
            $data["text_mode"] = $text_mode;
        }

        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }
}

?>