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

    $data = '<div class="title">Doctors Found In Your Area</div>';
    $doctor_data = "";


    if($result->num_rows == 2){
        $row = $result -> fetch_assoc();
        $id = $row["ID"];
        $name = $row["Name"];
        $exp = $row["Exp"];
        $image =$row["Image"];

        $doctor_data = $doctor_data.'<div class="search2">
        <div class="searchbox">
          <div class="icon1"></div>
          <img
            class="search-fill0-wght400-grad0-ops-icon1"
            alt=""
            src="'.$image.'"
          />
        </div>
        <div class="find-best-doctors">'.$name.'</div>
        <div class="ask-for-an-container">
          <p class="find-and-search">
            &emsp;&emsp;&emsp;&ensp;'.$exp.' Years Exp
          </p>
        </div>
      </div>';

        $row = $result -> fetch_assoc();
        $id = $row["ID"];
        $name = $row["Name"];
        $exp = $row["Exp"];
        $image =$row["Image"];

        $doctor_data = $doctor_data.'<div class="appoinment">
          <div class="iconbox">
            <div class="icon1"></div>
            <img
              class="date-range-fill0-wght400-grad0-icon"
              alt=""
              src="'.$image.'"
            />
          </div>
          <div class="get-appointment">'.$name.'</div>
          <div class="ask-for-an-container">
            <p class="find-and-search">
                &emsp;&emsp;&emsp;&ensp;'.$exp.' Years Exp
            </p>
          </div>
        </div>';

    }
    else{
        $row = $result -> fetch_assoc();
        $id = $row["ID"];
        $name = $row["Name"];
        $exp = $row["Exp"];
        $image =$row["Image"];

        $doctor_data = $doctor_data.'<div class="search2">
        <div class="searchbox">
          <div class="icon1"></div>
          <img
            class="search-fill0-wght400-grad0-ops-icon1"
            alt=""
            src="'.$image.'"
          />
        </div>
        <div class="find-best-doctors">'.$name.'</div>
        <div class="ask-for-an-container">
          <p class="find-and-search">
            &emsp;&emsp;&emsp;&ensp;'.$exp.' Years Exp
          </p>
        </div>
      </div>';
    }
}
else{
    $data = '<div class="title">No Doctors Found In Your Area</div>';
}


}

else{
    $data = '<div class="title">Bad Query</div>';
}

echo $data.$doctor_data;
?>