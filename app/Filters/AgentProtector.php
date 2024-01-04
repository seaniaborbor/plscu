<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AgentProtector implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Filter logic before the controller runs
        if(!session()->has("agentLogin")){
            return redirect()->to('/login')->with('error', ['You must login to continue']);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Filter logic after the controller runs
    }
}
