<?php
    require_once __DIR__."/db_module.php";
    class theater{
        public $id;
        public $id_location;
        public $address;
        public $phone;
        public $room;

        function __construct($id, $id_location, $address, $phone, $room)
        {
            $this->id=$id;
            $this->id_location=$id_location;
            $this->address=$address;
            $this->phone=$phone;
            $this->room=$room;
        }

        function GetLocation(){
            require_once __DIR__."/tbl_location.php";
            $data = new tbl_location();
            return $data->GetLocation('id='.$this->id_location)[0];
        }
    }
    class tbl_theater{
        function GetTheater($cond='1'){
            $class = null;
            $sql = null;
            $query = "SELECT * FROM tbl_theater WHERE ".$cond;
            createConnection($sql);
            $result = executeQuery($sql,$query);
            while($item = mysqli_fetch_assoc($result)){
                $class[] = new theater($item['id'],$item['id_location'],$item['address'],$item['phone'],$item['room']);
            }
            releaseMemory($sql,$result);
            return $class;
        }
    }
?>