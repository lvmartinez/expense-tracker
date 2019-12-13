<main role="main">

    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container ">
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Categories</span>
                    <span class="badge bg-secondary rounded-pill"><?php echo count($expensesCategories)?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($expensesCategories as $category) {?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?php echo $category->name ?></h6>
                            </div>
                        </li>
                    <?php }?>


                </ul>

                    
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Add New Expense Category</h4>
                <form class="needs-validation" method="post" action="<?php echo URL; ?>settings/addCategory" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="category">Category Name</label>
                            <input type="text" class="form-control" id="category" name="name" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Required.
                            </div>
                        </div>
						<div class="col-md-12 mb-3">
                            <label for="description">Category Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="" value="" required>

                        </div>
                        <div class="col-6 mb-3">
                            <label for="budget">Monthly Budget</label>
                            <input type="text" class="form-control" id="budget" name="budget" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Required.
                            </div>
                        </div>

                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
                </form>
            </div>
        </div>


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">



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
