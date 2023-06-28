<?php
$search_param = $_POST['search'];
$search_area = $_POST['area'];

if(isset($_POST['search']) && isset($_POST["area"])){

$host = "localhost";
$dbname = "id20938502_doctor";
$dbuser = "id20938502_elritz";
$dbpass = "dx7#9ykS7a%3QM";

$conn = new mysqli($host,$dbuser,$dbpass,$dbname);

$sql = "SELECT ID,Name,Exp,Image from DoctorInfo 
        where Area like '%".$search_area."%' and 
        Special like '%".$search_param."%'";

$result = $conn->query($sql);

if($result->num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        $id = $row["ID"];
        $name = $row["Name"];
        $exp = $row["Exp"];
        $image =$row["Image"];

        $doctor_data["Name"] = $name;
        $doctor_data["Exp"]  = $exp;
        $doctor_data["Image"] = $image;

        $data[$id] = $doctor_data;
    }
    $data["Result"] = "True";
    $data["Msg"] = "Doctors fetched successfully";
}
else{
    $data["Result"] = "False";
    $data["Msg"] = "No doctors found";
}

echo json_encode($data, JSON_UNESCAPED_SLASHES);
}

else{
    echo "Bad Query";
}

?>