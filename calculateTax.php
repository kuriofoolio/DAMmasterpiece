<html>

<head>
    <title>Calculate PAYE page</title>

    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <form action="processTax.php" target="_blank" method="post">

        <fieldset>
            <legend>Tax details</legend>

            <label for="period">PAY PERIOD: </label>

            <input type="radio" value="year" name='period' id='period'>YEAR
            <input type="radio" value="month" name='period' id='period'>MONTH

            <br><br>

            <label for="sal">BASIC SALARY: </label>
            <input type="number" name="sal" id="sal" min=0 required />

            <br /><br />

            <label for="ben">BENEFITS (BONUS, ALLOWANCE): </label>
            <input type="number" name="ben" id="ben" min=0 required />

            <br /><br />


            <label for="nssf">DEDUCT NSSF: </label>
            <input type="radio" value="yes" name='nssf' id='nssf'>YES
            <input type="radio" value="no" name='nssf' id='nssf'>NO

            <br /><br />

            <label for="rate">NSSF RATES: </label>
            <input type="radio" value="old" name='rate' id='rate'>OLD NSSF RATES (KSH 200)
            <input type="radio" value="new" name='rate' id='rate'>NEW NSSF RATES (TIERED)

            <br /><br />

            <label for="nhif">DEDUCT NHIF: </label>
            <input type="radio" value="yes" name='nhif' id='nhif'>YES
            <input type="radio" value="no" name='nhif' id='nhif'>NO


            <br /><br />

            <div class="submit">
                <button type="submit" id="btn_register" name="btn_register">CALCULATE</button>
            </div>
        </fieldset>
    </form>

</body>

</html>