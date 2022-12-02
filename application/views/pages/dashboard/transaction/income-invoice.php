<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div id="pdf-element" style="margin-top: 5rem; padding-right: 2rem; padding-left: 2rem; margin-left: auto; margin-right: auto; max-width: 60vw;">
        <table style="display: table; font-size: 1.2rem; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; height: 40vw;">
            <thead>
                <tr style="background-color: #ffffff;">
                    <th colspan="2" style="text-align: center; border: 1px solid #dddddd; padding: 8px;">INCOME INVOICE</th>
                </tr>
            </thead>
            <tbody>
                <tr style="background-color: #dddddd;">
                    <td style="font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $income_transactions["name"]; ?></td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td style="font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Description</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $income_transactions["description"]; ?></td>
                </tr>
                <tr style="background-color: #dddddd;">
                    <td style="font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Type</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $income_transactions["type"]; ?></td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td style="font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Amount</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $income_transactions["amount"]; ?></td>
                </tr>
                <tr style="background-color: #dddddd;">
                    <td style="font-weight: bold; border: 1px solid #dddddd; text-align: left; padding: 8px;">Date</td>
                    <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $income_transactions["created_at"]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/html2canvas.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jspdf.min.js'); ?>"></script>
    <script>
        let doc = new jsPDF('p', 'pt', 'a4');

        doc.addHTML(document.querySelector("body"), function() {
            doc.save('invoice.pdf');
            window.location.href = "<?= base_url("income-list") ?>";
        });
    </script>
</body>

</html>