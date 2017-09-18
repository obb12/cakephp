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

<p>järjestä</p>
<table>
    <tr>
        <th><a href="/search?search=<?= $this->request->getQuery('search', '') ?>&orderby=id&order=<?= $this->request->getQuery('order', 'DESC')?>">id:</a></th>
        <th><a href="/search?search=<?= $this->request->getQuery('search', '') ?>&orderby=price&order=<?= $this->request->getQuery('order', 'DESC')?>">hinta:</a></th>
        <th><a href="/search?search=<?= $this->request->getQuery('search', '') ?>&orderby=name">nimi:</a></th>
        <th><a href="/search?search=<?= $this->request->getQuery('search', '') ?>&orderby=created">lisätty:</a></th>
        <th><a href="/search?search=<?= $this->request->getQuery('search', '') ?>&orderby=<?= $this->request->getQuery('orderby', 'id')?>&order=<?= ($this->request->getQuery('order', 'DESC') == 'DESC' ? 'ASC' : 'DESC') ?>">Vaihda järjestys:</a></th>

    </tr>
</table>


<div class="row">
    <?php foreach($query as $i): ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="product?id=<?=  $i->id ?>"><?= $i->name ?></a>
                  </h4>
                  <h5><?= $i->price ?></h5>
                  <p class="card-text><?= $i->description ?></p>
                </div>
                <div class="card-footer">
                  <button class="btn-primary" onclick="add(<?= $i->id ?>)">Lisää ostoskoriin</button>
                </div>
              </div>
            </div>
<?php endforeach; ?>

          </div>
          <!-- /.row -->

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
