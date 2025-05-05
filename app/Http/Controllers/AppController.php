<?php

namespace App\Http\Controllers;

use App\Repositories\AppRepositoryInterface;
use Illuminate\Http\Request;

class AppController extends Controller
{
    private $appRepository;
    public function __construct(AppRepositoryInterface $appRepository)
    {
        $this->appRepository = $appRepository;
    }

    public function index(Request $request)
    {
        // dd($request);
        if(!$request->hasAny(['name', 'age'])){
            $apps = $this->appRepository->find();
        }
        else{
            $apps = $this->appRepository->filter($request->all());
        }
        return view('oi', compact('apps'));
    }

    public function store(Request $request)  //nao deixar escrever data futuro -- fazer
    {
         
        $this->appRepository->store($request->all());
        return redirect()->route('app.index');
    }

    public function destroy($id)
    {
        $this->appRepository->delete($id);
        return redirect()->route('app.index');
    }

    public function show($id)
    {
        $apps = $this->appRepository->findById($id);
        return view('edit', compact('apps'));
    }

    public function update($id, Request $request)
    {
        // dd($request);
        $this->appRepository->store($request->all(), $id);

        return redirect()->route('app.index', $id);
    }
}
