    <?php if (!isset($loginPage)): ?>
        <footer>
            <div class="container">

                <div class="copy text-center">
                    Copyright <?php echo date('Y')?> <a href='index.php'><?php echo getSetting('copyright');?></a>
                </div>

            </div>
        </footer>
    <?php endif; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="layouts/js/jquery.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="layouts/bootstrap/js/bootstrap.min.js"></script>
    <script src="layouts/js/Chart.min.js"></script>
    <script src="layouts/js/select2.min.js"></script>

    <script src="layouts/js/velocity.min.js"></script>

    <script src="layouts/js/modernizr.js"></script>

    <script src="layouts/js/card.js"></script>

    <script src="layouts/js/app.min.js"></script>
    <script src="layouts/js/main.js"></script>

    <?php if (isset($chartData)): ?>
      <script type="text/javascript">
      /* ChartJS
      * -------
      * Here we will create a few charts using ChartJS
      */

      // Get context with jQuery - using jQuery's .get() method.
      var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
      // This will get the first returned node in the jQuery collection.
      var salesChart = new Chart(salesChartCanvas);

      var salesChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July", "August","September", "October", "November", "December"],
        datasets: [
           {
             label: "Bullding",
             fillColor: "rgba(60,141,188,0.9)",
             strokeColor: "rgba(60,141,188,0.8)",
             pointColor: "#3b8bba",
             pointStrokeColor: "rgba(60,141,188,1)",
             pointHighlightFill: "#fff",
             pointHighlightStroke: "rgba(60,141,188,1)",
             data: [
                 <?php
                 foreach ($chartData as $chart) {
                    if (is_array($chart)) {
                       echo $chart['counting'] . ',';
                    } else {
                       echo $chart . ',';
                    }
                 }
                 ?>
             ]
           }
        ]
     };

     var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: false,
        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - Whether the line is curved between points
        bezierCurve: true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension: 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot: false,
        //Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill: true,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true
     };

     //Create the line chart
     salesChart.Line(salesChartData, areaChartOptions);

    </script>
    <?php endif; ?>

  </body>
</html>
