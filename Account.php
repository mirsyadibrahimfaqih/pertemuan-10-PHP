<?php

class Account {
    public $nomor;
    protected $saldo;

    public function __construct($nomor, $saldo) {
        $this->nomor = $nomor;
        $this->saldo = $saldo;
    }

    public function deposit($uang) {
        $this->saldo = $this->saldo + $uang;
    }

    public function withdraw($uang) {
        $this->saldo = $this->saldo - $uang;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function cetak() {
        echo 'Nomor Account : ' . $this->nomor;
        echo '<br/>Saldonya : ' . $this->getSaldo();
    }
}

?>
