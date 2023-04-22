<?php

require_once '../../data/dataSource/addMembersApiClient.php';
require_once '../../domain/repo/addMembersResponse.php';

class AddMembersUseCase
{
    private AddMembersApiClient $apiClient;

    public function __construct(AddMembersApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function execute(AddMembersRepo $request): AddMembersResponse
    {
        $response = $this->apiClient->addMembers($request->getFirstName(), $request->getLastName());

        return new AddMembersResponse($response['status'], $response['message']);
    }
}