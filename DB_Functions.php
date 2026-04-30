
    $sDbServer = "";
    $sDbDatabase = "";
    $sDbUser = "";
    $sDbPassword = "";

function Set_Variables($db_host, $db_user, $db_pass, $db_name) {
    $this->db_host = $db_host;
    $this->db_user = $db_user;
    $this->db_pass = $db_pass;
    $this->db_name = $db_name;

    $this->db_pass = $db_pass;
}