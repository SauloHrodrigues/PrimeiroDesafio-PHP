<?php
limparTerminal();
echo "*************************************\n";
echo "          Conta Bancária \n";
echo "*************************************";
quebrarLinhas(2);

$rodando = true;
$saldo = 1000.00;

while ($rodando) {

    Menu::mostrarMenu("Saulo", $saldo);
    $numero = (float) fgets(STDIN);

    switch ($numero) {
        case 1:
            echo "\n Seu saldo é de: R$ $saldo \n";
            break;
        case 2:
            $saldo = sacar($saldo);
            break;
        case 3:
            $saldo += depositar();
            break;

        case 4:
            $rodando = false;
            limparTerminal();
            break;

            default:
            echo "\nOpção inválida!\n";
    }
}

function sacar($saldo)
{
    echo "\n Qual valor deseja sacar? \n";
    $valor = (float) fgets(STDIN);

    if($valor > $saldo){
        echo "\nSaldo insuficiente!\n";
    } else {
        $saldo -= $valor;
        return $saldo;
    }

}

function depositar(){
    echo "\n Qual valor deseja depositar? \n";
    return (float) fgets(STDIN);
}


class Menu
{
    public static function mostrarMenu($nome, $saldo)
    {

        echo "*************************************\n";
        echo "Titular:     $nome \n";
        echo "Saldo atual: $saldo \n";
        echo "*************************************\n \n";

        echo "1. Consultar saldo atual\n";
        echo "2. Sacar valor\n";
        echo "3. Depositar valor\n";
        echo "4. Sair\n";
    }
}

function limparTerminal()
{
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        system('powershell.exe -Command "Clear-Host"');
    } else {
        system('clear');
        echo "\033[H\033[2J";
    }
}

function quebrarLinhas($numero){
    while($numero >0){
        echo "\n";
        $numero--;
    }
}