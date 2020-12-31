<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/db.php');

    $id = $_GET['civid'];
    $sqlciv = "SELECT * FROM civilians WHERE UUID='$id'";
    $civresult = mysqli_query($con, $sqlciv) or die(mysql_error());

    while($civrows = mysqli_fetch_array($civresult)){
        $civFirstName = $civrows['FirstName'];
        $civLastName = $civrows['LastName'];
        $civDOB = $civrows['DOB'];
        $civResidence = $civrows['Residence'];
        $civGender = $civrows['gender'];
        $civOrigen = $civrows['Origen'];
    }
?>

<div class="dashboard-body">

    <div class="longheader">
        <h2 class="left-10">Hello, <?php echo $civFirstName . ' ' . $civLastName?></h2>
        <div class="tab-wrapper">
            <div class="tab-button-wrapper">
                <ul>
                    <li><a class="tab-button-first"
                        id="tab-button1"
                        href="javascript:void(0)"
                        onclick="loadTab(1)">Information</a></li>
                        <li><a class="tab-button-hidden" 
                        id="tab-button2"
                        href="javascript:void(0)"
                        onclick="loadTab(2)">Licenses</a></li>
                        <li><a class="tab-button-hidden" 
                        id="tab-button3"
                        href="javascript:void(0)"
                        onclick="loadTab(3)">Vehicles</a></li>
                        <li><a class="tab-button-hidden tab-button-last" 
                        id="tab-button4"
                        href="javascript:void(0)"
                        onclick="loadTab(4)">Firearms</a></li>
                        
                        
                </ul>
            </div>
            <div class="tab-body-wrapper">
                <div class="tab-body" id="tab1">
                    <p>Name: <?php echo $civFirstName . ' ' . $civLastName; ?></p>
                    <p>Date Of Birth: <?php echo $civDOB ?></p>
                    <p>Residence: <?php echo $civResidence?></p>
                    <p>Gender: <?php echo $civGender?></p>
                    <p>Origen: <?php echo $civOrigen?></p>
                </div>
                <div class="tab-body tab-body-hidden" id="tab2"><p>Body 2</p></div>
                <div class="tab-body tab-body-hidden" id="tab3"><p>Body 3</p></div>
                <div class="tab-body tab-body-hidden" id="tab4"><p>Body 4</p></div>
            </div>
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
</script>