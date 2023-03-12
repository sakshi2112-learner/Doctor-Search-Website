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

$host= "localhost";
$dbuser= "id20408939_dbnamm";
$dbpass= "Aa12@Aa12@Aa";
$dbname= "id20408939_dbnam";

$conn= new mysqli($host, $dbuser, $dbpass, $dbname);

$sql = "SELECT *  from dbnam where area like '%".$search_area."%' and category like '%".$search_param."%' ";


$result=$conn->query($sql);


if($result->num_rows > 0)
{

    
    $doctor_data="";
    while($row = $result->fetch_assoc()){
        $doctorid = $row["ID"];
        $doctorname = $row["name"];
        $doctorinfo = $row["info"];
        $doctorarea = $row["area"];
        $doctorcat = $row["category"];
        $doctorimg = $row["image"];

        $doctor_data = $doctor_data.'<div id="docs" >
        <img 
        style="
          position: absolute;
          top: 227px;
          left: 166px;
          width: 118px;
          height: 112px;
        "
        alt=""
        src="'.$doctorimg.'"/>
      <div
        style="
          position: absolute;
          top: 357px;
          left: 28px;
          font-weight: 500;
          display: flex;
          align-items: center;
          justify-content: center;
          width: 451.44px;
          height: 69.73px;
        "
      >
        '.$doctorname.'
      </div>
      <div
          style="
            position: absolute;
            top: 402px;
            left: -139px;
            font-size: 24px;
            color: #7a7272;
            display: flex;
            align-items: center;
            width: 786.7px;
            height: 118.01px;
          "
        >
          <span style="line-break: anywhere; width: 100%"
            ><p style="margin-block-start: 0; margin-block-end: 0px">
              '.$doctorinfo.'
            </p>
            </span
          >
        </div>
        </div>';
       
    }
    
    $data = '<div style="
      position: absolute;
      top: 0px;
      left: 350px;
      font-size: 48px;
      font-weight: 800;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 1000.81px;
      height: 108.36px;
    "> Doctors Found in your area  </div>';


} else {
    $data = '<div style="
    position: absolute;
    top: 0px;
    left: 350px;
    font-size: 48px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 1000.81px;
    height: 108.36px;
  ">No Doctors Found in your area  </div>';

   

}




} else {
    $data = '<div style="
    position: absolute;
    top: 0px;
    left: 350px;
    font-size: 48px;
    font-weight: 800;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 1000.81px;
    height: 108.36px;
  "> Bad Query </div>';


}

echo $data.$doctor_data;


?>