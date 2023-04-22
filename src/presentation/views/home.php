<?php
    // use Presentation\Controller\AddMembersController;
    // require_once 'vendor/autoload.php';

    // use application\addMembers\AddMembersUseCase;
    // use Infrastructure\Csv\CsvFile;
    require_once "../../data/dataSource/addMembersApiClient.php";
    require_once "../../domain/useCases/addMemberUseCase.php";
    require_once "../../presentation/controllers/addMembersController.php";
    
    $apiUrl = 'https://dev.uberchapel.com/api/add-members';
    $apiKey = '07c4a3bbac1e07a894fab36e0a463c2b26bc5bc364692282a6c61ab67216628f357d1109649951c6982d3e5d120839082eb5ef2e0214795024f4b4680c7a4777';

    $apiClient = new AddMembersApiClient($apiUrl, $apiKey);

    $addMembersUseCase = new AddMembersUseCase($apiClient);

    $addMembersController = new AddMembersController($addMembersUseCase);

    // handle the POST request to /add-members
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       $response = $addMembersController->handle();

       $message = $response['message'];
    }
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Clean Architecture</title>
    </head>
    <body>
        <h1>Clean Architecture Form</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="firstName">First Name:</label><br>
            <input type="text" id="firstName" name="firstName"><br><br>
            <label for="lastName">Last Name:</label><br>
            <input type="text" id="lastName" name="lastName"><br><br>
            <input type="submit" value="Submit">
            <h1><?php echo isset($message) ? $message : ''; ?></h1>
        </form>
    </body>
    </html>
    