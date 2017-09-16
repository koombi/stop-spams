<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Stop SPAMS!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <h1>STOP SPAMS!</h1>
          <p>Description goes here!</p>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <form id="frm" method="post">
            <table class="table">
              <tbody>
                <tr>
                  <td>Your Name:</td>
                  <td>
                    <input type="text" name="senderName" required="">
                  </td>
                </tr>
                <tr>
                  <td>Your E-mail:</td>
                  <td>
                    <input type="email" name="senderEmail" required="">
                  </td>
                </tr>
                <tr>
                  <td>Your Mobile Operator</td>
                  <td>
                    <select name="mobileOperator" required="">
                      <option selected="" value="">(select)</option>
                      <option value="Dialog">Dialog</option>
                      <option value="Mobitel">Mobitel</option>
                      <option value="Etisalat">Etisalat</option>
                      <option value="Hutch">Hutch</option>
                      <option value="Airtel">Airtel</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td>Options</td>
                  <td>
                    <input type="checkbox" value="sms" name="optionSms"> <label for="sms">SMS</label>
                    <input type="checkbox" value="calls" name="optionCalls"> <label for="calls">Calls</label>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <input type="submit" name="Send!">
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $( "#frm" ).on( "submit", function( evt ) {
        evt.preventDefault();
        var frm = this;

        var options = [];
        options.push(this.optionSms.value);
        options.push(this.optionCalls.value);

        $.post("ajax.php?route=email",
        {
            senderName: this.senderName.value,
            senderEmail: this.senderEmail.value,
            operator: this.mobileOperator.value,
            options: options
        },
        function(data, status){
            if (status === 'success') {
                alert('Your message has been sent!.');
                frm.reset();
            }
        });
      });
    </script>
  </body>
</html>