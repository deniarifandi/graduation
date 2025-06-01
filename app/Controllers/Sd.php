<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\SdModel;
use App\Libraries\datatable;
use Config\Database;

class Sd extends MyResourceController
{

    public $table = "sd";
    public $title = "Sd";
    public $primaryKey = "student_id";
    public $fieldList = [
        ['student_name','Nama Murid'], 
        ['class','Kelas'],
        ['papa_name','Nama Papa'],
        ['mama_name','Nama Mama'],
        ['add1','tambahan 1'],
        ['add2','tambahan 2'],
        ['add3','tambahan 3'],
        ['add4','tambahan 4'],
        ['add5','tambahan 5'],
        ['hp','Phone Number']
    ];

    public $field = [
        ['text','student_name'],
        ['select','class'],
        ['text','papa_name'],
        ['text','mama_name'],
        ['text','add1'],
        ['text','add2'],
        ['text','add3'],
        ['text','add4'],
        ['text','add5'],
        ['text','hp'],
];

public $fieldName = [
        'Nama Murid', 
        'Kelas',
        'Nama Papa',
        'Nama Mama',
        'Tambahan 1',
        'Tambahan 2',
        'Tambahan 3',
        'Tambahan 4',
        'Tambahan 5',
        'HP'
    ];

public $fieldOption = [
  ['noOption'], 
  [[1,'A'],[2,'B'],[3,'C'],[4,'D']],
  ['noOption'],
  ['noOption'],
  ['noOption'],
  ['noOption'],
  ['noOption'],
  ['noOption'],
  ['noOption']
];

    public $dataToShow = [];


    public function __construct()
    {
        $this->model = new SdModel();
        $this->dataToShow = $this->prepareDataToShow();
    }

    public function data(){
        $builder = Database::connect()->table($this->table)
        ->select('sd.*')
        ->where('sd.deleted_at',null);

        $datatable = new Datatable();

        return $datatable->generate($builder, 'sd.student_id',[
            'sd.student_id'
        ]);
    }

    public function qr($id){
        //echo "idnya".$id;
           $builder = Database::connect()->table($this->table)
        ->select('sd.*')
        ->where('sd.student_id',$id)
        ->where('sd.deleted_at',null);

        // print_r($builder->get()->getResult());
        return view('qr',['data' => $builder->get()->getResult()]);
    }

}
