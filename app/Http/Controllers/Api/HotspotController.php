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
            ->equal('name', 'trial')
            ->equal('password', 'trial')
            ->equal('profile', '1 Jam')
            ->equal('comment', 'Trial User');

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

    // menu user profile begin

    // get all profile
    public function getAllProfile()
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
            ->equal('name', 'trial')
            ->equal('rate-limit', '0')
            ->equal('shared-users', '0')
            ->equal('session-timeout', '0')
            ->equal('idle-timeout', '0');

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

}
