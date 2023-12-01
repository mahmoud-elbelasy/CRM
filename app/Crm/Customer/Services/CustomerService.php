<?php

namespace Crm\Customer\Services;

use Crm\Customer\Events\CustomerCreation;
use Crm\Customer\Repositories\CustomerRepository;
use Crm\Customer\Requests\CreateCustomerRequest;
use Crm\Customer\Models\customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CustomerService
{
    private $customerRepository;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index(Request $request)
    {
        return $this->customerRepository->all();
    }

    public function show($id)
    {

        return $this->customerRepository->find($id);


    }

    public function create(CreateCustomerRequest $request)
    {
        $customer = customer::create([
            'name' => $request->name
        ]);
        event(new CustomerCreation($customer));
        return $customer;
    }

    public function update(Request $request,$id)
    {
        $customer = customer::find($id);
        if(!$customer){
            return response()->json(['status'=>'not found'], ResponseAlias::HTTP_NOT_FOUND);
        }

        $customer->update([
            'name' => $request->name
        ]);

        return $customer;
    }

    public function delete(Request $request)
    {
        $customer = customer::find($request->id);
        if(!$customer){
            return response()->json(['status'=>'not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        $customer->delete();

        return response()->json(['status'=>'deleted'], ResponseAlias::HTTP_OK);
    }
}
