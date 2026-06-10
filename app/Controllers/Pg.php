<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\PgModel;
use App\Libraries\datatable;
use Config\Database;

class Pg extends MyResourceController
{

    public $table = "pg";
    public $title = "PG & TK";
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
  [['K2 A','K2 A'],['K2 B','K2 B'],['K2 C','K2 C'],['K2 D','K2 D'],['KP 2','KP 2'],['KH','KH']],
  ['noOption'], 
  [[3,'3']],
    [[0,'0'],[1,'1'],[2,'2'],[3,'3'],[4,'4'],[5,'5']],
  ['noOption'],
  ['noOption'],
  ['noOption']
];

    public $dataToShow = [];


    public function __construct()
    {
        $this->model = new PgModel();
        $this->dataToShow = $this->prepareDataToShow();
    }

    public function index()
    {   

        return view('/listpg', $this->dataToShow);
    }  

    public function data(){
        $builder = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('pg.deleted_at',null);

        $datatable = new Datatable();

        return $datatable->generate($builder, 'pg.student_id',[
            'pg.student_id',
            'pg.student_name'
        ]);
    }

    public function qr($id){
        //echo "idnya".$id;
           $builder = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('pg.student_id',$id)
        ->where('pg.deleted_at',null);

        // print_r($builder->get()->getResult());
        return view('qrpg',['data' => $builder->get()->getResult()]);
    }

    public function loginlist(){
          $logindata = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $logindata = Database::connect()->table($this->table)
            ->select('pg.*')
            ->where('student_id',$id)
            ->where('pg.deleted_at',null)->get()->getResult();

            $db = Database::connect();
            $builderUpdate = $db->table($this->table);

            // Update the 'meja' field where student_id = $id and deleted_at is null
            $builderUpdate->where('student_id', $id)
                    ->where('deleted_at', null)
                    ->set('attended', 1)
                    ->update();
        }

        $builder1 = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('class','K2 A')
        ->where('pg.deleted_at',null);

        $builder2 = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('class','K2 B')
        ->where('pg.deleted_at',null);

        $builder3 = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('class','K2 C')
        ->where('pg.deleted_at',null);

        $builder4 = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('class','K2 D')
        ->where('pg.deleted_at',null);

        $builder5 = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('class','KP 2')
        ->where('pg.deleted_at',null);

        $builder6 = Database::connect()->table($this->table)
        ->select('pg.*')
        ->where('class','KH')
        ->where('pg.deleted_at',null);

        // print_r($builder->get()->getResult());
        return view('loginpg',[
            'data1' => $builder1->get()->getResult(),
            'data2' => $builder2->get()->getResult(),
            'data3' => $builder3->get()->getResult(),
            'data4' => $builder4->get()->getResult(),
            'data5' => $builder5->get()->getResult(),
            'data6' => $builder6->get()->getResult(),
            'logindata' => $logindata
        ]);
    }

}
