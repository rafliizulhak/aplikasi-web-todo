<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 *
 */
class todoController extends Controller
{

  public function create(Request $request)
    {
      $validation = Validator::make($request->all(),[
            'kegiatan' => 'required|max:200',
            'deskripsi' => 'required|string',
        ] );

        if ($validation->fails()){
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $result  = \App\todo::create($request->all());
        if ($result){
            return [
                'status' => 'success',
                'message' => 'Data Berhasil ditambahkan',
                'result' => $result
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Data gagal ditambahkan',
                'result' => null
            ];
        }
    }
    public function read(Request $request)
    {
        $result = \App\todo::all();
        return [
            'status' => 'success',
            'message' => '',
            'result' => $result
        ];
    }
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),
        [
            'kegiatan' => 'required|max:200',
            'deskripsi' => 'required|string',
        ] );

        if ($validation->fails()){
            $errors = $validation->errors();
            return [
                'status' => 'error',
                'message' => $errors,
                'result' => null
            ];
        }

        $todolist = \App\todo::where('id','=',$id);
        if (empty($todolist)) {
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }
        $result = $todolist->update($request->all());
        if ($result) {
            return[
                'status' => 'success',
                'message' => 'Data Berhasil diubah',
                'result' => $result
            ];
        }else{
            return [
                'status' => 'error',
                'message' => 'Data gagal diubah',
                'result' => null
            ];
        }
    }
    public function delete(Request $request, $id)
    {
        $todolist = \App\todo::find($id);
        if(empty($todolist)){
            return [
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
                'result' => null
            ];
        }

        $result = $todolist->delete($id);
        if ($result) {
            return[
                'status' => 'success',
                'message' => 'Data Berhasil dihapus',
                'result' => $result
            ];
        }else{
            return [
                'status' => 'error',
                'message' => 'Data gagal dihapus',
                'result' => null
            ];
        }
    }
    public function detail($id){
      $todolist = todo::find($id);

      if (empty($todolist)) {
        return [
          'status' => 'error',
          'message' => 'Data tidak ditemukan',
          'result' => null
        ];
      }

      return [
        'status' => 'success',
        'result' => $todolist
      ];
    }
}

 ?>
