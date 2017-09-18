<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
      <div class="details col-md-6">
      						<h3 class="product-title"><?= $result['name']?></h3>
      						<div class="rating">
      							<div class="stars">
      								<span class="fa fa-star checked"></span>
      								<span class="fa fa-star checked"></span>
      								<span class="fa fa-star checked"></span>
      								<span class="fa fa-star"></span>
      								<span class="fa fa-star"></span>
      							</div>
      							<span class="review-no">41 reviews</span>
      						</div>
      						<p class="product-description"><?= $result['description'] ?></p>
      						<h4 class="price">Nykyinen hinta: <span><?= $result['price'] ?> &euro;</span></h4>
      						<p class="vote"><strong>91%</strong> ostajista tykkää tästä! <strong>(87 ääntä)</strong></p>


      						<div class="action">
      							<button onclick="add(<?= $result['id'] ?>)" class="add-to-cart btn btn-default" type="button">lisää ostoskoriin</button>
      						</div>
      					</div>
                        <!-- Optional JavaScript -->
                        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

                        <script>
                        var add = function(id){
                            axios.post('/cart', {
                        id: id,

                      })
                      .then(function (response) {
                        console.log(response);
                        t = $("#count").attr("data-count");
                        console.log(t);
                       y = Number(t) +1;
                       console.log(y);
                        $("#count").attr("data-count",y);
                        $("#count").html('Ostoskori (' + y +')');

                      })
                      .catch(function (error) {
                        console.log(error);
                      });
                        };
                        </script>
  </body>
</html>
