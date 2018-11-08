<?php

namespace App\Http\Controllers;

use Request;
use DB;
use App\Categoria;
use App\Produto;
use App\Venda;
use App\Http\Requests\RelatorioRequest;

class RelatorioController extends Controller
{
    public function novo(){
    	return view('relatorio.formulario');
    }

    public function mostra(RelatorioRequest $request){

    	// var_dump($request->all());exit;
 	
		switch ($request["id_relatorio"]) {
            case '1': /*Categorias Mais Entradas*/
                $relatorios = Produto
                    ::join('entradas', 'entradas.fk_produto', '=', 'produtos.id_produto')
                    ->join('categorias', 'categorias.id_categoria', '=', 'produtos.fk_categoria')
                    ->select('categorias.nome','entradas.created_at',DB::raw('count(produtos.id_produto) as contador'))
                    ->whereBetween('entradas.created_at',array($request["inicio"],$request["fim"]))
                    ->groupBy('categorias.nome','entradas.created_at')
                    ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
                    ->orderBy('contador','DESC')
                    ->get();
                $_REQUEST["id_relatorio"] = $request["id_relatorio"];
                break;

			case '2': /*Categorias Mais Saídas*/
				$relatorios = Produto
		        ::join('saidas', 'saidas.fk_produto', '=', 'produtos.id_produto')
        		->join('categorias', 'categorias.id_categoria', '=', 'produtos.fk_categoria')
		        ->select('categorias.nome','saidas.created_at',DB::raw('count(produtos.id_produto) as contador'))
        		->whereBetween('saidas.created_at',array($request["inicio"],$request["fim"]))
		        ->groupBy('categorias.nome','saidas.created_at')
		        ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
		        ->orderBy('contador','DESC')
		        ->get();
		        $_REQUEST["id_relatorio"] = $request["id_relatorio"];
				break;

            case '3': /*Produtos Entrados*/
                $relatorios = Produto
                    ::join('entradas', 'entradas.fk_produto', '=', 'produtos.id_produto')
                    ->select('produtos.codigo_produto','produtos.descricao', 'entradas.quantidade', 'entradas.secretaria', 'entradas.created_at')
                    ->whereBetween('entradas.created_at',array($request["inicio"],$request["fim"]))
                    ->groupBy('produtos.codigo_produto','produtos.descricao','entradas.quantidade', 'entradas.secretaria','entradas.created_at')
                    ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
                    ->orderBy('produtos.codigo_produto','entradas.created_at')
                    ->get();

                $_REQUEST["id_relatorio"] = $request["id_relatorio"];
                break;

            case '4': /*Produtos Saídos*/
                $relatorios = Produto
                ::join('saidas', 'saidas.fk_produto', '=', 'produtos.id_produto')
                ->select('produtos.codigo_produto','produtos.descricao', 'saidas.quantidade', 'saidas.secretaria', 'saidas.created_at')
                ->whereBetween('saidas.created_at',array($request["inicio"],$request["fim"]))
                ->groupBy('produtos.codigo_produto','produtos.descricao','saidas.quantidade', 'saidas.secretaria','saidas.created_at')
                ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
                ->orderBy('produtos.codigo_produto', 'entradas.created_at')
                ->get();

                $_REQUEST["id_relatorio"] = $request["id_relatorio"];
                break;

			default:
				echo "Erro Fera!";
				break;
		}

    	return view('relatorio.formulario')->with(['relatorios' => $relatorios,'_REQUEST' => $_REQUEST]);
        exit;
		
		// return view('relatorio.formulario');
	}
}
