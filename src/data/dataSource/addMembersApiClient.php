<?php
use Domain\Model\Member;

class AddMembersApiClient
{
    private string $apiUrl;
    private string $apiKey;

    public function __construct(string $apiUrl, string $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }

    public function addMembers(string $firstName, string $lastName): array
    {
        // create the request body
        $body = [
            'firstName' => $firstName,
            'lastName' => $lastName,
        ];

        // // send the request
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $this->apiUrl . '/api/add-members');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //     'Content-Type: application/json',
        //     'Authorization: Bearer ' . $this->apiKey,
        // ]);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));

        // $response = curl_exec($ch);
        // curl_close($ch);    
        $response = '{"status": 200,"message":"Member creation failed"}';

        // handle errors
        // if (!$response) {
        //     throw new \RuntimeException('Failed to send request to UberChapel API');
        // }

        $response = json_decode($response);
        // echo $response;
        // if (!$response || !isset($response->success) || !$response->success) {
        //     throw new \RuntimeException('Failed to add members to UberChapel API');
        // }

        // parse the response and return a status code and any relevant data
        if ($response->status === 'success') {
            return array('status' => 200);
        } else {
            return array('status' => 400, 'message' => $response->message);
        }
    }
}

