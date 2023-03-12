<?php

if(isset($_POST['search']) && isset($_POST['area'])) {
    
    $search_param = $_POST['search'];
    $search_area = $_POST['area'];

    // validate search_area and search_param
    if(empty($search_area) || empty($search_param)) {
        $data["result"] = "False";
        $data["Message"] = "Invalid search parameters";
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
        exit;
    }

    // validate search_area format (assuming it should be a string)
    if(!is_string($search_area)) {
        $data["result"] = "False";
        $data["Message"] = "Invalid search area format";
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
        exit;
    }

    // validate search_param format (assuming it should be a string)
    if(!is_string($search_param)) {
        $data["result"] = "False";
        $data["Message"] = "Invalid search parameter format";
        echo json_encode($data, JSON_UNESCAPED_SLASHES);
        exit;
    }

    // if validation passes, proceed with the SQL query
    $host= "localhost";
    $dbuser= "id20408939_dbnamm";
    $dbpass= "Aa12@Aa12@Aa";
    $dbname= "id20408939_dbnam";

    $conn= new mysqli($host, $dbuser, $dbpass, $dbname);

    $sql = "SELECT * from dbnam WHERE area LIKE '%".$search_area."%' AND category LIKE '%".$search_param."%'";

    $result=$conn->query($sql);

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc()){
            $doctorid = $row["ID"];
            $doctorname = $row["name"];
            $doctorinfo = $row["info"];
            $doctorarea = $row["area"];
            $doctorcat = $row["category"];
            $doctorimg = $row["image"];
            
            $doctor_data = array();
            $doctor_data["DocName"] = $doctorname;
            $doctor_data["DocInfo"] = $doctorinfo;
            $doctor_data["Docarea"] = $doctorarea;
            $doctor_data["Doccat"] = $doctorcat;
            $doctor_data["DocImage"] = $doctorimg;

            $data[$doctorid] = $doctor_data;
        }

        $data["result"] = "True";
        $data["Message"] = "Doctors fetched successfully";

    } else {
        $data["result"] = "False";
        $data["Message"] = "No Doctors Found";
    }

} else {
    $data["result"] = "False";
    $data["Message"] = "Bad query";
}

echo json_encode($data , JSON_UNESCAPED_SLASHES);

?>
