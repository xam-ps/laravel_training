<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('firstname') && $request->has('lastname')){
            $customer = new Customer();
            $customer->firstname = $request->input('firstname');
            $customer->lastname = $request->input('lastname');
            try {
                if($customer->save()) {
                    return redirect()->route('customer.index')->with('success', "Saved");
                }
            } catch (Exception $e) {
                return redirect()->back()->withInput()->withErrors("Could not store");
            }
        } else {
            print_r("no valid json");
        }
    }

    public function checkoutBook($bookId, Request $request) {
        $book = Book::find($bookId);
        $customer = Customer::find($request->input('customer'));
        $customer->books()->save($book);

        return redirect()->route('customers.show', ['id' => $customer->id]);
    }

    public function checkinBook($customerId, $bookId) {
        $book = Book::find($bookId);
        $book->customer_id = NULL;
        $book->save();

        return redirect()->route('customers.show', ['id' => $customerId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customerId)
    {
        $customer = Customer::find($customerId);
        $books = $customer->books;
        return view('customers.single', ['customer' => $customer, 'books' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
