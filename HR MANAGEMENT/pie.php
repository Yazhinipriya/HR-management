<!DOCTYPE html>
<head>
  <title>Pie chart representation</title>
  <style>
    body{
        background-image:url('background.jpg');
          background-repeat: no-repeat;
          background-position: 100%; 
          background-size: 100%;
    }
    #chart_div {
    width: 750px;
    height: 550px;
    margin: 0 auto;
}

    </style>
  </head>
  <body>
  <?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "hr");

// Query the database
$result = mysqli_query($conn, "SELECT date, status, COUNT(*) as count FROM attendance GROUP BY date, status");

// Create an array to store the data
$data = array();

// Loop through the results and add them to the array
while ($row = mysqli_fetch_assoc($result)) {
    if (!isset($data[$row['date']])) {
        $data[$row['date']] = array();
    }

    $data[$row['date']][$row['status']] = $row['count'];
}

// Close the database connection
mysqli_close($conn);
?>
<!-- Load the Google Charts library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Create a div to hold the chart -->
<div id="chart_div"></div>

<!-- Add the JavaScript code to create the chart -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Present');
        data.addColumn('number', 'Absent');

        <?php
        foreach ($data as $date => $statusCounts) {
            $presentCount = isset($statusCounts['present']) ? $statusCounts['present'] : 0;
            $absentCount = isset($statusCounts['absent']) ? $statusCounts['absent'] : 0;
            echo "data.addRow(['".$date."', ".$presentCount.", ".$absentCount."]);";
        }
        ?>

        var options = {
            title: 'ATTENDANCE BY DATE(ONLY PRESENT)',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
</body>
</html>