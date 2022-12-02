<table id="tblData" border="1" style="visibility: hidden;">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($expense_transactions as $expense) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $expense["name"];?></td>
                <td><?= $expense["description"];?></td>
                <td><?= $expense["type"];?></td>
                <td><?= $expense["amount"];?></td>
                <td><?= $expense["created_at"];?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<script>
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }
    exportTableToExcel("tblData", "expenses-data");
    window.location.href = "<?= base_url(); ?>";
</script>