<?php
 require_once("config.php");
  $behnam = [];

  // $db->where("id" , 1);
  $products = $db->get('products');
  $user = $db->get('users');

?>
 

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
x`
    <title>فروشگاه اینترنتی بیز</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/jquery/jquery.min.js"></script>

  </head>

  <body style="background-color: #dddddd;">

    <!-- Navigation -->
    <nav  class="navbar navbar-expand-lg " style="background-color: #dddddd;">
      <div class="container">
        <a class="navbar-brand" href="#">فروشگاه سعید هدفون</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">محصولات بیتس</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">محصولات فیلیپس</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">محصولات سنهایزر</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Biz Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <a class="nav-link" href="#">جمع خرید : 0</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">سبد خرید</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">درباره ما</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-2 img-responsive headerText"  style=" height: 500PX; background-image: url('./images/f1.jpg')">
    
      </header>

      <!-- Page Features -->
      <div class="row text-center my-4">
      <?php foreach($products as $key => $value){?>
      
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top cardImageSize" src=<?php echo($value['picture_1'])?> alt="">
            <div class="card-body card-body1">
              <h4 class="card-title"><?php echo($value['name']); ?></h4>
              <!-- <p class="card-text">امتیاز:<?php echo($value['score'])?></p>   -->
            </div>
            <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <select class="form-control" name="select">
                                    <option value="" selected="">Color</option>
                                    <option value="black">Black</option>
                                    <option value="white">White</option>
                                    <option value="gold">Gold</option>
                                    <option value="rose gold">Rose Gold</option>
                                </select>
                            </div>
                              
                            <!-- end col -->
                            <div class="col-md-4 col-sm-12">
                                <select class="form-control" name="select">
                                    <option value="" selected="">QTY</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                            <!-- end col -->
                        </div>
            <div class="card-footer btn-ground text-center">
             	<button type="button" class="btn btn-primary"> <i class="fa fa-shoping-cart"> </i>افزودن به سبد </button>
             	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product_view"> <i class="fa fa-shoping-cart"> </i> مشخصات کالا </button>
            </div>
          </div>
        </div>
      <?php }?>
        


    </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <div class="container">
    	<div class="row">
		    <div class="modal fade product_view" id="product_view">
		    	<div class="modal-dialog">
		    		<div class="modal-content">
		    			<div class="modal-header">
		    					<a href="#" data-dismiss="modal" class="class pull-left"><span class="glyphicon glyphicon-remove"></span></a>
		                	<h3 class="modal-title">مشخصات کالا</h3>
		    			</div>

		    			<div class="modal-body">
		                <div class="row">
		                   
		                    <div class="col-md-12 product_content" align="right">
		                        <h4>شناسه محصول <span>51526</span></h4>
		                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
		                        <h3 class="cost"><span class="glyphicon glyphicon-usd"></span> 75.00 <small class="pre-cost"><span class="glyphicon glyphicon-usd"></span> 60.00</small></h3>
		                        <div class="space-ten"></div>
		                        <div class="btn-ground">
		                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
		                            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-heart"></span> Add To Wishlist</button>
		                        </div>
		                    </div>
		                </div>
		            </div>
		    		</div>
		    	</div> 
		    </div>
	    </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
