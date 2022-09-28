<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CalculoDeImc extends Model{
        use HasFactory;

        public function calcular(){
            $altura = $_GET['altura'];
            $peso = $_GET['peso'];

            $imc = $peso/($altura*$altura);

            return $imc;
        }

        function defineSituacao($imc){
            switch ($imc){
                case $imc<18.5:
                    $situacao = "Abaixo do peso";
                    break;
                case $imc>=18.5 && $imc <= 24.9:
                    $situacao = "Peso normal";
                    break;
                case $imc>24.9 && $imc <= 29.9:
                    $situacao = "Sobrepeso";
                    break;
                case $imc> 29.9 && $imc <= 34.9:
                    $situacao = "Obesidade grau 1";
                    break;
                case $imc>34.9 && $imc <= 39.9:
                    $situacao = "Obesidade grau 2";
                    break;
                case $imc>39.9:
                    $situacao = "Obesidade grau 3";
                    break;
            }
            return $situacao;
        }

        public function calcularIdade(){
            $nascimento = $_GET['nascimento'];

            $data = explode('-', $nascimento);

            $anoNascimento = $data[0];
            $mesNascimento = $data[1];
            $diaNascimento = $data[2];

            $anoAtual   = date("Y");
            $mesAtual   = date("m");
            $diaAtual   = date("d");

            $idade = $anoAtual - $anoNascimento;

            if($mesAtual < $mesNascimento){
                $mes = 12 - ($mesNascimento - $mesAtual);
            }
            else if($mesAtual == $mesNascimento){
                if($diaAtual >= $diaNascimento){
                    $mes = 0;
                }
                else{
                    $mes = 11;
                }
            }
            else{
                $mes = $mesAtual - $mesNascimento;
            }

            if($mesAtual < $mesNascimento){
                $idade -= 1;
            }
            else if(($mesAtual == $mesNascimento) && ($diaAtual <= $diaNascimento)){
                $idade -= 1;
            }

            $infoIdade = array();
            
            $infoIdade['idade'] = $idade;
            $infoIdade['mes'] = $mes;
            
            return $infoIdade;
        }

        public function calculaQualidadeSono(){
            
        }
    }
?>