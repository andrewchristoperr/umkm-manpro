```
<?php
include 'connect.php';

$check_team = strtolower($_POST['teamName']);
$query1 = mysqli_query($con, "SELECT * FROM team WHERE LOWER(teamName)='$check_team'");
if (mysqli_num_rows($query1) > 0) {
    $em = "The team name is already registered, please register with another name.";
    $error = array('error' => 1, 'em'=> $em);
    echo json_encode($error);
} else {
    $list_file = array($_FILES['leaderFormalPhoto'], $_FILES['leaderStudentID'], $_FILES['member1FormalPhoto'], $_FILES['member1StudentID'], $_FILES['member2FormalPhoto'], $_FILES['member2StudentID'], $_FILES['paymentProof']);
    $list_type = array("formalPhoto", "studentID", "formalPhoto", "studentID", "formalPhoto", "studentID", "payment");
    $list_file_type = array("leaderFormalPhoto", "leaderStudentID", "member1FormalPhoto", "member1StudentID", "member2FormalPhoto", "member2StudentID", "payment");
    $list_file_upload = [];
    $list_file_path = [];

    for ($i = 0; $i < sizeof($list_file); $i++) {
        if (isset($list_file[$i])) {
            $img_name = $list_file[$i]['name'];
            $img_size = $list_file[$i]['size'];
            $error = $list_file[$i]['error'];

            if ($error === 0) {
                if ($img_size > 2000000) {
                    $em = "File size is to big! Please upload a file with a size below 2MB";
                    $error = array('error' => 1, 'em'=> $em, 'type' => 'size', 'file' => $list_type[$i]);
                    echo json_encode($error);

                    exit();
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        # rename
                        $new_img_name = strtolower($_POST['teamName']).'_'.$list_file_type[$i].'.'.$img_ex_lc;

                        # path
                        $path = "../image-data/".$list_type[$i]."/";
                        $img_upload_path = $path.$new_img_name;

                        array_push($list_file_path, $img_upload_path);
                        array_push($list_file_upload, $new_img_name);
                    } else {
                        $em = "File type does not match. Please upload files with type: jpg, jpeg, or png.";
                        $error = array('error' => 1, 'em'=> $em, 'type' => 'extensions', 'file' => $list_type[$i]);
                        echo json_encode($error);
                    
                        exit();
                    }
                }
            } else {
                $em = "An unknown error occured, please try again later";
                $error = array('error' => 1, 'em'=> $em, 'type' => 'unknown', 'file' => $list_jenis_berkas[$i]);
                echo json_encode($error);

                exit();
            }
        }
    }

    if (sizeof($list_file_upload) == 7) {
        for ($i = 0; $i < sizeof($list_file); $i++) {
            $tmp_name = $list_file[$i]['tmp_name'];
            move_uploaded_file($tmp_name, $list_file_path[$i]);
        }

	    # check allergen
        $list_allergen = array($_POST['leaderAllergen'], $_POST['member1Allergen'], $_POST['member2Allergen']);
        for ($i = 0; $i < sizeof($list_allergen); $i++) {
            $allergen = $list_allergen[$i];
            $tmp_allergen = "";
            for ($j = 0; $j < strlen($allergen); $j++) {
                if ($allergen[$j] != " ") {
                    $tmp_allergen .= $allergen[$j];
                }
            }
            if ($tmp_allergen == "") {
                $list_allergen[$i] = "-";
            }
        }        

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        # upload
	    $sql = "INSERT INTO team (teamName, password, schoolName, schoolAddress, leaderName, leaderPhoneNumber, leaderIDLine, leaderEmail, leaderAddress, leaderConsumption, leaderAllergen, leaderFormalPhoto, leaderStudentID, member1Name, member1PhoneNumber, member1IDLine, member1Email, member1Address, member1Consumption, member1Allergen, member1FormalPhoto, member1StudentID, member2Name, member2PhoneNumber, member2IDLine, member2Email, member2Address, member2Consumption, member2Allergen, member2FormalPhoto, member2StudentID, paymentProof)
                VALUES ('{$_POST['teamName']}', '$password', '{$_POST['schoolName']}', '{$_POST['schoolAddress']}', '{$_POST['leaderName']}', '{$_POST['leaderPhoneNumber']}', '{$_POST['leaderIDLine']}', '{$_POST['leaderEmail']}', '{$_POST['leaderAddress']}', '{$_POST['leaderConsumption']}', '$list_allergen[0]', '$list_file_path[0]', '$list_file_path[1]', '{$_POST['member1Name']}', '{$_POST['member1PhoneNumber']}', '{$_POST['member1IDLine']}', '{$_POST['member1Email']}', '{$_POST['member1Address']}', '{$_POST['member1Consumption']}', '$list_allergen[1]', '$list_file_path[2]', '$list_file_path[3]', '{$_POST['member2Name']}', '{$_POST['member2PhoneNumber']}', '{$_POST['member2IDLine']}', '{$_POST['member2Email']}', '{$_POST['member2Address']}', '{$_POST['member2Consumption']}', '$list_allergen[2]', '$list_file_path[4]', '$list_file_path[5]', '$list_file_path[6]')";
        mysqli_query($con, $sql);

        // update verification
        $sql = "INSERT into team_verification (team_name, team_verification)
                VALUES ('{$_POST['teamName']}', 'PENDING')";
        mysqli_query($con, $sql);

        // update for reset password
        $sql = "INSERT into reset_verification (team_name)
                VALUES ('{$_POST['teamName']}')";
        mysqli_query($con, $sql);

        $sql = "INSERT into ready_play (team_name, status)
	       VALUES ('{$_POST['teamName']}', 0)";
        mysqli_query($con, $sql);

        $sql = "INSERT into schedule (team_name, round_1, round_2, round_3, round_4)
                VALUES ('{$_POST['teamName']}', '-', '-', '-', '-')";
        mysqli_query($con, $sql);

        $sm = "Thanks for signing up :)";

        # response array
        $res = array('error' => 0, 'sm'=> $sm);

        echo json_encode($res);
    }
}
?>
```
$('#submitRegist').on('click', function(e) {
            e.preventDefault();

            // var error_messages = [];
            var form_regist = new FormData();

            // team
            var teamName = $("#teamName").val();
            var password = $("#password").val();
            var schoolName = $("#schoolName").val();
            var schoolAddress = $("#schoolAddress").val();

            // leader
            var leaderName = $("#leaderName").val();
            var leaderPhoneNumber = $("#leaderPhoneNumber").val();
            var leaderIDLine = $("#leaderIDLine").val();
            var leaderEmail = $("#leaderEmail").val();
            var leaderAddress = $("#leaderAddress").val();
            var leaderConsumption = $("#leaderConsumption").val();
            var leaderAllergen = $("#leaderAllergen").val();
            var leaderFormalPhoto = $('#leaderFormalPhoto')[0].files;
            var leaderStudentID = $('#leaderStudentID')[0].files;

            // member1
            var member1Name = $("#member1Name").val();
            var member1PhoneNumber = $("#member1PhoneNumber").val();
            var member1IDLine = $("#member1IDLine").val();
            var member1Email = $("#member1Email").val();
            var member1Address = $("#member1Address").val();
            var member1Consumption = $("#member1Consumption").val();
            var member1Allergen = $("#member1Allergen").val();
            var member1FormalPhoto = $('#member1FormalPhoto')[0].files;
            var member1StudentID = $('#member1StudentID')[0].files;

            //member2
            var member2Name = $("#member2Name").val();
            var member2PhoneNumber = $("#member2PhoneNumber").val();
            var member2IDLine = $("#member2IDLine").val();
            var member2Email = $("#member2Email").val();
            var member2Address = $("#member2Address").val();
            var member2Consumption = $("#member2Consumption").val();
            var member2Allergen = $("#member2Allergen").val();
            var member2FormalPhoto = $('#member2FormalPhoto')[0].files;
            var member2StudentID = $('#member2StudentID')[0].files;

            //payment
            var paymentProof = $('#paymentProof')[0].files;

            form_regist.append('teamName', teamName);
            form_regist.append('password', password);
            form_regist.append('schoolName', schoolName);
            form_regist.append('schoolAddress', schoolAddress);

            form_regist.append('leaderName', leaderName);
            form_regist.append('leaderPhoneNumber', leaderPhoneNumber);
            form_regist.append('leaderIDLine', leaderIDLine);
            form_regist.append('leaderEmail', leaderEmail);
            form_regist.append('leaderAddress', leaderAddress);
            form_regist.append('leaderConsumption', leaderConsumption);
            form_regist.append('leaderAllergen', leaderAllergen);
            form_regist.append('leaderFormalPhoto', leaderFormalPhoto[0]);
            form_regist.append('leaderStudentID', leaderStudentID[0]);

            form_regist.append('member1Name', member1Name);
            form_regist.append('member1PhoneNumber', member1PhoneNumber);
            form_regist.append('member1IDLine', member1IDLine);
            form_regist.append('member1Email', member1Email);
            form_regist.append('member1Address', member1Address);
            form_regist.append('member1Consumption', member1Consumption);
            form_regist.append('member1Allergen', member1Allergen);
            form_regist.append('member1FormalPhoto', member1FormalPhoto[0]);
            form_regist.append('member1StudentID', member1StudentID[0]);
            
            form_regist.append('member2Name', member2Name);
            form_regist.append('member2PhoneNumber', member2PhoneNumber);
            form_regist.append('member2IDLine', member2IDLine);
            form_regist.append('member2Email', member2Email);
            form_regist.append('member2Address', member2Address);
            form_regist.append('member2Consumption', member2Consumption);
            form_regist.append('member2Allergen', member2Allergen);
            form_regist.append('member2FormalPhoto', member2FormalPhoto[0]);
            form_regist.append('member2StudentID', member2StudentID[0]);
            
            form_regist.append('paymentProof', paymentProof[0]);

            $.ajax({
                type: 'POST',
                data: form_regist,
                url: 'php/uploadData.php',
                enctype: 'form/multipart',
                contentType: false,
                processData: false,
                success: function(res) {
                    console.log(res);
                    data = JSON.parse(res);
                    if (data['error'] == 0) {
                        Swal.fire({
                            title:'Data Successfully Registered', 
                            icon:'success', 
                            text:data['sm'], 
                            allowOutsideClick: false,
                            confirmButtonText:'OK', 
                            willClose:() => {
                                window.location='index.php';
                            }
                        });
                    } else if (data['error'] == 1) {
                        Swal.fire({
                            title:'Error', 
                            icon:'error', 
                            text:data['em'],
                            confirmButtonText:'Close'
                        });
                    } else {
                        Swal.fire({
                            title:'Error',
                            text:'Please try again.',
                            icon:'error',
                            confirmButtonText:'Close'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title:'Error',
                        text:'Please try again.',
                        icon:'error',
                        confirmButtonText:'Close'
                    });
                }
            });
        });
