<?php
require_once 'class_bankaccount.php';

$initialAccountNumber = "";
$initialCustomerName = "";
$initialInitialBalance = "";
$hasilOutput = "";
$ar_ab = []; 


$dataWajib1 = new BankAccount("010", 6250000, "Messi");
$dataWajib2 = new BankAccount("070", 8743500, "Ronaldo");


$ar_ab[] = $dataWajib1;
$ar_ab[] = $dataWajib2;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST["accountNumber"];
    $customerName = $_POST["customerName"];
    $initialBalance = $_POST["initialBalance"];

    $bankAccount = new BankAccount($accountNumber, $initialBalance, $customerName);


    $ar_ab[] = $bankAccount;

    ob_start();
    $bankAccount->cetak();
    $hasilOutput = ob_get_clean();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Form Account Bank</title>
    <style>
        .container h2 {
            text-align: left;
        }
    </style>
</head>
<body>

<div class="container mt-3">
    <h2 class="text-center mb-4">Form Account Bank</h2>
    <form method="post" action="">
        <div class="form-group row">
            <label for="accountNumber" class="col-4 col-form-label mt-2 text-right">Nomor Rekening</label>
            <div class="col-5 ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-credit-card-alt"></i>
                        </div>
                    </div>
                    <input id="accountNumber" name="accountNumber" type="text" class="form-control"
                           pattern="[0-9]+" title="Input harus berupa angka"
                           value="<?php echo $initialAccountNumber; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="customerName" class="col-4 col-form-label mt-2 text-right">Nama Customer</label>
            <div class="col-5 ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-book"></i>
                        </div>
                    </div>
                    <input id="customerName" name="customerName" type="text" class="form-control"
                           value="<?php echo $initialCustomerName; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="initialBalance" class="col-4 col-form-label mt-2 text-right">Saldo Awal</label>
            <div class="col-5 ">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-money"></i>
                        </div>
                    </div>
                    <input id="initialBalance" name="initialBalance" type="text" class="form-control"
                           pattern="[0-9]+" title="Input harus berupa angka"
                           value="<?php echo $initialInitialBalance; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo '<div class="mt-3">';
        echo '<table class="table">';
        echo '<thead class="table-dark">';
        echo '<tr>';
        echo '<th>No</th>';
        echo '<th>No.Rekening</th>';
        echo '<th>Customer</th>';
        echo '<th>Saldo</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';


foreach ($ar_ab as $index => $bankAccount) {
    echo '<tr>';
    echo '<td>' . ($index + 1) . '</td>';
    echo '<td>' . $bankAccount->nomor . '</td>';
    echo '<td>' . $bankAccount->customer . '</td>';
    echo '<td>' . $bankAccount->getSaldo() . '</td>';
    echo '</tr>';
}

        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
