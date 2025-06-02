<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Dashboard</title>

    
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="w-full h-auto relative bg-[#e4e4e4]">
    <div id="coverup" class="hidden w-full bg-main h-auto absolute z-40 opacity-30"></div>
    <div id="moneyTransactions"
        class="hidden w-1/2 p-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl z-50">
        <div class="w-full flex gap-4">
            <div class="w-full px-5 py-3">
                <p class="pb-2 border-b border-[#565857] font-medium text-[#565857]">Pay ins</p>
                <div class="w-full pt-3">
                    <form action="{{ route('cash_management') }}" method="POST">
                        @csrf
                        <input id="pay" type="text" name="amount" placeholder="Enter amount"
                            class="w-full outline-none rounded-lg px-4 py-1 border border-[#565857] mb-4">
                        <input type="hidden" name="reason" value="paid_in">
                        <button type="submit"
                            class="w-full border border-main rounded-lg py-1 text-red hover:bg-main hover:text-white ease-in-out duration-100">Proceed</button>
                    </form>
                </div>
            </div>
            <div class="w-full px-5 py-3">
                <p class="pb-2 border-b border-[#565857] font-medium text-[#565857]">Petty cash</p>
                <div class="w-full pt-3">
                    <form action="{{ route('cash_management') }}" method="POST">
                        @csrf
                        <input id="pay1" type="text" name="amount" placeholder="Enter amount"
                            class="w-full outline-none rounded-lg px-4 py-1 border border-[#565857] mb-4">
                        <input type="hidden" name="reason" value="paid_out">
                        <button type="submit"
                            class="w-full border border-main rounded-lg py-1 text-red hover:bg-main hover:text-white ease-in-out duration-100">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="quantity-div"
        class="w-1/6 p-4 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white shadow-md hidden rounded shadow-lg text-white ">

        <!-- ❌ Exit Button -->
        <button id="close-quantity"
            class="absolute top-2 right-2 text-red-500 font-bold text-xl leading-none hover:text-gray-200">
            &times;
        </button>

        <p class="mb-2 text-black">Input quantity</p>
        <input type="number" id="quantity-input"
            class="w-full py-2 text-center rounded-sm outline-none border text-black bg-white" value="1">
        <button id="submit-quantity" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-sm w-full">Submit</button>
    </div>

    <script>
        $('#close-quantity').on('click', function() {
            $('#quantity-div').addClass('hidden');
        });
    </script>

    <div class="w-1/5 mx-auto hidden absolute bottom-0 left-0 z-50" id="scanner">
        <video class="mx-auto" id="preview" width="100%"></video><br>
    </div>
    {{-- main --}}
    <div class="w-full flex h-[100vh]">
        {{-- navigations --}}
        <div class="w-[6%] py-6 bg-white relative h-auto">
            <div class="flex w-2/3 mx-auto flex-col items-center justify-center py-4 mb-3">
                @if (isset($cms) && $cms->company_logo)
                    <img src="{{ asset($cms->company_logo) }}" alt="Company Logo">
                @else
                    <img src="{{ asset('images/cms/1737455694.jpg') }}" alt="Default Logo">
                @endif
            </div>
            <a href="{{ route('dashboard') }}"
                class="flex w-2/3 mx-auto flex-col items-center justify-center py-4 rounded-xl bg-[#f5a7a4]">
                <img src="{{ asset('images/products-red.png') }}" alt="Home Icon" class="w-1/3">
                <p class="text-xs text-[#e5231a]">Home</p>
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
            <a href="{{ route('orders') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/order-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Orders</p>
            </a>
            <a href="{{ route('office.login') }}" target="__blank"
                class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/backoffice-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Office</p>
            </a>
            <button onclick="toggleAlerts()"
                class="flex w-2/3 mx-auto flex-col items-center justify-center py-4 bg-[#dadada] rounded-xl absolute bottom-2 left-4">
                <img src="{{ asset('images/notifications.png') }}" alt="">
                <div
                    class="w-[30px] h-[30px] flex items-center justify-center bg-[#f5a7a4] rounded-full absolute -top-2 -right-2">
                    <p class="font-semibold text-main">
                        {{ $alerts->count() }}
                    </p>
                </div>
            </button>
            <div id="alertsDiv"
                class="w-[300px] h-[300px] overflow-y-auto hidden rounded-xl absolute bottom-7 left-24 text-xs bg-white border-2 border-main">
                @foreach ($alerts as $alert)
                    <a href="/back-office/stocks_adjustments/?opendialog={{ $alert->item }}" target="_blank">

                        @php
                            $quantity = $alert->quantity;
                        @endphp
                        <div class="w-full flex flex-col px-2 py-1 border-b">
                            <p>
                                @php
                                    if ($quantity >= 1) {
                                        echo '<p class="font-medium">Critically Low Amount</p>';
                                    } else {
                                        echo '<p class="font-medium">No stocks</p>';
                                    }
                                @endphp
                            </p>
                            <p>{{ $alert->item }} is only <span class="font-medium">{{ $alert->quantity }}</span>
                                remaining in stock.</p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
        {{-- POS --}}
        <div class="w-[94%] flex bg-[#e4e4e4]">
            {{-- selection --}}
            <div class="w-3/4 p-6 bg-[#e4e4e4]">
                <div class="w-full flex justify-between gap-3 items-center">

                    <div class="w-[90%]">
                        <label for="category_filter" class="flex gap-2 mb-2 text-sm"><svg width="20px"
                                height="20px" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 4C10.4508 4 9.0799 5.00309 8.61115 6.47966L7.81104 9H8.49995H15.5H16.1889L15.3888 6.47966C14.92 5.00309 13.5491 4 12 4ZM18.2872 9L17.295 5.8745C16.5626 3.56734 14.4206 2 12 2C9.57933 2 7.43733 3.56734 6.7049 5.8745L5.71268 9H3.34789C2.00585 9 1.04464 10.2956 1.43384 11.58L2.55808 15.29L3.94596 19.87C4.32928 21.135 5.49529 22 6.81704 22H9.99995H14H17.1829C18.5046 22 19.6706 21.135 20.0539 19.87L21.4418 15.29L22.5661 11.58C22.9553 10.2956 21.9941 9 20.652 9H18.2872ZM6.4444 11H3.34789L4.25698 14H8.03615L7.62706 11H6.4444ZM9.64557 11L10.0547 14H13.9452L14.3543 11H9.64557ZM16.3728 11L15.9638 14H19.7429L20.652 11H17.5555H16.3728ZM19.1369 16H15.691L15.1456 20H17.1829C17.6235 20 18.0121 19.7117 18.1399 19.29L19.1369 16ZM13.1271 20L13.6725 16H10.3274L10.8728 20H13.1271ZM8.85434 20L8.30888 16H4.86304L5.86001 19.29C5.98778 19.7117 6.37646 20 6.81704 20H8.85434Z"
                                        fill="#000000"></path>
                                </g>
                            </svg> Product Category</label>
                        <select name="category" id="category_filter" onchange="filterMenuByCategory(this.value)"
                            class="py-2 px-4 outline-none mb-6 rounded-xl bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-[20%] p-2.5">
                            <option value="">All</option>
                            @foreach ($menus->unique('category') as $menu)
                                <option value="{{ $menu->category }}">{{ $menu->category }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="relative w-[20%] mb-6 flex gap-2">
                        <input
                            id="search_item"
                            type="search"
                            name="search_item"
                            placeholder="Search item"
                            class="py-1 px-4 outline-none w-[60%] rounded-xl"
                            autocomplete="off"
                        >
                        <input
                            id="barcode-input"
                            type="text"
                            name="barcode"
                            placeholder="Barcode"
                            class="py-1 px-4 outline-none w-[40%] rounded-xl"
                            autocomplete="off"
                            autofocus
                        >
                    </div>
                </div>

                {{-- notifications --}}
                @php
                    $hasLowStock = false;
                    foreach ($alerts as $alert) {
                        if ($alert->quantity <= 1) {
                            $hasLowStock = true;
                            break;
                        }
                    }
                @endphp

                @if ($hasLowStock)
                    <div class="p-3 bg-white my-3 border-l-4 border-red-500 relative shadow-md"
                        id="stockNotification">
                        Some items have low or no stock. Please review below.
                        <a onclick="toggleAlerts()" class="text-blue-500 underline cursor-pointer ml-1">
                            Click this to check the status of your stocks.
                        </a>
                        <button onclick="document.getElementById('stockNotification').style.display='none'"
                            class="absolute top-1 right-2 text-red-500 font-bold text-xl leading-none focus:outline-none mt-2"
                            aria-label="Close">
                            &times;
                        </button>
                    </div>
                @endif

                <div id="foods" class="w-full grid grid-cols-5 grid-rows-5 gap-4 h-[90%] overflow-y-auto">
                    @foreach ($menus as $menu)
                        <button
                            class="btn-menu menu-button flex flex-col rounded-md shadow-lg bg-[#fefefe] p-4 items-center justify-center text-sm hover:bg-green-300 hover:text-black"
                            data-food-name="{{ $menu->item }}" data-promo="{{ $menu->item_promo }}"
                            data-category="{{ $menu->category }}" data-price="{{ $menu->retail }}"
                            @if ($menu->quantity == 0) disabled @endif>
                            <p>{{ $menu->item }} {{ $menu->size }}</p>
                            @if ($menu->item_promo)
                                <p class="text-blue-500">+ {{ $menu->item_promo }}</p>
                            @endif
                            <p class="font-medium mb-2">&#8369; {{ $menu->retail }}.00</p>
                            <p class="text-xs menu-qty text-green-600 font-semibold">{{ $menu->quantity }} in stock
                            </p>
                        </button>
                    @endforeach
                    <script>
                        function filterMenuByCategory(category) {
                            const menuButtons = document.querySelectorAll('.btn-menu');

                            menuButtons.forEach(button => {
                                // Show all if "All" is selected or if category matches
                                if (category === "" || button.dataset.category === category) {
                                    button.style.display = "flex"; // Or your preferred display style
                                } else {
                                    button.style.display = "none";
                                }
                            });
                        }

                        // Optional: Initialize by showing all items
                        document.addEventListener('DOMContentLoaded', function() {
                            filterMenuByCategory("");
                        });
                    </script>
                    <style>
                        .btn-menu:disabled {
                            background-color: rgb(245, 147, 147);
                            /* Grey background */
                            cursor: not-allowed;
                            /* Show a disabled cursor */
                            pointer-events: none;
                            /* Prevent click interaction */

                            .menu-qty {
                                color: red;
                            }
                        }
                    </style>
                </div>
            </div>
            {{-- ticket --}}

            <div id="ticket" class="w-1/4 my-auto px-4">
                <button class="px-4 py-4 mb-2 bg-red-500 text-sm text-white rounded-md"
                    onclick="openInputQuantity()">Input quantity</button>
                <script>
                    function openInputQuantity() {
                        document.getElementById('quantity-div').classList.toggle('hidden');
                        document.getElementById('quantity-input').focus();
                    }
                </script>
                <form action="{{ route('ticket_details') }}" class="w-full h-[700px] p-4 bg-white border rounded-xl"
                    method="get">
                    @csrf
                    <div class="w-full flex justify-between py-2 border-b border-bd items-center">
                        <div class="w-1/2">
                            <input id="customer" type="text" name="customer" placeholder="Customer Name"
                                class="w-full border border-[#565857] rounded-xl outline-none py-2 px-4">
                        </div>
                        <div class="w-1/4 items-center justify-center flex flex-col">
                            <p class="text-xs text-[#565857]">Sale #:</p>
                            <p class="font-medium">{{ $ticket }}</p>
                        </div>
                        <div class="w-1/4 flex justify-end items-center">
                            <button type="button" id="clear"
                                class="w-[25px] h-[25px] rounded-full border border-black flex items-center justify-center">
                                <img src="{{ asset('images/delete.png') }}" alt="Delete Button" class="w-3/4">
                            </button>
                        </div>
                    </div>
                    <div id="orders" class="w-full h-[400px] overflow-y-auto border-b border-bd">
                    </div>
                    <div class="w-full p-2">
                        <div class="w-full">
                            <div class="w-full flex justify-between mb-4">
                                <p>Sub-total: </p>
                                <p>&#8369; <span id="total">0.00</span></p>
                            </div>
                            <div class="w-full flex justify-between mb-6">
                                <p class="text-lg font-medium">Payable Amount: </p>
                                <p class="text-lg font-medium">&#8369; <span id="payable">0.00</span></p>
                            </div>
                        </div>
                        <div class="w-full flex flex-col items-center justify-between gap-2 text-sm text-white">
                            <button type="submit" id="proceed" name="action" value="proceed"
                                class="w-full rounded-xl py-4 bg-[#565857]">
                                Order's Empty
                            </button>
                            <button type="submit" name="action" value="gcash"
                                class="w-full py-4 rounded-xl bg-blue-500 text-white font-medium">Cash In / Cash
                                Out</button>
                        </div>
                    </div>
                    <input type="hidden" name="ticket" value="{{ $ticket }}">
                </form>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#search_item').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();

                $('.menu-button').each(function() {
                    const itemName = $(this).data('food-name').toLowerCase();
                    const matchesSearch = itemName.includes(searchTerm);
                    $(this).toggle(matchesSearch);
                });
            });

            // Focus barcode field after search
            $('#search_item').on('blur', function() {
                keepFocus();
            });
        });
        const itemsData = {
            @foreach ($menus as $menu)
                "{{ $menu->qr }}": {
                    item: "{{ $menu->item }}",
                    price: {{ $menu->retail }}
                }
                {{ !$loop->last ? ',' : '' }}
            @endforeach
        };

        let orders = [];
        let selectedItemName = null;
        let selectedItemPrice = null;
        let selectedItemPromo = null;

        function toggleAlerts() {
            let alertsDiv = document.getElementById('alertsDiv')
            alertsDiv.classList.toggle('hidden')
        }

        function updateProceedButtonState() {
            if (orders.length === 0) {
                $('#proceed').prop('disabled', true).addClass('bg-[#565857]').removeClass('bg-main');
            } else {
                $('#proceed').prop('disabled', false).removeClass('bg-[#565857]').addClass('bg-main');
            }
        }

        function addToOrders(itemName, itemPrice, quantity) {
            let found = false;
            quantity = parseInt(quantity);
            if (isNaN(quantity) || quantity <= 0) quantity = 1;

            for (let i = 0; i < orders.length; i++) {
                if (orders[i].foodName === itemName) {
                    orders[i].quantity += quantity;
                    orders[i].total += itemPrice * quantity;
                    found = true;
                    break;
                }
            }

            if (!found) {
                orders.push({
                    foodName: itemName,
                    price: itemPrice,
                    quantity: quantity,
                    total: itemPrice * quantity
                });
            }

            updateProceedButtonState();
        }

        function removeFromOrders(itemName) {
            for (let i = 0; i < orders.length; i++) {
                if (orders[i].foodName === itemName) {
                    if (orders[i].quantity > 1) {
                        orders[i].quantity--;
                        orders[i].total -= orders[i].price;
                    } else {
                        orders.splice(i, 1);
                    }
                    break;
                }
            }

            updateProceedButtonState();
        }

        function updateOrdersDisplay() {
            var ordersContainer = $('#orders');
            var payableElement = $('#payable');
            var totalElement = $('#total');
            var total = 0;

            var itemCounts = {};
            orders.forEach((order) => {
                itemCounts[order.foodName] = {
                    count: order.quantity,
                    price: order.price,
                    total: order.total
                };
            });

            ordersContainer.html('');
            Object.keys(itemCounts).forEach((itemName) => {
                var item = itemCounts[itemName];
                var orderDiv = $('<div></div>').addClass('w-full flex items-center text-sm py-2 overflow-x-hidden');
                var firstDiv = $('<div></div>').addClass('w-[73%] flex flex-col justify-center');
                var secondDiv = $('<div></div>').addClass('w-[20%] flex items-center justify-between');
                var deleteDiv = $('<div></div>').addClass('w-[7%] flex items-center justify-center');

                var orderedFoodElement = $('<p></p>').text(itemName).addClass('text-xs');
                var orderedFoodCount = $('<p></p>').text('₱' + item.price.toFixed(2) + ' x ' + item.count).addClass(
                    'text-xs');
                firstDiv.append(orderedFoodElement);
                firstDiv.append(orderedFoodCount);

                var priceElement = $('<p></p>').html('&#8369; ' + item.total.toFixed(2));
                secondDiv.append(priceElement);

                for (var i = 0; i < item.count; i++) {
                    firstDiv.append($('<input>', {
                        type: 'hidden',
                        name: 'food_name[]',
                        value: itemName
                    }));
                }

                var deleteButton = $('<button></button>').text('-').addClass(
                    'delete-button bg-red-500 text-white px-2 py-1 rounded').data('item-name', itemName);
                deleteDiv.append(deleteButton);

                orderDiv.append(firstDiv).append(secondDiv).append(deleteDiv);
                ordersContainer.append(orderDiv);

                total += item.total;
            });

            totalElement.text(total.toFixed(2));
            payableElement.text(total.toFixed(2));
            $('#proceed').text('PAY ' + total.toFixed(2));
            updateProceedButtonState();
        }

        function keepFocus() {
            setTimeout(() => {
                $('#barcode').focus();
            }, 10);
        }

        $(document).ready(function() {
            updateProceedButtonState();
            keepFocus();

            $('#foods').on('click', '.menu-button', function() {
                selectedItemName = $(this).data('food-name');
                selectedItemPrice = parseFloat($(this).data('price'));
                selectedItemPromo = $(this).data('promo');

                if (selectedItemName && !isNaN(selectedItemPrice)) {
                    $('#quantity-div').removeClass('hidden');
                    $('#quantity-input').val(1).focus();
                } else {
                    console.log('Invalid item data:', selectedItemName, selectedItemPrice);
                }
            });

            $('#submit-quantity').on('click', function() {
                let quantity = parseInt($('#quantity-input').val());

                if (!isNaN(quantity) && quantity > 0 && selectedItemName && selectedItemPrice !== null) {
                    addToOrders(selectedItemName, selectedItemPrice, quantity);
                    updateOrdersDisplay();
                    $('#quantity-div').addClass('hidden');

                    selectedItemName = null;
                    selectedItemPrice = null;
                    selectedItemPromo = null;

                    keepFocus();
                } else {
                    alert('Please enter a valid quantity');
                }
            });

            $('#orders').on('click', '.delete-button', function() {
                let itemName = $(this).data('item-name');
                removeFromOrders(itemName);
                updateOrdersDisplay();
            });

            $('#clear').on('click', function(event) {
                event.preventDefault();
                orders = [];
                updateOrdersDisplay();
            });
        });

        document.getElementById('barcode-input').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                let barcode = this.value.trim();
                if (!barcode) return;
                fetch('/search-barcode', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ barcode: barcode })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Gumamit ng existing function para pumasok sa order list
                        addToOrders(data.item.item, parseFloat(data.item.retail), 1);
                        updateOrdersDisplay();
                    } else {
                        alert('Item not found!');
                    }
                    this.value = '';
                });
            }
        });
    </script>


</body>

</html>
