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
        foreach ($income_transactions as $income) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $income["name"];?></td>
                <td><?= $income["description"];?></td>
                <td><?= $income["type"];?></td>
                <td><?= $income["amount"];?></td>
                <td><?= $income["created_at"];?></td>
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
    exportTableToExcel("tblData", "incomes-data");
    window.location.href = "<?= base_url(); ?>";
</script>