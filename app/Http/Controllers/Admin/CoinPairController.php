<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCoinPairRequest;
use App\Models\CoinPair;
use App\Models\TradeCategory;
use Illuminate\Http\Request;

class CoinPairController extends Controller
{
    public function index()
    {
        $data['page_title']         = 'Coin Pair List'; 
        $data['tradeCategories']    = TradeCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        $data['coinPairs']          = CoinPair::query()
                                    ->when(request()->filled('trade_category_id'), fn ($q) => $q->where('trade_category_id', request('trade_category_id')))
                                    ->when(request()->filled('search'), function ($q) {
                                        $q->where(function ($q) {
                                            $q->where('name', 'like', '%' . request('search') . '%')
                                            ->orWhere('fromsym', 'like', '%' . request('search') . '%')
                                            ->orWhere('tosym', 'like', '%' . request('search') . '%');
                                        });
                                    })
                                    ->latest('id')
                                    ->paginate(20);

        return view('admin.coin-pair.index', $data);
    }





    public function create()
    {
        $data['page_title']         = 'Create Coin Pair';
        $data['tradeCategories']    = TradeCategory::orderBy('name', 'ASC')->pluck('name', 'id');

        return view('admin.coin-pair.create', $data);
    }





    public function store(StoreCoinPairRequest $request)
    {
        try {
            CoinPair::create([
                'trade_category_id' => $request->trade_category_id,
                'name'              => $request->name,
                'fromsym'           => $request->fromsym,
                'tosym'             => $request->tosym,
                'step'              => $request->step,
                'minimum'           => $request->minimum,
                'status'            => $request->status == 'active' ? 1 : 0
            ]);

            $notify[] = ['success', 'Coin Pair has been created successfully!'];
            
            return redirect()->route('admin.coin-pairs.index')->withNotify($notify);

        } catch (\Throwable $th) {
            $notify[] = ['error', $th->getMessage()];
            return redirect()->back()->withNotify($notify);
        }
    }





    public function edit($id)
    {
        $data['page_title']         = 'Edit Coin Pair';
        $data['tradeCategories']    = TradeCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        $data['coinPair']           = CoinPair::findOrFail($id);

        return view('admin.coin-pair.edit', $data);
    }





    public function update(StoreCoinPairRequest $request, CoinPair $coinPair)
    {
        try {
            $coinPair->update([
                'trade_category_id' => $request->trade_category_id,
                'name'              => $request->name,
                'fromsym'           => $request->fromsym,
                'tosym'             => $request->tosym,
                'step'              => $request->step,
                'minimum'           => $request->minimum,
                'status'            => $request->status == 'active' ? 1 : 0
            ]);

            $notify[] = ['success', 'Coin Pair has been updated successfully!'];
            
            return redirect()->route('admin.coin-pairs.index')->withNotify($notify);

        } catch (\Throwable $th) {
            $notify[] = ['error', $th->getMessage()];
            return redirect()->back()->withNotify($notify);
        }
    }





    public function destroy(CoinPair $coinPair)
    {
        try {

            $coinPair->delete();
            $notify[] = ['success', 'Coin Pair has been deleted successfully!'];

        } catch (\Throwable $th) {
            $notify[] = ['error', 'You can not delete this Coin Pair'];
        }
        return redirect()->back()->withNotify($notify);
    }





    public function updateStatus($id)
    {
        try {
            $coinPair = CoinPair::findOrFail($id);

            $coinPair->update([
                'status' => $coinPair->status ? 0 : 1
            ]);

            $notify[] = ['success', 'Status has been updated successfully!'];

            return redirect()->back()->withNotify($notify);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
