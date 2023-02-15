<?php include"header.php";?>

<div class="container-fluid p-0 over">
    <div class="row">
        <div class="col-md-12">
        <div class="img-custom">
           <img src="images/book.jpg" alt="books">
        </div>
        </div>
    </div>
</div>

<div class="container my-2 text-center">
    <div class="row">
        <div class="col-md-12 my-3">
              <h1>Payment Status</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-1 text-center mt-1">
        <strong><Label>Order id :</Label> </strong>
        </div>
        <div class="col-md-4">
        <form action="" method="POST">
            <div class="form-group d-flex">
                <input type="text" class="form-control" name="payment">
                <input type="submit" name="view" value="View" class="text-white btn btn-primary mx-3">
            </div>
        </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>


<?php include"contact.php";?>
<?php include"footer.php";?>
<!-- footer end -->

