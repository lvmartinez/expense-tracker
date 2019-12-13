<?php 	print_r(array_keys($expenseCat['Electricity'])); ?>

<script>
    window.onload = function () {
		
        //var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#546E7A', '#26a69a', '#D10CE8'];\
        const options = {
            chart: {
                height: 350,
                type: 'bar',

            },
            colors: ['#F44336'],
            plotOptions: {
                bar: {
                    columnWidth: '45%',
                    distributed: true
                }
            },
            dataLabels: {
                enabled: false,

            },
            series: [{
                name: 'Monthly Expenses',
                data:<?php echo $data ?>
            }],
            xaxis: {
                categories: <?php echo $xaxis ?>,

                labels: {
                    style: {
                        // colors: colors,
                        fontSize: '14px'
                    }
                }
            },


            tooltip: {
                y: {
                    formatter: function (y) {
                        if(typeof y !== "undefined") {
                            return  "$" + y.toFixed(2) ;
                        }
                        return y;

                    }
                }
            }

        };

        const chart = new ApexCharts(
            document.querySelector("#chart"),
            options
        );

        chart.render();


    }
</script>
<main role="main">




  <!--
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container ">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-md-8">
        <h2>Dashboard</h2>
        <p>A quick overview of all the activity on your expenses</p>
        <p><a class="btn btn-secondary" href="/expense-tracker/dashboard/expenses" role="button">View Expenses <i class="fas fa-angle-right"></i> </a></p>
      </div><!-- /.col-lg-8 -->
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Over Budget Expenses</span>
            </h4>
            <ul class="list-group mb-3">
				<?php foreach ($expenseCat as $exp){ ?>
				
					<li class="list-group-item d-flex justify-content-between bg-light">
						<div class="text-danger">
							<h6 class="my-0">Electricity</h6>
							<small><i class="fa fa-exclamation-triangle"></i> SPENDING OVER BUDGET</small>
						</div>
						<span class="text-danger">$130</span>
					</li>
				<?php } ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total Overbudget (USD)</span>
                    <strong>$70</strong>
                </li>
            </ul>


        </div>
    </div><!-- /.row -->

    <hr class="featurette-divider my-3">
      <h4>Expenses</h4>
      <div class="row">
          <div class="col-md-12">
              Total Expenses: <strong>$<? echo $totalExpense; ?></strong>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div id="chart" ></div>
          </div>
      </div>
      <hr class="featurette-divider my-3">
    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2019 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?php echo URL; ?>/js/apexcharts.js"></script>
</body>
</html>
