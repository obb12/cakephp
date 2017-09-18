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
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
      <div class="container">
          <?php if (!empty($cart)): ?>
      	<table id="cart" class="table table-hover table-condensed">
          				<thead>
      						<tr>
      							<th style="width:50%">Tuote</th>
      							<th style="width:10%">Hinta</th>
      							<th style="width:10%"></th>
      						</tr>
      					</thead>
      					<tbody>

    <?php foreach($cart as $i): ?>

<tr>
      							<td data-th="Product">
      								<div class="row">
      									<div class="col-sm-10">
      										<h4 class="nomargin"> <?= $i['name'] ?></h4>
      									</div>
      								</div>
      							</td>
      							<td data-th="Price"><?= $i['price'] ?>&euro;</td>


      						</tr>
                        <?php endforeach; ?>

      					</tbody>
      					<tfoot>
      						<tr class="visible-xs">
      							<td class="text-center"><?php print $total; ?>&euro;</td>
      						</tr>
      						<tr>
      							<td><a href="/" class="btn btn-warning"><i class="fa fa-angle-left"></i> Jatka Shoppaamista</a></td>
      							<td colspan="2" class="hidden-xs"></td>
      							<td class="hidden-xs text-center"><strong><?= $total ?>&euro;</td>
      							<td><a href="javascript:alert('ei maksusysteemiä')" class="btn btn-success btn-block">Osta <i class="fa fa-angle-right"></i></a></td>
      						</tr>
      					</tfoot>
      				</table>
                <?php else: ?>
<h3>Ei tuoteitta ostoskorissa</h3>
                <?php endif; ?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

  </body>
</html>
