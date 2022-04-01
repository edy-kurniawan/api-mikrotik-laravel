<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RouterOS\Client;
use RouterOS\Query;

class HotspotController extends Controller
{
    // declare global $client variable;
    public $client; 

    // function construct
    public function __construct()
    {
        // Initiate client with config object
        $this->client = new Client([
            'host' => config('routeros.host'),
            'user' => config('routeros.user'),
            'pass' => config('routeros.pass'),
            'port' => config('routeros.port'),
        ]);
    }

    // get all users hotspot
    public function getAllUsers()
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/print'))
            ->where('disabled', 'false');

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // get user hotspot by id
    public function getUserById($id)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/print'))
            ->where('.id', $id);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // get user hotspot by profile
    public function getUserByProfile($profile)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/print'))
            ->where('profile', $profile);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // add user hotspot
    public function addUser(Request $request)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/add'))
            ->equal('name', $request->name)
            ->equal('password', $request->password)
            ->equal('profile', $request->profile)
            ->equal('comment', $request->comment);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // remove user hotspot by number
    public function removeUser($number)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/remove'))
            ->where('.id', $number);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // edit user hotspot by number
    public function editUser($number, Request $request)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/set'))
            ->where('.id', $number)
            ->equal('name', $request->name)
            ->equal('password', $request->password)
            ->equal('profile', $request->profile)
            ->equal('comment', $request->comment);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // menu user profile begin

    // get all profile
    public function getAllProfiles()
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/profile/print'));

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // add user profile
    public function addProfile(Request $request)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/profile/add'))
            ->equal('name', $request->name)
            ->equal('rate-limit', $request->rate_limit)
            ->equal('shared-users', $request->shared_users)
            ->equal('idle-timeout', 'none');

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // remove user profile by number
    public function removeProfile($number)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/ip/hotspot/user/profile/remove'))
            ->where('.id', $number);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

}
