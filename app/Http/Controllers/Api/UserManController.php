<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RouterOS\Client;
use RouterOS\Query;

class UserManController extends Controller
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

    // get user list from user-manager
    public function getUser()
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/tool/user-manager/user/print'));

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // get user list from user-manager by id
    public function getUserById($id)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/tool/user-manager/user/print'))
            ->where('.id', $id);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // get user list from user-manager by username
    public function getUserByUsername($username)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/tool/user-manager/user/print'))
            ->where('username', $username);

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        return response()->json($response);
    }

    // add user to user-manager
    public function addUser(Request $request)
    {
        // Create "where" Query object for RouterOS
        $query =
            (new Query('/tool/user-manager/user/add'))
                ->equal('customer', 'admin')
                ->equal('username', 'bypassed')
                ->equal('password', 'testcomment');

        // Send query and read response from RouterOS
        $response = $this->client->query($query)->read();

        $query =
            (new Query('/tool/user-manager/user/create-and-activate-profile'))
                ->where('customer', 'admin')
                ->where('profile', '1 jam voucher');

        return response()->json($response);
    }
}
