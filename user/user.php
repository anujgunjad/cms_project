<!---user---->
<?php
include("../includes/config.php");
$database = new Database();
$db = $database->getConnection();
$stmt = $db->query("SELECT * from countries");
$num = $stmt->rowCount();
$country="<option value=''>Select Country</option>";
if($num > 0)
{   
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $country.= "<option value=".$row['id'].">".$row['name']."</option>";
    }   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Semantic UI-->
    <link rel="stylesheet" type="text/css" href="../dependencies/semantic/dist/semantic.min.css">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../dependencies/bootstrap/dist/css/bootstrap.min.css">
    <!--External CSS-->
    <link rel="stylesheet" href="style/mainForm.css" />
    <title>CMS | USER</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="navbar-brand text-white" href="#">Complaint Managment System | Complaint Form</a>
            </li>
            <li class="nav-item active">
                <a class="navbar-brand text-white" href="user-dashboard.php">Dashboard</a>
            </li>
        </ul>
        <button type="button" class="btn btn-outline-light btn-lg">Log Out</button>
    </nav>

    <div class="container-fluid">
        <div class="basic-form-div">
            <div class="text-center">
                <h1 class="main-head">आवेदक की जानकारी</h1>
            </div>

            <!--------------------->
            <!--Basic detail form-->
            <!--------------------->

            <div id="basicFormDiv">
                <form id="basicForm" method="POST" action="insertFiles/insert_basicForm.php"
                    class="basic-form ui blue segment form">
                    <div class="one fields">
                        <div class="four wide field">
                            <label><span class="complaint-field">शिकायत क्रमांक *</span></label>
                            <input class="complaint-num-box" type="text" name="complaint_no"
                                placeholder="शिकायत क्रमांक" />
                        </div>
                    </div>
                    <hr>
                    <div class="four fields">
                        <div class="six wide field">
                            <label>आवेदक का नाम </label>
                            <input type="text" name="ap_name" placeholder="नाम" />
                        </div>
                        <div class="three wide field">
                            <label>उम्र</label>
                            <input type="number" name="ap_age" placeholder="उम्र" />
                        </div>
                        <div class="three wide field">
                            <label>लिंग</label>
                            <select id="ap_gender" name="ap_gender" class="ui dropdown">
                                <option value=""></option>
                                <option value="female">महिला</option>
                                <option value="male">पुरुष</option>
                                <option value="other">अन्य</option>
                            </select>
                        </div>
                        <div class="four wide field">
                            <label>मोबाइल नंबर</label>
                            <input type="tel" name="ap_mob" placeholder="मोबाइल नंबर" />
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="eight wide field">
                            <label>आवेदक का पता</label>
                            <input type="text" name="ap_add" placeholder="आवेदक का पता" />
                        </div>
                        <div class="four wide field">
                            <label>आधार क्रमांक</label>
                            <input type="number" name="ap_adhar" placeholder="आधार क्रमांक" />
                        </div>
                        <div class="four wide field">
                            <label>पिन कोड</label>
                            <input type="number" name="ap_pincode" placeholder="पिन कोड" />
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="six wide field">
                            <label>Country</label>
                            <select id="ap_country" name="ap_country" class="ui dropdown">
                                <?php echo $country;?>
                            </select>
                        </div>
                        <div class="five wide field">
                            <label>State</label>
                            <select id="ap_state" name="ap_state" class="ui dropdown">
                            </select>
                        </div>
                        <div class="five wide field">
                            <label>City</label>
                            <select id="ap_city" name="ap_city">
                            </select>
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="six wide field">
                            <label>प्रकार</label>
                            <select name="crime_type" class="ui fluid dropdown">
                                <option value='' selected='' disabled=''>प्रकार</option>
                                <?php
                                    global $conn;
                                    $query = "select * from complaint_type";
                                    $run_query = mysqli_query($conn, $query);
                                    while($row_type = mysqli_fetch_array($run_query))
                                    {
                                        $type_id = $row_type["complaint_type_id"];
                                        $type = $row_type["type"];
                                        echo "<option value = '$type' id = '$type_id' >$type</option>"; 
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="six wide field">
                            <label>अपराध का तरीका</label>
                            <input type="text" name="way_of_crime" placeholder="अपराध का तरीका" />
                        </div>
                        <div class="six wide field">
                            <label>आई टी ऐक्ट धारा</label>
                            <input type="text" name="it_act" placeholder="आई टी ऐक्ट धारा" />
                        </div>
                    </div>
                    <div class="three fields">
                        <div class="six wide field">
                            <label>भा द वि धारा</label>
                            <input type="text" name="bh_dv" placeholder="भा द वि धारा" />
                        </div>
                        <div class="six wide field">
                            <label>घटना का दिनांक</label>
                            <input type="date" name="crime_date" placeholder="घटना की दिनांक" />
                        </div>
                        <div class="six wide field">
                            <label>घटना का समय</label>
                            <input type="time" name="crime_time" placeholder="घटना की समय" />
                        </div>
                    </div>

                    <div class="three fields">
                        <div class="six wide field">
                            <label>आवेदक की राशि</label>
                            <input type="text" name="amount" placeholder="राशि" />
                        </div>
                        <div class="six wide field">
                            <label>जांचकर्ता का नाम</label>
                            <input type="text" name="checker_name" placeholder="जांचकर्ता का नाम" />
                        </div>
                        <div class="six wide field">
                            <label>शिकायत की दिनांक</label>
                            <input type="date" name="com_date" placeholder="शिकायत की दिनांक" />
                        </div>
                    </div>
                    <button class="ui button form-btn" id="result-basic" type="submit" name="result" value="Submit">
                        Submit
                    </button>
                </form>
                <div id="txt"></div>
            </div>

            <!------------------------->
            <!--Basic detail form END-->
            <!------------------------->


            <!------------------------->
            <!--Suspected detail div--->
            <!------------------------->
            <div class="suspect-form-div">
                <div class="text-center">
                    <h1 class="main-head">संदेहियों की जानकारी </h1>
                </div>
                <div id="suspectFormDiv">
                    <<<<<<< HEAD <form id="suspectform" class="suspect-form ui blue segment form" method="POST"
                        action="insertFiles/ insert_suspectForm.php">
                        <div class="card">
                            <div class="card card-body">
                                <!--Add Mobile Number-->
                                <div class="contact-list py-4">
                                    <div class=" text-center">
                                        <h1 class="sub-head">संदेही का नंबर की जानकारी</h1>
                                    </div>
                                    <button type="button" class="add-number-btn ui button my-3" data-toggle="collapse"
                                        data-target="#suspect_no_details" id="btn_addnum">
                                        Add Number
                                    </button>
                                    <!------------------------------>
                                    <!--Suspect number detail form-->
                                    <!------------------------------>
                                    <div class="collapse" id="suspect_no_details">
                                        <div class="card card-body">
                                            <div class="num-detail-form-div">
                                                <form id="num_detailform" class="num-detail-form ui blue segment form"
                                                    method="POST" action="insertFiles/insert_accountForm.php">
                                                    <div class="three fields">
                                                        <div class="field">
                                                            <label>संदेही का नंबर </label>
                                                            <input type="number" name="number_one"
                                                                placeholder="संदेही का नंबर ">
                                                        </div>
                                                        <div class="field">
                                                            <label>कंपनी</label>
                                                            <input type="text" name="company" placeholder="कंपनी">
                                                        </div>
                                                        <div class="field">
                                                            <label>पहचान दस्तावेज़</label>
                                                            <input type="text" name="files"
                                                                placeholder="पहचान दस्तावेज़">
                                                        </div>
                                                        =======
                                                        <form id="suspectform" class="suspect-form ui blue segment form"
                                                            method="POST" action="insertFiles/ insert_suspectForm.php">
                                                            <div class="card">
                                                                <div class="card card-body">
                                                                    <!--Add Mobile Number-->
                                                                    <div class="contact-list py-4">
                                                                        <div class=" text-center">
                                                                            <h1 class="sub-head">संदेही का नंबर की
                                                                                जानकारी</h1>
                                                                        </div>
                                                                        <button type="button"
                                                                            class="add-number-btn ui button my-3"
                                                                            data-toggle="collapse"
                                                                            data-target="#suspect_no_details"
                                                                            id="btn_addnum">
                                                                            Add Number
                                                                        </button>
                                                                        <!------------------------------>
                                                                        <!--Suspect number detail form-->
                                                                        <!------------------------------>
                                                                        <div class="collapse" id="suspect_no_details">
                                                                            <div class="card card-body">
                                                                                <button type="button"
                                                                                    class="close ml-auto"
                                                                                    aria-label="Close"
                                                                                    id="suspect_no_details_close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                                <div class="num-detail-form-div">
                                                                                    <form id="num_detailform"
                                                                                        class="num-detail-form ui blue segment form"
                                                                                        method="POST"
                                                                                        action="insertFiles/insert_accountForm.php">
                                                                                        <div class="three fields">
                                                                                            <div class="field">
                                                                                                <label>संदेही का नंबर
                                                                                                </label>
                                                                                                <input type="number"
                                                                                                    name="number_one"
                                                                                                    placeholder="संदेही का नंबर ">
                                                                                            </div>
                                                                                            <div class="field">
                                                                                                <label>कंपनी</label>
                                                                                                <input type="text"
                                                                                                    name="company"
                                                                                                    placeholder="कंपनी">
                                                                                            </div>
                                                                                            <div class="field">
                                                                                                <label>पहचान
                                                                                                    दस्तावेज़</label>
                                                                                                <input type="text"
                                                                                                    name="files"
                                                                                                    placeholder="पहचान दस्तावेज़">
                                                                                                >>>>>>>
                                                                                                0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                            </div>

                                                                                            <div class="three fields">
                                                                                                <div
                                                                                                    class="four wide field">
                                                                                                    <label>ईमेल
                                                                                                        जावक</label>
                                                                                                    <input type="date"
                                                                                                        name="email_sent"
                                                                                                        placeholder="ईमेल जावक">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="four wide field">
                                                                                                    <label>ईमेल
                                                                                                        आवक</label>
                                                                                                    <input type="date"
                                                                                                        name="email_received"
                                                                                                        placeholder="ईमेल आवक">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="eight wide field">
                                                                                                    <label>नाम</label>
                                                                                                    <input type="text"
                                                                                                        name="suspect_name"
                                                                                                        placeholder="नाम">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="four fields">
                                                                                                <div class="field">
                                                                                                    <label>पता</label>
                                                                                                    <input type="text"
                                                                                                        name="suspect_address"
                                                                                                        placeholder="पता">
                                                                                                </div>
                                                                                                <div class="field">
                                                                                                    <label>जिला</label>
                                                                                                    <input type="text"
                                                                                                        name="district"
                                                                                                        placeholder="जिला">
                                                                                                </div>
                                                                                                <div class="field">
                                                                                                    <label>प्रदेश</label>
                                                                                                    <input type="text"
                                                                                                        name="city"
                                                                                                        placeholder="प्रदेश">
                                                                                                </div>
                                                                                                <div class="field">
                                                                                                    <label>रिटेलर
                                                                                                        नाम</label>
                                                                                                    <input type="text"
                                                                                                        name="retailer_name"
                                                                                                        placeholder="रिटेलर नाम">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="four fields">
                                                                                                <div
                                                                                                    class="fifteen wide field">
                                                                                                    <label>यू आई डी
                                                                                                        नंबर</label>
                                                                                                    <input type="number"
                                                                                                        name="uid_num"
                                                                                                        placeholder="यू आई डी नंबर">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="fifteen wide field">
                                                                                                    <label>अन्य
                                                                                                        नंबर</label>
                                                                                                    <input type="number"
                                                                                                        name="other_num"
                                                                                                        placeholder="अन्य नंबर">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="nine wide field">
                                                                                                    <label>पीडीएफ</label>
                                                                                                    <input type="text"
                                                                                                        name="pdf"
                                                                                                        placeholder="पीडीएफ">
                                                                                                </div>
                                                                                                <div class="field">
                                                                                                    <label>तस्दीक</label>
                                                                                                    <div class="fields">
                                                                                                        <select
                                                                                                            name="crime_type"
                                                                                                            class="ui fluid dropdown">
                                                                                                            <option
                                                                                                                value=''
                                                                                                                selected=''
                                                                                                                disabled=''>
                                                                                                                तस्दीक
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value=''
                                                                                                                id=''>
                                                                                                                हाँ
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value=''
                                                                                                                id=''>
                                                                                                                नही
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="four fields">
                                                                                                <div
                                                                                                    class="nine wide field">
                                                                                                    <label>रिमार्क्स</label>
                                                                                                    <input type="text"
                                                                                                        name="remark"
                                                                                                        placeholder="रिमार्क्स">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="three wide field">
                                                                                                    <label>रिमाइंडर</label>
                                                                                                    <input type="date"
                                                                                                        name="reminder"
                                                                                                        placeholder="रिमाइंडर">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="nine wide field">
                                                                                                    <label>मेल आई
                                                                                                        डी</label>
                                                                                                    <input type="email"
                                                                                                        name="mail_id"
                                                                                                        placeholder="मेल आई डी">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="three wide field">
                                                                                                    <label>कैफ
                                                                                                        दिनाक</label>
                                                                                                    <input type="date"
                                                                                                        name="caf_date"
                                                                                                        placeholder="कैफ दिनाक">
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-------------------------->
                                                                                            <!--------CDR details------->
                                                                                            <!-------------------------->
                                                                                            <button type="button"
                                                                                                id="btn_addcdr"
                                                                                                class="add-number-cdr-btn ui orange button my-3"
                                                                                                data-toggle="collapse"
                                                                                                data-target="#suspect_no_cdr_details">
                                                                                                Add CDR details
                                                                                                <<<<<<< HEAD </button>
                                                                                                    <div class="collapse"
                                                                                                        id="suspect_no_cdr_details">
                                                                                                        <div id="cdr_details"
                                                                                                            class="card card-body">
                                                                                                            <!--id--->
                                                                                                            =======
                                                                                            </button>
                                                                                            <div class="collapse"
                                                                                                id="suspect_no_cdr_details">
                                                                                                <div id="cdr_details"
                                                                                                    class="card card-body">
                                                                                                    <!--id--->
                                                                                                    <button
                                                                                                        type="button"
                                                                                                        class="close ml-auto"
                                                                                                        aria-label="Close"
                                                                                                        id="suspect_no_cdr_details_close">
                                                                                                        <span
                                                                                                            aria-hidden="true">&times;</span>
                                                                                                    </button>
                                                                                                    <<<<<<< HEAD>>>>>>>
                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                        =======
                                                                                                        >>>>>>>
                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                        <div
                                                                                                            class="four fields">
                                                                                                            <div
                                                                                                                class="nine wide field">
                                                                                                                <label>सी
                                                                                                                    डी
                                                                                                                    आर
                                                                                                                    नंबर
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    name="cdr_number"
                                                                                                                    placeholder="सी डी आर नंबर">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="three wide field">
                                                                                                                <label>इमेल
                                                                                                                    जावक
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="date"
                                                                                                                    name="cdr_email_outgoing"
                                                                                                                    placeholder="इमेल जावक">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="three wide field">
                                                                                                                <label>मेल
                                                                                                                    प्राप्त
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="date"
                                                                                                                    name="cdr_mail_recieved"
                                                                                                                    placeholder="मेल प्राप्त दिनाक">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="nine wide field">
                                                                                                                <label>IMEI</label>
                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    name="imei_number"
                                                                                                                    placeholder="IMEI number">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="four fields">
                                                                                                            <div
                                                                                                                class="six wide field">
                                                                                                                <label>IMSI</label>
                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    name="imsi_number"
                                                                                                                    placeholder="IMSI number">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="nine wide field">
                                                                                                                <label>लोकेशन
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="cdr_location"
                                                                                                                    placeholder="लोकेशन">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="three wide field">
                                                                                                                <label>लोकेशन
                                                                                                                    दिनाक
                                                                                                                    समय
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="datetime-local"
                                                                                                                    name="cdr_location_datetime"
                                                                                                                    placeholder="लोकेशन दिनाक समय">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="six wide field">
                                                                                                                <label>Frequent
                                                                                                                    callers
                                                                                                                    5</label>
                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    name="cdr_frequent_caller"
                                                                                                                    placeholder="Frequent callers 5">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="four fields">
                                                                                                            <div
                                                                                                                class="six wide field">
                                                                                                                <label>night
                                                                                                                    location</label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="cdr_night_location"
                                                                                                                    placeholder="night location">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="eight wide field">
                                                                                                                <label>messages
                                                                                                                    bank/UPI/wallet/services
                                                                                                                    name
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="cdr_services_name"
                                                                                                                    placeholder="messages bank/UPI/wallet/services name">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="seven wide field">
                                                                                                                <label>संदिग्ध
                                                                                                                    नंबर
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    name="cdr_suspect_number"
                                                                                                                    placeholder="संदिग्ध नंबर">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="six wide field">
                                                                                                                <label>सी
                                                                                                                    डी
                                                                                                                    आर,
                                                                                                                    पी
                                                                                                                    डी
                                                                                                                    ऍफ़
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="file"
                                                                                                                    name="cdr_pdf"
                                                                                                                    placeholder="सी डी आर, पी डी ऍफ़">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="field">
                                                                                                            <button
                                                                                                                class="ui button form-btn"
                                                                                                                type="submit"
                                                                                                                id="btn_submit_cdr">submit
                                                                                                                cdr</button>
                                                                                                        </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-------------------------->
                                                                                            <div
                                                                                                id="suspect_num_table_cdr">
                                                                                                <table
                                                                                                    class="table table-bordered p-0 m-0">
                                                                                                    <thead>
                                                                                                        <tr
                                                                                                            id="table-head">
                                                                                                            <th
                                                                                                                scope="col">
                                                                                                                S.No
                                                                                                            </th>
                                                                                                            <th
                                                                                                                scope="col">
                                                                                                                CDR
                                                                                                                numbers
                                                                                                            </th>
                                                                                                            <th
                                                                                                                scope="col">
                                                                                                                Update/Delete
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody id="old-row">
                                                                                                        <tr>
                                                                                                            <td>No
                                                                                                                Number
                                                                                                                Added
                                                                                                                Yet</td>
                                                                                                            <td>No
                                                                                                                Number
                                                                                                                Added
                                                                                                                Yet</td>
                                                                                                            <td>No
                                                                                                                Number
                                                                                                                Added
                                                                                                                Yet</td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                    <tbody id="new-row">
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                            <!-------------------------->
                                                                                            <!---CDR details ends------->
                                                                                            <!-------------------------->

                                                                                            <!----------------------------->
                                                                                            <!---------IPDR details-------->
                                                                                            <!----------------------------->

                                                                                            <<<<<<< HEAD <button
                                                                                                type="button"
                                                                                                id="btn_addipdr"
                                                                                                class="add-number-ipdr-btn ui orange button my-3"
                                                                                                data-toggle="collapse"
                                                                                                data-target="#suspect_no_ipdr_details">
                                                                                                Add IPDR details
                                                                                                </button>
                                                                                                <div class="collapse"
                                                                                                    id="suspect_no_ipdr_details">
                                                                                                    <div class="card card-body"
                                                                                                        id="ipdr_details">
                                                                                                        <!----ipdr id--->
                                                                                                        <div
                                                                                                            class="five fields">
                                                                                                            <div
                                                                                                                class="six wide field">
                                                                                                                <label>आई
                                                                                                                    पी
                                                                                                                    डी
                                                                                                                    आर
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="number"
                                                                                                                    name="ipdr_number"
                                                                                                                    placeholder="आई पी डी आर ">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="three wide field">
                                                                                                                <label>इमेल
                                                                                                                    जावक
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="date"
                                                                                                                    name="ipdr_email_outgoing"
                                                                                                                    placeholder="इमेल जावक">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="three wide field">
                                                                                                                <label>मेल
                                                                                                                    प्राप्त
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="date"
                                                                                                                    name="ipdr_mail_recieved"
                                                                                                                    placeholder="मेल प्राप्त दिनाक">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="six wide field">
                                                                                                                <label>लोकेशन
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="ipdr_location"
                                                                                                                    placeholder="लोकेशन">
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="six wide field">
                                                                                                                <label>Websites/apps
                                                                                                                </label>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="ipdr_websites"
                                                                                                                    placeholder="Websites/apps">
                                                                                                            </div>
                                                                                                            =======
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                id="btn_addipdr"
                                                                                                                class="add-number-ipdr-btn ui orange button my-3"
                                                                                                                data-toggle="collapse"
                                                                                                                data-target="#suspect_no_ipdr_details">
                                                                                                                Add IPDR
                                                                                                                details
                                                                                                            </button>
                                                                                                            <div class="collapse"
                                                                                                                id="suspect_no_ipdr_details">
                                                                                                                <div class="card card-body"
                                                                                                                    id="ipdr_details">
                                                                                                                    <!----ipdr id--->
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="close ml-auto"
                                                                                                                        aria-label="Close"
                                                                                                                        id="suspect_no_ipdr_details_close">
                                                                                                                        <span
                                                                                                                            aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                    <div
                                                                                                                        class="five fields">
                                                                                                                        <div
                                                                                                                            class="six wide field">
                                                                                                                            <label>आई
                                                                                                                                पी
                                                                                                                                डी
                                                                                                                                आर
                                                                                                                            </label>
                                                                                                                            <input
                                                                                                                                type="number"
                                                                                                                                name="ipdr_number"
                                                                                                                                placeholder="आई पी डी आर ">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="three wide field">
                                                                                                                            <label>इमेल
                                                                                                                                जावक
                                                                                                                            </label>
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                name="ipdr_email_outgoing"
                                                                                                                                placeholder="इमेल जावक">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="three wide field">
                                                                                                                            <label>मेल
                                                                                                                                प्राप्त
                                                                                                                            </label>
                                                                                                                            <input
                                                                                                                                type="date"
                                                                                                                                name="ipdr_mail_recieved"
                                                                                                                                placeholder="मेल प्राप्त दिनाक">
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="six wide field">
                                                                                                                            <label>लोकेशन
                                                                                                                            </label>
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                name="ipdr_location"
                                                                                                                                placeholder="लोकेशन">
                                                                                                                            >>>>>>>
                                                                                                                            0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="field">
                                                                                                                            <button
                                                                                                                                class="ui button form-btn"
                                                                                                                                type="submit"
                                                                                                                                id="btn_submit_ipdr">submit
                                                                                                                                ipdr</button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <!----------------------------->
                                                                                                                <div
                                                                                                                    id="suspect_num_table_ipdr">
                                                                                                                    <table
                                                                                                                        class="table table-bordered p-0 m-0">
                                                                                                                        <thead>
                                                                                                                            <tr
                                                                                                                                id="table-head">
                                                                                                                                <th
                                                                                                                                    scope="col">
                                                                                                                                    S.No
                                                                                                                                </th>
                                                                                                                                <th
                                                                                                                                    scope="col">
                                                                                                                                    IPDR
                                                                                                                                    numbers
                                                                                                                                </th>
                                                                                                                                <th
                                                                                                                                    scope="col">
                                                                                                                                    Update/Delete
                                                                                                                                </th>
                                                                                                                            </tr>
                                                                                                                        </thead>
                                                                                                                        <tbody
                                                                                                                            id="old-row">
                                                                                                                            <tr>
                                                                                                                                <td>No
                                                                                                                                    Number
                                                                                                                                    Added
                                                                                                                                    Yet
                                                                                                                                </td>
                                                                                                                                <td>No
                                                                                                                                    Number
                                                                                                                                    Added
                                                                                                                                    Yet
                                                                                                                                </td>
                                                                                                                                <td>No
                                                                                                                                    Number
                                                                                                                                    Added
                                                                                                                                    Yet
                                                                                                                                </td>
                                                                                                                            </tr>
                                                                                                                        </tbody>
                                                                                                                        <tbody
                                                                                                                            id="new-row">
                                                                                                                        </tbody>
                                                                                                                    </table>
                                                                                                                </div>
                                                                                                                <!----------------------------->
                                                                                                                <!------IPDR details ends------>
                                                                                                                <!----------------------------->

                                                                                                                <!----------------------------->
                                                                                                                <!-------UPI Details----------->
                                                                                                                <!----------------------------->
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    id="btn_addupi"
                                                                                                                    class="add-number-ipdr-btn ui orange button my-3"
                                                                                                                    data-toggle="collapse"
                                                                                                                    data-target="#suspect_no_upi_details">
                                                                                                                    Add
                                                                                                                    UPI
                                                                                                                    details
                                                                                                                </button>
                                                                                                                <div class="collapse"
                                                                                                                    id="suspect_no_upi_details">
                                                                                                                    <div class="card card-body"
                                                                                                                        id="upi_details">
                                                                                                                        <!----upi details id--->
                                                                                                                        <div
                                                                                                                            class="five fields">
                                                                                                                            <div
                                                                                                                                class="six wide field">
                                                                                                                                <label>UPI</label>
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    name="upi_id"
                                                                                                                                    placeholder="UPI id ">
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="six wide field">
                                                                                                                                <label>UPI
                                                                                                                                    Link</label>
                                                                                                                                <select
                                                                                                                                    name="UPI Link"
                                                                                                                                    class="ui dropdown">
                                                                                                                                    <option
                                                                                                                                        type="radio"
                                                                                                                                        value="हाँ"
                                                                                                                                        name="upi_link_confirm">
                                                                                                                                        हाँ
                                                                                                                                    </option>
                                                                                                                                    <option
                                                                                                                                        type="radio"
                                                                                                                                        value="नही"
                                                                                                                                        name="upi_link_confirm">
                                                                                                                                        नही
                                                                                                                                    </option>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="six wide field">
                                                                                                                                <label>UPI
                                                                                                                                    name</label>
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    name="upi_name"
                                                                                                                                    placeholder="UPI name ">
                                                                                                                            </div>

                                                                                                                            <<<<<<<
                                                                                                                                HEAD=======<!----------------------------->
                                                                                                                                <!-------UPI Details----------->
                                                                                                                                <!----------------------------->
                                                                                                                                <button
                                                                                                                                    type="button"
                                                                                                                                    id="btn_addupi"
                                                                                                                                    class="add-number-ipdr-btn ui orange button my-3"
                                                                                                                                    data-toggle="collapse"
                                                                                                                                    data-target="#suspect_no_upi_details">
                                                                                                                                    Add
                                                                                                                                    UPI
                                                                                                                                    details
                                                                                                                                </button>
                                                                                                                                <div class="collapse"
                                                                                                                                    id="suspect_no_upi_details">
                                                                                                                                    <div class="card card-body"
                                                                                                                                        id="upi_details">
                                                                                                                                        <!----upi details id--->
                                                                                                                                        <button
                                                                                                                                            type="button"
                                                                                                                                            class="close ml-auto"
                                                                                                                                            aria-label="Close"
                                                                                                                                            id="suspect_no_upi_details_close">
                                                                                                                                            <span
                                                                                                                                                aria-hidden="true">&times;</span>
                                                                                                                                        </button>
                                                                                                                                        <div
                                                                                                                                            class="five fields">
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>UPI</label>
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    name="upi_id"
                                                                                                                                                    placeholder="UPI id ">
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>UPI
                                                                                                                                                    Link</label>
                                                                                                                                                <select
                                                                                                                                                    name="UPI Link"
                                                                                                                                                    class="ui dropdown">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ"
                                                                                                                                                        name="upi_link_confirm">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही"
                                                                                                                                                        name="upi_link_confirm">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                                >>>>>>>
                                                                                                                                                0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="field">
                                                                                                                                                <button
                                                                                                                                                    class="ui button form-btn"
                                                                                                                                                    type="submit"
                                                                                                                                                    id="btn_submit_upi">submit
                                                                                                                                                    upi
                                                                                                                                                    details</button>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <!--------------------------->
                                                                                                                                    <div
                                                                                                                                        id="suspect_num_table_upi">
                                                                                                                                        <table
                                                                                                                                            class="table table-bordered p-0 m-0">
                                                                                                                                            <thead>
                                                                                                                                                <tr
                                                                                                                                                    id="table-head">
                                                                                                                                                    <th
                                                                                                                                                        scope="col">
                                                                                                                                                        S.No
                                                                                                                                                    </th>
                                                                                                                                                    <th
                                                                                                                                                        scope="col">
                                                                                                                                                        UPI
                                                                                                                                                        id's
                                                                                                                                                    </th>
                                                                                                                                                    <th
                                                                                                                                                        scope="col">
                                                                                                                                                        Update/Delete
                                                                                                                                                    </th>
                                                                                                                                                </tr>
                                                                                                                                            </thead>
                                                                                                                                            <tbody
                                                                                                                                                id="old-row">
                                                                                                                                                <tr>
                                                                                                                                                    <td>No
                                                                                                                                                        Number
                                                                                                                                                        Added
                                                                                                                                                        Yet
                                                                                                                                                    </td>
                                                                                                                                                    <td>No
                                                                                                                                                        Number
                                                                                                                                                        Added
                                                                                                                                                        Yet
                                                                                                                                                    </td>
                                                                                                                                                    <td>No
                                                                                                                                                        Number
                                                                                                                                                        Added
                                                                                                                                                        Yet
                                                                                                                                                    </td>
                                                                                                                                                </tr>
                                                                                                                                            </tbody>
                                                                                                                                            <tbody
                                                                                                                                                id="new-row">
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                    </div>
                                                                                                                                    <!----------------------------->
                                                                                                                                    <!-------UPI Details ends ----------->
                                                                                                                                    <!----------------------------->
                                                                                                                                    <br>
                                                                                                                                    <div
                                                                                                                                        class="field">
                                                                                                                                        <button
                                                                                                                                            class="ui button form-btn"
                                                                                                                                            name="number_form"
                                                                                                                                            type="submit">
                                                                                                                                            Submit
                                                                                                                                        </button>
                                                                                                                                    </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!----------------------------------->
                                                                        <!--Suspect Number Detail Form Ends-->
                                                                        <!----------------------------------->
                                                                        <div id="suspect_num_table_main">
                                                                            <table class="table table-bordered p-0 m-0">
                                                                                <thead>
                                                                                    <tr id="table-head">
                                                                                        <th scope="col">S.No</th>
                                                                                        <th scope="col">Phone numbers
                                                                                        </th>
                                                                                        <th scope="col">Update/Delete
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="old-row">
                                                                                    <tr>
                                                                                        <td>No Number Added Yet</td>
                                                                                        <td>No Number Added Yet</td>
                                                                                        <td>No Number Added Yet</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                                <tbody id="new-row"></tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!------------------------------------------------->
                                                                <<<<<<< HEAD <!--Add Account Number-->
                                                                    <div class="card card-body">
                                                                        <div class="contact-list py-4">
                                                                            <div class=" text-center">
                                                                                <h1 class="sub-head">खाते की जानकारी
                                                                                </h1>
                                                                            </div>
                                                                            <button type="button"
                                                                                class="add-number-btn ui button my-3"
                                                                                data-toggle="collapse"
                                                                                data-target="#suspect_acc_details"
                                                                                id="btn_addacc">
                                                                                Add Account Detail
                                                                            </button>
                                                                            <!------------------------------->
                                                                            <!--Suspect Account detail form-->
                                                                            <!------------------------------->

                                                                            <div class="collapse"
                                                                                id="suspect_acc_details">
                                                                                <div class="card card-body">
                                                                                    <div class="acc-detail-form-div">

                                                                                        <form id="acc_detailform"
                                                                                            class="acc-detail-form"
                                                                                            method="POST"
                                                                                            action="insertFiles/insert_accountForm.php">
                                                                                            <div class="two fields">
                                                                                                <div
                                                                                                    class="eight wide field">
                                                                                                    <label> खाता
                                                                                                        नंबर</label>
                                                                                                    <input type="text"
                                                                                                        name="acc_num"
                                                                                                        placeholder="खाता नंबर" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="eight wide field">
                                                                                                    <label>बैंक नाम
                                                                                                    </label>
                                                                                                    <input type="text"
                                                                                                        name="bank_name"
                                                                                                        placeholder="बैंक नाम" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="four fields">
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>राज्य
                                                                                                    </label>
                                                                                                    <input type="tel"
                                                                                                        name="state"
                                                                                                        placeholder="राज्य" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>ब्रांच नाम
                                                                                                    </label>
                                                                                                    <input type="tel"
                                                                                                        name="branch_name"
                                                                                                        placeholder="ब्रांच नाम" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>मेल
                                                                                                        दिनाक</label>
                                                                                                    <input type="date"
                                                                                                        name="mail_date"
                                                                                                        placeholder="ब्रांच नाम" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>मेल प्राप्त
                                                                                                    </label>
                                                                                                    <select
                                                                                                        name="mail_update"
                                                                                                        class="ui dropdown">
                                                                                                        <option
                                                                                                            value="">मेल
                                                                                                            प्राप्त
                                                                                                        </option>
                                                                                                        <option
                                                                                                            type="radio"
                                                                                                            value="हाँ"
                                                                                                            name="confirmation">
                                                                                                            हाँ
                                                                                                        </option>
                                                                                                        <option
                                                                                                            type="radio"
                                                                                                            value="नही"
                                                                                                            name="confirmation">
                                                                                                            नही
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="two fields">
                                                                                                <div
                                                                                                    class="eight wide field">
                                                                                                    <label>के वाय सी नाम
                                                                                                    </label>
                                                                                                    <input type="text"
                                                                                                        name="kyc_name"
                                                                                                        placeholder="के वाय सी नाम " />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="eight wide field">
                                                                                                    <label>पता</label>
                                                                                                    <input type="text"
                                                                                                        name="address"
                                                                                                        placeholder="पता" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="four fields">
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>जिला </label>
                                                                                                    <input type="tel"
                                                                                                        name="city"
                                                                                                        placeholder="जिला " />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>राज्य</label>
                                                                                                    <input type="text"
                                                                                                        name="state_twice"
                                                                                                        placeholder="राज्य" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>अल्टरनेट नंबर
                                                                                                    </label>
                                                                                                    <input type="text"
                                                                                                        name="alt_num"
                                                                                                        placeholder="अल्टरनेट नंबर " />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>लाभार्थी
                                                                                                        खाता</label>
                                                                                                    <input type="text"
                                                                                                        name="profit_acc"
                                                                                                        placeholder="लाभार्थी खाता " />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="four fields">
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>इन्टरनेट
                                                                                                        बैंकिंग चालू है
                                                                                                    </label>
                                                                                                    <select
                                                                                                        name="internet_info"
                                                                                                        class="ui dropdown">
                                                                                                        <option
                                                                                                            value="">
                                                                                                            इन्टरनेट
                                                                                                            बैंकिंग चालू
                                                                                                            है </option>
                                                                                                        <option
                                                                                                            type="radio"
                                                                                                            value="हाँ">
                                                                                                            हाँ</option>
                                                                                                        <option
                                                                                                            type="radio"
                                                                                                            value="नही">
                                                                                                            नही</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>बैंक मेनेजर
                                                                                                        नाम </label>
                                                                                                    <input type="text"
                                                                                                        name="bank_man_name"
                                                                                                        placeholder="बैंक मेनेजर नाम  " />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>बैंक मेनेजर
                                                                                                        नंबर</label>
                                                                                                    <input type="text"
                                                                                                        name="bank_man_num"
                                                                                                        placeholder="बैंक मेनेजर नंबर" />
                                                                                                </div>
                                                                                                <div
                                                                                                    class="six wide field">
                                                                                                    <label>के वाय सी पी
                                                                                                        डी ऍफ़</label>
                                                                                                    <input type="file"
                                                                                                        name="kyc_pdf"
                                                                                                        placeholder="के वाय सी पी डी ऍफ़" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <!----------------------------->
                                                                                            <!-------Pan Details----------->
                                                                                            <!----------------------------->
                                                                                            <button type="button"
                                                                                                id="btn_addpan"
                                                                                                class="add-account-pan-btn ui orange button my-3"
                                                                                                data-toggle="collapse"
                                                                                                data-target="#suspect_acc_pan_details">
                                                                                                Add PAN details
                                                                                            </button>
                                                                                            <div class="collapse"
                                                                                                id="suspect_acc_pan_details">
                                                                                                <div id="pan_details"
                                                                                                    class="card card-body">
                                                                                                    <!--id--->
                                                                                                    =======
                                                                                                    <!--Add Account Number-->
                                                                                                    <div
                                                                                                        class="card card-body">
                                                                                                        <div
                                                                                                            class="contact-list py-4">
                                                                                                            <div
                                                                                                                class=" text-center">
                                                                                                                <h1
                                                                                                                    class="sub-head">
                                                                                                                    खाते
                                                                                                                    की
                                                                                                                    जानकारी
                                                                                                                </h1>
                                                                                                            </div>
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="add-number-btn ui button my-3"
                                                                                                                data-toggle="collapse"
                                                                                                                data-target="#suspect_acc_details"
                                                                                                                id="btn_addacc">
                                                                                                                Add
                                                                                                                Account
                                                                                                                Detail
                                                                                                            </button>
                                                                                                            <!------------------------------->
                                                                                                            <!--Suspect Account detail form-->
                                                                                                            <!------------------------------->

                                                                                                            <div class="collapse"
                                                                                                                id="suspect_acc_details">
                                                                                                                <div
                                                                                                                    class="card card-body">
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        class="close ml-auto"
                                                                                                                        aria-label="Close"
                                                                                                                        id="suspect_acc_details_close">
                                                                                                                        <span
                                                                                                                            aria-hidden="true">&times;</span>
                                                                                                                    </button>
                                                                                                                    <div
                                                                                                                        class="acc-detail-form-div">

                                                                                                                        <form
                                                                                                                            id="acc_detailform"
                                                                                                                            class="acc-detail-form"
                                                                                                                            method="POST"
                                                                                                                            action="insertFiles/insert_accountForm.php">
                                                                                                                            <div
                                                                                                                                class="two fields">
                                                                                                                                <div
                                                                                                                                    class="eight wide field">
                                                                                                                                    <label>
                                                                                                                                        खाता
                                                                                                                                        नंबर</label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="acc_num"
                                                                                                                                        placeholder="खाता नंबर" />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="eight wide field">
                                                                                                                                    <label>बैंक
                                                                                                                                        नाम
                                                                                                                                    </label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="bank_name"
                                                                                                                                        placeholder="बैंक नाम" />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="four fields">
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>राज्य
                                                                                                                                    </label>
                                                                                                                                    <input
                                                                                                                                        type="tel"
                                                                                                                                        name="state"
                                                                                                                                        placeholder="राज्य" />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>ब्रांच
                                                                                                                                        नाम
                                                                                                                                    </label>
                                                                                                                                    <input
                                                                                                                                        type="tel"
                                                                                                                                        name="branch_name"
                                                                                                                                        placeholder="ब्रांच नाम" />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>मेल
                                                                                                                                        दिनाक</label>
                                                                                                                                    <input
                                                                                                                                        type="date"
                                                                                                                                        name="mail_date"
                                                                                                                                        placeholder="ब्रांच नाम" />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>मेल
                                                                                                                                        प्राप्त
                                                                                                                                    </label>
                                                                                                                                    <select
                                                                                                                                        name="mail_update"
                                                                                                                                        class="ui dropdown">
                                                                                                                                        <option
                                                                                                                                            value="">
                                                                                                                                            मेल
                                                                                                                                            प्राप्त
                                                                                                                                        </option>
                                                                                                                                        <option
                                                                                                                                            type="radio"
                                                                                                                                            value="हाँ"
                                                                                                                                            name="confirmation">
                                                                                                                                            हाँ
                                                                                                                                        </option>
                                                                                                                                        <option
                                                                                                                                            type="radio"
                                                                                                                                            value="नही"
                                                                                                                                            name="confirmation">
                                                                                                                                            नही
                                                                                                                                        </option>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="two fields">
                                                                                                                                <div
                                                                                                                                    class="eight wide field">
                                                                                                                                    <label>के
                                                                                                                                        वाय
                                                                                                                                        सी
                                                                                                                                        नाम
                                                                                                                                    </label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="kyc_name"
                                                                                                                                        placeholder="के वाय सी नाम " />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="eight wide field">
                                                                                                                                    <label>पता</label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="address"
                                                                                                                                        placeholder="पता" />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="four fields">
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>जिला
                                                                                                                                    </label>
                                                                                                                                    <input
                                                                                                                                        type="tel"
                                                                                                                                        name="city"
                                                                                                                                        placeholder="जिला " />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>राज्य</label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="state_twice"
                                                                                                                                        placeholder="राज्य" />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>अल्टरनेट
                                                                                                                                        नंबर
                                                                                                                                    </label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="alt_num"
                                                                                                                                        placeholder="अल्टरनेट नंबर " />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>लाभार्थी
                                                                                                                                        खाता</label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="profit_acc"
                                                                                                                                        placeholder="लाभार्थी खाता " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="four fields">
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>इन्टरनेट
                                                                                                                                        बैंकिंग
                                                                                                                                        चालू
                                                                                                                                        है
                                                                                                                                    </label>
                                                                                                                                    <select
                                                                                                                                        name="internet_info"
                                                                                                                                        class="ui dropdown">
                                                                                                                                        <option
                                                                                                                                            value="">
                                                                                                                                            इन्टरनेट
                                                                                                                                            बैंकिंग
                                                                                                                                            चालू
                                                                                                                                            है
                                                                                                                                        </option>
                                                                                                                                        <option
                                                                                                                                            type="radio"
                                                                                                                                            value="हाँ">
                                                                                                                                            हाँ
                                                                                                                                        </option>
                                                                                                                                        <option
                                                                                                                                            type="radio"
                                                                                                                                            value="नही">
                                                                                                                                            नही
                                                                                                                                        </option>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>बैंक
                                                                                                                                        मेनेजर
                                                                                                                                        नाम
                                                                                                                                    </label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="bank_man_name"
                                                                                                                                        placeholder="बैंक मेनेजर नाम  " />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>बैंक
                                                                                                                                        मेनेजर
                                                                                                                                        नंबर</label>
                                                                                                                                    <input
                                                                                                                                        type="text"
                                                                                                                                        name="bank_man_num"
                                                                                                                                        placeholder="बैंक मेनेजर नंबर" />
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    class="six wide field">
                                                                                                                                    <label>के
                                                                                                                                        वाय
                                                                                                                                        सी
                                                                                                                                        पी
                                                                                                                                        डी
                                                                                                                                        ऍफ़</label>
                                                                                                                                    <input
                                                                                                                                        type="file"
                                                                                                                                        name="kyc_pdf"
                                                                                                                                        placeholder="के वाय सी पी डी ऍफ़" />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <!----------------------------->
                                                                                                                            <!-------Pan Details----------->
                                                                                                                            <!----------------------------->
                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                id="btn_addpan"
                                                                                                                                class="add-account-pan-btn ui orange button my-3"
                                                                                                                                data-toggle="collapse"
                                                                                                                                data-target="#suspect_acc_pan_details">
                                                                                                                                Add
                                                                                                                                PAN
                                                                                                                                details
                                                                                                                            </button>
                                                                                                                            <div class="collapse"
                                                                                                                                id="suspect_acc_pan_details">
                                                                                                                                <div id="pan_details"
                                                                                                                                    class="card card-body">
                                                                                                                                    <!--id--->
                                                                                                                                    <button
                                                                                                                                        type="button"
                                                                                                                                        class="close ml-auto"
                                                                                                                                        aria-label="Close"
                                                                                                                                        id="suspect_acc_pan_details_close">
                                                                                                                                        <span
                                                                                                                                            aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                    <<<<<<<
                                                                                                                                        HEAD>
                                                                                                                                        >>>>>>
                                                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                        =======
                                                                                                                                        >>>>>>>
                                                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                        <div
                                                                                                                                            class="four fields">
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>PAN
                                                                                                                                                </label>
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    name="pan_number"
                                                                                                                                                    placeholder="PAN number">
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="three wide field">
                                                                                                                                                <label>PAN
                                                                                                                                                    Verified
                                                                                                                                                </label>
                                                                                                                                                <select
                                                                                                                                                    class="ui dropdown"
                                                                                                                                                    id="pan_verified"
                                                                                                                                                    name="pan_verified">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>PAN
                                                                                                                                                    Username
                                                                                                                                                </label>
                                                                                                                                                <input
                                                                                                                                                    type="text"
                                                                                                                                                    name="Pan_username"
                                                                                                                                                    placeholder="PAN username">
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="nine wide field">
                                                                                                                                                <label>Aadhar
                                                                                                                                                    number</label>
                                                                                                                                                <input
                                                                                                                                                    type="number"
                                                                                                                                                    name="Aadhar_number"
                                                                                                                                                    placeholder="aadhar number">
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div
                                                                                                                                            class="four fields">
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>Income
                                                                                                                                                    Tax
                                                                                                                                                </label>
                                                                                                                                                <select
                                                                                                                                                    class="ui dropdown"
                                                                                                                                                    id="incometax"
                                                                                                                                                    name="incometax">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="nine wide field">
                                                                                                                                                <label>GST
                                                                                                                                                    In
                                                                                                                                                </label>
                                                                                                                                                <select
                                                                                                                                                    class="ui dropdown"
                                                                                                                                                    id="gst_in"
                                                                                                                                                    name="gst_in">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="three wide field">
                                                                                                                                                <label>Tin
                                                                                                                                                </label>
                                                                                                                                                <select
                                                                                                                                                    class="ui dropdown"
                                                                                                                                                    id="Tin"
                                                                                                                                                    name="Tin">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>Sales
                                                                                                                                                    Tax
                                                                                                                                                </label>
                                                                                                                                                <select
                                                                                                                                                    class="ui dropdown"
                                                                                                                                                    id="salestax"
                                                                                                                                                    name="salestax">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                            </div>
                                                                                                                                        </div>

                                                                                                                                        <div
                                                                                                                                            class="field">
                                                                                                                                            <button
                                                                                                                                                class="ui button form-btn"
                                                                                                                                                type="submit"
                                                                                                                                                id="btn_submit_pan">Submit
                                                                                                                                                PAN
                                                                                                                                                details</button>
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <!-------------------------->
                                                                                                                            <div
                                                                                                                                id="suspect_acc_table_pan">
                                                                                                                                <table
                                                                                                                                    class="table table-bordered p-0 m-0">
                                                                                                                                    <thead>
                                                                                                                                        <tr
                                                                                                                                            id="table-head">
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                S.No
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                PAN
                                                                                                                                                numbers
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                Update/Delete
                                                                                                                                            </th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>
                                                                                                                                    <tbody
                                                                                                                                        id="old-row">
                                                                                                                                        <tr>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                    <tbody
                                                                                                                                        id="new-row">
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                            <!--------------------------------->
                                                                                                                            <!---------Pan details end--------->
                                                                                                                            <!--------------------------------->
                                                                                                                            <!----------------------------->
                                                                                                                            <!--Bank Account Atm Details--->
                                                                                                                            <!----------------------------->
                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                id="btn_addatm"
                                                                                                                                class="add-account-atm-btn ui orange button my-3"
                                                                                                                                data-toggle="collapse"
                                                                                                                                data-target="#suspect_acc_atm_details">
                                                                                                                                Add
                                                                                                                                Bank
                                                                                                                                Account
                                                                                                                                Atm
                                                                                                                                details
                                                                                                                                <<<<<<<
                                                                                                                                    HEAD
                                                                                                                                    </button>
                                                                                                                                    <div class="collapse"
                                                                                                                                        id="suspect_acc_atm_details">
                                                                                                                                        <div id="atm_details"
                                                                                                                                            class="card card-body">
                                                                                                                                            <!--id--->
                                                                                                                                            =======
                                                                                                                            </button>
                                                                                                                            <div class="collapse"
                                                                                                                                id="suspect_acc_atm_details">
                                                                                                                                <div id="atm_details"
                                                                                                                                    class="card card-body">
                                                                                                                                    <!--id--->
                                                                                                                                    <button
                                                                                                                                        type="button"
                                                                                                                                        class="close ml-auto"
                                                                                                                                        aria-label="Close"
                                                                                                                                        id="suspect_acc_atm_details_close">
                                                                                                                                        <span
                                                                                                                                            aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                    <<<<<<<
                                                                                                                                        HEAD>
                                                                                                                                        >>>>>>
                                                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                        =======
                                                                                                                                        >>>>>>>
                                                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                        <div
                                                                                                                                            class="four fields">
                                                                                                                                            <div
                                                                                                                                                class="nine wide field">
                                                                                                                                                <label>ATM
                                                                                                                                                    footage
                                                                                                                                                </label>
                                                                                                                                                <select
                                                                                                                                                    class="ui dropdown"
                                                                                                                                                    id="atm_footage"
                                                                                                                                                    name="atm_footage">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                            </div>

                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>Email
                                                                                                                                                    Sent
                                                                                                                                                </label>
                                                                                                                                                <input
                                                                                                                                                    type="date"
                                                                                                                                                    name="atm_email_sent"
                                                                                                                                                    id="atm_email_sent">
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>Email
                                                                                                                                                    Recieved</label>
                                                                                                                                                <input
                                                                                                                                                    type="date"
                                                                                                                                                    name="atm_email_recieved"
                                                                                                                                                    id="atm_email_recieved">
                                                                                                                                            </div>
                                                                                                                                        </div>

                                                                                                                                        <div
                                                                                                                                            class="field">
                                                                                                                                            <button
                                                                                                                                                class="ui button form-btn"
                                                                                                                                                type="submit"
                                                                                                                                                id="btn_submit_pan">Submit
                                                                                                                                                Atm
                                                                                                                                                details</button>
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <!-------------------------->
                                                                                                                            <div
                                                                                                                                id="suspect_acc_table_atm">
                                                                                                                                <table
                                                                                                                                    class="table table-bordered p-0 m-0">
                                                                                                                                    <thead>
                                                                                                                                        <tr
                                                                                                                                            id="table-head">
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                S.No
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                ATM
                                                                                                                                                footages
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                Update/Delete
                                                                                                                                            </th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>
                                                                                                                                    <tbody
                                                                                                                                        id="old-row">
                                                                                                                                        <tr>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                    <tbody
                                                                                                                                        id="new-row">
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                            <!--------------------------------->
                                                                                                                            <!--Bank Account Atm details end--->
                                                                                                                            <!--------------------------------->

                                                                                                                            <!----------------------------->
                                                                                                                            <!-------iplogs Details----------->
                                                                                                                            <!----------------------------->
                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                id="btn_addiplog"
                                                                                                                                class="add-account-iplogs-btn ui orange button my-3"
                                                                                                                                data-toggle="collapse"
                                                                                                                                data-target="#suspect_acc_iplog_details">
                                                                                                                                Add
                                                                                                                                Bank
                                                                                                                                Account
                                                                                                                                iplog
                                                                                                                                details
                                                                                                                                <<<<<<<
                                                                                                                                    HEAD
                                                                                                                                    </button>
                                                                                                                                    <div class="collapse"
                                                                                                                                        id="suspect_acc_iplog_details">
                                                                                                                                        <div id="iplog_details"
                                                                                                                                            class="card card-body">
                                                                                                                                            <!--id--->
                                                                                                                                            =======
                                                                                                                            </button>
                                                                                                                            <div class="collapse"
                                                                                                                                id="suspect_acc_iplog_details">
                                                                                                                                <div id="iplog_details"
                                                                                                                                    class="card card-body">
                                                                                                                                    <!--id--->
                                                                                                                                    <button
                                                                                                                                        type="button"
                                                                                                                                        class="close ml-auto"
                                                                                                                                        aria-label="Close"
                                                                                                                                        id="suspect_acc_iplog_details_close">
                                                                                                                                        <span
                                                                                                                                            aria-hidden="true">&times;</span>
                                                                                                                                    </button>
                                                                                                                                    <<<<<<<
                                                                                                                                        HEAD>
                                                                                                                                        >>>>>>
                                                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                        =======
                                                                                                                                        >>>>>>>
                                                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                        <div
                                                                                                                                            class="four fields">
                                                                                                                                            <div
                                                                                                                                                class="nine wide field">
                                                                                                                                                <label>IPlog
                                                                                                                                                </label>
                                                                                                                                                <select
                                                                                                                                                    class="ui dropdown"
                                                                                                                                                    id="iplog"
                                                                                                                                                    name="iplog">
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="हाँ">
                                                                                                                                                        हाँ
                                                                                                                                                    </option>
                                                                                                                                                    <option
                                                                                                                                                        type="radio"
                                                                                                                                                        value="नही">
                                                                                                                                                        नही
                                                                                                                                                    </option>
                                                                                                                                                </select>
                                                                                                                                            </div>

                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>Email
                                                                                                                                                    Sent
                                                                                                                                                </label>
                                                                                                                                                <input
                                                                                                                                                    type="date"
                                                                                                                                                    name="iplog_email_sent"
                                                                                                                                                    id="iplog_email_sent">
                                                                                                                                            </div>
                                                                                                                                            <div
                                                                                                                                                class="six wide field">
                                                                                                                                                <label>Email
                                                                                                                                                    Recieved</label>
                                                                                                                                                <input
                                                                                                                                                    type="date"
                                                                                                                                                    name="iplog_email_recieved"
                                                                                                                                                    id="iplog_email_recieved">
                                                                                                                                            </div>
                                                                                                                                        </div>

                                                                                                                                        <div
                                                                                                                                            class="field">
                                                                                                                                            <button
                                                                                                                                                class="ui button form-btn"
                                                                                                                                                type="submit"
                                                                                                                                                id="btn_submit_pan">Submit
                                                                                                                                                IPlog
                                                                                                                                                details</button>
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <!-------------------------->
                                                                                                                            <div
                                                                                                                                id="suspect_acc_table_iplog">
                                                                                                                                <table
                                                                                                                                    class="table table-bordered p-0 m-0">
                                                                                                                                    <thead>
                                                                                                                                        <tr
                                                                                                                                            id="table-head">
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                S.No
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                IP
                                                                                                                                                logs
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                Update/Delete
                                                                                                                                            </th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>
                                                                                                                                    <tbody
                                                                                                                                        id="old-row">
                                                                                                                                        <tr>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                    <tbody
                                                                                                                                        id="new-row">
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                            <!--------------------------------->
                                                                                                                            <!---------iplogs details end--------->
                                                                                                                            <!--------------------------------->
                                                                                                                            <br>
                                                                                                                            <button
                                                                                                                                class="ui button form-btn"
                                                                                                                                name="fourth_form"
                                                                                                                                type="submit">
                                                                                                                                Submit
                                                                                                                            </button>
                                                                                                                        </form>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <!----------------------------------->
                                                                                                            <!--Suspect Account detail form End-->
                                                                                                            <!----------------------------------->

                                                                                                            <div
                                                                                                                id="suspect_acc_table_main">
                                                                                                                <table
                                                                                                                    class="table table-bordered p-0 m-0">
                                                                                                                    <thead>
                                                                                                                        <tr
                                                                                                                            id="table-head">
                                                                                                                            <th
                                                                                                                                scope="col">
                                                                                                                                S.No
                                                                                                                            </th>
                                                                                                                            <th
                                                                                                                                scope="col">
                                                                                                                                Account
                                                                                                                                numbers
                                                                                                                            </th>
                                                                                                                            <th
                                                                                                                                scope="col">
                                                                                                                                Update/Delete
                                                                                                                            </th>
                                                                                                                        </tr>
                                                                                                                    </thead>
                                                                                                                    <tbody
                                                                                                                        id="old-row">
                                                                                                                        <tr>
                                                                                                                            <td>No
                                                                                                                                Number
                                                                                                                                Added
                                                                                                                                Yet
                                                                                                                            </td>
                                                                                                                            <td>No
                                                                                                                                Number
                                                                                                                                Added
                                                                                                                                Yet
                                                                                                                            </td>
                                                                                                                            <td>No
                                                                                                                                Number
                                                                                                                                Added
                                                                                                                                Yet
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                    <tbody
                                                                                                                        id="new-row">
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <!--------------------------------------------------------->
                                                                                                    <<<<<<< HEAD <!--Add
                                                                                                        Ewallet-->
                                                                                                        <div
                                                                                                            class="card card-body">
                                                                                                            <div
                                                                                                                class="contact-list py-4">
                                                                                                                <div
                                                                                                                    class=" text-center">
                                                                                                                    <h1
                                                                                                                        class="sub-head">
                                                                                                                        ई-वॉलेट
                                                                                                                        की
                                                                                                                        जानकारी
                                                                                                                    </h1>
                                                                                                                </div>
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    class="add-number-btn ui button my-3"
                                                                                                                    data-toggle="collapse"
                                                                                                                    data-target="#suspect_ewallet_details"
                                                                                                                    id="btn_addewallet">
                                                                                                                    Add
                                                                                                                    E-Wallet
                                                                                                                    Detail
                                                                                                                </button>
                                                                                                                <div class="collapse"
                                                                                                                    id="suspect_ewallet_details">
                                                                                                                    <div
                                                                                                                        class="card card-body">
                                                                                                                        =======
                                                                                                                        <!--Add Ewallet-->
                                                                                                                        <div
                                                                                                                            class="card card-body">
                                                                                                                            <div
                                                                                                                                class="contact-list py-4">
                                                                                                                                <div
                                                                                                                                    class=" text-center">
                                                                                                                                    <h1
                                                                                                                                        class="sub-head">
                                                                                                                                        ई-वॉलेट
                                                                                                                                        की
                                                                                                                                        जानकारी
                                                                                                                                    </h1>
                                                                                                                                </div>
                                                                                                                                <button
                                                                                                                                    type="button"
                                                                                                                                    class="add-number-btn ui button my-3"
                                                                                                                                    data-toggle="collapse"
                                                                                                                                    data-target="#suspect_ewallet_details"
                                                                                                                                    id="btn_addewallet">
                                                                                                                                    Add
                                                                                                                                    E-Wallet
                                                                                                                                    Detail
                                                                                                                                </button>
                                                                                                                                <div class="collapse"
                                                                                                                                    id="suspect_ewallet_details">
                                                                                                                                    <div
                                                                                                                                        class="card card-body">
                                                                                                                                        <button
                                                                                                                                            type="button"
                                                                                                                                            class="close ml-auto"
                                                                                                                                            aria-label="Close"
                                                                                                                                            id="suspect_ewallet_details_close">
                                                                                                                                            <span
                                                                                                                                                aria-hidden="true">&times;</span>
                                                                                                                                        </button>
                                                                                                                                        <<<<<<<
                                                                                                                                            HEAD>
                                                                                                                                            >>>>>>
                                                                                                                                            0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                            =======
                                                                                                                                            >>>>>>>
                                                                                                                                            0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                            <!------------------------------->
                                                                                                                                            <!--Suspect Ewallet detail form-->
                                                                                                                                            <!------------------------------->
                                                                                                                                            <div
                                                                                                                                                class="wallet-details m-4">

                                                                                                                                                <form
                                                                                                                                                    id="wallet_detailform"
                                                                                                                                                    class="wallet-detail-form"
                                                                                                                                                    method="POST"
                                                                                                                                                    action="insertFiles/insert_suspectForm.php">
                                                                                                                                                    <div
                                                                                                                                                        class="three fields">
                                                                                                                                                        <div
                                                                                                                                                            class="six wide field">
                                                                                                                                                            <label>Mobile
                                                                                                                                                                Number</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="mob_num"
                                                                                                                                                                placeholder="Mobile Number" />
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="six wide field">
                                                                                                                                                            <label>VPA
                                                                                                                                                                ID</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="vpaID"
                                                                                                                                                                placeholder="VPA ID" />
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="eight wide field">
                                                                                                                                                            <label>Statement</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="pen_reason"
                                                                                                                                                                placeholder="Statement" />
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div
                                                                                                                                                        class="four fields">
                                                                                                                                                        <div
                                                                                                                                                            class="four wide field">
                                                                                                                                                            <label>Sent</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="sent"
                                                                                                                                                                placeholder="Sent" />
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="four wide field">
                                                                                                                                                            <label>Received</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="received"
                                                                                                                                                                placeholder="VPA ID" />
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="four wide field">
                                                                                                                                                            <label>Beneficiary
                                                                                                                                                                Top
                                                                                                                                                                3</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="benificiar"
                                                                                                                                                                placeholder="Beneficiary Top 3" />
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="four wide field">
                                                                                                                                                            <label>IP
                                                                                                                                                                Adreess</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="ip_adress"
                                                                                                                                                                placeholder="IP Adreess" />
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div
                                                                                                                                                        class="two fields">
                                                                                                                                                        <div
                                                                                                                                                            class="eight wide field">
                                                                                                                                                            <label>Merchandise</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="merchandise"
                                                                                                                                                                placeholder="Merchandise" />
                                                                                                                                                        </div>
                                                                                                                                                        <div
                                                                                                                                                            class="eight wide field">
                                                                                                                                                            <label>Number</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="number"
                                                                                                                                                                placeholder="Number" />
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <button
                                                                                                                                                        class="ui button form-btn"
                                                                                                                                                        name="second_form"
                                                                                                                                                        type="submit">
                                                                                                                                                        Submit
                                                                                                                                                    </button>
                                                                                                                                                </form>
                                                                                                                                            </div>

                                                                                                                                            <!----------------------------------->
                                                                                                                                            <!--Suspect ewallet detail form End-->
                                                                                                                                            <!----------------------------------->
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div
                                                                                                                                    id="suspect_ewallet_table_main">
                                                                                                                                    <table
                                                                                                                                        class="table table-bordered p-0 m-0">
                                                                                                                                        <thead>
                                                                                                                                            <tr
                                                                                                                                                id="table-head">
                                                                                                                                                <th
                                                                                                                                                    scope="col">
                                                                                                                                                    S.No
                                                                                                                                                </th>
                                                                                                                                                <th
                                                                                                                                                    scope="col">
                                                                                                                                                    E-Wallet
                                                                                                                                                    Name
                                                                                                                                                </th>
                                                                                                                                                <th
                                                                                                                                                    scope="col">
                                                                                                                                                    Update/Delete
                                                                                                                                                </th>
                                                                                                                                            </tr>
                                                                                                                                        </thead>
                                                                                                                                        <tbody
                                                                                                                                            id="old-row">
                                                                                                                                            <tr>
                                                                                                                                                <td>No
                                                                                                                                                    Number
                                                                                                                                                    Added
                                                                                                                                                    Yet
                                                                                                                                                </td>
                                                                                                                                                <td>No
                                                                                                                                                    Number
                                                                                                                                                    Added
                                                                                                                                                    Yet
                                                                                                                                                </td>
                                                                                                                                                <td>No
                                                                                                                                                    Number
                                                                                                                                                    Added
                                                                                                                                                    Yet
                                                                                                                                                </td>
                                                                                                                                            </tr>
                                                                                                                                        </tbody>
                                                                                                                                        <tbody
                                                                                                                                            id="new-row">
                                                                                                                                        </tbody>
                                                                                                                                    </table>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>

                                                                                                                        <!--Add website details-->
                                                                                                                        <div
                                                                                                                            class="card card-body">
                                                                                                                            <div
                                                                                                                                class="contact-list py-4">
                                                                                                                                <div
                                                                                                                                    class=" text-center">
                                                                                                                                    <h1
                                                                                                                                        class="sub-head">
                                                                                                                                        वेबसाइट
                                                                                                                                        की
                                                                                                                                        जानकारी
                                                                                                                                    </h1>
                                                                                                                                </div>
                                                                                                                                <button
                                                                                                                                    type="button"
                                                                                                                                    class="add-number-btn ui button my-3"
                                                                                                                                    data-toggle="collapse"
                                                                                                                                    data-target="#suspect_website_details"
                                                                                                                                    id="btn_addwebsite">
                                                                                                                                    Add
                                                                                                                                    Website
                                                                                                                                    Detail
                                                                                                                                </button>
                                                                                                                                <div class="collapse"
                                                                                                                                    id="suspect_website_details">
                                                                                                                                    <div
                                                                                                                                        class="card card-body">
                                                                                                                                        <<<<<<<
                                                                                                                                            HEAD
                                                                                                                                            <<<<<<<
                                                                                                                                            HEAD
                                                                                                                                            <!------------------------------->
                                                                                                                                            <!--Suspect Website detail form-->
                                                                                                                                            <!------------------------------->
                                                                                                                                            <div
                                                                                                                                                class="website-details m-4">

                                                                                                                                                <form
                                                                                                                                                    id="wallet_detailform"
                                                                                                                                                    class="wallet-detail-form "
                                                                                                                                                    method="POST"
                                                                                                                                                    action="insertFiles/insert_suspectForm.php">
                                                                                                                                                    <div
                                                                                                                                                        class="two fields">
                                                                                                                                                        <div
                                                                                                                                                            class="eight wide field">
                                                                                                                                                            <label>वेबसाइट</label>
                                                                                                                                                            <input
                                                                                                                                                                type="text"
                                                                                                                                                                name="web_name"
                                                                                                                                                                placeholder="वेबसाइट" />
                                                                                                                                                            =======
                                                                                                                                                            =======
                                                                                                                                                            >>>>>>>
                                                                                                                                                            0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                                            <button
                                                                                                                                                                type="button"
                                                                                                                                                                class="close ml-auto"
                                                                                                                                                                aria-label="Close"
                                                                                                                                                                id="suspect_website_details_close">
                                                                                                                                                                <span
                                                                                                                                                                    aria-hidden="true">&times;</span>
                                                                                                                                                            </button>
                                                                                                                                                            <!------------------------------->
                                                                                                                                                            <!--Suspect Website detail form-->
                                                                                                                                                            <!------------------------------->
                                                                                                                                                            <div
                                                                                                                                                                class="website-details m-4">

                                                                                                                                                                <form
                                                                                                                                                                    id="wallet_detailform"
                                                                                                                                                                    class="wallet-detail-form "
                                                                                                                                                                    method="POST"
                                                                                                                                                                    action="insertFiles/insert_suspectForm.php">
                                                                                                                                                                    <div
                                                                                                                                                                        class="two fields">
                                                                                                                                                                        <div
                                                                                                                                                                            class="eight wide field">
                                                                                                                                                                            <label>वेबसाइट</label>
                                                                                                                                                                            <input
                                                                                                                                                                                type="text"
                                                                                                                                                                                name="web_name"
                                                                                                                                                                                placeholder="वेबसाइट" />
                                                                                                                                                                        </div>
                                                                                                                                                                        <div
                                                                                                                                                                            class="eight wide field">
                                                                                                                                                                            <label>डोमिन
                                                                                                                                                                            </label>
                                                                                                                                                                            <input
                                                                                                                                                                                type="text"
                                                                                                                                                                                name="domain"
                                                                                                                                                                                placeholder="डोमिन " />
                                                                                                                                                                        </div>
                                                                                                                                                                        >>>>>>>
                                                                                                                                                                        0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                                                                                                    </div>
                                                                                                                                                                    <div
                                                                                                                                                                        class="eight wide field">
                                                                                                                                                                        <label>डोमिन
                                                                                                                                                                        </label>
                                                                                                                                                                        <input
                                                                                                                                                                            type="text"
                                                                                                                                                                            name="domain"
                                                                                                                                                                            placeholder="डोमिन " />
                                                                                                                                                                    </div>
                                                                                                                                                            </div>
                                                                                                                                                            <div
                                                                                                                                                                class="two fields">
                                                                                                                                                                <div
                                                                                                                                                                    class="eight wide field">
                                                                                                                                                                    <label>मेल
                                                                                                                                                                        आई
                                                                                                                                                                        डी
                                                                                                                                                                    </label>
                                                                                                                                                                    <input
                                                                                                                                                                        type="text"
                                                                                                                                                                        name="mail_id"
                                                                                                                                                                        placeholder="मेल आई डी" />
                                                                                                                                                                </div>
                                                                                                                                                                <div
                                                                                                                                                                    class="eight wide field">
                                                                                                                                                                    <label>संदिग्ध
                                                                                                                                                                        मोबाइल
                                                                                                                                                                        नंबर
                                                                                                                                                                    </label>
                                                                                                                                                                    <input
                                                                                                                                                                        type="text"
                                                                                                                                                                        name="suspect_number"
                                                                                                                                                                        placeholder="संदिग्ध मोबाइल नंबर " />
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                            <button
                                                                                                                                                                class="ui button form-btn"
                                                                                                                                                                name="second_form"
                                                                                                                                                                type="submit">
                                                                                                                                                                Submit
                                                                                                                                                            </button>
                                                                                                                                                </form>
                                                                                                                                            </div>
                                                                                                                                    </div>
                                                                                                                                    <!----------------------------------->
                                                                                                                                    <!--Suspect website detail form End-->
                                                                                                                                    <!----------------------------------->
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                id="suspect_website_table_main">
                                                                                                                                <table
                                                                                                                                    class="table table-bordered p-0 m-0">
                                                                                                                                    <thead>
                                                                                                                                        <tr
                                                                                                                                            id="table-head">
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                S.No
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                Website
                                                                                                                                            </th>
                                                                                                                                            <th
                                                                                                                                                scope="col">
                                                                                                                                                Update/Delete
                                                                                                                                            </th>
                                                                                                                                        </tr>
                                                                                                                                    </thead>
                                                                                                                                    <tbody
                                                                                                                                        id="old-row">
                                                                                                                                        <tr>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                            <td>No
                                                                                                                                                Number
                                                                                                                                                Added
                                                                                                                                                Yet
                                                                                                                                            </td>
                                                                                                                                        </tr>
                                                                                                                                    </tbody>
                                                                                                                                    <tbody
                                                                                                                                        id="new-row">
                                                                                                                                    </tbody>
                                                                                                                                </table>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <!--Add suspect person details-->
                                                                                                                    <div
                                                                                                                        class="card card-body">
                                                                                                                        <div
                                                                                                                            class="contact-list py-4">
                                                                                                                            <div
                                                                                                                                class=" text-center">
                                                                                                                                <h1
                                                                                                                                    class="sub-head">
                                                                                                                                    संदेही
                                                                                                                                    की
                                                                                                                                    जानकारी
                                                                                                                                </h1>
                                                                                                                            </div>
                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                class="add-number-btn ui button my-3"
                                                                                                                                data-toggle="modal"
                                                                                                                                data-target=".bd-example-modal-lg">
                                                                                                                                Add
                                                                                                                                Suspect
                                                                                                                                Detail
                                                                                                                            </button>

                                                                                                                            <table
                                                                                                                                class="table table-bordered p-0 m-0">
                                                                                                                                <thead>
                                                                                                                                    <tr
                                                                                                                                        id="table-head">
                                                                                                                                        <th
                                                                                                                                            scope="col">
                                                                                                                                            S.No
                                                                                                                                        </th>
                                                                                                                                        <th
                                                                                                                                            scope="col">
                                                                                                                                            Website
                                                                                                                                        </th>
                                                                                                                                        <th
                                                                                                                                            scope="col">
                                                                                                                                            Update/Delete
                                                                                                                                        </th>
                                                                                                                                    </tr>
                                                                                                                                </thead>
                                                                                                                                <tbody
                                                                                                                                    id="old-row">
                                                                                                                                    <tr>
                                                                                                                                        <td>No
                                                                                                                                            Number
                                                                                                                                            Added
                                                                                                                                            Yet
                                                                                                                                        </td>
                                                                                                                                        <td>No
                                                                                                                                            Number
                                                                                                                                            Added
                                                                                                                                            Yet
                                                                                                                                        </td>
                                                                                                                                        <td>No
                                                                                                                                            Number
                                                                                                                                            Added
                                                                                                                                            Yet
                                                                                                                                        </td>
                                                                                                                                    </tr>
                                                                                                                                </tbody>
                                                                                                                                <tbody
                                                                                                                                    id="new-row">
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </div>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                        </form>
                                                                                    </div>





                                                                                    <<<<<<< HEAD <!--Sweet Alert-->
                                                                                        <script
                                                                                            src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
                                                                                        </script>
                                                                                        <!--Jquery-->
                                                                                        <script
                                                                                            src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
                                                                                        </script>
                                                                                        <!--Sementic JS-->
                                                                                        <script
                                                                                            src="../dependencies/semantic/dist/semantic.min.js">
                                                                                        </script>
                                                                                        <!--Bootstrap JS-->
                                                                                        <script
                                                                                            src="../dependencies/bootstrap/dist/js/bootstrap.min.js">
                                                                                        </script>
                                                                                        <!--External JS-->
                                                                                        <script src="js/insertbasic.js">
                                                                                        </script>
                                                                                        <script
                                                                                            src="https://code.iconify.design/1/1.0.6/iconify.min.js">
                                                                                        </script>
                                                                                        <script>
                                                                                        $(document).ready(function() {
                                                                                            //suspect number details 
                                                                                            $("#btn_addnum")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_no_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addcdr")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                "#suspect_no_cdr_details"
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_cdr")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_cdr")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addipdr")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                "#suspect_no_ipdr_details"
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_ipdr")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_ipdr")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addupi")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                "#suspect_no_upi_details"
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_upi")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_upi")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            //suspect number details ends
                                                                                            //suspect account details 
                                                                                            $("#btn_addacc")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addpan")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_pan_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_pan")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_pan")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addatm")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_atm_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_atm")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_atm")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addiplog")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_iplog_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_iplog")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_iplog")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });


                                                                                            //suspect ewallet details
                                                                                            $("#btn_addewallet")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_ewallet_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_ewallet_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_ewallet_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            //suspect ewallet details ends
                                                                                            //suspect website details
                                                                                            $("#btn_addwebsite")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_website_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_website_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_website_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            //suspect website details ends

                                                                                        });
                                                                                        </script>
                                                                                        =======
                                                                                        <!--Sweet Alert-->
                                                                                        <script
                                                                                            src="https://unpkg.com/sweetalert/dist/sweetalert.min.js">
                                                                                        </script>
                                                                                        <!--Jquery-->
                                                                                        <script
                                                                                            src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
                                                                                        </script>
                                                                                        <!--Sementic JS-->
                                                                                        <script
                                                                                            src="../dependencies/semantic/dist/semantic.min.js">
                                                                                        </script>
                                                                                        <!--Bootstrap JS-->
                                                                                        <script
                                                                                            src="../dependencies/bootstrap/dist/js/bootstrap.min.js">
                                                                                        </script>
                                                                                        <!--External JS-->
                                                                                        <script src="js/insertbasic.js">
                                                                                        </script>
                                                                                        <script
                                                                                            src="https://code.iconify.design/1/1.0.6/iconify.min.js">
                                                                                        </script>
                                                                                        <script>
                                                                                        $(document).ready(function() {
                                                                                            //suspect number details 
                                                                                            $("#btn_addnum")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_no_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addcdr")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                "#suspect_no_cdr_details"
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_cdr")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_cdr")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addipdr")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                "#suspect_no_ipdr_details"
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_ipdr")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_ipdr")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addupi")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                "#suspect_no_upi_details"
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_num_table_upi")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_num_table_upi")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            //close buttons
                                                                                            $("#suspect_no_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_no_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_num_table_main")
                                                                                                            .show();
                                                                                                    });
                                                                                            $("#suspect_no_cdr_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_no_cdr_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_num_table_cdr")
                                                                                                            .show();
                                                                                                    });
                                                                                            $("#suspect_no_ipdr_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_no_ipdr_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_num_table_ipdr")
                                                                                                            .show();
                                                                                                    });
                                                                                            $("#suspect_no_upi_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_no_upi_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_num_table_upi")
                                                                                                            .show();
                                                                                                    });
                                                                                            //close button ends


                                                                                            //suspect number details ends
                                                                                            //suspect account details 
                                                                                            $("#btn_addacc")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addpan")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_pan_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_pan")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_pan")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addatm")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_atm_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_atm")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_atm")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            $("#btn_addiplog")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_acc_iplog_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_acc_table_iplog")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_acc_table_iplog")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            //close buttons
                                                                                            $("#suspect_acc_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_acc_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_acc_table_main")
                                                                                                            .show();
                                                                                                    });
                                                                                            $("#suspect_acc_pan_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_acc_pan_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_acc_table_pan")
                                                                                                            .show();
                                                                                                    });
                                                                                            $("#suspect_acc_atm_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_acc_atm_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_acc_table_atm")
                                                                                                            .show();
                                                                                                    });
                                                                                            $("#suspect_acc_iplog_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_acc_iplog_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_acc_table_iplog")
                                                                                                            .show();
                                                                                                    });
                                                                                            //close button ends
                                                                                            //suspect account details ends
                                                                                            //suspect ewallet details
                                                                                            $("#btn_addewallet")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_ewallet_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_ewallet_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_ewallet_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            //close button
                                                                                            $("#suspect_ewallet_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_ewallet_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_ewallet_table_main")
                                                                                                            .show();
                                                                                                    });
                                                                                            //close button ends
                                                                                            //suspect ewallet details ends
                                                                                            //suspect website details
                                                                                            $("#btn_addwebsite")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        if ($(
                                                                                                                '#suspect_website_details'
                                                                                                                )
                                                                                                            .is(
                                                                                                                '.collapse:not(.show)'
                                                                                                                )
                                                                                                        ) {
                                                                                                            $("#suspect_website_table_main")
                                                                                                                .hide();
                                                                                                        } else {
                                                                                                            $("#suspect_website_table_main")
                                                                                                                .show();
                                                                                                        }
                                                                                                    });
                                                                                            //close button
                                                                                            $("#suspect_website_details_close")
                                                                                                .click(
                                                                                                    function() {
                                                                                                        $("#suspect_website_details")
                                                                                                            .collapse(
                                                                                                                'hide'
                                                                                                            );
                                                                                                        $("#suspect_website_table_main")
                                                                                                            .show();
                                                                                                    });
                                                                                            //close button ends
                                                                                            //suspect website details ends
                                                                                            //ajax to load state
                                                                                            $("#ap_country")
                                                                                                .change(
                                                                                                    function() {
                                                                                                        var country =
                                                                                                            $(
                                                                                                                "#ap_country"
                                                                                                                )
                                                                                                            .val();
                                                                                                        $.ajax({
                                                                                                            url: "user_fetch.php",
                                                                                                            method: "POST",
                                                                                                            data: {
                                                                                                                country: country
                                                                                                            },
                                                                                                            success: function(
                                                                                                                data
                                                                                                            ) {
                                                                                                                $("#ap_state")
                                                                                                                    .html(
                                                                                                                        data
                                                                                                                    );
                                                                                                            }
                                                                                                        });
                                                                                                    });
                                                                                            $("#ap_state")
                                                                                                .change(
                                                                                                    function() {
                                                                                                        var state =
                                                                                                            $(
                                                                                                                "#ap_state"
                                                                                                                )
                                                                                                            .val();
                                                                                                        $.ajax({
                                                                                                            url: "user_fetch.php",
                                                                                                            method: "POST",
                                                                                                            data: {
                                                                                                                state: state
                                                                                                            },
                                                                                                            success: function(
                                                                                                                data
                                                                                                            ) {
                                                                                                                $("#ap_city")
                                                                                                                    .html(
                                                                                                                        data
                                                                                                                    );
                                                                                                            }
                                                                                                        });
                                                                                                    });

                                                                                        });
                                                                                        </script>
                                                                                        <<<<<<< HEAD>>>>>>>
                                                                                            0bef3b0e05d7278da8d2d1dd12e11f833297046c
                                                                                            =======
                                                                                            >>>>>>>
                                                                                            0bef3b0e05d7278da8d2d1dd12e11f833297046c
</body>

</html>