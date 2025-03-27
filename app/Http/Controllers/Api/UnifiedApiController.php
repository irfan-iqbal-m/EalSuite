<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Invoice;

class UnifiedApiController extends Controller
{
     protected $handlers = [
        'customer' => [
            'model' => Customer::class,
            'fields' => ['name', 'phone', 'email', 'address'],
            'rules' => [
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'address' => 'nullable|string|max:500',
            ],
        ],
        'invoice' => [
            'model' => Invoice::class,
            'fields' => ['customer_id', 'date', 'amount', 'status'],
            'rules' => [
                'customer_id' => 'required|exists:customers,id',
                'date' => 'required|date',
                'amount' => 'required|numeric|min:0',
                'status' => 'required|in:Unpaid,Paid,Cancelled',
            ],
        ],
        // for more models
        // 'another' => [
        //     'model' => Another::class,
        //     'fields' => ['feild_1', 'feild_2', 'feild_3', 'feild_4'],
        // 'rules' => [
        //     'feild_1' => 'required|exists:customers,id',
        //     'feild_2' => 'required|date',
        //      ],
        // ],
    ];

    public function list(Request $request)
    {
        $type = $request->query('type'); // e.g. type=customer or type=invoice

        if (!isset($this->handlers[$type])) {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        $model = $this->handlers[$type]['model'];
        $items = $model::latest()->get();

        return response()->json($items);
    }

    public function create(Request $request)
    {
        $type = $request->input('type'); // e.g. type=customer or type=invoice
        
        if (!isset($this->handlers[$type])) {
            return response()->json(['error' => 'Invalid type'], 400);
        }
        
        $model = $this->handlers[$type]['model'];
        $fields = $this->handlers[$type]['fields'];
        $rules = $this->handlers[$type]['rules'];

        $validator = Validator::make($request->only($fields), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }


        $data = $request->only($fields);
        
        $item = $model::create($data);

        return response()->json([
            'success' => true,
            'data' => $item
        ]);
    }
}

