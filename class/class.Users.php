 <?php
    class Users extends Connection
    {
        private $id_user = '';
        private $username = '';
        private $nama_admin = '';
        private $email = '';
        private $password = '';
        private $dob = '';
        private $no_wa = '';
        private $jenjang_pendidikan = '';
        private $provinsi = '';
        private $institusi = '';

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
        public function AddUsers()
        {
            $sql = "INSERT INTO users (username, email, password, dob, no_wa, jenjang_pendidikan, provinsi, institusi) VALUES ('$this->username', '$this->email', '$this->password', '$this->dob', '$this->no_wa', '$this->jenjang_pendidikan', '$this->provinsi', '$this->institusi')";

            $this->hasil = mysqli_query($this->connection, $sql);
            if ($this->hasil)
                $this->message = 'Data berhasil ditambahkan!';
            else
                $this->message = 'Data gagal ditambahkan!';
        }
        public function ValidateEmail($inputemail)
        {
            $sql = "SELECT * FROM users WHERE email = '$inputemail'";
            $result = mysqli_query($this->connection, $sql);
            if (mysqli_num_rows($result) == 1) {
                $this->hasil = true;
                $data = mysqli_fetch_assoc($result);
                $this->id_user = $data['id_user'];
                $this->username = $data['username'];
                $this->email = $data['email'];
                $this->password = $data['password'];
                $this->dob = $data['dob'];
                $this->no_wa = $data['no_wa'];
                $this->jenjang_pendidikan = $data['jenjang_pendidikan'];
                $this->provinsi = $data['provinsi'];
                $this->institusi = $data['institusi'];
            }
        }

        public function CheckAdmin($username, $password)
        {
            $sql = "SELECT * FROM `admin` WHERE nama_admin = '$username' and `password` = '$password'";
            $result = mysqli_query($this->connection, $sql);
            if (mysqli_num_rows($result) == 1) {
                $this->hasil = true;
                $data = mysqli_fetch_assoc($result);
                $this->id_user = $data['id_admin'];
                $this->nama_admin = $data['nama_admin'];
            }
        }

        public function UpdateProfile()
        {
            $sql = "UPDATE users SET username = '$this->username', email = '$this->email', dob = '$this->dob', no_wa = '$this->no_wa', jenjang_pendidikan = '$this->jenjang_pendidikan', provinsi = '$this->provinsi', institusi = '$this->institusi' WHERE id_user = '$this->id_user'";

            $this->hasil = mysqli_query($this->connection, $sql);
            if ($this->hasil) {
                $this->message = 'User berhasil diubah!';
            } else {
                $this->message = 'User gagal diubah!';
            }
        }

        public function SelectOneProfile()
        {
            $sql = "SELECT * FROM users WHERE id_user = '$this->id_user'";
            $resultOne = mysqli_query($this->connection, $sql);

            if (mysqli_num_rows($resultOne) == 1) {
                $this->hasil = true;
                $data = mysqli_fetch_assoc($resultOne);
                $this->id_user = $data['id_user'];
                $this->username = $data['username'];
                $this->email = $data['email'];
                $this->dob = $data['dob'];
                $this->no_wa = $data['no_wa'];
                $this->jenjang_pendidikan = $data['jenjang_pendidikan'];
                $this->provinsi = $data['provinsi'];
                $this->institusi = $data['institusi'];
            }
        }
    }
    ?>