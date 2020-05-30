<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Adds a quantity to product stock
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, Report $report, $sku) {
        $product = Product::find($sku);

        if(!empty($product)) {

            if(empty($request->stock)) {
                return response()->json([
                    'info' => 'error',
                    'result' => "Ops! Por favor informe a quantidade a ser adicionada no parâmetro stock."
                ]);
            }

            $product->stock += $request->stock;
            $product->save();

            $report->product_sku = $product->sku;
            $report->type = 1;
            $report->method = 'api';
            $report->quantity = $request->stock;
            $report->save();

            return response()->json($product);
        } else {
            return response()->json([
                'info' => 'error',
                'result' => "Ops! O produto de código ${sku} não foi encontrado."
            ]);
        }
    }

    /**
     * Removes a quantity from product stock
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request, Report $report, $sku) {
        $product = Product::find($sku);

        if(!empty($product)) {
            $product->stock -= $request->stock;

            if($product->stock > 0) {
                $product->save();
            } else {
                return response()->json([
                    'info' => 'error',
                    'result' => "Ops! Você não pode remover esta quantidade do estoque do produto."
                ]);
            }

            $report->product_sku = $product->sku;
            $report->type = 2;
            $report->method = 'api';
            $report->quantity = $request->stock;
            $report->save();

            return response()->json($product);
        }
    }
}
