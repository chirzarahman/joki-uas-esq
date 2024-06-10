<?php
    class Provinsi extends Connection{
        private $id_provinsi = '';
        private $nama_provinsi = '';
        
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

        public function SelectAllProvinsi(){
            $sql = "SELECT * FROM provinsi";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $count = 0;

            if(mysqli_num_rows($result) > 0){
                while ($data = mysqli_fetch_array($result)){
                    $objProvinsi = new Provinsi();
                    $objProvinsi->id_provinsi=$data['id_provinsi'];
                    $objProvinsi->nama_provinsi=$data['nama_provinsi'];
                    $arrResult[$count] = $objProvinsi;
                    $count++;
                }
            }
            return $arrResult;
        }
    }
?>