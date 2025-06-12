<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController;
use App\Models\NlsModel;
use App\Libraries\datatable;
use Config\Database;

class Nls extends MyResourceController
{

    public $table = "nls";
    public $title = "NLS";
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
  [['Secondary 9A','Secondary 9A'],['Secondary 9B','Secondary 9B'],['College 12','College 12']],
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
        $this->model = new NlsModel();
        $this->dataToShow = $this->prepareDataToShow();
    }

    public function index()
    {   

        return view('/listn', $this->dataToShow);
    }    

    public function data(){
        $builder = Database::connect()->table($this->table)
        ->select('nls.*')
        ->where('nls.deleted_at',null);

        $datatable = new Datatable();

        return $datatable->generate($builder, 'nls.student_id',[
            'nls.student_id',
            'nls.student_name',
            'nls.class'
        ]);
    }

    public function qr($id){
        //echo "idnya".$id;
           $builder = Database::connect()->table($this->table)
        ->select('nls.*')
        ->where('nls.student_id',$id)
        ->where('nls.deleted_at',null);

        // print_r($builder->get()->getResult());
        return view('qrn',['data' => $builder->get()->getResult()]);
    }

    public function loginlist(){
          $logindata = "";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $logindata = Database::connect()->table($this->table)
            ->select('nls.*')
            ->where('student_id',$id)
            ->where('nls.deleted_at',null)->get()->getResult();

            $db = Database::connect();
            $builderUpdate = $db->table($this->table);

            // Update the 'meja' field where student_id = $id and deleted_at is null
            $builderUpdate->where('student_id', $id)
                    ->where('deleted_at', null)
                    ->set('attended', 1)
                    ->update();
        }

        $builder1 = Database::connect()->table($this->table)
        ->select('nls.*')
        ->where('class','Secondary 9A')
        ->where('nls.deleted_at',null);

        $builder2 = Database::connect()->table($this->table)
        ->select('nls.*')
        ->where('class','Secondary 9B')
        ->where('nls.deleted_at',null);

        $builder3 = Database::connect()->table($this->table)
        ->select('nls.*')
        ->where('class','College 12')
        ->where('nls.deleted_at',null);

        // print_r($builder->get()->getResult());
        return view('loginn',[
            'data1' => $builder1->get()->getResult(),
            'data2' => $builder2->get()->getResult(),
            'data3' => $builder3->get()->getResult(),
            'logindata' => $logindata
        ]);
    }

}
