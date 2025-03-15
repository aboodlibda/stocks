<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index()
    {
        // Get the logged-in user using the 'user' guard
        $user = Auth::guard('user')->user();

        // Retrieve portfolios that belong to the logged-in user
        $portfolios = Portfolio::query()
            ->where('user_id', $user->id) // Assuming 'user_id' is the foreign key in the Portfolio table
            ->latest()
            ->get();

        // Return the portfolios view with the filtered data
        return view('cms.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('cms.portfolio.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'investment_amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'text' => trans('dashboard_trans.Please correct the highlighted errors and try again'),
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'icon'=>'error',
            ], 422);
        }
        $data = $request->only(['name', 'investment_amount']);
        $data['status'] = $request->status ?? 'active';
//        $data['user_id'] = auth()->user()->id;
        $data['user_id'] = Auth::guard('user')->id();
        $portfolio = Portfolio::query()->create($data);

        if ($portfolio) {
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Portfolio created successfully'),
            ]);

        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to create coupon'),
            ]);
        }

    }

    public function show($id)
    {
    }

    public function edit($portfolio)
    {
        return view('cms.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
