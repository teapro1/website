<?php 

class DB_Connection{
    public $conn,
    $host ="localhost",
    $user = "root",
    $pass = "",
    $dbname = "web2";
    function connect()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->conn) {
            // Kết nối
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname) or die('Lỗi kết nối');

            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

            mysqli_query($this->conn, "set names 'utf8'");
            mysqli_set_charset($this->conn, "utf8");
            echo "ok da ket noi";
        }
        echo "ok da ket noi";
    }

    // Hàm Ngắt Kết Nối
    function dis_connect()
    {
        // Nếu đang kết nối thì ngắt
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }
    function get_list($sql)
    {
        // Kết nối
        $this->connect();

        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            die('Câu truy vấn bị sai ' . $sql);
        }

        $return = array();

        // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }

        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);

        return $return;
    }
}

?>