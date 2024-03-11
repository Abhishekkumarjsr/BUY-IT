document.addEventListener('DOMContentLoaded', function () {
    const updateCartButton = document.querySelector('#place-order-button button:nth-of-type(1)');
    updateCartButton.addEventListener('click', function () {
        const rows = document.querySelectorAll('#shopping-cart tbody tr');
        const updates = [];
        rows.forEach(function (row) {
            const id = row.querySelector('td:nth-of-type(1) a').getAttribute('href').split('=')[2];
            const size = row.querySelector('td:nth-of-type(4) select').value;
            const quantity = row.querySelector('td:nth-of-type(6) input').value;
            updates.push({ id, size, quantity });
        });

        // Send updates to the server using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_cart.php');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Handle successful response
                alert('Cart updated successfully!');
                location.reload(); // Reload the page after successful update
            } else {
                // Handle error
                alert('Error updating cart. Please try again later.');
            }
        };
        xhr.send(JSON.stringify(updates));
    });
});
