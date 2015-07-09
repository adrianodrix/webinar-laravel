<?php

namespace App\Services;


use App\Repositories\ClientRepository;
use Illuminate\Validation\Factory as Validator;

class ClientService {
    private $repository;
    private $validator;

    public function __construct(ClientRepository $repository, Validator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    public function validate(array $data)
    {
        return $this->validator->make($data, [
            'name'=>'required|max:100',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required'
        ]);
    }

    public function getRepository()
    {
        return $this->repository;
    }

    public function create(array $data)
    {
        $validator = $this->validate($data);

        if ($validator->fails()){
            return ['error'=>true, 'messages'=> $validator->getMessageBag()];
        }

        return $this->getRepository()->create($data);
    }
}
