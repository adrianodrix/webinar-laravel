<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Services\ClientService;

class ClientController extends Controller
{
    private $service;

    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getRepository()->findAll();
    }

    public function get($id)
    {
        return $this->service->getRepository()->find($id);
    }

    public function store(Request $request){
        return Response::json($this->service->create($request->all()));
    }
    public function update(Request $request, $id){
        return Response::json($this->service->getRepository()->update($request->all(), $id));
    }
    public function delete($id){
        return Response::json($this->service->getRepository()->delete($id));
    }
}