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

            $imc = $CalculoDeImc->calcular($_GET['altura'], $_GET['peso']);

            $idade = $CalculoDeImc->calcularIdade($_GET['nascimento']);

            $situacao = $CalculoDeImc->defineSituacao($imc);

            $qualidadeDoSono = $CalculoDeImc->calculaQualidadeSono($idade['idade'], $idade['mes'], $_GET['sono']);

            return view('resultado', ['imc' => $imc, 'idade' => $idade['idade'], 'meses' => $idade['mes'],
            'nome' => $_GET['nome'], 'situacao' => $situacao, 'qualidadeSono' => $qualidadeDoSono]);
        }
    }
?>