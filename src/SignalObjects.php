<?php
namespace Signal_api_wrapper;

require_once('Accounts.php');
require_once('Attachments.php');
require_once('Contacts.php');
require_once('Devices.php');
require_once('General.php');
require_once('Groups.php');
require_once('Identities.php');
require_once('Messages.php');
require_once('Profiles.php');
require_once('Reactions.php');
require_once('Search.php');
class SignalObjects {
    private $base_url;
    public $account;
    public $attachments;
    public $contacts;
    public $devices;
    public $general;
    public $groups;
    public $identities;
    public $messages;
    public $profiles;
    public $reactions;
    public $search;

    function __construct($base_url) {
        $this->base_url = $base_url;

        $this->account = new Accounts($base_url);
        $this->attachments = new Attachments($base_url);
        $this->contacts = new Contacts($base_url);
        $this->devices = new Devices($base_url);
        $this->general = new General($base_url);
        $this->groups = new Groups($base_url);
        $this->identities = new Identities($base_url);
        $this->messages = new Messages($base_url);
        $this->profiles = new Profiles($base_url);
        $this->reactions = new Reactions($base_url);
        $this->search = new Search($base_url);
    }

    public function set_base_url($new_url) {
        $this->account->set_base_url($new_url);
        $this->attachments->set_base_url($new_url);
        $this->contacts->set_base_url($new_url);
        $this->devices->set_base_url($new_url);
        $this->general->set_base_url($new_url);
        $this->groups->set_base_url($new_url);
        $this->identities->set_base_url($new_url);
        $this->messages->set_base_url($new_url);
        $this->profiles->set_base_url($new_url);
        $this->reactions->set_base_url($new_url);
        $this->search->set_base_url($new_url);

        $this->base_url = $new_url;
    }

    public function get_base_url($new_url) {
        return $this->base_url;
    }
}

?>