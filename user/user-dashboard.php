<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="dependencies/bootstrap/dist/css/bootstrap.min.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="dependencies/fontawesome/css/all.css">
    <!--External CSS-->
    <link rel="stylesheet" href="style/userDashStyle.css" />
    <title>CMS | User Dashboard</title>
</head>

<body>


    <div class="main-dash container-fluid">
        <div class="side-bar">

        </div>
        <div class="main-body">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="navbar-brand text-white" href="#">Complaint Managment System | USER Dashboard</a>
                    </li>
                </ul>
                <button type="button" class="btn btn-outline-light">Log Out</button>
            </nav>
            <div class="complaint-box p-4">
                <button type="button" onclick="document.location = 'user.php'" class="insert-new btn">Insert New
                    Complaint</button><br>

                <table class="table table-bordered mt-4">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Complaint No.</th>
                            <th scope="col">आवेदक</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Random</td>
                            <td>Test</td>
                            <td>
                                <div class="field">
                                    <button class="btn btn-success" name="number_form">Update</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>