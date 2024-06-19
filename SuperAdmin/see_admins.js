// script.js
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('dataTable');
    const contextMenu = document.getElementById('contextMenu');
    let currentRow;

    table.addEventListener('contextmenu', function (event) {
        event.preventDefault();
        currentRow = event.target.closest('tr');

        const { clientX: mouseX, clientY: mouseY } = event;
        contextMenu.style.top = `${mouseY}px`;
        contextMenu.style.left = `${mouseX}px`;
        contextMenu.style.display = 'block';
    });

    document.addEventListener('click', function () {
        contextMenu.style.display = 'none';
    });


    window.enable = function () {
        const rowId = currentRow.getAttribute('data-id');
        // Handle row delete logic here
        alert(`Enable row with ID: ${rowId}`);
        const status = currentRow.getAttribute('data-stat');
        const usern = currentRow.getAttribute('data-usern');
        const name = currentRow.getAttribute('data-name');
        
        const reason = prompt("Reason for enabling: ");
        if (reason !== null) {
            if (confirm(`Are you sure you want to enable row with ID: ${rowId}?`)) {
                const formData = new FormData();
                formData.append('action', 'enable');
                formData.append('rowId', rowId);
                formData.append('status', status);
                formData.append('usern', usern);
                formData.append('name', name);
                formData.append('reason', reason);
                fetch('actions.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert("Enabled Successfully");
                });
            }
        }
        
    };


    window.disable = function () {
        const rowId = currentRow.getAttribute('data-id');
        // Handle row delete logic here
        alert(`Disable row with ID: ${rowId}`);
        const status = currentRow.getAttribute('data-stat');
        const usern = currentRow.getAttribute('data-usern');
        const name = currentRow.getAttribute('data-name');
        
        const reason = prompt("Reason for disabling: ");
        if (reason !== null) {
            if (confirm(`Are you sure you want to disable row with ID: ${rowId}?`)) {
                const formData = new FormData();
                formData.append('action', 'disable');
                formData.append('rowId', rowId);
                formData.append('status', status);
                formData.append('usern', usern);
                formData.append('name', name);
                formData.append('reason', reason);
                fetch('actions.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert("Disabled Successfully");
                });
            }
        }
        
    };

    window.deleteRow = function () {
        const rowId = currentRow.getAttribute('data-id');
        // Handle row delete logic here
        alert(`Delete row with ID: ${rowId}`);
        const status = currentRow.getAttribute('data-stat');
        const usern = currentRow.getAttribute('data-usern');
        const name = currentRow.getAttribute('data-name');

        var reason = prompt("Reason for deleting: ");
        if (reason !== null) {
            if (confirm(`Are you sure you want to delete row with ID: ${rowId}?`)) {
                const formData = new FormData();
                formData.append('action', 'delete');
                formData.append('rowId', rowId);
                formData.append('status', status);
                formData.append('usern', usern);
                formData.append('name', name);
                formData.append('reason', reason);
                fetch('actions.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    alert("Deleted Successfully");
                    currentRow.remove();
                });
            }
        }
        
    };
});


// script.js
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('dataTable');
    const contextMenu = document.getElementById('contextMenu');
    let currentRow;

    table.addEventListener('contextmenu', function (event) {
        event.preventDefault();
        currentRow = event.target.closest('tr');

        const { clientX: mouseX, clientY: mouseY } = event;
        contextMenu.style.top = `${mouseY}px`;
        contextMenu.style.left = `${mouseX}px`;
        contextMenu.style.display = 'block';
    });

    document.addEventListener('click', function () {
        contextMenu.style.display = 'none';
    });

});