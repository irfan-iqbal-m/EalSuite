<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('customer')->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('invoices.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Unpaid,Paid,Cancelled',
        ]);

        Invoice::create($request->all());
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        return view('invoices.edit', compact('invoice', 'customers'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:Unpaid,Paid,Cancelled',
        ]);

        $invoice->update($request->all());
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully!');
    }
}
