<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use illuminate\View\View;
use illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    //

    public function index()
{
    return view('customer.tabel', ["title" => "Customer", "data" => Customer::all()]);
}

public function create():View
{
    return view('customer.tambah')->with(["title" => "Tambah Data Customer"]);
}

public function store(Request $request): RedirectResponse
{
    $request->validate(["name"=>"required", "email"=>"required", "phone"=>"required", "address"=>"nullable"]);

    Customer::create($request->all());
    return redirect()->route('pelanggan.index')->with('success','Data Customer Berhasil Ditambahkan');
}
public function edit(Customer $pelanggan):View
{
    return view('Customer.edit',compact('pelanggan'))->with(["title" => "Ubah Data Customer"]);
}
public function update (Request $request, Customer $pelanggan):RedirectResponse
{
    $request->validate(["name"=>"required", "email"=>"required", "phone"=>"required", "address"=>"nullable"]);
    $pelanggan->update($request->all());

    return redirect()->route('pelanggan.index')->with('update','Data Pelanggan Berhasil Diubah');
}
public function show(Customer $pelanggan):View
{
    return view('customer.tampil',compact('pelanggan'))->with(["title" => "Data Customer"]);
}
}
