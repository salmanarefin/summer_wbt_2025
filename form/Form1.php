<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM1</title>
    <link rel="stylesheet" type="text/css" href="../form/form1.css">

</head>

<body>
    <?php

    $nameErr = $companyErr = $AddressErr = $cityErr = $stateErr = $codeErr = $countryErr = $phoneErr = $faxError = $emailError=$DoonationAmountError=$redonationError=$zipError=$commentError=$checkboxError="";
    $name= $company = $Address = $city = $state = $code = $country = $phone = $fax = $email=$DoonationAmount=$redonation=$zip=$comment=$checkbox="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["code"])) {
            $codeErr = "code is required";
        } else {
            $code = test_input($_POST["code"]);
            if (!is_numeric($code)) {
            $codeErr = "Only numeric values allowed for Roll";
            }
        }


        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            }
        }


        if (empty($_POST["company"])) {
            $companyErr = "company Name is required";
        } else {
            $company = test_input($_POST["company"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$company)) {
            $companyErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["Address"])) {
            $AddressErr = "Address Name is required";
        } else {
            $Address = test_input($_POST["Address"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$Address)) {
            $AddressErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["city"])) {
            $cityErr = "city Name is required";
        } else {
            $city = test_input($_POST["city"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$city)) {
            $cityErr = "Only letters and white space allowed";
            }
        }
        
        if (empty($_POST["country"])) {
            $countryErr = "country Name is required";
        } else {
            $country = test_input($_POST["country"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$country)) {
            $countryErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["comment"])) {
            $commentErr = "comment Name is required";
        } else {
            $comment = test_input($_POST["comment"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$comment)) {
            $commentErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            }
        }



        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
            }
    }
    ?>

    <p><span class="required">*</span> - Denotes Required Information</p>
    <p><strong> > 1 Donation</strong> > 2 Confirmation >Thank You</p>

    <form method="POST">
        <h2> DONOR Information </h2>

        <div class="form-group">
            <label for="First Name"><strong> First Name</strong><span class="required">*<?php echo $nameErr;?></span></label>
            <input type=" text" id="First Name" value ="<?php echo $name;?>" >

        </div>

        <div class="form-group">
            <label for="Last Name"> <strong>Last Name</strong><span class="required">*<?php echo $nameErr;?></span> </label>
            <input type="text" id="Last Name" value ="<?php echo $name;?>">

        </div>

        <div class="form-group">
            <label for="Company"><strong>Company</strong><?php echo $companyErr;?></label>
            <input type="text" id="Company"value ="<?php echo $company;?>">

        </div>
        <div class="form-group">
            <label for="Address 1"><strong>Adress 1</strong><span class="required">*</span></label>
            <input type="text" id="Address 1:" >

        </div>
        <div class="form-group">
            <label for="Address 2"> <strong>Address 2</strong></label>
            <input type="text" id="Address 2">

        </div>
        <div class="form-group">
            <label for="City"><strong>City</strong><span class="required">*</span></label>
            <input type="text" id="City">

        </div>


        <div class="state">
            <label for="state"> <strong>State</strong><span class="required">*</span></label>


            <select name="state">
                <option value="DHAKA" required>Select a state</option>
                <option value="RAJSHAJI">RAJSHAJI</option>
                <option value="CUMILLAH">CUMILLAH</option>
                <option value="CHITTAGONG">CHITTAGONG</option>
            </select><br>
        </div>


        <div class="form-group">
            <label for="Zip Code"><strong> Code</strong><span class="required">*</span></label>
            <input type="number" id="Zip Code" >

        </div>




        <div class="Country">
            <label for="Country"> <strong>Country</strong><span class="required">*</span></label>


            <select name="Country">
                <option value="Select a country" required>Select a country</option>
                <option value="BANGLADESH">BANGLADESH</option>
                <option value="INDONESIA">INDONESIA</option>
                <option value="JAPAN">JAPAN</option>
            </select><br>
        </div>


        <div class="form-group">
            <label for="Phone"><strong>Phone</strong></label>
            <input type="number" id="Phone" >

        </div>


        <div class="form-group">
            <label for="Fax"><strong>Fax</strong></label>
            <input type="text" id="Fax">

        </div>


        <div class="form-group">
            <label for="Email"><strong>Email</strong><span class="required">*</span></label>
            <input type="email" id="Email" >

        </div>



        <div class="donation">
            <label><strong>Donation Amount</strong><span class="required">*</span></label>

            <input type="radio" name="donation" value="none" id="none">
            <label for="none">None</label>

            <input type="radio" name="donation" value="$50" id="$50">
            <label for="$50">$50</label>

            <input type="radio" name="donation" value="$75" id="$75">
            <label for="$75">$75</label>

            <input type="radio" name="donation" value="$100" id="$100">
            <label for="$100">$100</label>

            <input type="radio" name="donation" value="$250" id="$250">
            <label for="$250">$250</label>

            <input type="radio" name="donation" value="other" id="other">
            <label for="other">other</label>
        </div>
        <div class="a">
            <small> (check a button or type in your amount)</small>
            <label for="Other Amount $"><strong>Other Amount $:</strong></label>
            <input type="number" id="Other Amount $" >
        </div>

        <div class="b">
            <label for="Recurring Donation"><strong>Recurring Donation</strong> </label>
            <input type="checkbox">
            <small> (I am interested in giving on a regular basis)</small><br>
            <small>(check if yes)</small>

        </div>

        <div class="card">
            <label for="Monthly Credit Card$">Monthly Credit Card$:</label>

            <input type="text" minlength="1" size="4">
            <label for="For">For</label>
            <input type="text" minlength="1" size="4">

            <label for="Months">Months</label>
        </div>
        </h4>

        <h2> Honorarium and Memorial Donation Information</h2>


        <div class="Honorarium">

            <label><strong>I would like to make this donation:</strong></label>


            <input type="radio" name="To Honor" value="To Honor" id="To Honor">
            <label for="To Honor">To Honor</label><br>

            <input type="radio" name="In memory of" value="In memory of" id="Inmemoryof">
            <label for="In memory of">In memory of</label>

            <div class="form-group">

                <label for="Name"> <strong>Name</strong></label>
                <input type="text" id="Name">

            </div>

            <div class="form-group">

                <label for="Acknowledge Donation to"> <strong>Acknowledge Donation to:</strong> </label>
                <input type="text" id="Acknowledge Donation to">

            </div>
            <div class="form-group">

                <label for="Address"><strong>Address</strong></label>
                <input type="text" id="Address">

            </div>

            <div class="form-group">

                <label for="City"> <strong>City</strong></label>
                <input type="text" id="City">

            </div>
            <div class="state">
                <label for="state"> <strong>State:</strong></label>


                <select name="state">
                    <option value="DHAKA" required>Select a state</option>
                    <option value="RAJSHAJI">RAJSHAJI</option>
                    <option value="CUMILLAH">CUMILLAH</option>
                    <option value="CHITTAGONG">CHITTAGONG</option>
                </select><br>
            </div>

            <div class="form-group">

                <label for="Zip"> <strong>Zip</strong></label>
                <input type="text" id="Zip">

            </div>

            <h2> Additional Information</h2>



            <small>Please enter your name, company or organization as you would like it to appear in our
                publications:</small>



            <div class="form-group">

                <label for="Name"> <strong>Name</strong> </label>
                <input type="text" id="Name">

            </div>

            <input type="checkbox">
            <small>I would like my gift to remain anonymous.</small><br>
            <input type="checkbox">
            <small>My employer offers a matching gift program. I will mail the matching gift form.</small><br>
            <input type="checkbox">
            <small>Please save the cost of acknowledging this gift by not mailing a thank you letter.</small><br>

            <div class="form-group">
                <label for="comments"><strong>comments</strong><br><small>(Please type any questions or feedback
                        here)</small> </label>
                <input type="text" id="comments">

            </div>


            <div class="checkbox">
                <label><strong>How may we contact you?</strong></label>

                <input type="checkbox" id="E-mail">
                <label for="E-mail">E-mail</label><br>

                <input type="checkbox" id="Postmail">
                <label for="Postmail">Postmail</label><br>

                <input type="checkbox" id="Telephone">
                <label for="Telephone">Telephone</label><br>

                <input type="checkbox" id="Fax1">
                <label for="Fax1">Fax</label><br>
            </div>

            <small>I would like to receive newsletters and information about special events by:</small>
            <div class="checkbox">
                <input type="checkbox" id="E-mail1">
                <label for="E-mail1">E-mail</label><br>

                <input type="checkbox" id="Postmail1">
                <label for="Postmail1">Postmail</label><br>


            </div>


            <input type="checkbox">
            <label for="I would like information about volunteering with the">I would like information about
                volunteering with the</label><br>













            <br><input type="Reset">
            <input type="submit" value="Continue"><br>

            <img src="data:image/png;base64,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"
                height="20" width="20">


            <small>Donate online with confidence. You are on a secure server<br>

                If you have any problems or questions, please contact support.</small>



    </form>



</body>

</html>