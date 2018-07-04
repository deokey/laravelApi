<?php

namespace Api\Http\Controllers\Invoice;

use Api\Http\Controllers\Controller;
use Api\Invoice;
use Illuminate\http\Request;

class InvoiceController extends Controller
{

    public function addInvoice(Request $request)
    {
        $invoice = Invoice::create($request->all());
        return $invoice;
    }

    public function getInvoices()
    {
        $invoices = Invoice::all();
        return $invoices;
    }

    public function getInvoice($id)
    {
        $invoice = Invoice::find($id);
        return $invoice;
    }

    public function deleteInvoice($id)
    {
        $relations = \DB::statement('delete from invoice_product where invoice_id = :id', ['id' => $id]);

        $invoice = \DB::statement('delete from invoices where id = :id', ['id' => $id]);

        return "deleteInvoice finished";
    }

}
