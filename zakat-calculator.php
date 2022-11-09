<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Zakat Calculator</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?php include 'assets/nav-links.php'; ?>
</head>

<body>
    <?php include 'assets/navbar.php'; ?>
    <div class="main-calci d-flex align-items-center flex-column w-75 me-auto mx-auto mt-4 mb-4 rounded-3 ">
        <h1 class=" text-center">Zakat calculator</h1>
        <div class=" table-responsive ">
            <table class="table table-borderless d-flex me-auto mx-auto mt-4">
                <tbody>
                    <tr>
                        <td class="value-titles">Nisab (updated 01 April 2022):</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input1"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="value-titles">Value of Gold</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input2"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="value-titles">Value of Silver</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input3"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr class=" fw-bold">
                        <td colspan="2" class="col-head">Cash</td>
                    </tr>
                    <tr>
                        <td class="value-titles">In hand and in bank accounts</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input4"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="value-titles">Deposited for some future purpose, e.g. Hajj</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input5"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="value-titles">Given out in loans</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input6"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="value-titles" class=" w-50">Business investments, shares, saving certificates,
                            pensions funded by money in
                            one’s possession
                        </td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input7"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr class=" fw-bold">
                        <td colspan="2" class="col-head">Trade Goods</td>
                    </tr>
                    <tr>
                        <td class="value-titles">Trade GoodsValue of stock</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input8"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr class=" fw-bold ">
                        <td colspan="2" class="col-head">Liabilities</td>
                    </tr>
                    <tr>
                        <td class="value-titles">LiabilitiesBorrowed money, goods bought on credit</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input9"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="value-titles">Wages due to employees</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input10"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="value-titles">Taxes, rent, utility bills due immediately</td>
                        <td>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" value="0" id="input11"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class=" ">
            <button type="button" class="btn btn-secondary reset fs-4 me-2 px-4" >Reset</button>
            <button type="submit" class="btn btn-success submit fs-4 px-4">Calculate</button>
        </div>
        <div class="total-assets total mt-2">
            <p>Total assets</p>
            <p id="total" class=" text-success"></p>
        </div>
        <div class="zakat-total  total bg-success m-0 w-100 px-4 text-light fw-bold fs-1 mb-2">
            <p>Zakat payable</p>
            <p id="zakat" class="me-5 fs-1"></p>
        </div>
    </div>
    <?php include 'assets/footer.php'; ?>
</body>
<style>
    td {
        font-size: 18px;
    }

    .col-head {
        font-size: 22px !important;
        font-weight: 700;
    }

    .value-titles {
        width: 50%;
    }

    @media (min-width:800px) {
        .main-calci {
            width: 75%;
        }
    }

    @media (max-width:800px) {
        body {
            font-size: 70%;
        }
    }

    .total {
        width: 90%;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: start;
        height: 100px;
        font-size: 30px;
        display: none;
    }

    .main-calci {
        margin: 30px 0 !important;
        width: 90% !important;
        /* box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px; */
    }
</style>
<script>
    $(document).ready(function () {
        $(".reset").click(function () {
                $('#input1').val(0);
                $('#input2').val(0) ;
                $('#input3').val(0) ;
                $('#input4').val(0) ;
                $('#input5').val(0) ;
                $('#input6').val(0) ;
                $('#input7').val(0) ;
                $('#input8').val(0) ;
                $('#input9').val(0) ;
                $('#input10').val(0) ;
                $('#input11').val(0);
                $('#total').val(0);
                $('#zakat').val(0);
                $(".main-calci").css({ "background-color": "#fff" });
                $(".total").css({ "display": "none" });
        });
    });
    $(document).ready(function () {
        $(".submit").click(function () {
            let total = parseInt($('#input1').val()) +
                parseInt($('#input2').val()) +
                parseInt($('#input3').val()) +
                parseInt($('#input4').val()) +
                parseInt($('#input5').val()) +
                parseInt($('#input6').val()) +
                parseInt($('#input7').val()) +
                parseInt($('#input8').val()) +
                parseInt($('#input9').val()) +
                parseInt($('#input10').val()) +
                parseInt($('#input11').val());
                $(".total").css({ "display": "flex" });
            parseInt($('#total').text('₹' + total));
            parseInt($('#zakat').text('₹' + total * 2.5 / 100));
            // $('#total').show();
            $(".main-calci").css({ "background-color": "#E9DAC1" });
        });
    });
</script>

</html>