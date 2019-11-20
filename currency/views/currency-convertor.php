<?php
use yii\helpers\Url;
use Yii;
?>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form>
          <div class="form-group">
            <input type="text" name="from_currency" class="form-control from_currency" placeholder="From Currency">
          </div>
          <div class="form-group">
            <input type="text" name="to_currency" class="form-control to_currency" placeholder="To Currency">
          </div>
          <div class="form-group">
            <input type="text" name="amount" class="form-control amount" placeholder="Amount To Convert">
          </div>
          <div class="form-group">
            <input type="text" readonly class="form-control converted" value="Converted Value">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(function(){
      $(document).on('change', '.amount', function(){
        $.ajax({
          url: '<?php echo Yii::$app->request->baseUrl. '/currency/default/convert-currency' ?>',
          type: 'post',
          data: {
            from_currency: $('.from_currency').val(),
            to_currency: $('.to_currency').val() ,
            amount: $('.amount').val(),
            _csrf : '<?=Yii::$app->request->getCsrfToken()?>'
          },
          success: function (data) {
            var arr = JSON.parse(data);
            $('.converted').val(arr['value']);
          }
        });
      });
    });
  </script>
</body>

</html>
