<?php
    class Kategori extends Connection{
        private $id_kategori = '';
        private $nama_kategori = '';
        
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

        public function SelectAllKategori(){
            $sql = "SELECT * FROM kategori";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $count = 0;

            if(mysqli_num_rows($result) > 0){
                while ($data = mysqli_fetch_array($result)){
                    $objKategori = new Kategori();
                    $objKategori->id_kategori=$data['id_kategori'];
                    $objKategori->nama_kategori=$data['nama_kategori'];
                    $arrResult[$count] = $objKategori;
                    $count++;
                }
            }
            return $arrResult;
        }
    }
?>