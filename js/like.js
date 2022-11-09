$(document).ready(function () {

    $(document).on('click', '.far', function () {

        var username = $(this).val();
        var $this = $(this);
        $this.toggleClass('far');
        if (!$this.hasClass('far')) {
            $this.addClass("fas");
        }
        $.ajax({
            type: "POST",
            url: "like.php",
            data: {
                username: username,
                like: 1,
            },
            success: function (username) {
                showLike(username);
            }
        });
    });

    $(document).on('click', '.fas', function () {
        var username = $(this).val();
        var $this = $(this);
        $this.toggleClass('fas');
        if (!$this.hasClass('fas')) {
            $this.addClass("far");
        }
        $.ajax({
            type: "POST",
            url: "like.php",
            data: {
                username: username,
                like: 1,
            },
            success: function (username) {
                showLike(username);
            }
        });
    });

});

function showLike(username) {
    $.ajax({
        url: 'show_like.php',
        type: 'POST',
        data: {
            username:username,
            showlike: 1
        },
        success: function (response) {
            $('#likes'+username).html(response);

        }
    });
}

function report(){
    $.ajax({
        type: "POST",
        url: "report.php",
        data: {
            report: 1,
        },
        success: function () {
            document.getElementById('report').style.display='none';
        }
    });
}