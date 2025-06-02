<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Replace the default alert for "No items selected" with a styled SweetAlert2 popup
        function showNoItemsSelectedPopup() {
            Swal.fire({
                title: 'No Items Selected',
                html: '<div style="font-size:1.1em;color:#e5231a;"><i class="fa fa-box-open" style="font-size:2em;color:#f59e42;"></i><br><br>Please select at least one item before completing the order.</div>',
                icon: 'warning',
                confirmButtonText: 'OK',
                confirmButtonColor: '#f59e42',
                background: '#fffbe6',
                customClass: {
                    popup: 'shadow-lg rounded-xl border-2 border-[#f59e42]'
                }
            });
        }

        function showInvalidDatePopup() {
            Swal.fire({
                title: 'Invalid Date',
                html: '<div style="font-size:1.1em;color:#e5231a;"><i class="fa fa-calendar-times" style="font-size:2em;color:#f59e42;"></i><br><br>The date you entered is already past. Please select a valid date.</div>',
                icon: 'warning',
                confirmButtonText: 'OK',
                confirmButtonColor: '#f59e42',
                background: '#fffbe6',
                customClass: {
                    popup: 'shadow-lg rounded-xl border-2 border-[#f59e42]'
                }
            });
        }

        // Example validation for date input
        function validateOrderDate(dateInputSelector) {
            const dateInput = document.querySelector(dateInputSelector);
            if (!dateInput) return true;
            const inputDate = new Date(dateInput.value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            inputDate.setHours(0, 0, 0, 0);

            if (inputDate < today) {
                showInvalidDatePopup();
                return false;
            }
            return true;
        }

    </script>
</head>

<body class="w-full h-screen relative">
    <div id="success_popup"
        class="hidden bg-white w-1/4 px-7 py-11 rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
        <p class="text-3xl text-green-500 font-medium text-center mb-4">Order Complete!</p>
        <p class="text-sm text-[#8e8f8e] text-center mb-5">This items are successfully added to your inventory.</p>
        <a href="{{ route('orders') }}"
            class="w-1/2 font-medium bg-main block mx-auto py-2 rounded-xl text-white text-center">Okay</a>
    </div>
    {{-- main --}}
    <div id="main" class="w-full flex h-full">
        {{-- navigations --}}
        <div class="w-[6%] py-6 bg-white relative">
            <div class="flex w-2/3 mx-auto flex-col items-center justify-center py-4 mb-3">
                <img src="{{ asset($cms->company_logo) }}" alt="">
            </div>
            <a href="{{ route('dashboard') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/products-new.png') }}" alt="Home Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Home</p>
            </a>
            <a href="{{ route('cashier') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/cashier-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Cashier</p>
            </a>
            <a href="{{ route('history') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/history-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">History</p>
            </a>
            {{-- <a href="{{ route('inventory') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/inv-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Inventory</p>
            </a> --}}
            <a href="{{ route('orders') }}"
                class="flex w-2/3 mx-auto flex-col items-center justify-center py-4 rounded-xl bg-[#f5a7a4]">
                <img src="{{ asset('images/order-red.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#e5231a]">Orders</p>
            </a>
            <a href="{{ route('office.login') }}" target="__blank"
                class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/backoffice-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Office</p>
            </a>
        </div>
        {{-- POS --}}
        <div class="w-[94%] h-full grid grid-cols-2 grid-rows-12 gap-6 bg-[#e4e4e4] p-6">
            {{-- selection --}}
            <div class="w-full flex items-center justify-between h-full col-span-2 row-span-2 bg-white rounded-xl p-4">
                <p class="text-lg font-semibold uppercase">Orders list</p>
                <div>
                    <button id="submitSelected"
                        class="py-2 rounded-lg border border-main text-main text-sm px-4">Complete Order</button>
                </div>
            </div>
            <div class="row-span-10 bg-white rounded-xl p-4 w-full h-full">
                <p class="pb-2 border-b border-[#565857] font-medium text-[#565857]">All orders</p>
                <div id="buttons" class="w-full py-2 h-[90%] overflow-y-auto">
                    @foreach ($batches as $batch)
                        <button
                            class="w-full flex justify-between p-6 rounded-lg shadow-md mb-2 border border-[#565857] supp-btn"
                            data-batch="{{ $batch['batch_number'] }}">
                            <div class="w-1/3 flex gap-2">
                                <p>Order Number:</p>
                                <p>{{ $batch['batch_number'] }}</p>
                            </div>
                            <div class="w-1/3 flex gap-2">
                                <p>Order List Number:</p>
                                <p>{{ $batch['total_rows'] }}</p>
                            </div>
                            <div class="w-1/3 flex gap-2">
                                <p>Total item quantity:</p>
                                <p>{{ $batch['total_items'] }}</p>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="col-start-2 row-span-10 bg-white rounded-xl h-full p-4">
                <p class="pb-2 border-b border-[#565857] font-medium text-[#565857]">Order details</p>
                <div class="w-full h-full">
                    <p class="py-6 font-semibold text-xl text-main">Order Number: <span id="supplier_name"></span></p>
                    <div class="w-full flex items-center border-b pb-2 pl-8">
                        <p class="w-[30%]">Item Name</p>
                        <p class="w-[15%]">Quantity</p>
                        <p class="w-[25%]">Date Ordered</p>
                        <p class="w-[30%]">Expiration Date</p>
                    </div>
                    <div id="orders_list" class="w-full">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#buttons').on('click', '.supp-btn', function() {
                let batch = $(this).data('batch')
                $('#supplier_name').text(batch)
                var url = "{{ route('supplier_name', ['name' => ':name']) }}"
                url = url.replace(':name', batch)

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        let ordersDiv = $('#orders_list')
                        ordersDiv.empty()

                        response.orders.forEach(function(order) {
                            // Parse the created_at date string into a Date object
                            var date = new Date(order.created_at);

                            // Format the date as "F d, Y"
                            var formattedDate = date.toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'long',
                                day: '2-digit'
                            });

                            var orderButton = `
                            <label class="w-full flex items-center gap-4 py-3 order-row">
                                <input class="" type="checkbox" id="checkbox" name="id" value="${order.id}">
                                <p class="w-[30%]">${order.item}</p>
                                <p class="w-[15%]">${order.quantity}pcs</p>
                                <p class="w-[25%] ">${formattedDate}</p>
                                <div class="w-[30%]">
                                    <input class="py-1 px-3 outline-none border-2 rounded-md expiration_date" name="expiration_date" placeholder="MM/DD/YYYY" autocomplete="off">
                                </div>
                            </label>
                            `;

                            ordersDiv.append(orderButton);
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr, status, error)
                    }
                })
            })

            $('#orders_list').on('input', '.expiration_date', function(e) {
                let input = e.target.value;

                // If the user is trying to delete a slash, allow it
                if (input.length < e.target.dataset.previousLength) {
                    e.target.dataset.previousLength = input.length;
                    return;
                }

                // Remove any non-digit characters except /
                input = input.replace(/[^0-9/]/g, '');

                // Add / after MM
                if (input.length == 2 && input[2] !== '/') {
                    input = input.slice(0, 2) + '/' + input.slice(2);
                }

                // Add / after DD
                if (input.length == 5 && input[5] !== '/') {
                    input = input.slice(0, 5) + '/' + input.slice(5);
                }

                // Set the formatted value back to the input field
                e.target.value = input;

                // Update the previous length
                e.target.dataset.previousLength = input.length;
            });

            $(document).on('click', '#submitSelected', function() {
    // Gather the selected checkboxes and expiration dates
    let orders = [];
    $('input[name="id"]:checked').each(function() {
        let row = $(this).closest('label');
        let expirationDate = row.find('input[name="expiration_date"]').val();
        orders.push({
            id: $(this).val(),
            expiration_date: expirationDate
        });
    });

    // Check if any checkboxes are selected
    if (orders.length === 0) {
        // alert('No items selected');
        showNoItemsSelectedPopup();
        return;
    }

    // Send the selected IDs and expiration dates to the server
    $.ajax({
        url: "{{ route('complete_order') }}", // Ensure this URL matches your route
        method: 'POST', // Use POST method
        contentType: 'application/json', // Send JSON data
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token
        },
        data: JSON.stringify({
            orders: orders
        }), // Convert array to JSON
        success: function(response) {
            // Handle the response from the server
            console.log('Success:', response);

            // Show the success popup
            document.getElementById('success_popup').classList.remove('hidden');
            document.getElementById('main').style.filter = 'blur(5px)';

            // Hide the popup after 2 seconds and submit the form
            setTimeout(function() {
                document.getElementById('success_popup').classList.add('hidden');
                document.getElementById('main').style.filter = 'none'; // Remove the blur
                document.getElementById('itemForm').submit(); // Submit the form
            }, 2000); // Adjust the delay as needed
        },
        error: function(xhr, status, error) {
            // Handle errors
            console.error('Error:', status, error);
            console.log(xhr.responseText); // Log the error response from the server
        }
    });
});


        })

        // Function to check for expired products in the order list
        function checkExpiredProducts() {
            let hasExpired = false;
            // Assuming each order row has a data-expiration attribute or a cell with class 'expiration-date'
            document.querySelectorAll('.order-row').forEach(function(row) {
                // You may need to adjust selector/class based on your markup
                let expCell = row.querySelector('.expiration-date');
                if (expCell) {
                    let expDateStr = expCell.dataset.expiration || expCell.textContent.trim();
                    if (expDateStr && expDateStr !== 'No expiration date') {
                        let expDate = new Date(expDateStr);
                        let now = new Date();
                        // Set time to 00:00:00 for both to compare only the date
                        expDate.setHours(0,0,0,0);
                        now.setHours(0,0,0,0);
                        if (expDate < now) {
                            hasExpired = true;
                        }
                    }
                }
            });
            if (hasExpired) {
                Swal.fire({
                    title: "Expired Product!",
                    text: "One or more products in your order are expired.",
                    icon: "warning",
                    confirmButtonColor: "#d33"
                });
            }
        }

        // Call this function after the order list is rendered or updated
        document.addEventListener('DOMContentLoaded', function() {
            checkExpiredProducts();
        });

        // If you have dynamic updates to the order list, call checkExpiredProducts() after update as well

    </script>
    <script>
        function showCheckItemPopup() {
    Swal.fire({
        title: 'Please Check the Item!',
        html: '<div style="font-size:1.1em;color:#e5231a;"><i class="fa fa-exclamation-triangle" style="font-size:2em;color:#f59e42;"></i><br><br>Before proceeding, kindly review and check the item details.</div>',
        icon: 'info',
        confirmButtonText: 'Okay, I will check',
        confirmButtonColor: '#f59e42',
        background: '#fffbe6',
        customClass: {
            popup: 'shadow-lg rounded-xl border-2 border-[#f59e42]'
        }
    });
}

// Example usage: Call this function when the order is not checked
// showCheckItemPopup();
    </script>
</body>

</html>
