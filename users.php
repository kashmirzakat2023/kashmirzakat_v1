<?php session_start(); ?>

<head>
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
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
            let currentModal = '';
            window.onload = (event) => {
                
                $('#body-pd').attr('class', 'body-pd');
                $('#users').addClass("nav_link active");
            }
        </script>
        <h3>Users</h3>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown button
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" data-value="0" href="#">User</a></li>
                                <li><a class="dropdown-item" data-value="1" href="#">Admin</a></li>
                                <li><a class="dropdown-item" data-value="2" href="#">Cause Manager</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let column_fields = ['ID', 'Name', 'Email', 'Phone', 'Role', 'Date'];
            const columnDefs = [];
            column_fields.forEach(element => {
                columnDefs.push({
                    field: element
                });
            })

            <?php
            $column_data_fields = ['id', 'name', 'email', 'phone', 'user_type', 'date', 'profile_pic'];
            $column_fields = ['ID', 'Name', 'Email', 'Phone', 'Role', 'Date', 'Image'];
            ?>
            columnDefs.push({
                field: 'profile_pic',
                hide: true
            });

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
                        const divEl = document.createElement('div');
                        const buttonEl = document.createElement('button');
                        buttonEl.classList.add('btn', 'btn-primary');
                        buttonEl.setAttribute('data-bs-toggle', 'modal');
                        buttonEl.setAttribute('data-bs-target', '#exampleModal');
                        buttonEl.setAttribute('data-user-id', params.data.ID);
                        buttonEl.setAttribute('id', 'exampleModal')
                        buttonEl.textContent = 'Click me';
                        buttonEl.addEventListener('click', () => {
                            currentModal = params.data.ID
                        });
                        divEl.appendChild(buttonEl);
                        return divEl;
                    }
                })
            }
        </script>

        <?php
        include 'assets/grid-system.php'
        ?>
        <script>
            $(document).ready(function() {
                $('.dropdown-item').on('click', function() {
                    var selectedValue = $(this).data('value');
                    // Perform AJAX call and send the selectedValue as a response
                    $.ajax({
                        url: 'change-role.php',
                        method: 'POST',
                        data: {
                            dropdownValue: selectedValue,
                            userId: currentModal
                        },
                        success: function(response) {
                            // Handle the response from the server
                            if (response)
                                $('.saved').show(1).fadeIn().animate({
                                    right: 10,
                                    opacity: "show"
                                }, 1500).delay(1000).hide(0.3);
                            else
                                $('.nsaved').show(1).fadeIn().animate({
                                    right: 10,
                                    opacity: "show"
                                }, 1500).delay(1000).hide(0.3);
                        },
                        error: function(error) {
                            // Handle the error
                            alert('Error occures while assigning roles')
                        }
                    });
                });
            });
        </script>
    </body>
<?php
} else {
    echo '<script>alert("Unauthenticated User")</script>';
    echo '<script>history.back()</script>';
}
?>