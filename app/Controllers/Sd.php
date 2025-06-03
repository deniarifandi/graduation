<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\SdModel;
use App\Libraries\datatable;
use Config\Database;

class Sd extends MyResourceController
{

    public $table = "sd";
    public $title = "Primary";
    public $primaryKey = "student_id";
    public $fieldList = [
        ['student_name','Nama Murid'], 
        ['class','Kelas'],
        ['meja','Nomor Meja'],
        ['add1','Ticket'],
        ['add2','Additional Ticket'],
        ['hp','Phone Number']
    ];

    public $field = [
        ['text','student_name'],
        ['select','class'],
        ['text','meja'],
        ['select','add1'],
        ['select','add2'],
        ['text','hp'],
];

public $fieldName = [
        'Nama Murid', 
        'Kelas',
        'Nomor Meja',
        'Ticket',
        'Additional Ticket',
        'HP'
    ];

public $fieldOption = [
  ['noOption'], 
  [['P6A','P6A'],['P6B','P6B'],['P6C','P6C']],
  ['noOption'], 
  [[3,'3']],
  [[1,'1'],[2,'2'],[3,'3'],[4,'4'],[5,'5']],
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

    public function loginlist(){
          $logindata = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $logindata = Database::connect()->table($this->table)
            ->select('sd.*')
            ->where('student_id',$id)
            ->where('sd.deleted_at',null)->get()->getResult();

            $db = Database::connect();
            $builderUpdate = $db->table($this->table);

            // Update the 'meja' field where student_id = $id and deleted_at is null
            $builderUpdate->where('student_id', $id)
                    ->where('deleted_at', null)
                    ->set('attended', 1)
                    ->update();
        }

        $builder1 = Database::connect()->table($this->table)
        ->select('sd.*')
        ->where('class','P6A')
        ->where('sd.deleted_at',null);

        $builder2 = Database::connect()->table($this->table)
        ->select('sd.*')
        ->where('class','P6B')
        ->where('sd.deleted_at',null);

        $builder3 = Database::connect()->table($this->table)
        ->select('sd.*')
        ->where('class','P6C')
        ->where('sd.deleted_at',null);

        // print_r($builder->get()->getResult());
        return view('login',[
            'data1' => $builder1->get()->getResult(),
            'data2' => $builder2->get()->getResult(),
            'data3' => $builder3->get()->getResult(),
            'logindata' => $logindata
        ]);
    }

}
