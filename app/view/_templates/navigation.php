<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand mx-3 d-inline-block" href="/expense-tracker/"  ><i class="fa fa-wallet"></i> EXPENSE TRACKER</a>
        <button class="navbar-toggler mx-3" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mx-md-0 mx-3 ">
                    <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/expense-tracker/dashboard'? 'active': ''; ?>"   href="/expense-tracker/dashboard">Dashboard </a>
                </li>
                <li class="nav-item mx-md-0 mx-3">
                    <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] == '/expense-tracker/dashboard/expenses'? 'active': ''; ?>" href="/expense-tracker/dashboard/expenses">Expenses </a>
                </li>
                <li class="nav-item mx-md-0 mx-3 ">
                    <a class="nav-link text-info <?php echo $_SERVER['REQUEST_URI'] == '/expense-tracker/dashboard/newExpense'? 'active': ''; ?>"  href="/expense-tracker/dashboard/newExpense" tabindex="-1" aria-disabled="true"><i class="fa fa-plus"></i> Add Expenses</a>
                </li>


            </ul>


            <div class="dropdown mx-2 my-md-0 my-3" >
<!-- Show last 5 expenses -->
                <a href="#" class="dropdown-toggle " role="button" id="dropdownMenuLink" data-toggle="dropdown" data-offset="right" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell ml-3  text-white-50" ></i>  <span class="badge badge-pill badge-danger-alt">1</span></a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink " style="right:10px;left: auto;" >
                    <div class="list-group list-group-notify">
                         <div    class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Automobile Expenses</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Last expense was $12.39</p>
                            <small class="text-danger"><i class="text-danger fa fa-exclamation-triangle"></i> Expense over budget</small>
                        </div>
                        <hr>
                        <div    class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Electricity</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Last expense was $110.00</p>
                            <small class="text-danger"> </small>
                        </div>
                        <hr>
                        <div    class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Office Expenses</h5>
                                <small>3 days ago</small>
                            </div>
                            <p class="mb-1">Last expense was $22.90</p>
                            <small class="text-danger"></small>
                        </div>
                        <hr>
                        <div    class="list-group-item list-group-item-action">
                        <h6>View all Expenses</h6>
                        <a    class="btn btn-secondary" href="/expense-tracker/dashboard/expenses"> All Expenses <i class="fa fa-caret-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            <a href="/expense/settings" class=" "><i class="fas fa-cogs mx-3 text-white-50 my-md-0 my-3"></i></a>
        </div>
    </nav>
</header>