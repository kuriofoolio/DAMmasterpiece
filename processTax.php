<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Tax Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php
    //assuming computation is monthly 
    $bs = $_POST['sal'];

    $ben = $_POST['ben'];

    $earnings = $bs + $ben;

    //choice to deduct nssf
    $nssf = $_POST['nssf'];

    //choose the rate
    $rate = $_POST['rate'];

    //choice to deduct nhif_amount
    $nhif = $_POST['nhif'];


    //get nssf amount
    function getNSSF($nssf, $rate, $earnings)
    {
        if ($nssf == 'yes') {
            if ($rate == 'old') {
                $nssf_amount = 200;
            } else {
                switch ($earnings) {
                    case 18000: {
                            $nssf_amount = 200;
                            break;
                        }
                    case 6000: {
                            $nssf_amount = $earnings * .12;
                            break;
                        }
                    default: {
                            $nssf_amount = 0;
                            break;
                        }
                }
            }
        } else {
            $nssf_amount = 0;
        }
        return $nssf_amount;
    }

    //get taxable income
    $ti = $earnings - getNSSF($nssf, $rate, $earnings);

    //get gross tax
    function getGross($ti)
    {
        switch ($ti) {

            case 47059: {
                    $gross = $ti * .3;
                    break;
                }

            case 35473: {
                    $gross = $ti * .25;
                    break;
                }

            case 23886: {
                    $gross = $ti * .2;
                    break;
                }

            case 12299: {
                    $gross = $ti * .15;
                    break;
                }

            default: {
                    $gross = $ti * .1;
                    break;
                }
        }
        return $gross;
    }

    //get net tax
    $paye = getGross($ti) - 2400;

    //get nhif amount
    function getNHIF($earnings)
    {
        if ($nhif = 'yes') {
            switch ($earnings) {
                case 100000: {
                        $nhif_amount = 1700;
                        break;
                    }

                case 90000: {
                        $nhif_amount = 1600;
                        break;
                    }

                case 80000: {
                        $nhif_amount = 1500;
                        break;
                    }

                case 70000: {
                        $nhif_amount = 1400;
                        break;
                    }

                case 60000: {
                        $nhif_amount = 1300;
                        break;
                    }

                case 50000: {
                        $nhif_amount = 1200;
                        break;
                    }

                case 45000: {
                        $nhif_amount = 1100;
                        break;
                    }

                case 40000: {
                        $nhif_amount = 1000;
                        break;
                    }

                case 35000: {
                        $nhif_amount = 950;
                        break;
                    }

                case 30000: {
                        $nhif_amount = 900;
                        break;
                    }

                case 25000: {
                        $nhif_amount = 850;
                        break;
                    }

                case 20000: {
                        $nhif_amount = 750;
                        break;
                    }

                case 15000: {
                        $nhif_amount = 600;
                        break;
                    }

                case 12000: {
                        $nhif_amount = 500;
                        break;
                    }

                case 8000: {
                        $nhif_amount = 400;
                        break;
                    }

                case 6000: {
                        $nhif_amount = 300;
                        break;
                    }

                case 1000: {
                        $nhif_amount = 150;
                        break;
                    }

                default: {
                        $nhif_amount = 0;
                        break;
                    }
            }
        } else {
            $nhif_amount = 0;
        }
        return $nhif_amount;
    }

    //get net pay
    $netpay = $ti - (getNHIF($earnings) + $paye);



    ?>

    <table class='table'>

        <tbody>

            <tr>

                <th>INCOME BEFORE PENSION DEDUCTION</th>
                <td><?php echo $earnings; ?></td>
            </tr>
            <br>

            <tr>
                <th>DEDUCTIBLE NSSF PENSION CONTRIBUTION</th>
                <td><?php echo getNSSF($nssf, $rate, $earnings); ?></td>
            </tr>
            <br>

            <tr>
                <th>INCOME AFTER PENSION DEDUCTIONS</th>
                <td><?php echo $ti; ?></td>
            </tr>
            <br>

            <tr>
                <th>BENEFITS IN KIND</th>
                <td><?php echo $ben; ?></td>
            </tr>
            <br>

            <tr>
                <th>TAXABLE INCOME</th>
                <td><?php echo $ti; ?></td>
            </tr>
            <br>

            <tr>
                <th>TAX ON TAXABLE INCOME</th>
                <td><?php echo getGross($ti); ?></td>
            </tr>
            <br>

            <tr>
                <th>PERSONAL RELIEF</th>
                <td><?php echo 2400; ?></td>
            </tr>
            <br>

            <tr>
                <th>TAX NET OFF RELIEF</th>
                <td><?php echo $paye; ?></td>
            </tr>
            <br>

            <tr>
                <th>PAYE</th>
                <td><?php echo $paye; ?></td>
            </tr>
            <br>

            <tr>
                <th>CHARGEABLE INCOME</th>
                <td><?php echo $ti; ?></td>
            </tr>
            <br>

            <tr>
                <th>NHIF CONTRIBUTION</th>
                <td><?php echo getNHIF($earnings); ?></td>
            </tr>
            <br>

            <tr>
                <th>NET PAY</th>
                <td><?php echo $netpay; ?></td>
            </tr>
            <br>


        </tbody>
    </table>


</body>

</html>