<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TradeCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTradeCategoryRequest;
use App\Http\Requests\UpdateTradeCategoryRequest;
use Illuminate\Support\Facades\Validator;

class TradeCategoryController extends Controller
{
    public function index()
    {
        $data['page_title']         = 'Trade Category List';
        
        $data['tradeCategories']    = TradeCategory::query()
                                    ->when(request()->filled('name'), fn ($q) => $q->where('name', request('name')))
                                    ->latest('id')
                                    ->paginate(20); 


        return view('admin.trade-category.index', $data);
    }





    public function create()
    {
        $data['page_title'] = 'Create Trade Category';
        return view('admin.trade-category.create', $data);
    }





    public function store(StoreTradeCategoryRequest $request)
    {
        try {
            TradeCategory::create([
                'name'      => $request->name,
                'status'    => $request->status == 'active' ? 1 : 0
            ]);

            $notify[] = ['success', 'Trade Category has been created successfully!'];
            
            return redirect()->route('admin.trade-categories.index')->withNotify($notify);

        } catch (\Throwable $th) {
            $notify[] = ['error', $th->getMessage()];
            return redirect()->back()->withNotify($notify);
        }
    }





    public function edit($id)
    {
        $data['page_title']     = 'Edit Trade Category';
        $data['tradeCategory']  = TradeCategory::findOrFail($id);

        return view('admin.trade-category.edit', $data);
    }





    public function update(UpdateTradeCategoryRequest $request, TradeCategory $tradeCategory)
    {
        try {
            $tradeCategory->update([
                'name'      => $request->name,
                'status'    => $request->status == 'active' ? 1 : 0
            ]);

            $notify[] = ['success', 'Trade Category has been updated successfully!'];
            
            return redirect()->route('admin.trade-categories.index')->withNotify($notify);

        } catch (\Throwable $th) {
            $notify[] = ['error', $th->getMessage()];
            return redirect()->back()->withNotify($notify);
        }
    }




    public function destroy(TradeCategory $tradeCategory)
    {
        try {

            $tradeCategory->delete();
            $notify[] = ['success', 'Trade Category has been deleted successfully!'];

        } catch (\Throwable $th) {
            $notify[] = ['error', 'You can not delete this Trade Category'];
        }
        return redirect()->back()->withNotify($notify);
    }





    public function updateStatus($id)
    {
        try {
            $tradeCategory = TradeCategory::findOrFail($id);

            $tradeCategory->update([
                'status' => $tradeCategory->status ? 0 : 1
            ]);

            $notify[] = ['success', 'Status has been updated successfully!'];

            return redirect()->back()->withNotify($notify);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
