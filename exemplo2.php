<?php
abstract class Conta{
    protected $agencia;
    protected $conta;
    protected $saldo;

    public function __construct($agencia, $conta, $saldo)
    {
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = $saldo;
    }

    public function getDetalhes()
    {
        return "Agencia: {$this->agencia} | Conta: {$this->conta} | Saldo: {$this->saldo}";
    }

    public function depositar($valor)
    {
        $this->saldo += $valor;
        echo "Deposito de: {$valor} | Saldo Atual: {$this->saldo}";
    }
}

class Poupanca extends Conta{
    public function saque($valor)
    {
        if ($this->saldo >= $valor):
            $this->saldo -= $valor;
            echo "Saque de {$valor} | Saldo Atual: {$this->saldo}";
        else:
            echo "Saque não autorizado de {$valor} | Saldo Atual: {$this->saldo}";
        endif;
    }

}

class Corrente extends Conta{
    protected $limite;
    public function __construct($agencia, $conta, $saldo, $limite)
    {
        parent::__construct($agencia, $conta, $saldo);
        $this->limite = $limite;
    }

    public function saque($valor)
    {
        if ($this->saldo + $this->limite >= $valor):
            $this->saldo -= $valor;
            echo "Saque de {$valor} | Saldo Atual: {$this->saldo}";
        else:
            echo "Saque não autorizado de {$valor} | Saldo Atual: {$this->saldo} | Limite {$this->limite}";
        endif;
    }

}

$conta1 = new Corrente(100, 2586,5000, 2000);

echo 'Antes do deposito ->'.$conta1->getDetalhes();
echo '<br>';
$conta1->depositar(1800);
echo '<br>';
$conta1->saque(2000);
echo '<br>';
$conta1->saque(6000);

