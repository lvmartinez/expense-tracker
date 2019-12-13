<?php
/*$categories = array(
    'Groceries',
    'Entertainment',
    'Credit Card Charges',
    'Internet',
    'Rent',
    'Telephone',
    'Electricity',
    'Travel',
    );*/
	

?>

<main role="main">


    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container ">


        <div class="row">
            <div class="col-md-4 order-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Latest Expenses</span>
                </h4>
                <ul class="list-group mb-3">
				
				
				<?php foreach ($latestExpenses as $latest) {?>
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0"><?php echo $latest->name ?></h6>
                            <small class="text-muted"><?php echo $latest->notes ?></small>
							
							<?php if ($latest->total_amount > $latest->budget ){?>
								<br>
								<div class="text-danger">
									<small><i class="fa fa-exclamation-triangle"></i> SPENDING OVER BUDGET</small>
								</div>
							<?php }?>
							
                        </div>
                        <span class="text-muted">$<?php echo $latest->amount ?></span>
                    </li>
				<?php } ?>   
					
					
                </ul>


            </div>
            <div class="col-md-8  order-1">
                <h4 class="mb-3">Record Expense</h4>
                <form class="needs-validation" method="post" action="<?php echo URL; ?>dashboard/addexpense" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="date">Date</label>
                            <input type="text" class="form-control" name="date" id="date" placeholder="" value="<?php echo date('Y-m-d H:i:s', time());?>" required>
                            <div class="invalid-feedback">
                                Date is required.
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="category">Category Name</label>
                            <select  class="form-control" name="category_id" id="category">
                                <?php foreach ($expensesCategories as $category) {?>
                                <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                                <?php }?>
                            </select>
                            <div class="invalid-feedback">
                                Category is required.
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" name="amount" id="amount" placeholder="" required>
                            <div class="invalid-feedback">
                                Please enter amount.
                            </div>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="tax">Tax</label>
                            <div class="input-group">

                            <input type="text" class="form-control" name="tax" id="tax" placeholder="" required>
                            
                            <div class="invalid-feedback">
                                Please provide a valid amount.
                            </div>
                            </div>
                        </div>


                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="reference">Reference #</label>
                            <input type="text" class="form-control" name="reference" id="reference" placeholder="">

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="notes">Notes</label>
                            <textarea  class="form-control" name="notes" id="notes"  ></textarea>
                        </div>
                    </div>



                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block mb-3" type="submit">Save</button>
                </form>
            </div>
        </div>


        <!-- START THE FEATURETTES -->

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
