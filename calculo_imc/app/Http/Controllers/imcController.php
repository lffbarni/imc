<?php
    namespace App\Http\Controllers;

    use illuminate\Http\Request;

    use App\Models\CalculoDeImc;

    Class imcController extends Controller{
        public function index(){
            return view('imc');
        }

        public function calcularIMC(){
            $CalculoDeImc = new CalculoDeImc();

            $imc = $CalculoDeImc->calcular();

            $idade = $CalculoDeImc->calcularIdade();

            $situacao = $CalculoDeImc->defineSituacao($imc);

            return view('resultado', ['imc' => $imc, 'idade' => $idade['ano'], 'nome' => $_GET['nome'], 'situacao' => $situacao]);
        }
    }
?>