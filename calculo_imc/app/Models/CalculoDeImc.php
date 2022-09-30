<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CalculoDeImc extends Model{
        use HasFactory;

        public function calcular($altura, $peso){

            $imc = $peso/($altura*$altura);

            return $imc;
        }

        public function defineSituacao($imc){
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

        public function calcularIdade($nascimento){

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

        public function calculaQualidadeSono($idade, $meses, $sono){
            if($idade == 0){
                if($meses <=3){
                    if($sono < 14){
                        $qualidadeDoSono = "Horas de sono insuficientes.";
                    }
                    else if($sono >= 14 && $sono <= 17){
                        $qualidadeDoSono = "Horas de sono adequadas.";
                    }
                    else{
                        $qualidadeDoSono= "Horas de sono excessivas.";
                    }
                }
                else{
                    if($sono < 12){
                        $qualidadeDoSono = "Horas de sono insuficientes.";
                    }
                    else if($sono >= 12 && $sono <= 15){
                        $qualidadeDoSono = "Horas de sono adequadas.";
                    }
                    else{
                        $qualidadeDoSono= "Horas de sono excessivas.";
                    }
                }
            }
            else if($idade >= 1 && $idade <= 2){
                if($sono < 12){
                    $qualidadeDoSono = "Horas de sono insuficientes.";
                }
                else if($sono >= 12 && $sono <= 15){
                    $qualidadeDoSono = "Horas de sono adequadas.";
                }
                else{
                    $qualidadeDoSono= "Horas de sono excessivas.";
                } 
            }
            else if($idade >= 3 && $idade <= 5){
                if($sono < 10){
                    $qualidadeDoSono = "Horas de sono insuficientes.";
                }
                else if($sono >= 10 && $sono <= 13){
                    $qualidadeDoSono = "Horas de sono adequadas.";
                }
                else{
                    $qualidadeDoSono= "Horas de sono excessivas.";
                }  
            }
            else if($idade >= 6 && $idade <= 13){
                if($sono < 9){
                    $qualidadeDoSono = "Horas de sono insuficientes.";
                }
                else if($sono >= 9 && $sono <= 11){
                    $qualidadeDoSono = "Horas de sono adequadas.";
                }
                else{
                    $qualidadeDoSono= "Horas de sono excessivas.";
                }  
            }
            else if($idade >= 14 && $idade <= 17){
                if($sono < 8){
                    $qualidadeDoSono = "Horas de sono insuficientes.";
                }
                else if($sono >= 8 && $sono <= 10){
                    $qualidadeDoSono = "Horas de sono adequadas.";
                }
                else{
                    $qualidadeDoSono= "Horas de sono excessivas.";
                }  
            }
            else if($idade >= 18 && $idade <=64){
                if($sono < 7){
                    $qualidadeDoSono = "Horas de sono insuficientes.";
                }
                else if($sono >= 7 && $sono <= 9){
                    $qualidadeDoSono = "Horas de sono adequadas.";
                }
                else{
                    $qualidadeDoSono= "Horas de sono excessivas.";
                }  
            }
            else{
                if($sono < 7){
                    $qualidadeDoSono = "Horas de sono insuficientes.";
                }
                else if($sono >= 7 && $sono <= 8){
                    $qualidadeDoSono = "Horas de sono adequadas.";
                }
                else{
                    $qualidadeDoSono= "Horas de sono excessivas.";
                }  
            }
            return $qualidadeDoSono;
        }
    }
?>