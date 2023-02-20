<!-- <div class="table-responsive w-100 ">
<table class="table border">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Cause</th>
            <th scope="col">Donated</th>
            <th scope="col">Tip</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $query = mysqli_query($db, "SELECT * FROM payments where raiseid='$id'and status='complete' ");
            while ($row1 = mysqli_fetch_array($query)) {
        ?>
                <tr>
                    <td><?php echo $row1['raiseid']; ?></td>
                    <td><?php echo $row1['name']; ?></td>

                    <?php
                    $result1 = mysqli_query($db, "SELECT * FROM form_data where id='$id' and status='Accepted' ");
                    while ($rows = mysqli_fetch_array($result1)) {
                    ?>
                        <td class="w-50">
                            <a href="raise-detail.php?campaign=<?php echo $rows['id']; ?>" class="">
                                <img src="<?php echo "images/" . $rows['profile_pic']; ?>" width="40px" alt="" srcset=""> <?php echo $rows['cause_title']; ?>
                                <i class="fas fa-external-link"></i>
                            </a>
                        </td>
                        <td>₹ <?php echo $row1['amount']; ?></td>
                        <td>₹ <?php echo $row1['tip']; ?></td>
                        <td><?php
                            $month  = date_format(date_create($row1['date']), "M d,Y");
                            echo $month; ?></td>
                        <td>
                            <a href="payment-details.php?tid=<?php echo $row1['tran_id']; ?>" class="btn btn-success p-1">View</a>
                        </td>
                </tr>

        <?php
                    }
                }
        ?>
    <?php
        }
    ?>

    </tbody>
</table>

</div> -->
        <!-- <table class="table table-striped table-responsive w-100">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Phone</th>
                    <!--<th scope="col">Delete</th>-->
                    </tr>
            </thead>
            <tbody><?php
                    while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $data['id']; ?></th>
                        <td><img src="<?php echo "images/" . $data['profile_pic']; ?>" class="rounded-circle " height="50px" width="50px" alt="" srcset=""> <?php echo $data['name']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['PASSWORD']; ?></td>
                        <td><?php echo $data['phone']; ?></td>
                        <!--<td><a class="btn btn-outline-danger m-2" href="delete.php">Delete</a></td>-->
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table> -->
