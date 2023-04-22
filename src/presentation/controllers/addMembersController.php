<?php

// namespace Presentation\Controller;

// use Application\AddMembers\AddMembersRequest;
// require_once "src/application/addMembers/addMembersRequest.php";
// use Application\AddMembers\AddMembersUseCase;
// use Infrastructure\Csv\CsvFile;
// require_once "src/infrastructure/csv/csvFileReader.php";

require_once "../../domain/useCases/addMemberUseCase.php";
require_once "../../domain/repo/addMembersRepo.php";
class AddMembersController
{
    private AddMembersUseCase $addMembersUseCase;

    public function __construct(AddMembersUseCase $addMembersUseCase)
    {
        $this->addMembersUseCase = $addMembersUseCase;
    }

    public function handle(): array
    {
        // Retrieve input data from POST request
        $churchName = $_POST['firstName'];
        $serviceName = $_POST['lastName'];


        // // Create AddMembersRequest object with input data
        // $request = new AddMembersRepo($churchName, $serviceName);

        // // Call AddMembersUseCase to handle the request
        // $response = $this->addMembersUseCase->execute($request);

        // // Create AddMembersResponse object with the response data
        // $addMembersResponse = new AddMembersResponse($response->getSuccess(), $response->getMessage());

        // // Render the response as JSON
        // // header('Content-Type: application/json');
        // // echo json_encode($addMembersResponse);
        // $response->success = json_encode($addMembersResponse);
        // $response->message = $addMembersResponse ? 'Members added successfully' : 'Failed to add members';
        // return $response;

         // create AddMembersRequest object
         $addMembersRequest = new AddMembersRepo($churchName, $serviceName);

         // call use case to add member
         $addMembersResponse = $this->addMembersUseCase->execute($addMembersRequest);
 
         // create response object based on use case response
         $response = [
             'success' => $addMembersResponse->getSuccess(),
             'message' => $addMembersResponse->getMessage()
         ];
 
         // set headers and return response
         header('Content-Type: application/json');
         return $response;
    }
}
