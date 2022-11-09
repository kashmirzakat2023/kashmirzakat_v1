<?php
            include 'assets/connection.php';
            $result = mysqli_query($db, " SELECT * FROM accepted_form where status='Accepted' and counter='0' ");
            while ($data = mysqli_fetch_array($result)) {
                $date = strtotime($data['date']);
                $now = time();
                $timeleft = $now - $date;
                $days = 30 - round($timeleft / (60 * 60 * 24));
                $uraiseid = $data['id'];
                $name = $data['name'];
                $ramount = 0;
                $result1 = mysqli_query($db, " SELECT * FROM payments where raiseid = '$id' and status='complete'");
                $ramount = 0;
                while ($data1 = mysqli_fetch_array($result1)) {
                    $ramount += $data1['amount'];
                }
                $amount = $data['amount'];
                if ($days<=2 and $days>0 and $ramount < $amount and $data['counter']=='0') {
                    $to      = $data['email'];
                    $subject = 'Reminder⌚ 2days left ';

                    $mailBody = '<html><body>
                    <div style="text-center: center; width: 60%; margin: auto; max-width: 100%; font-family: Arial;  ">
                    <div>Hi, ' . $name . '</div>
                    <div style="margin: 20px 0px;"><h2 style=" padding: 10px; font-size:40px; color:#E8582E;">Your Cause is Ending Soon</h2></div>
                    <div><h1>Try to complete it before time</h1></div>
                    <div>You can contact <b>admin</b> or mail at <b>kashmirzakat@gmail.com</b> for date increment</div>
                    </div>
                    </div>
                    </body>
                    </html>';
                    $headers = 'From: Kashmirzakat ' . "\r\n";
                    $headers =  'Reply-To: ' . $email . "\r\n";
                    $headers .= 'MIME-Version: 1.0' . "\r\n";
                    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    if (mail($to, $subject, $mailBody, $headers)) {
                        $query = "UPDATE accepted_form set counter='1' where id='$uraiseid' ";
                        if(mysqli_query($db, $query))
                        echo 'true';
                        else echo 'db';
                    }
                    else echo 'email';
                }
                else{
                    echo 'outer';
                }
            }
            ?>