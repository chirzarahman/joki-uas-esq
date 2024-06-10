<?php
    class JenjangPendidikan extends Connection{
        private $id_jp = '';
        private $nama_jp = '';
        
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

        public function SelectAllJenjangPendidikan(){
            $sql = "SELECT * FROM jenjang_pendidikan";
            $result = mysqli_query($this->connection, $sql);
            $arrResult = Array();
            $count = 0;

            if(mysqli_num_rows($result) > 0){
                while ($data = mysqli_fetch_array($result)){
                    $objJenjangPendidikan = new JenjangPendidikan();
                    $objJenjangPendidikan->id_jp=$data['id_jp'];
                    $objJenjangPendidikan->nama_jp=$data['nama_jp'];
                    $arrResult[$count] = $objJenjangPendidikan;
                    $count++;
                }
            }
            return $arrResult;
        }
    }
?>