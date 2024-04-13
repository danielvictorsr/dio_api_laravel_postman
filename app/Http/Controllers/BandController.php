<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class BandController extends Controller
{
//    funcionou no postman
//    public function getAll()
//    {
//        return response()->json([]);
//    }


    public function getAll()
    {
        $bands = $this->getBands();
        return response()->json($bands);
    }

    public function getById($id)
    {
        $band = null;

        foreach ($this->getBands() as $_band)
        {
            if($_band['id'] == $id)
            {
                $band = $_band;
            }
        }

//        return response()->json($band);
//        dessa forma se o id não existir retornará 404
        return $band ? response()->json($band) : abort(404);
    }

    public function getGenderById($id)
    {
        $band = null;

        foreach ($this->getBands() as $_band)
        {
            if($_band['id'] == $id)
            {
                $band = $_band['gender'];
            }
        }

//        return response()->json($band);
//        dessa forma se o id não existir retornará 404
        return $band ? response()->json($band) : abort(404);
    }

    public function store(Request $request) {

        $validate = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3'
        ]);

        return response()->json($request->all());

    }

    protected function getBands()
    {
        return [
          [
              'id' => 1, 'name' => 'dream teacher', 'gender' => 'progressivo'
          ],
          [
              'id' => 2, 'name' => 'megadeath', 'gender' => 'trash metal'
          ],
          [
              'id' => 3, 'name' => 'dio', 'gender' => 'heavy metal'
          ],
          [
              'id' => 4, 'name' => 'metallica', 'gender' => 'heavy metal'
          ],
          [
              'id' => 5, 'name' => 'barões da pisadinha', 'gender' => 'tecno forró'
          ],

        ];
    }
}
