<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\ClientService;

class ClientController extends Controller
{
    private $repository;
    /**
     * @var ClientService
     */
    private $service;

    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->findAll();
    }

    public function store(Request $request){
        return Response::json($this->service->create($request->all()));
    }
}