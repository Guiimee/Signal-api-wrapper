<?php
namespace guime\Signal_api_wrapper;

require_once('CallApi.php');
Class Groups extends CallApi {
    public function get_group($number, $group_id) {
        // This function returns the information of the specified group.
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id;

        return $this->call_to_api('GET', $request, NULL);
    }

    public function get_groups($number) {
        // This function returns the information of every group the user is in.
        $request = $this->base_url . '/v1/groups/' . $number;

        return $this->call_to_api('GET', $request, NULL);
    }

    public function create_group($number, $description, $group_link, $members, $name, $add_members, $edit_group) {
        // This function creates a new group with the user as an admin and a list of members.
        // add_members and edit_group are permissons and can be either every-member or only-admin.
        // group_link can be enabled, enabled-with-approval or disabled

        $request = $this->base_url . '/v1/groups/' . $number;

        $data = [
            "description" => $description,
            "group_link" => $group_link,
            "members" => $members,
            "name" => $name,
            "permissions" => [
                "add_members" => $add_members,
                "edit_group" => $edit_group
            ]
        ];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function update_group_state($number, $group_id, $base64_avatar=NULL, $description=NULL, $name=NULL) {
        // This function is used to update certain information about a group.
        // Test if user needs to be an admin

        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id;

        $data = [];

        if ($base64_avatar != NULL) {
            $data["base64_avatar"] = $base64_avatar;
        }

        if ($description != NULL) {
            $data["description"] = $description;
        }

        if ($name != NULL) {
            $data["name"] = $name;
        }

        $data = json_encode($data);

        return $this->call_to_api('PUT', $request, $data);
    }

    public function delete_group($number, $group_id) {
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id;

        return $this->call_to_api('DELETE', $request, NULL);
    }

    public function add_admins($number, $group_id, $admins) {
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id . '/admins';

        $data = ["admins" => $admins];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function remove_admins($number, $group_id, $admins) {
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id . '/admins';

        $data = ["admins" => $admins];
        $data = json_encode($data);

        return $this->call_to_api('DELETE', $request, $data);
    }

    public function block_group($number, $group_id) {
        // Need to test

        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id . '/block';

        return $this->call_to_api('POST', $request, NULL);
    }

    public function join_group($number, $group_id) {
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id . '/join';

        return $this->call_to_api('POST', $request, NULL);
    }

    public function quit_group($number, $group_id) {
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id . '/quit';

        return $this->call_to_api('POST', $request, NULL);
    }

    public function add_members($number, $group_id, $members) {
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id . '/members';

        $data = ["members" => $members];
        $data = json_encode($data);

        return $this->call_to_api('POST', $request, $data);
    }

    public function remove_members($number, $group_id, $members) {
        $request = $this->base_url . '/v1/groups/' . $number . '/' . $group_id . '/members';

        $data = ["members" => $members];
        $data = json_encode($data);

        return $this->call_to_api('DELETE', $request, $data);
    }
}

?>
