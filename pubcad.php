<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/db.php');
    $usname = $_SESSION['username'];
    $identifieruid = $_GET['identifierselection'];

    $identifiersql2 = "SELECT * FROM identifiers WHERE UUID=$identifieruid";
    $identifierResult = mysqli_query($con, $identifiersql2) or die(mysql_error());

    while($identifierrows = mysqli_fetch_array($identifierResult)){
        $UID = $identifierrows['UID'];
        $Identifier = $identifierrows['Identifier'];
        $Dep = $identifierrows['Department'];
    }

    $statussql = "SELECT * FROM caduserstatuses WHERE uuid=$UID";
    $statusresult = mysqli_query($con, $statussql) or die(mysql_error());

    while($statusrows = mysqli_fetch_array($statusresult)){
        $status = $statusrows['status'];
    }
$return = "0";
$return2 = "0";
    if (isset($_REQUEST['SearchFirstName'])){
        $searchingfirstname = $_REQUEST['SearchFirstName'];
        $searchinglastname = $_REQUEST['SearchLastName'];

        $searchsql = "SELECT * FROM civilians WHERE FirstName='$searchingfirstname' AND LastName='$searchinglastname'";
        $searchresult = mysqli_query($con, $searchsql) or die(mysqli_error());
        while ($searchrows = mysqli_fetch_array($searchresult)){
            $searchreturnUUID = $searchrows['UUID'];
            $searchreturnFN = $searchrows['FirstName'];
            $searchreturnLN = $searchrows['LastName'];
            $searchreturnDOB = $searchrows['DOB'];
            $searchreturnRes = $searchrows['Residence'];
            $searchreturnGen = $searchrows['gender'];
            $searchreturnOrigen = $searchrows['Origen'];
            $return = "1";
        }
        $searchsql2 = "SELECT * FROM licenses WHERE CIVID='$searchreturnUUID'";
        $searchresult2 = mysqli_query($con, $searchsql2) or die(mysqli_error());

        while($searchrows2 = mysqli_fetch_array($searchresult2)){
            $searchreturnLicensetype = $searchrows2['LicenseType'];
            $searchreturnLicenseStatus = $searchrows2['LicenseStatus'];

        }
    }
    if(isset($_REQUEST['SearchPlate'])){
        $searchingPlate = $_REQUEST['SearchPlate'];

        $searchsql3 = "SELECT * FROM Vehicles WHERE LicensePlate='$searchingPlate'";
        $searchresult3 = mysqli_query($con, $searchsql3) or die(mysqli_error());
        while($searchrows3 = mysqli_fetch_array($searchresult3)){
            $searchreturnvehmake = $searchrows3['VehicleMake'];
            $searchreturnvehModel = $searchrows3['VehicleModel'];
            $searchreturnvehPlate = $searchrows3['LicensePlate'];
            $searchreturnVehColor = $searchrows3['Color'];
            $searchreturnvehRegStatus = $searchrows3['RegistrationStatus'];
            $return2 = "1";
        }

    }
?>


<div class="dashboard-body">

    <div class="longheader-2">
        <h2 class="left-10">You are currently on patrol as, <?php echo $Dep?></h2>
        <h2 class="left-10">we are currently showing you <?php 
            echo $status
        ?></h2>
        <div class="tab-wrapper">
            <div class="tab-button-wrapper">
                <ul>
                    <li><a class="tab-button-first"
                        id="tab-button1"
                        href="javascript:void(0)"
                        onclick="loadTab(1)">Call information and main dashboard</a></li>
                        <li><a class="tab-button-hidden" 
                        id="tab-button2"
                        href="javascript:void(0)"
                        onclick="loadTab(2)">Lookup</a></li>
                        <li><a class="tab-button-hidden tab-button-last" 
                        id="tab-button3"
                        href="javascript:void(0)"
                        onclick="loadTab(3)">BOLO'S</a></li>
                        
                </ul>
            </div>
            <div class="tab-body-wrapper">
                <div class="tab-body" id="tab1">
                    <h3>ACTIVE CALLS "TO BE DONE"</h3>

                    <div class="row">
                        <input class="glow" type="button" value="10-41">
                        <input class="glow" type="button" value="10-8">
                        <input class="glow" type="button" value="10-42">
                        <input class="glow" type="button" value="10-7">
                        <input class="glow" type="button" value="10-6">
                        <input class="glow" type="button" value="10-11">
                    </div>
                </div>
                

                    <div class="tab-body tab-body-hidden" id="tab2">
                    <form action="" method="post">
                        <h3>Search a person</h3>

                        <div class="search">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-cntrl" type="text" required="" name="SearchFirstName" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-cntrl reglastname" type="text" required="" name="SearchLastName" placeholder="Last Name">                        
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <input type="submit" value="Search Person" name="search" class="btn btn-primary btn-block btn-full-width"/>
                        </div>
                        </div>
                    </form>
                    
                <hr>
                <div class="return">
                    <?php 
                        if($return == "0"){
                            
                        }else if($return == "1"){
                            echo"
                            <br>
                            <br>
                                Firstname: $searchreturnFN <br>
                                Lastname: $searchreturnLN <br>
                                Date Of Birth: $searchreturnDOB <br>
                                Residence: $searchreturnRes <br>
                                Gender: $searchreturnGen <br>
                                Origen: $searchreturnOrigen <br>
                                <hr>

                                license: $searchreturnLicensetype <br>
                                License status: $searchreturnLicenseStatus <br>
                            ";
                        }
                    ?>
                </div>
                <hr>
                <form action="" method="post">
                        <h3>Search a License plate</h3>

                        <div class="search">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-cntrl" type="text" required="" name="SearchPlate" placeholder="License Plate">
                                </div>
                            </div>   
                        </div>
                        <div class="col">
                            <input type="submit" value="Search License plate" name="search" class="btn btn-primary btn-block btn-full-width"/>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="return">
                    <?php 
                        if($return2 == "0"){
                            
                        }else if($return2 == "1"){
                            echo"
                            <br>
                            <br>
                                Vehicle Make: $searchreturnvehmake <br>
                                Vehicle Model: $searchreturnvehModel <br>
                                Vehicle Plate: $searchreturnvehPlate <br>
                                Vehicle Color: $searchreturnVehColor <br>
                                Vehicle Registration Status: $searchreturnvehRegStatus <br>
                               
                            ";
                        }
                    ?>
                </div>
            </div>
            <div class="tab-body tab-body-hidden" id="tab3">
                <H3>ACTIVE BOLO'S</H3>
            </div>
            <div class="tab-body tab-body-hidden" id="tab4"><p>Body 4</p></div>
        </div>
    </div>
</div>

<script>
    var last_tab = 1;

function loadTab(tab_number)
{
	if (tab_number === last_tab) return;
	
	document.getElementById("tab" + last_tab).style.display = "none";
	document.getElementById("tab" + tab_number).style.display = "block";
	document.getElementById("tab-button" + last_tab).style.opacity = "0.5";
	document.getElementById("tab-button" + tab_number).style.opacity = "1.0";

	last_tab = tab_number;
}
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
} 
</script>
