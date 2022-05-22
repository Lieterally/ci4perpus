<?php

namespace App\Controllers;
use App\Models\Model_Siswa;

class Siswa extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_Siswa = new Model_Siswa();
    }
    public function index()
    {
        $data = array(
            'title' => 'Data Siswa',
            'siswa' =>  $this->Model_Siswa->all_data(),
            'isi' => 'siswa/v_index_siswa',
            'validation' => \Config\Services::validation() 

        );
        return view('layout/v_wrapper', $data);
    }

    public function add() 
    {
        
        $data = array(
            'title' => 'Tambah Siswa',
            'isi' => 'siswa/v_add_siswa',
            'validation' => \Config\Services::validation()  
        );
        return view('layout/v_wrapper', $data);

    }

    public function insert()
    {
        if ($this->validate([
            'nama_siswa' => ['rules' => 'required','errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],
            'nisn_siswa' => ['rules' => 'required|is_unique[tbl_siswa.nisn_siswa]','errors' => [
                    'required' => 'NISN harus diisi',
                    'is_unique' => 'NISN sudah terdaftar',
                ],
            ],
            'kelas_siswa' => ['rules' => 'required','errors' => [
                    'required' => 'Kelas harus diisi',
                ],
            ],
            'tgl_lahir' => ['rules' => 'required','errors' => [
                    'required' => 'Tanggal lahir harus diisi',
                ],
            ],

        ]))
        {
            
            //jika valid



            $tgl = $this->request->getVar('tgl_lahir');
            $convtgl = date('Y-m-d', strtotime($tgl));

            $data = array(
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'nisn_siswa' => $this->request->getPost('nisn_siswa'),
                'kelas_siswa' => $this->request->getPost('kelas_siswa'),
                'tgl_lahir' => $convtgl,
            );
            $this->Model_Siswa->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('Siswa'));

            
        } else {
            //jika tidak valid
            
            // $validation = \Config\Services::validation();
            // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/Siswa/add'))->withInput();
            
        }
        
    }

    public function remove($id_siswa)
    {

        $data = array(
            'id_siswa' => $id_siswa,
        );

        $this->Model_Siswa->remove($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('Siswa'));
        
    }

    public function edit($id_siswa) 
    {

        
        $data = array(
            'title' => 'Edit Siswa',
            'siswa' => $this->Model_Siswa->edit_data($id_siswa),
            'isi' => 'siswa/v_edit_siswa',
            'validation' => \Config\Services::validation()
        );
        return view('layout/v_wrapper', $data);

    }

    public function update($id_siswa)
    {
        $a = $this->Model_Siswa->edit_data($id_siswa);
        $nisn_input = $this->request->getVar('nisn_siswa');

        if ($nisn_input != $a['nisn_siswa']) {

            if ($this->validate([
                'nama_siswa' => ['rules' => 'required','errors' => [
                        'required' => 'Nama harus diisi',
                    ],
                ],
                'nisn_siswa' => ['rules' => 'required|is_unique[tbl_siswa.nisn_siswa]','errors' => [
                        'required' => 'NISN harus diisi',
                        'is_unique' => 'NISN sudah terdaftar',
                    ],
                ],
                'kelas_siswa' => ['rules' => 'required','errors' => [
                        'required' => 'Kelas harus diisi',
                    ],
                ],
                'tgl_lahir' => ['rules' => 'required','errors' => [
                        'required' => 'Tanggal lahir harus diisi',
                    ],
                ],
    
            ]))
            {
                
                //jika valid
    
    
    
                $tgl = $this->request->getVar('tgl_lahir');
                $convtgl = date('Y-m-d', strtotime($tgl));
    
                $data = array(
                    'id_siswa' => $id_siswa,
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'nisn_siswa' => $this->request->getPost('nisn_siswa'),
                    'kelas_siswa' => $this->request->getPost('kelas_siswa'),
                    'tgl_lahir' => $convtgl,
                );
                $this->Model_Siswa->edit($data);
                session()->setFlashdata('pesan', 'Data berhasil diubah');
                return redirect()->to(base_url('Siswa'));
    
                
            } else {
                //jika tidak valid
                
                // $validation = \Config\Services::validation();
                // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('/Siswa/edit/'.$id_siswa))->withInput();
                
            }
        } else {

            if ($this->validate([
                'nama_siswa' => ['rules' => 'required','errors' => [
                        'required' => 'Nama harus diisi',
                    ],
                ],
                'nisn_siswa' => ['rules' => 'required','errors' => [
                        'required' => 'NISN harus diisi',
                    ],
                ],
                'kelas_siswa' => ['rules' => 'required','errors' => [
                        'required' => 'Kelas harus diisi',
                    ],
                ],
                'tgl_lahir' => ['rules' => 'required','errors' => [
                        'required' => 'Tanggal lahir harus diisi',
                    ],
                ],
    
            ]))
            {
                
                //jika valid
    
    
    
                $tgl = $this->request->getVar('tgl_lahir');
                $convtgl = date('Y-m-d', strtotime($tgl));
    
                $data = array(
                    'id_siswa' => $id_siswa,
                    'nama_siswa' => $this->request->getPost('nama_siswa'),
                    'nisn_siswa' => $this->request->getPost('nisn_siswa'),
                    'kelas_siswa' => $this->request->getPost('kelas_siswa'),
                    'tgl_lahir' => $convtgl,
                );
                $this->Model_Siswa->edit($data);
                session()->setFlashdata('pesan', 'Data berhasil diubah');
                return redirect()->to(base_url('Siswa'));
    
                
            } else {
                //jika tidak valid
                
                // $validation = \Config\Services::validation();
                // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('/Siswa/edit'. $id_siswa))->withInput();
                
            }

        }
        
    }

    public function importCsvToDb($id_siswa)
    {
        $input = $this->validate([
            'file' => 'uploaded[file]|max_size[file,2048]|ext_in[file,csv],'
        ]);
        if (!$input) {
            $data['validation'] = $this->validator;
            return view('index', $data); 
        }else{
            if($file = $this->request->getFile('file')) {
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('../public/csvfile', $newName);
                $file = fopen("../public/csvfile/".$newName,"r");
                $i = 0;
                $numberOfFields = 4;
                $csvArr = array();
                
                while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                    $num = count($filedata);
                    if($i > 0 && $num == $numberOfFields){ 
                        $csvArr[$i]['nama_siswa'] = $filedata[0];
                        $csvArr[$i]['nisn_siswa'] = $filedata[1];
                        $csvArr[$i]['kelas_siswa'] = $filedata[2];
                        $csvArr[$i]['tgl_lahir'] = $filedata[3];
                    }
                    $i++;
                }
                fclose($file);
                $count = 0;
                foreach($csvArr as $userdata){
                    $students = $this->Model_Siswa->edit_data;
                    $findRecord = $this->Model_Siswa->count($id_siswa);
                    if($findRecord == 0){
                        if($students->insert($userdata)){
                            $count++;
                        }
                    }
                }
                session()->setFlashdata('message', $count.' rows successfully added.');
                session()->setFlashdata('alert-class', 'alert-success');
            }
            else{
                session()->setFlashdata('message', 'CSV file coud not be imported.');
                session()->setFlashdata('alert-class', 'alert-danger');
            }
            }else{
            session()->setFlashdata('message', 'CSV file coud not be imported.');
            session()->setFlashdata('alert-class', 'alert-danger');
            }
        }
        return redirect()->route('/');         
    }




}