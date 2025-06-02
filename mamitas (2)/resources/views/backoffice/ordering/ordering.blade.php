<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Back Office - Enhanced Ordering</title>
</head>

<body class="w-full h-screen bg-[#fefefe]">
    <div id="head" class="w-full flex items-center h-[7%] bg-[#db121c] px-10">
        <p class="text-lg text-white">Orders</p>
    </div>
    <div id="body" class="w-full h-[93%] flex z-0">
        <div class="w-[5%] pt-10 bg-[#fefefe]">
            <div class="flex w-2/3 mx-auto flex-col items-center justify-center pb-4 mb-3">
                <img src="{{ asset('images/logo-transparent.png') }}" alt="">
            </div>
            <div class="w-full relative">
                <button onclick="openDashboard()" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/chart-new.png') }}" alt="" class="w-[30px] h-auto">
                </button>
                <div id="dash_options" class="hidden w-[200px] absolute left-20 top-0 z-10 bg-slate-50 text-sm">
                    <div class="w-full flex flex-col py-2">
                        <a href="{{ route('office.dashboard') }}" class="hover:bg-[#e6e6e6] p-2">Sales summary</a>
                        <a href="{{ route('office.sales_by_item') }}" class="hover:bg-[#e6e6e6] p-2">Sales by item</a>
                        <a href="{{ route('office.sales_history') }}" class="hover:bg-[#e6e6e6] p-2">Sales history</a>
                    </div>
                </div>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.items_list') }}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/prod-new.png') }}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <button onclick="openInventoryOptions()" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/inv-new.png') }}" alt="" class="w-[30px] h-auto">
                </button>
                <div id="inventory_options"
                    class="hidden w-[200px] absolute left-20 top-0 z-10 bg-slate-50 p-3 text-sm">
                    <div class="w-full flex flex-col gap-3">
                        <a href="{{ route('office.stocks_adjustment') }}">Stocks Adjustment</a>
                        <a href="{{ route('office.inventory') }}">Inventory</a>
                    </div>
                </div>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.cashiers') }}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/employee-new.png') }}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.supplier') }}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/supplier-new.png') }}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.ordering') }}"
                    class="w-full flex items-center justify-center h-auto py-4 bg-[#f5a7a4]">
                    <img src="{{ asset('images/order-red.png') }}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <form id="logoutForm" action="{{ route('office.logout') }}" method="POST">
                    @csrf
                    <a href="#" id="logoutLink" class="w-full flex items-center justify-center h-auto py-4">
                        <img src="{{ asset('images/logout-new.png') }}" alt="Logout" class="w-[30px] h-auto">
                    </a>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.getElementById('logoutLink').addEventListener('click', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You will be logged out of the system.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, log me out!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('logoutForm').submit();
                        }
                    });
                });
            </script>
        </div>
        <div id="main" class="w-[95%] bg-[#f2f2f2] grid grid-cols-2 gap-6 grid-rows-2 p-7">

            <div class="w-full bg-white rounded-xl py-3 px-5">
                <p class="py-1 font-medium border-b-2 border-[#565857] text-[#565857]">Supplier Selection</p>
                <div class="pt-2 mb-4">
                    <input id="supplier_search" autocomplete="off" type="search" name="supplier_name"
                        placeholder="Search for supplier name"
                        class="w-full px-5 py-2 rounded-lg outline-none border border-[#565857] focus:border-[#db121c]">
                    <p class="mt-2 text-sm text-gray-600">Available Suppliers:</p>
                    <div id="supplier_result" class="w-full max-h-[120px] overflow-y-auto pb-2 border-b">
                        <!-- Suppliers will be populated here -->
                    </div>
                    <div class="w-full flex gap-1 pt-3">
                        <p id="selected_supplier_label">Selected supplier:</p>
                        <p class="font-medium text-[#db121c]" id="supplier_input">None selected</p>
                    </div>
                </div>
            </div>

            <div class="w-full col-start-2 row-span-2 bg-white rounded-xl py-3 px-5">
                <div class="flex justify-between border-b-2 border-[#565857] pb-2">
                    <p class="py-1 font-medium text-[#565857]">Order # {{ $newBn ?? '12345' }}</p>
                    <form action="{{ route('office.place_order') }}" method="POST">
                        @csrf
                        <div id="form_div">
                            <!-- Hidden inputs for form submission -->
                        </div>
                        <input type="hidden" name="batch_number" value="{{ $newBn ?? '12345' }}">
                        <button class="text-[#db121c] font-medium hover:underline" type="submit">
                            Complete this order
                        </button>
                    </form>
                </div>

                <!-- Order Summary Header -->
                <div class="w-full flex items-center text-sm font-medium py-2 border-b text-gray-600">
                    <p class="w-2/5">Item Name</p>
                    <p class="w-2/5">Supplier</p>
                    <p class="w-1/5">Quantity</p>
                </div>

                <!-- Order Items List -->
                <div class="w-full pt-2 max-h-[400px] overflow-y-auto" id="order_items_list">
                    <p class="text-gray-500 text-center py-8">No items added to order yet</p>
                </div>

                <!-- Order Summary -->
                <div class="border-t pt-3 mt-3">
                    <div class="flex justify-between items-center">
                        <p class="font-medium">Total Items: <span id="total_items_count">0</span></p>
                        <button id="clear_order" class="text-red-500 text-sm hover:underline">Clear All</button>
                    </div>
                </div>
            </div>

            <div class="w-full bg-white rounded-xl py-3 px-5">
                <p class="py-1 font-medium border-b-2 border-[#565857] text-[#565857]">Available Items from Selected
                    Supplier</p>
                <div class="pt-2">
                    <!-- Search within supplier items -->
                    <input id="item_search" type="search" name="item_name"
                        placeholder="Search items from selected supplier" autocomplete="off" disabled
                        class="w-full px-5 py-2 rounded-lg outline-none border border-[#565857] focus:border-[#db121c] disabled:bg-gray-100">

                    <p class="mt-2 text-sm text-gray-600">Items:</p>
                    <div id="supplier_items_list" class="w-full max-h-[200px] overflow-y-auto pb-2 border-b">
                        <p class="text-gray-500 text-center py-4">Please select a supplier first</p>
                    </div>

                    <!-- Selected Item Details -->
                    <div class="w-full flex py-2 mt-3" id="item_selection_area" style="display: none;">
                        <div class="w-[60%] flex flex-col gap-2">
                            <p class="w-full font-medium">Selected Item:</p>
                            <p class="w-full text-[#db121c]" id="selected_item_name">None</p>
                        </div>
                        <div class="w-[40%] flex flex-col gap-2">
                            <p class="w-full font-medium">Quantity:</p>
                            <div class="flex items-center gap-2">
                                <input id="quantity_input" type="number" min="1" value="1"
                                    class="w-full px-3 py-2 border border-[#565857] rounded outline-none focus:border-[#db121c]">
                                <button id="add_item_to_order"
                                    class="px-4 py-2 bg-[#db121c] text-white rounded hover:bg-red-700 transition-colors">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

    <script>
        $(document).ready(function() {
            // Global variables
            let selectedSupplier = '';
            let selectedItem = '';
            let orderItems = [];
            let orderCounter = 0;
            let supplierItems = []; // Store items for the selected supplier

            // Load all suppliers on page load
            function loadAllSuppliers() {
                $.ajax({
                    url: "{{ route('office.supplier_search', ['key' => '']) }}",
                    method: 'GET',
                    success: function(response) {
                        displaySuppliers(response.items);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading suppliers:', error);
                        $('#supplier_result').html(
                            '<p class="text-red-500 text-center py-4">Error loading suppliers</p>');
                    }
                });
            }

            // Display suppliers in the UI
            function displaySuppliers(suppliers) {
                const supplierDiv = $('#supplier_result');
                supplierDiv.empty();

                if (!suppliers || suppliers.length === 0) {
                    supplierDiv.append('<p class="text-gray-500 text-center py-4">No suppliers found</p>');
                    return;
                }

                suppliers.forEach(function(supplier) {
                    const supplierButton = `
                        <button class="w-full py-2 px-3 text-left border-b hover:bg-gray-50 supplier-btn transition-colors" 
                                data-supplier-id="${supplier.id}" data-supplier-name="${supplier.name}">
                            <p class="font-medium">${supplier.name}</p>
                        </button>
                    `;
                    supplierDiv.append(supplierButton);
                });
            }

            // Load suppliers on page load
            loadAllSuppliers();

            // Supplier search functionality
            $('#supplier_search').on('keyup', function() {
                const searchKey = $(this).val();

                if (searchKey.length === 0) {
                    loadAllSuppliers();
                    return;
                }

                const supplier_url = "{{ route('office.supplier_search', ['key' => ':key']) }}";
                const finalUrl = supplier_url.replace(':key', searchKey);

                $.ajax({
                    url: finalUrl,
                    method: 'GET',
                    success: function(response) {
                        displaySuppliers(response.items);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error searching suppliers:', error);
                        $('#supplier_result').html(
                            '<p class="text-red-500 text-center py-4">Error searching suppliers</p>'
                        );
                    }
                });
            });

            // Handle supplier selection
            $(document).on('click', '.supplier-btn', function() {
                const supplierId = $(this).data('supplier-id');
                const supplierName = $(this).data('supplier-name');

                selectedSupplier = {
                    id: supplierId,
                    name: supplierName
                };

                $('#supplier_input').text(supplierName);

                // Load items for selected supplier
                loadSupplierItems(supplierId, supplierName);

                // Enable item search
                $('#item_search').prop('disabled', false);

                // Highlight selected supplier
                $('.supplier-btn').removeClass('bg-blue-50 border-blue-200');
                $(this).addClass('bg-blue-50 border-blue-200');
            });

            // Load items for selected supplier from database
            function loadSupplierItems(supplierId, supplierName) {
                const itemsDiv = $('#supplier_items_list');
                itemsDiv.html('<p class="text-gray-500 text-center py-4">Loading items...</p>');

                $.ajax({
                    url: "{{ route('office.items_by_supplier') }}",
                    method: 'GET',
                    data: {
                        supplier_id: supplierId
                    },
                    success: function(response) {
                        if (response.success && response.items) {
                            supplierItems = response.items;
                            displaySupplierItems(supplierItems);
                        } else {
                            itemsDiv.html(
                                '<p class="text-red-500 text-center py-4">No items found for this supplier</p>'
                            );
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'Error loading items';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        itemsDiv.html(`<p class="text-red-500 text-center py-4">${errorMessage}</p>`);
                        console.error('Error details:', xhr.responseText);
                    }
                });
            }
            // Display items for selected supplier
            function displaySupplierItems(items) {
                const itemsDiv = $('#supplier_items_list');
                itemsDiv.empty();

                if (!items || items.length === 0) {
                    itemsDiv.append(
                        '<p class="text-gray-500 text-center py-4">No items available for this supplier</p>');
                    return;
                }

                items.forEach(function(item) {
                    const itemButton = `
                        <button class="w-full py-2 px-3 text-left border-b hover:bg-gray-50 item-btn transition-colors" 
                                data-item-id="${item.id || ''}" data-item-name="${item.item}" data-item-price="${item.price || 0}">
                            <div class="flex justify-between items-center">
                                <p class="font-medium">${item.item}</p>
                                ${item.price ? `<p class="text-sm text-gray-600">₱${item.price}</p>` : ''}
                            </div>
                        </button>
                    `;
                    itemsDiv.append(itemButton);
                });
            }

            // Item search within supplier items (client-side filtering)
            $('#item_search').on('keyup', function() {
                if (!selectedSupplier.id) return;

                const searchKey = $(this).val().toLowerCase();

                if (searchKey.length === 0) {
                    // Show all items when search is empty
                    displaySupplierItems(supplierItems);
                    return;
                }

                // Filter items client-side from the stored supplierItems
                const filteredItems = supplierItems.filter(item =>
                    item.item.toLowerCase().includes(searchKey)
                );

                displaySupplierItems(filteredItems);
            });

            // Handle item selection
            $(document).on('click', '.item-btn', function() {
                const itemId = $(this).data('item-id');
                const itemName = $(this).data('item-name');
                const itemPrice = $(this).data('item-price') || 0;

                selectedItem = {
                    id: itemId,
                    name: itemName,
                    price: itemPrice
                };

                $('#selected_item_name').text(itemName);
                $('#item_selection_area').show();

                // Highlight selected item
                $('.item-btn').removeClass('bg-green-50 border-green-200');
                $(this).addClass('bg-green-50 border-green-200');
            });

            // Add item to order
            $('#add_item_to_order').on('click', function() {
                if (!selectedSupplier.name || !selectedItem.name) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Please select both supplier and item',
                        icon: 'error'
                    });
                    return;
                }

                const quantity = parseInt($('#quantity_input').val()) || 1;

                if (quantity < 1) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Quantity must be at least 1',
                        icon: 'error'
                    });
                    return;
                }

                // Check if item already exists in order
                const existingItemIndex = orderItems.findIndex(item =>
                    item.itemId === selectedItem.id && item.supplierId === selectedSupplier.id
                );

                if (existingItemIndex !== -1) {
                    // Update existing item quantity
                    orderItems[existingItemIndex].quantity += quantity;
                } else {
                    // Add new item to order
                    orderItems.push({
                        id: ++orderCounter,
                        itemId: selectedItem.id,
                        itemName: selectedItem.name,
                        supplierId: selectedSupplier.id,
                        supplierName: selectedSupplier.name,
                        quantity: quantity,
                        price: selectedItem.price
                    });
                }

                updateOrderDisplay();
                updateFormInputs();

                // Reset item selection
                $('#quantity_input').val(1);
                $('#selected_item_name').text('None');
                $('#item_selection_area').hide();
                $('.item-btn').removeClass('bg-green-50 border-green-200');
                selectedItem = '';

                Swal.fire({
                    title: 'Success',
                    text: 'Item added to order',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                });
            });

            // Update order display
            function updateOrderDisplay() {
                const orderDiv = $('#order_items_list');
                orderDiv.empty();

                if (orderItems.length === 0) {
                    orderDiv.append('<p class="text-gray-500 text-center py-8">No items added to order yet</p>');
                    $('#total_items_count').text('0');
                    return;
                }

                orderItems.forEach(function(item) {
                    const orderItemDiv = `
                        <div class="w-full flex items-center text-sm py-3 border-b hover:bg-gray-50" data-order-id="${item.id}">
                            <div class="w-2/5">
                                <p class="font-medium">${item.itemName}</p>
                                ${item.price > 0 ? `<p class="text-xs text-gray-500">₱${item.price} each</p>` : ''}
                            </div>
                            <div class="w-2/5">
                                <p>${item.supplierName}</p>
                            </div>
                            <div class="w-1/5 flex items-center justify-between">
                                <p class="font-medium">${item.quantity}</p>
                                <button class="text-red-500 hover:text-red-700 remove-item-btn" data-order-id="${item.id}">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    `;
                    orderDiv.append(orderItemDiv);
                });

                $('#total_items_count').text(orderItems.length);
            }

            // Remove item from order
            $(document).on('click', '.remove-item-btn', function() {
                const orderId = parseInt($(this).data('order-id'));
                orderItems = orderItems.filter(item => item.id !== orderId);
                updateOrderDisplay();
                updateFormInputs();
            });

            // Clear all items
            $('#clear_order').on('click', function() {
                if (orderItems.length === 0) return;

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This will remove all items from the order',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, clear all'
                }).then((result) => {
                    if (result.isConfirmed) {
                        orderItems = [];
                        updateOrderDisplay();
                        updateFormInputs();
                    }
                });
            });

            // Update form inputs for submission
            function updateFormInputs() {
                const formDiv = $('#form_div');
                formDiv.empty();

                orderItems.forEach(function(item) {
                    const hiddenInputs = `
                        <div>
                            <input type="hidden" name="food_name[]" value="${item.itemName}">
                            <input type="hidden" name="suppliername[]" value="${item.supplierName}">
                            <input type="hidden" name="quantity[]" value="${item.quantity}">
                            <input type="hidden" name="item_id[]" value="${item.itemId}">
                            <input type="hidden" name="supplier_id[]" value="${item.supplierId}">
                        </div>
                    `;
                    formDiv.append(hiddenInputs);
                });
            }
        });

        // Sidebar functions
        function openInventoryOptions() {
            var inventoryOptions = document.getElementById('inventory_options');
            inventoryOptions.classList.toggle('hidden');
        }

        function openDashboard() {
            var dashOptions = document.getElementById('dash_options');
            dashOptions.classList.toggle('hidden');
        }
    </script>
</body>

</html>
