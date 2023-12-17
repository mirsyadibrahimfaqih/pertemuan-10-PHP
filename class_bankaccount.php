<?php

require_once 'Account.php';

class BankAccount extends Account {
    public $customer;
    public static $biaya_admin = 6500;

    function __construct($no, $saldo_awal, $cust) {
        parent::__construct($no, $saldo_awal);
        $this->customer = $cust;
    }

    function cetak() {
        parent::cetak();
        echo ', Customer : ' . $this->customer;
    }

    function transfer($obj_account, $uang) {
        $obj_account->deposit($uang);
        $this->withdraw($uang);
        $this->withdraw(self::$biaya_admin);
    }
}

?>
