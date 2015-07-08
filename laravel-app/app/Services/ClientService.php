<?php

namespace App\Services;


use App\Repositories\ClientRepository;
use Illuminate\Validation\Validator;

class ClientService {
    private $client;
    private $validator;

    public function __construct(ClientRepository $client, Validator $validator)
    {
        $this->client = $client;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        $validator = $this->validate($data);

        if ($validator->fails()){
            return ['error'=>true, 'messages'=> $validator->messages()];
        }

        $client = $this->client->getModel()->create($data);
        return $client;
    }

    public function validate(array $data)
    {
        return $this->validator->make($data, [
            'name'=>'required|max:100',
            'email'=>'email',
        ]);
    }
}
