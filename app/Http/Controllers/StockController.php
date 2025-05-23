<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Services\StockService;
class StockController extends Controller
{
    protected $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function getStock(Request $request)
    {
        $symbol = $request->query('symbol', 'AAPL'); // Default: Apple stock
        $data = $this->stockService->getStockData($symbol);

        return response()->json($data);
    }

    public function getApi(){
        $data = $this->stockService->test_api();
        return response()->json($data);
    }

    public function read_companies()
    {
        $data = $this->stockService->readDataFromJSON();
        return response()->json($data[2030][0]);
    }



}
