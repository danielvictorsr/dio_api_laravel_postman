<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{

//    ok - funcionou
//    public function hello()
//    {
//        return 'hello in controller';
//    }

//  ok funcionou (controller variável)
//    public function hello($name)
//    {
//        return 'hello ' . $name;
//    }

/*
//ok - funcinou no postman (json)
    public function hello($name)
    {
//        aspas simples não reconhece a variável name no retorno json
        return response()->json("Hello {$name}");
    }
*/

    /*
//    ok - funcionou no postman (json array)
    public function hello($name)
    {
        return response()->json([
            'oi' => "Hello {$name}",
            'tchau' => "aquilo"
        ]
        );
    }
    */

    public function hello($name, Request $request)
    {
        return response()->json([
                'oi' => "Hello {$name}",
//                'tchau' => $request->foo
                'tchau' => $request->all() //return all
            ]
        );
    }

}
