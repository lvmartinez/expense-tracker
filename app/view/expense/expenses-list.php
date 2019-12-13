
<main role="main">
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container ">

		<form method="get">
			<div class="row">
            <div class="col-lg-12 col-md-12 col-sm-9">
                <h4 class="mb-3">All Expenses </h4>
                <p class="lead">
                    Do not save what is left after spending, but spend what is left after saving. <em> Warren Buffett</em>
                </p>
            </div>
			<div class="col-lg-3 col-md-3 mb-3">
                <label for="category">Month</label>
                <select  class="form-control" name="month" id="month">
					<option <?php if ($month == '01') echo 'selected'; ?> value="01">January</option>
					<option <?php if ($month == '02') echo 'selected'; ?> value="02">February</option>
					<option <?php if ($month == '03') echo 'selected'; ?> value="03">March</option>
					<option <?php if ($month == '04') echo 'selected'; ?> value="04">April</option>
					<option <?php if ($month == '05') echo 'selected'; ?> value="05">May</option>
					<option <?php if ($month == '06') echo 'selected'; ?> value="06">June</option>
					<option <?php if ($month == '07') echo 'selected'; ?> value="07">July</option>
					<option <?php if ($month == '08') echo 'selected'; ?> value="08">August</option>
					<option <?php if ($month == '09') echo 'selected'; ?> value="09">September</option>
					<option <?php if ($month == '10') echo 'selected'; ?> value="10">October</option>
					<option <?php if ($month == '11') echo 'selected'; ?> value="11">November</option>
					<option <?php if ($month == '12') echo 'selected'; ?> value="12">December</option>

                </select>
                            
            </div>
			<div class="col-lg-3 col-md-3 mb-3">
				<label for="category">Year</label>
                <select  class="form-control" name="year" id="year">
					<option <?php if ($year == '2016') echo 'selected'; ?> value="2016">2016</option>
					<option <?php if ($year == '2017') echo 'selected'; ?> value="2017">2017</option>
					<option <?php if ($year == '2018') echo 'selected'; ?> value="2018">2018</option>
					<option <?php if ($year == '2019') echo 'selected'; ?> value="2019">2019</option>
					<option <?php if ($year == '2020') echo 'selected'; ?> value="2020">2020</option>
					<option <?php if ($year == '2021') echo 'selected'; ?> value="2021">2021</option>
					<option <?php if ($year == '2022') echo 'selected'; ?> value="2022">2022</option>
					<option <?php if ($year == '2023') echo 'selected'; ?> value="2023">2023</option>
					<option <?php if ($year == '2024') echo 'selected'; ?> value="2024">2024</option>
					<option <?php if ($year == '2025') echo 'selected'; ?> value="2025">2025</option>
					
                </select>
            </div>
			<div class="col-lg-3 col-md-3">
				<label for="btn-primary">&nbsp</label>
				<button class="btn btn-primary btn-lg btn-block" type="submit">Search</button>
            </div>
            <div class="col-sm-12 text-right mb-3">
                <a class="btn btn-info" href="/expense-tracker/dashboard/newExpense" role="button" > <i class="fa fa-plus"></i> Add Expense </a>
            </div>

            <div class="col-md-12 ">

                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Expense Account</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($monthlyExpenses as $expense){
?>
                        <tr>
                            <th scope="row"><?php echo $expense->date ?></th>
                            <td><?php echo $expense->name ?></td>
                            <td><?php echo $expense->notes?></td>
                            <td>$<?php echo number_format($expense->amount,2)?></td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>



            </div>
			
			</div>
		</form>

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
		
		<?php //if () ?>
			<nav aria-label="Page navigation ">
				<ul class="pagination">
					<li class="page-item"><a class="page-link" href="?page=1">First</a></li>
					
					<?php for ($i=1; $i<=$pages; $i++){ ?>
					<li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					
					<li class="page-item"><a class="page-link" href="?page=<?php echo $pages; ?>">Last</a></li>
				</ul>
			</nav>
		<?php ?>	

        <hr class="featurette-divider">

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
</body>
</html>
