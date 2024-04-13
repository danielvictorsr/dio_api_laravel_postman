# API_Laravel_Postman
Desafio de Projeto na Plataforma da DIO - Projeto final para obtenção do certificado de Formação em PHP


Foi desenvolvido rotas simples para aprendizado base do Laravel com API
```php
//Rotas Ativas
Route::get('bands', 'App\Http\Controllers\BandController@getAll');
Route::get('bands/{id}', 'App\Http\Controllers\BandController@getById');
Route::get('bands/gender/{id}', 'App\Http\Controllers\BandController@getGenderById');
Route::post('bands/store', 'App\Http\Controllers\BandController@store');
```
A rota store não armazena, foi gerada apenas para demonstração utilizando o Postman

http://localhost:8000/api/bands -> retorna todas as bandas cadastradas  

http://localhost:8000/api/bands/1 -> retorna a banda com o id de número 1  

http://localhost:8000/api/bands/gender/1 -> retorna o genero da banda de id de número 1  


```php
//Controller (funções)
public function getAll() {

        $bands = $this->getBands();

        return response()->json($bands);

    }

    public function getById($id) {

        $band = null;

        foreach($this->getBands() as $_band) {
            if ($_band['id'] == $id)
                $band = $_band;
        }

        return $band ? response()->json($band) : abort(404);

    }

    public function getBandsByGender($gender) {

        $bands = [];

        foreach($this->getBands() as $_band) {
            if ($_band['gender'] == $gender)
                $bands[] = $_band;
        }

        return response()->json($bands);

    }

    public function store(Request $request) {

        $validate = $request->validate([
            'id' => 'numeric',
            'name' => 'required|min:3'
        ]);

        return response()->json($request->all());

    }

    protected function getBands() {

        return [
            [
                'id' => 1, 'name' => 'dream teather', 'gender' => 'progressivo'
            ],
            [
                'id' => 2, 'name' => 'megadeth', 'gender' => 'trash metal'
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
```
