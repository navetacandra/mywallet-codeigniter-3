<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div id="pdf-element" style="padding-right: 2rem; padding-left: 2rem; margin-left: auto; margin-right: auto; width: 100vw;">
        <table style="display: table; font-size: 1.2rem; font-family: Arial, Helvetica, sans-serif; border-collapse: collapse; width: 100%; height: 40vw;">
            <thead>
                <tr style="background-color: #ffffff;">
                    <th colspan="6" style="text-align: center; border: 1px solid #dddddd; padding: 8px;">EXPENSE INVOICE</th>
                </tr>
                <tr>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">NO</th>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Name</th>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Description</th>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Type</th>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Amount</th>
                    <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($expense_transactions as $expense) {
                ?>
                    <tr <?= $no % 2 == 0 ? 'style="background-color: #dddddd;"' : 'style="background-color: #ffffff;"' ?>>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $no; ?></td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $expense["name"]; ?></td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $expense["description"]; ?></td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $expense["type"]; ?></td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $expense["amount"]; ?></td>
                        <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><?= $expense["created_at"]; ?></td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/html2canvas.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jspdf.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/print.js'); ?>"></script>
    <script>
        let doc = new jsPDF('p', 'pt', 'a4');

        doc.addHTML(document.querySelector("body"), {
            pagesplit: true
        }, function() {
            let base64 = doc.output('datauristring');
            document.querySelector("body").style.display = "none";
            printJS({
                printable: base64.replace("data:application/pdf;base64,", ""),
                type: "pdf",
                base64: true
            });
            window.onfocus = () => {
                window.location.href = "<?= base_url() ?>";
            }
        });
    </script>
</body>

</html>