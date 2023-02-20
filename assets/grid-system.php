<script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.js" defer></script>
<input type="text" id="filter-text-box" class=" mb-1" placeholder="Search..." oninput="onFilterTextBoxChanged()">
<div id="myGrid" style="height: 73vh; width:100%;" class="ag-theme-alpine"></div>
<script>
    let rowData = [];
    <?php
    while ($data = mysqli_fetch_array($result)) {
        $row_data = new stdClass();
        for ($i = 0; $i < sizeof($column_fields); $i++) {
            $val = $column_fields[$i];
            if ($val != 'Actions')
                if ($column_data_fields[$i] !== 'date')
                    $row_data->$val = $data[$column_data_fields[$i]] . '';
                else
                    $row_data->$val = date('d-m-Y', strtotime($data[$column_data_fields[$i]]));
        }
    ?>
        rowData.push(<?= json_encode($row_data) ?>);
    <?php } ?>

    function onFilterTextBoxChanged() {
        gridOptions.api.setQuickFilter(
            document.getElementById('filter-text-box').value
        );
    }

    // let the grid know which columns and what data to use
    const gridOptions = {
        columnDefs: columnDefs,
        rowData: rowData,
        defaultColDef: {
            sortable: true,
            resizable: true,
            filter: true,
            // flex: 1,
        },
        animateRows: true,
        onCellValueChanged: onCellValueChanged,
    };

    function onCellValueChanged(event) {
        let name = event.data.CM;
        let ids = event.data.ID;
        $.ajax({
            url: 'cm-add-accepted.php',
            type: 'post',
            data: {
                name: name,
                id: ids
            },
            success: function(response) {
                if (response)
                    $('.saved').show(1).fadeIn().animate({
                        right: 10,
                        opacity: "show"
                    }, 1500).delay(1000).hide(0.3);
                else
                    $('.nsaved').show(1).fadeIn().animate({
                        right: 10,
                        opacity: "show"
                    }, 1500).delay(1000).hide(0.3);
            }
        });
    }
    // setup the grid after the page has finished loading
    document.addEventListener('DOMContentLoaded', () => {
        const gridDiv = document.querySelector('#myGrid');
        new agGrid.Grid(gridDiv, gridOptions);
    });
</script>