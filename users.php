<?php session_start(); ?>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav-dash.css">
    <script src="js/nav-dash.js"></script>
</head>
<?php
if (isset($_SESSION['useremail']) && ($_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 1)) {
    include 'assets/connection.php';
    $result = mysqli_query($db, "SELECT * FROM users");
?>

    <body id="body-pd">
        <?php
        include 'assets/navbar-dash.php';
        ?>
        <script>
            window.onload = (event) => {
                // $('#nav-bar').attr('class', 'l-navbar show');
                $('#body-pd').attr('class', 'body-pd');
                $('#users').addClass("nav_link active");
            }
        </script>
        <h3>Users</h3>
        <script>
            let column_fields = ['ID', 'Name', 'Image', 'Email', 'Phone', 'Date'];
            const columnDefs = [];
            column_fields.forEach(element => {
                columnDefs.push({
                    field: element
                });
            })

            <?php
            $column_data_fields = ['id', 'name', 'profile_pic', 'email', 'phone', 'date'];
            $column_fields = ['ID', 'Name', 'Image', 'Email', 'Phone', 'Date'];
            ?>
            columnDefs.push({
                field: 'Image',
                cellRenderer: function(params) {
                    return '<img src="images/' + params.data.Image + '" width="40px" class=" rounded-circle">';
                }
            })
            if (<?= $_SESSION['user_type'] ?> == 1) {
                columnDefs.push({
                    field: 'Actions',
                    cellRenderer: function(params) {
                        return `
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Change Role
                        </button>
                        `;
                    }
                })
            }
            $('.dropdown-item').click(function() {
                // Get the selected value from the dropdown item
                var selectedValue = $(this).data('value');
                var id = $(this).data('key');

                // Call the AJAX function with the selected value
                $.ajax({
                    url: 'change-role.php',
                    method: 'POST',
                    data: {
                        selectedValue: selectedValue,
                        userId: id

                    },
                    success: function(response) {
                        // Handle the response from the PHP file
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle any errors that occur during the AJAX request
                        console.error(textStatus, errorThrown);
                    }
                });
            });
        </script>
        <?php
        include 'assets/grid-system.php'
        ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </body>
<?php
} else {
    echo '<script>alert("Unauthenticated User")</script>';
    echo '<script>history.back()</script>';
}
?>