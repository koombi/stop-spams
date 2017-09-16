<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Stop SPAMS!</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500|Zilla+Slab:400,400i,600,600i" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <br />
                <h1>STOP SPAM SMS AND CALLS!</h1>
                <br />
                <h3>Ask your mobile network operator to stop spamming you! Ask The Telecommunications Regulatory Commission of Sri Lanka to intervene and regulate advertising and promotions! </h3>
                <blockquote>
                    Sri Lankan Mobile Network Operators spam the users rgularly and as they wish. we are tirerd of this. Sending the following email to TRCSL worked for a few of us. YOu can also use this small tool to send an Email to TRC and your Network operaotr to get a SPAM free expereince. And ask TRC to rgulate the advertising.
                </blockquote>
            </div>
        </div>
        <br />

        <div id="paper" class="row">
            <div class="col">

                <p>To The Telecommunications Regulatory Commission of Sri Lanka,<br/>
                </p>
                <h2> Stop SMS and voice call spam
                </h2>
                <p>I use the mobile connection
                    <input type="text" name="senderMobileNumber" required="" placeholder="Your mobile number"> from <select name="mobileOperator" required="">
                      <option selected="" value="">Your mobile operator</option>
                      <option value="Dialog">Dialog Axiata</option>
                      <option value="Mobitel">Mobitel</option>
                      <option value="Etisalat">Etisalat</option>
                      <option value="Hutch">Hutch</option>
                      <option value="Airtel">Airtel</option>
                    </select> and they are spamming me on a daily basis violating my rights, reducing my productivity and disrupting my daily routine. I am formally writing to get your attention to this issue and would like immediately stop this spamming.</p>

                <p>I request your attention to the following matters,</p>
                <input type="checkbox" value="sms" name="optionSms">
                <label for="sms">
                       <b> Spam SMS </b>
                    </label>
                <p>It is one thing to send a message about a promotion, but I receive the same message several times on a daily basis. <em>I would like this to stop immediately as I did not opt-in for advertising and promotional SMS.</em></p>




                <input type="checkbox" value="calls" name="optionCalls">
                <label for="calls">
                       <b>  Spam calls</b>
                    </label>
                <p>These automated recorded calls usually come from general helpline number or in some cases random numbers without context. <em>I would like this to stop immediately as I did not opt-in to receive these calls.</em></p>

                <b> I have copied '.$operator.' customer care service as well. I hope you will intervene in this issue and fix this for me. </b>
                <p>I would like to receive a reference number for this complaint and hoping to hear from you soon!</p>

                <p>Kind regards,<br/>
                    <input type="text" placeholder=" Your name" name="senderName" required=""><br/>
                    <input type="email" placeholder=" Your email" name="senderEmail" required="">
                </p>
            </div>
        </div>
        <br />

        <input type="submit" name="Send!">
        <br />
        <br />
        <br />

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $("#frm").on("submit", function(evt) {
            evt.preventDefault();
            var frm = this;

            var options = [];
            if (this.optionSms.checked) {
                options.push(this.optionSms.value);
            }
            if (this.optionCalls.checked) {
                options.push(this.optionCalls.value);
            }

            var data = {
                senderName: this.senderName.value,
                senderEmail: this.senderEmail.value,
                senderMobileNumber: this.senderMobileNumber.value,
                operator: this.mobileOperator.value,
                options: options.join('|')
            };

            $.post("ajax.php?route=email", data,
                function(response, status) {
                    if (status === 'success') {
                        alert('Your message has been sent!.');
                        frm.reset();
                    }
                }
            );
        });
    </script>
</body>

</html>