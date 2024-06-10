<?php
    class Pendaftar extends Connection{
        private $no_id = '';
        private $id_user = '';
        private $id_workshop = '';
        private $username = '';
        private $email = '';
        private $nama_workshop = '';
        private $tanggal_pelaksanaan = '';
        private $status = '';
        
        public $hasil = false;
        public $message = '';

        public function __get($atribute){
            if(property_exists($this, $atribute)){
                return $this->$atribute;
            }
        }
        public function __set($atribut, $value){
            if(property_exists($this, $atribut)){
                $this->$atribut = $value;
            }
        }

        public function SelectAllPendaftar(){
            $sql = "SELECT pendaftar.*, users.username, users.email, workshop.nama_workshop, workshop.tanggal_pelaksanaan FROM pendaftar JOIN users ON pendaftar.id_user=users.id_user JOIN workshop ON pendaftar.id_workshop=workshop.id_workshop";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $count = 0;

            if(mysqli_num_rows($result) > 0){
                while ($data = mysqli_fetch_array($result)){
                    $objPendaftar = new Pendaftar();
                    $objPendaftar->no_id=$data['no_id'];
                    $objPendaftar->id_user=$data['id_user'];
                    $objPendaftar->id_workshop=$data['id_workshop'];
                    $objPendaftar->username=$data['username'];
                    $objPendaftar->email=$data['email'];
                    $objPendaftar->nama_workshop=$data['nama_workshop'];
                    $objPendaftar->tanggal_pelaksanaan=$data['tanggal_pelaksanaan'];
                    $objPendaftar->status=$data['status'];
                    $arrResult[$count] = $objPendaftar;
                    $count++;
                }
            }
            return $arrResult;
        }
    }
?>