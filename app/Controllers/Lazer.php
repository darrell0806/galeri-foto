<?php

namespace App\Controllers;
use App\Models\M_model;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lazer extends BaseController

{
    public function index()
    {
      if(session()->get('level')==1 ||  session()->get('level')==2){
         $model=new M_model();
         $kui['a'] = $model->tampil('tahun');
         $kui['c'] = $model->tampil('blok');
         $rombelDetails = $model->getAllRombel();
         $kui['e'] = $rombelDetails;
         $kui['kunci']='la';
         $data['title'] = 'Data Lazer Blok';
         echo view('partial/header_datatable', $data);
         echo view('partial/side_menu');
         echo view('partial/top_menu');
         echo view('filter_lazer',$kui);
         echo view('partial/footer_datatable');
     }else{
         return redirect()->to('/');
     }
 }
 public function print_nilai()
{
    $model = new M_model();
    $blok = $this->request->getPost('blok');
    $tahun = $this->request->getPost('tahun');
    $rombel = $this->request->getPost('rombel');
    $siswaList = $model->getSiswaInfo($rombel);
    $blokInfo = $model->getBlokInfo($blok);
    $rombelInfo = $model->getRombelInfo($rombel);
    $tahunData = $model->getTahunInfo($tahun);

    // Data for header
    $data['blok'] = $blokInfo;
    $data['rombel'] = $rombelInfo;
    $data['tahun'] = $tahunData;

    $allStudentsData = [];

    foreach ($siswaList as $siswa) {
        $data['a'] = $model->getDataNilailah($tahun, $blok, $rombel, $siswa->id_siswa);
        $allStudentsData[$siswa->nis] = $data['a'];
    }

    $data['allStudentsData'] = $allStudentsData;

    return view('lazer_nilai', $data);
}

 

 
}