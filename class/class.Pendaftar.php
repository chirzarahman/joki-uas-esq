<?php
class Pendaftar extends Connection
{
    private $no_id = '';
    private $id_user = '';
    private $id_workshop = '';
    private $username = '';
    private $email = '';
    private $nama_workshop = '';
    private $tanggal_pelaksanaan = '';
    private $waktu = '';
    private $tempat = '';
    private $deskripsi = '';
    private $status = '';

    public $hasil = false;
    public $message = '';

    public function __get($atribute)
    {
        if (property_exists($this, $atribute)) {
            return $this->$atribute;
        }
    }
    public function __set($atribut, $value)
    {
        if (property_exists($this, $atribut)) {
            $this->$atribut = $value;
        }
    }

    public function SelectAllPendaftar()
    {
        $sql = "SELECT pendaftar.*, users.username, users.email, workshop.* FROM pendaftar JOIN users ON pendaftar.id_user=users.id_user JOIN workshop ON pendaftar.id_workshop=workshop.id_workshop";
        $result = mysqli_query($this->connection, $sql);
        $arrResult = array();
        $count = 0;

        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_array($result)) {
                $objPendaftar = new Pendaftar();
                $objPendaftar->no_id = $data['no_id'];
                $objPendaftar->id_user = $data['id_user'];
                $objPendaftar->id_workshop = $data['id_workshop'];
                $objPendaftar->username = $data['username'];
                $objPendaftar->email = $data['email'];
                $objPendaftar->nama_workshop = $data['nama_workshop'];
                $objPendaftar->tanggal_pelaksanaan = $data['tanggal_pelaksanaan'];
                $objPendaftar->waktu = $data['waktu'];
                $objPendaftar->tempat = $data['tempat_pelaksanaan'];
                $objPendaftar->deskripsi = $data['deskripsi'];
                $objPendaftar->status = $data['status'];
                $arrResult[$count] = $objPendaftar;
                $count++;
            }
        }
        return $arrResult;
    }

    public function SelectOnePendaftar()
    {
        $sql = "SELECT pendaftar.*, users.username, users.email, workshop.* FROM pendaftar JOIN users ON pendaftar.id_user=users.id_user JOIN workshop ON pendaftar.id_workshop=workshop.id_workshop WHERE no_id = '$this->no_id'";
        $resultOne = mysqli_query($this->connection, $sql);

        if (mysqli_num_rows($resultOne) == 1) {
            $this->hasil = true;
            $data = mysqli_fetch_assoc($resultOne);
            $this->no_id = $data['no_id'];
            $this->id_user = $data['id_user'];
            $this->id_workshop = $data['id_workshop'];
            $this->username = $data['username'];
            $this->email = $data['email'];
            $this->nama_workshop = $data['nama_workshop'];
            $this->tanggal_pelaksanaan = $data['tanggal_pelaksanaan'];
            $this->waktu = $data['waktu'];
            $this->tempat = $data['tempat_pelaksanaan'];
            $this->deskripsi = $data['deskripsi'];
            $this->status = $data['status'];
        }
    }
    
    public function UpdatePendaftar()
    {
        $sql = "UPDATE pendaftar SET status = '$this->status' WHERE no_id = '$this->no_id'";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil) {
            $this->message = 'Pendaftar berhasil diubah!';
        } else {
            $this->message = 'Pendaftar gagal diubah!';
        }
    }

    public function AddPendaftar()
    {
        $sql = "INSERT INTO pendaftar (id_user, id_workshop, status) VALUES ('$this->id_user', '$this->id_workshop', '$this->status')";

        $this->hasil = mysqli_query($this->connection, $sql);
        if ($this->hasil) {
            $this->message = 'Pendaftar berhasil ditambahkan!';
        } else {
            $this->message = 'Pendaftar gagal ditambahkan!';
        }
    }
}