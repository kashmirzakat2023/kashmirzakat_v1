<?php session_start();
include 'assets/connection.php';
$username = $_SESSION['username'];
$email = $_SESSION['useremail'];

if (isset($_POST['submit'])) {
    function generateFileName()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789_";
        $name = "";
        for ($i = 0; $i < 20; $i++)
            $name .= $chars[rand(0, strlen($chars) - 1)];
        return $name;
    }

    $cause_title = $_POST['cause_title'];
    $purpose = $_POST['purpose'];
    $person = $_POST['person'];
    $amount = $_POST['amount'];
    $location = $_POST['location'];
    $eligible = $_POST['eligible'];
    $cause_explain = $_POST['cause_explain'];
    $cause_summary = $_POST['cause_summary'];
    $beneficiary_email = $_POST['beneficiary_email'];
    $beneficiary_phone = $_POST['beneficiary_phone'];

    $profile_pic = generateFileName() . '.' . pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
    $tempname1 = $_FILES["profile_pic"]["tmp_name"];
    $folder1 = "images/" . $profile_pic;

    $doc1 = generateFileName() . '.' . pathinfo($_FILES["doc1"]["name"], PATHINFO_EXTENSION);
    $tempname2 = $_FILES["doc1"]["tmp_name"];
    $folder2 = "images/" . $doc1;
    if ($_FILES["doc2"]["name"] != '') {
        $doc2 = generateFileName() . '.' . pathinfo($_FILES["doc2"]["name"], PATHINFO_EXTENSION);
        $tempname3 = $_FILES["doc2"]["tmp_name"];
        $folder3 = "images/" . $doc2;
    } else {
        $doc2 = '';
        $tempname3 = '';
        $folder3 = '';
    }

    $pan_copy = generateFileName() . '.' . pathinfo($_FILES["pan_copy"]["name"], PATHINFO_EXTENSION);
    $tempname4 = $_FILES["pan_copy"]["tmp_name"];
    $folder4 = "images/" . $pan_copy;


    $adhaar_copy = generateFileName() . '.' . pathinfo($_FILES["adhaar_copy"]["name"], PATHINFO_EXTENSION);
    $tempname5 = $_FILES["adhaar_copy"]["tmp_name"];
    $folder5 = "images/" . $adhaar_copy;

    $person = $_POST['person'];
    $acc_name = $_POST['acc_name'];
    $acc_num = $_POST['acc_num'];
    $bank_name = $_POST['bank_name'];
    $ifsc = $_POST['ifsc'];

    // $doc3 = $_FILES["doc3"]["name"];
    // $tempname4 = $_FILES["doc3"]["tmp_name"];
    // $folder4 = "images/" . $doc3;

    // $passbook = $_FILES["passbook"]["name"];
    // $tempname7 = $_FILES["passbook"]["tmp_name"];
    // $folder7 = "images/" . $passbook;

    $pan_num = $_POST['pan_num'];
    $adhaar_num = $_POST['adhaar_num'];


    $optional = $_POST['optional'];

    $sql = "INSERT INTO form_data(
        profile_pic,
        cause_title,
        purpose,
        amount, 
        location,
        eligible,
        cause_explain,
        doc1,
        doc2,
        acc_name,
        acc_num,
        bank_name,
        ifsc,
        pan_num,
        pan_copy,
        adhaar_num,
        adhaar_copy,
        optional,
        person,
        cause_summary,
        email,
        beneficiary_phone,
        beneficiary_phone
        status)
        VALUES(
        '$profile_pic',
        '$cause_title',
        '$purpose',
        '$amount ',
        '$location',
        '$eligible',
        '$cause_explain',
        '$doc1',
        '$doc2',
        '$acc_name',
        '$acc_num',
        '$bank_name',
        '$ifsc',
        '$pan_num',
        '$pan_copy',
        '$adhaar_num',
        '$adhaar_copy',
        '$optional',
        '$person',
        '$cause_summary',
        '$email',
        'Pending',
        '$beneficiary_email',
        '$beneficiary_phone') ";

    if (mysqli_query($db, $sql)) {
        move_uploaded_file($tempname1, $folder1);
        move_uploaded_file($tempname2, $folder2);
        move_uploaded_file($tempname3, $folder3);
        move_uploaded_file($tempname4, $folder4);
        move_uploaded_file($tempname5, $folder5);
        $mailBody = '<div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;">
        <div>Hi, ' . $_SESSION['username'] . '</div>
        <div><h4>You have successfully raised a form </h4></div>
        <div><h3>' . $cause_title . '</h3></div>
        <div>Our team will update you soon</div>
        </div>';

        $subject = "Kashmir Zakat - OTP (One Time Password)";
        $from = 'kashmirzakat@gmail.com';
        $to = $_SESSION['useremail'];
        $emailFrom = 'Kashmir zakat';
        $headers = 'From: ' . $emailFrom . "\r\n";
        $headers .= 'Reply-To: ' . $to . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $mailBody, $headers);
        echo '<script>alert("Your request have been submitted successfully, we will reach you for confirmation")</script>';
        echo '<script>window.location = "index.php"</script>';
    } else {
        echo '<script>alert("Error in uploading data")</script>';
        echo '<script>window.location = "create-campaign.php"</script>';
    }

    mysqli_close($db);
}
