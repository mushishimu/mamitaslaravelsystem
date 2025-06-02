<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5bf9be4e76.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Back Office</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="w-full h-auto bg-gradient-to-br from-[#f8fafc] via-[#e0e7ef] to-[#c7d2fe] relative">
    <style>
        /* Add this to your existing CSS */
        .body-blur {
            overflow: hidden;
            height: 100vh;
        }

        .body-blur::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            /* Semi-transparent white */
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: 10;
            pointer-events: none;
        }

        body {
            /* Soft blue gradient background for less eye strain */
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 60%, #c7d2fe 100%);
        }
    </style>
    {{-- modal pending items --}}
    <dialog id="stockModal" open
        class="container fixed inset-0 z-10 bg-[#fff7e6] pt-[50px] pb-[100px] max-h-[90vh] overflow-y-auto hidden">
        <!-- Changed bg-[#DEDEDE] to bg-[#fff7e6] for a warm, soft background -->
        <button id="closeModal" class="absolute top-3 right-3 text-xl font-bold text-gray-700 hover:text-gray-900 p-5"
            aria-label="closeModal">
            ✖
        </button>
        <div class="container px-[30px] mx-auto space-y-[30px]">
            <div class="flex gap-10 items-center place-content-between mr-20 sticky">
                <h2 class="text-[36px] font-medium flex">Pending Items <div
                        class="w-[20px] h-[20px] flex items-center justify-center bg-red-500 rounded-full -translate-y-[1px]">
                        <p class="text-white text-xs">{{ $stocks_alert->count() }}</p>
                    </div>
                </h2>

                <div class="flex justify-between items-center my-auto">
                    <div>
                        <button id="sortByName" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Sort
                            by Name</button>
                        <button id="sortByQuantity"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 ml-2">Sort by
                            Quantity</button>

                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto w-full">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase" style="background-color: #ffe6a7;">
                        <!-- Changed bg-gray-50 to a soft yellow #ffe6a7 -->
                        <tr>
                            <th scope="col" class="px-6 py-3">Product Name</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Stocks</th>
                            <th scope="col" class="px-6 py-3">Expiration Date</th>
                            <th scope="col" class="px-6 py-3">Action</th> <!-- Add Action column -->
                        </tr>
                    </thead>
                    <tbody id="tableBody" class="max-h-[calc(90vh-200px)] overflow-y-auto" style="background-color: #fffbe6;">
        <!-- Added style for a matching light background -->
        @foreach ($stocks_alert as $stock)
            <tr class="bg-white border-b border-gray-200" data-name="{{ strtolower($stock->item) }}"
                data-quantity="{{ $stock->quantity }}">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $stock->item }}
                </th>
                <td class="px-6 py-4">
                    @if ($stock->quantity == 0)
                        <span class="text-red-600 font-bold">No Stock</span><br>
                        {{ $stock->name }} is only {{ $stock->quantity }} remaining in stock.
                    @elseif($stock->quantity <= 5)
                        <span class="text-orange-500 font-bold">Critically Low Stock</span><br>
                        {{ $stock->name }} has only {{ $stock->quantity }} left.
                    @elseif($stock->quantity <= 10)
                        <span class="text-orange-500 font-bold">Low Stock</span><br>
                        {{ $stock->name }} has only {{ $stock->quantity }} left.
                    @elseif($stock->quantity <= 20)
                        <span class="text-yellow-500 font-bold">Running Low</span><br>
                        {{ $stock->name }} is getting low with {{ $stock->quantity }} in stock.
                    @else
                        <span class="text-green-600 font-bold">In Stock</span><br>
                        {{ $stock->name }} has {{ $stock->quantity }} available.
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{ $stock->quantity }}
                </td>
                <td class="px-6 py-4 expiration-date" data-expiration="{{ $stock->expiration_date }}">
                    <!-- Placeholder for expiration date -->
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-col gap-2">
                        <a href="{{ url('/back-office/ordering?orderitem=' . urlencode($stock->item)) }}">
                            <button type="button" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs font-semibold w-full mb-1">
                                Order to Supplier
                            </button>
                        </a>
                        {{-- Adjust Stock button removed as requested --}}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
                </table>
            </div>
        </div>
    </dialog>

    <div id="coverup" class="hidden w-full bg-main h-screen absolute z-50 opacity-30"></div>
    <form id="filterForm">
        <div id="filterModal"
            class="hidden py-1 w-1/3 bg-[#f0f0f0] shadow-3xl absolute top-1/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 rounded-2xl">
            <div class="flex py-3 px-5 justify-between items-center">
                <p class="font-medium">Filter Items</p>
                <button onclick="closeFilter(event)">
                    <img src="{{ asset('images/close.png') }}" alt="" class="w-3/5 block mx-auto">
                </button>
            </div>
            <div class="w-full border-y-2 border-[#c7c3c3] py-3 px-5">
                <p class="font-medium mb-3">Where</p>
                <div class="w-full flex gap-4 mb-5">
                    <div class="w-1/2 flex flex-col gap-1">
                        <label for="">Color</label>
                        <select name="color" id="color"
                            class="
                        w-full py-2 px-3 rounded-xl outline-none">
                            <option value="" selected disabled></option>
                            <option value="red">Red</option>
                            <option value="blue">Blue</option>
                        </select>
                    </div>
                    <div class="w-1/2 flex flex-col gap-1">
                        <label for="">Size</label>
                        <select name="size" id="size"
                            class="
                        w-full py-2 px-3 rounded-xl outline-none">
                            <option value="" selected disabled></option>
                            <option value="less_200">Less than 200g/ml</option>
                            <option value="200_400">Greater than 200g/ml & Less than 400g/ml</option>
                            <option value="400_1000">Greater than 400g/ml & Less than 1000g/ml</option>
                            <option value="1000_2000">Greater than 1kg/L & Less than 2kg/L</option>
                        </select>
                    </div>
                </div>
                <div class="w-full flex gap-4">
                    <div class="w-1/2 flex flex-col gap-1">
                        <label for="">Category</label>
                        <select name="category" id="category"
                            class="
                        w-full py-2 px-3 rounded-xl outline-none">
                            <option value="" selected disabled></option>
                            <option value="dry_goods">Dry Goods</option>
                            <option value="wet_goods">Wet Goods</option>
                        </select>
                    </div>
                    <div class="w-1/2 flex flex-col gap-1">
                        <label for="">Price (&#8369;)</label>
                        <div class="w-full flex gap-3 items-center">
                            <div class="flex w-1/2">
                                <input type="number" name="price_from" id="price_from"
                                    class="w-full py-2 outline-none rounded-xl">
                            </div>
                            <p>-</p>
                            <div class="flex w-1/2">
                                <input type="number" name="price_to" id="price_to"
                                    class="w-full py-2 outline-none rounded-xl">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-end py-3 px-4">
                <button type="button" id="applyFilterButton"
                    class="px-8 py-2 bg-main text-white text-sm rounded-xl">Apply</button>
            </div>
        </div>
    </form>
    <div class="w-full flex items-center h-[7%] bg-[#db121c] px-10">
        <p class="text-lg text-white">Stocks Adjustment</p>
    </div>
    <div class="w-full h-[93%] flex z-0">
        <div class="w-[5%] pt-10 bg-[#fefefe]">
            <div class="flex w-2/3 mx-auto flex-col items-center justify-center pb-4 mb-3">
                <img src="{{ asset($cms->company_logo) }}" alt="">
            </div>
            <div class="w-full relative">
                <button onclick="openDashboard()" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/chart-new.png') }}" alt="" class="w-[30px] h-auto">
                </button>
                <div id="dash_options" class="hidden w-[200px] absolute left-20 top-0 z-10 bg-slate-50 text-sm">
                    <div class="w-full flex flex-col py-2">
                        <a href="{{ route('office.dashboard') }}" class="hover:bg-[#e6e6e6] p-2">Sales summary</a>
                        <a href="{{ route('office.sales_by_item') }}" class="hover:bg-[#e6e6e6] p-2">Sales by
                            item</a>
                        <a href="{{ route('office.sales_history') }}" class="hover:bg-[#e6e6e6] p-2">Sales
                            history</a>
                    </div>
                </div>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.items_list') }}"
                    class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/prod-new.png') }}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <button onclick="openInventoryOptions()"
                    class="w-full flex items-center justify-center h-auto py-4 bg-[#f5a7a4]">
                    <img src="{{ asset('images/inv-red.png') }}" alt="" class="w-[30px] h-auto">
                </button>
                <div id="inventory_options"
                    class="hidden w-[200px] absolute left-20 top-0 z-10 bg-slate-50 p-3 text-sm">
                    <div class="w-full flex flex-col gap-3">
                        <a href="{{ route('office.stocks_adjustment') }}">Stocks Adjustment</a>
                        <a href="{{ route('office.inventory') }}">Inventory</a>
                    </div>
                </div>
            </div>
            {{-- <div class="w-full relative">
                <a href="{{route('qr_printing')}}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{asset('images/qr.png')}}" alt="" class="w-[30px] h-auto">
                </a>
            </div> --}}
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
                <a href="{{ route('office.ordering') }}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/order-new.png') }}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.cms') }}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/cms.png') }}" alt="" class="w-[30px] h-auto">
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
                    e.preventDefault(); // Prevent the default link action

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
                            // Submit the logout form
                            document.getElementById('logoutForm').submit();
                        }
                    });
                });
            </script>
        </div>
        <div class="w-[95%] bg-[#f2f2f2] z-0 p-7">
            <div class="w-full bg-slate-50 shadow-md p-6">
                <div class="w-full flex gap-4 px-5 mb-4 items-center">
                    <div class="w-1/3">
                        <input type="text" id="searchProduct" placeholder="Search products..."
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-main">
                    </div>
                    <button onclick="openFilter()"
                        class="px-10 py-2 rounded-lg text-center bg-main text-white">Advance filter</button>
                    {{-- add notifications here --}}

                    {{-- Notification Button --}}
                    <a id="openModal" class="text-red-500 flex cursor-pointer" href="">
                        Pending Items
                        <div
                            class="w-[20px] h-[20px] flex items-center justify-center bg-red-500 rounded-full -translate-y-[12px]">
                            <p class="text-white text-xs">{{ $stocks_alert->count() }}</p>
                        </div>
                    </a>
                </div>
                <div
                    class="w-full flex items-center text-sm py-4 px-5 text-gray-500 border-b border-[#dadada] text-left">
                    <p class="w-[45%] cursor-pointer" id="item-header">Item</p>
                    <p class="w-[20%] cursor-pointer" id="supplier-header">Supplier</p>
                    <p class="w-[20%] cursor-pointer" id="expiration-header">Expiration</p>
                    <p class="w-[10%] ">In Stock</p>
                    <p class="w-[15%]">Status</p>
                    <p class="w-[20%]">Recent adjustment</p>
                    <p class="w-[15%]"></p>
                </div>
                <div id="filteredItems" class="w-full">
                    @foreach ($item as $i)
                        @php
                            $quantity = $i->quantity;
                            $cost = $i->cost * $quantity;
                            $retail = $i->retail * $quantity;
                            $profit = $retail - $cost;

                            // Expiration status check
                            $expirationStatus = '';
                            if (!empty($i->expiration_date)) {
                                $expirationDate = \Carbon\Carbon::parse($i->expiration_date);
                                $formattedDate = $expirationDate->format('m/d/Y');
                                $today = \Carbon\Carbon::today();
                                $daysRemaining = $today->diffInDays($expirationDate, false); // false gives negative if past

                                if ($daysRemaining < 0) {
                                    $expirationStatus =
                                        '<p class="w-[20%] text-red-500 font-medium expiration-status">' .
                                        $formattedDate .
                                        ' - Expired</p>';
                                } elseif ($daysRemaining <= 15) {
                                    $expirationStatus =
                                        '<p class="w-[20%] text-yellow-500 font-medium expiration-status">' .
                                        $formattedDate .
                                        ' - Nearly expired (' .
                                        $daysRemaining .
                                        ' days)</p>';
                                } else {
                                    $expirationStatus =
                                        '<p class="w-[20%] text-green-500 font-medium expiration-status">' .
                                        $formattedDate .
                                        ' - Good Condition (' .
                                        $daysRemaining .
                                        ' days)</p>';
                                }
                            } else {
                                $expirationStatus = '<p class="w-[20%] expiration-status">No expiration date</p>';
                            }

                            // Stock status check
                            $stockStatus = '';
                            if ($i->category != 'Limited Edition') {
                                if ($quantity >= 100) {
                                    $stockStatus = '<p class="w-[15%] text-green-500 font-medium">High amount</p>';
                                } elseif ($quantity >= 50) {
                                    $stockStatus = '<p class="w-[15%] text-blue-500 font-medium">Good amount</p>';
                                } elseif ($quantity >= 20) {
                                    $stockStatus = '<p class="w-[15%] text-orange-500 font-medium">Low amount</p>';
                                } elseif ($quantity >= 1) {
                                    $stockStatus =
                                        '<p class="w-[15%] text-red-500 font-medium">Critically low amount</p>';
                                } else {
                                    $stockStatus = '<p class="w-[15%] text-red-500 font-medium">Items sold</p>';
                                }
                            } else {
                                if ($quantity == 0) {
                                    $stockStatus = '<p class="w-[15%] text-red-500 font-medium">Items sold</p>';
                                } else {
                                    $stockStatus = '<p class="w-[15%] text-[#FFD700] font-medium">Limited Edition</p>';
                                }
                            }
                        @endphp

                        <div
                            class="w-full flex items-center text-sm py-4 px-5 text-gray-700 border-b border-[#dadada] text-left">
                            <p class="w-[45%]" id="item_res">{{ $i->item }}</p>
                            <p class="w-[20%]" id="supplier_res">{{ $i->supplier }}</p>
                            {!! $expirationStatus !!}
                            <p class="w-[10%]" id="quantity_res">{{ $i->quantity }}</p>
                            {!! $stockStatus !!}
                            <p class="w-[20%]">{{ $i->update_reason }}</p>
                            <button
                                onclick="openAdjustmentModal('{{ $i->id }}', '{{ $i->item }}', '{{ $i->quantity }}')"
                                class="w-[15%] flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15"
                                    height="15">
                                    <path
                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                </svg>
                                &nbsp;<span>Stock Adjustment</span>
                            </button>
                        </div>
                    @endforeach
                </div>

                <!-- Add this after the items list section and before the pagination -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4 px-5">Stock Adjustment History</h3>
                    <div
                        class="w-full flex items-center text-sm py-4 px-5 text-gray-500 border-b border-[#dadada] text-left">
                        <p class="w-[25%]">Item</p>
                        <p class="w-[15%]">Adjustment Type</p>
                        <p class="w-[15%]">Quantity</p>
                        <p class="w-[15%]">Old Stock</p>
                        <p class="w-[15%]">New Stock</p>
                        <p class="w-[25%]">Reason</p>
                        <p class="w-[15%]">Date</p>
                    </div>
                    <div id="adjustmentLogs" class="w-full">
                        @foreach ($adjustmentLogs as $log)
                            <div
                                class="w-full flex items-center text-sm py-4 px-5 text-gray-700 border-b border-[#dadada] text-left">
                                <p class="w-[25%]">{{ $log->item }}</p>
                                <p class="w-[15%]">
                                    @if ($log->adjustment_type === 'increase')
                                        <span class="text-green-500">Increased</span>
                                    @else
                                        <span class="text-red-500">Decreased</span>
                                    @endif
                                </p>
                                <p class="w-[15%]">{{ $log->quantity }}</p>
                                <p class="w-[15%]">{{ $log->old_quantity }}</p>
                                <p class="w-[15%]">{{ $log->new_quantity }}</p>
                                <p class="w-[25%]">{{ $log->reason }}</p>
                                <p class="w-[15%]">{{ \Carbon\Carbon::parse($log->created_at)->format('M d, Y H:i') }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Pagination links -->


                <!-- Your existing pagination UI -->
                <div class="w-full flex items-center gap-10 pt-2 px-6 text-sm text-gray-500">
                    {{ $item->links() }}
                    <div class="flex items-center gap-1 w-[8%]">
                        <p>Page: {{ $item->currentPage() }}</p>
                        <p>of {{ $item->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Stock Adjustment Modal --}}
    <div id="adjustmentModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="bg-white w-1/3 mx-auto mt-1 rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Stock Adjustment</h2>
                <button onclick="closeAdjustmentModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>

                </button>
            </div>

            <form id="adjustmentForm" method="POST">
                @csrf
                <input type="hidden" id="productId" name="product_id">

                <div class="mb-4">
                    <p class="font-medium">Product: <span id="productName"></span></p>
                    <p>Current Stock: <span id="currentStock"></span></p>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Adjustment Type</label>
                    <select name="adjustment_type" id="adjustmentType" class="w-full rounded-lg border p-2" required>
                        <option value="increase">Increase Stock</option>
                        <option value="decrease">Decrease Stock</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Quantity</label>
                    <input type="number" name="quantity" class="w-full rounded-lg border p-2" required
                        min="1">
                </div>

                <div class="mb-4">
                    <label class="block mb-2">Reason for Adjustment</label>
                    <textarea name="reason" class="w-full rounded-lg border p-2" required></textarea>
                </div>

                {{-- For Increase Stock --}}
                <div id="increaseFields" class="mb-4">
                    <div class="mb-4 hidden">
                        <label class="block mb-2">Batch Number</label>
                        <input type="text" name="batch_number" class="w-full rounded-lg border p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2">Manufacturing Date</label>
                        <input type="date" name="manufacturing_date" class="w-full rounded-lg border p-2">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2">Expiration Date</label>
                        <input type="date" name="expiration_date" class="w-full rounded-lg border p-2">
                    </div>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeAdjustmentModal()"
                        class="px-4 py-2 bg-gray-200 rounded-lg">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-main text-white rounded-lg">Save Adjustment</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#applyFilterButton').click(function() {
                $.ajax({
                    url: "{{ route('office.filter_items') }}",
                    type: 'GET',
                    data: $('#filterForm').serialize(),
                    success: function(data) {
                        // console.log(data);
                        $('#filteredItems').empty();
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                let quantityStatus = '';
                                if (item.quantity >= 100) {
                                    quantityStatus =
                                        '<p class="w-[15%] text-green-500 font-medium">High amount</p>';
                                } else if (item.quantity >= 50) {
                                    quantityStatus =
                                        '<p class="w-[15%] text-blue-500 font-medium">Good amount</p>';
                                } else if (item.quantity >= 20) {
                                    quantityStatus =
                                        '<p class="w-[15%] text-orange-500 font-medium">Low amount</p>';
                                } else if (item.quantity >= 1) {
                                    quantityStatus =
                                        '<p class="w-[15%] text-red-500 font-medium">Critically low amount</p>';
                                } else {
                                    quantityStatus =
                                        '<p class="w-[15%] text-red-500 font-medium">No stocks</p>';
                                }

                                let itemRow = `
                                    <div class="w-full flex items-center text-sm py-4 px-5 text-gray-700 border-b border-[#dadada] text-left">
                                        <p class="w-[45%]" id="item_res">${item.item}</p>
                                        <p class="w-[10%]" id="quantity_res">${item.quantity}</p>
                                        ${quantityStatus}
                                        <p class="w-[15%]">${item.update_reason}</p>
                                        <button 
                                            onclick="openAdjustmentModal('${item.id}', '${item.item}', '${item.quantity}')" 
                                            class="w-[15%] flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="15" height="15">
                                                <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                                            </svg>
                                        </button>
                                    </div>`;
                                $('#filteredItems').append(itemRow);
                            });
                        } else {
                            $('#filteredItems').append('<p>No items found</p>');
                        }
                    },
                    error: function() {
                        alert('Error retrieving filtered items');
                    }
                });
            });
        });


        function openInventoryOptions() {
            var inventoryOptions = document.getElementById('inventory_options')
            inventoryOptions.classList.toggle('hidden')
        }

        function openDashboard() {
            var inventoryOptions = document.getElementById('dash_options')
            inventoryOptions.classList.toggle('hidden')
        }


        function openFilter() {
            var cover = document.getElementById('coverup')
            var modal = document.getElementById('filterModal')

            cover.classList.remove('hidden')
            modal.classList.remove('hidden')
        }

        function closeFilter(event) {
            event.preventDefault();
            var cover = document.getElementById('coverup')
            var modal = document.getElementById('filterModal')

            cover.classList.add('hidden')
            modal.classList.add('hidden')
        }

        // Search functionality
        $('#searchProduct').on('keyup', function() {
            let searchValue = $(this).val();

            $.ajax({
                url: window.location.href, // or route('/stocks-adjustment')
                type: 'GET',
                data: {
                    search: searchValue
                },
                success: function(response) {
                    // Assuming you return the full page, you can parse the part you want:
                    // Or better, return only the items list as a partial view.
                    $('#filteredItems').html($(response).find('#filteredItems').html());
                }
            });
        });

        // Stock Adjustment Modal
        function openAdjustmentModal(productId, productName, currentStock) {
            $('#productId').val(productId);
            $('#productName').text(productName);
            $('#currentStock').text(currentStock);
            $('#adjustmentModal').removeClass('hidden');
        }

        function closeAdjustmentModal() {
            $('#adjustmentModal').addClass('hidden');
            $('#adjustmentForm')[0].reset();
        }

        // Show/Hide fields based on adjustment type
        $('#adjustmentType').change(function() {
            if ($(this).val() === 'increase') {
                $('#increaseFields').show();
            } else {
                $('#increaseFields').hide();
            }
        });

        // Form submission
        $('#adjustmentForm').submit(function(e) {
            e.preventDefault();

            // Validate manufacturing and expiration dates
            const mfg = $('input[name="manufacturing_date"]').val();
            const exp = $('input[name="expiration_date"]').val();

            if (mfg && exp) {
                const mfgDate = new Date(mfg);
                const expDate = new Date(exp);

                if (mfgDate >= expDate) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Manufacturing date must be earlier than expiration date.',
                        icon: 'error'
                    });
                    return false;
                }
            }

            // Get the form data
            let formData = $(this).serializeArray();
            formData.push({
                name: '_token',
                value: $('meta[name="csrf-token"]').attr('content')
            });

            // Validate quantity for decrease
            let currentStock = parseInt($('#currentStock').text());
            let requestedQuantity = parseInt($('input[name="quantity"]').val());
            let adjustmentType = $('#adjustmentType').val();

            if (adjustmentType === 'decrease' && requestedQuantity > currentStock) {
                Swal.fire({
                    title: 'Error!',
                    text: 'Cannot decrease more than available stock',
                    icon: 'error'
                });
                return false;
            }

            $.ajax({
                url: "{{ route('office.update_stock') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Success!',
                            text: response.message || 'Stock has been adjusted successfully',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = "{{ route('office.stocks_adjustment') }}";
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: response.message || 'Failed to adjust stock',
                            icon: 'error'
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Failed to adjust stock';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        title: 'Error!',
                        text: errorMessage,
                        icon: 'error'
                    });
                }
            });
        });
    </script>

    <script>
        const modal = document.getElementById("stockModal");
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");
        const urlParams = new URLSearchParams(window.location.search);

        // Show modal
        openModalBtn.addEventListener("click", function(event) {
            event.preventDefault();
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            document.body.classList.add("body-blur");
        });

        // Check if 'opendialog' exists in the query parameters
        if (urlParams.has('opendialog')) {
            // Open the modal
            modal.classList.remove("hidden");
            modal.classList.add("flex");
            document.body.classList.add("body-blur");

            // Get the value of the 'opendialog' parameter
            const itemName = decodeURIComponent(urlParams.get('opendialog'));

            // Find the corresponding row in the table
            const rows = document.querySelectorAll('#tableBody tr');
            let targetRow = null;

            rows.forEach(row => {
                const rowName = row.getAttribute('data-name');
                if (rowName === itemName.toLowerCase()) {
                    targetRow = row;
                }
            });

            // If the target row is found, highlight it
            if (targetRow) {
                targetRow.classList.add('highlight');
                targetRow.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            } else {
                console.warn(`Item "${itemName}" not found in the table.`);
            }
        }

        // Close modal on button click
        closeModalBtn.addEventListener("click", function() {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
            document.body.classList.remove("body-blur");

            // Remove highlight from any rows
            document.querySelectorAll('.highlight').forEach(el => {
                el.classList.remove('highlight');
            });
        });

        // Close modal when clicking outside the content
        modal.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.classList.add("hidden");
                modal.classList.remove("flex");
                document.body.classList.remove("body-blur");

                // Remove highlight from any rows
                document.querySelectorAll('.highlight').forEach(el => {
                    el.classList.remove('highlight');
                });
            }
        });
    </script>
    <script>
        function calculateDaysLeft(expirationDate) {
            if (!expirationDate) {
                return {
                    text: "No expiration date given",
                    className: ""
                };
            }

            const today = new Date();
            const expiration = new Date(expirationDate);
            const timeDifference = expiration - today;
            const daysLeft = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

            if (daysLeft < 0) {
                return {
                    text: "Expired!",
                    className: "text-red-500 font-bold"
                };
            } else if (daysLeft <= 7) {
                return {
                    text: `${daysLeft} day(s) left`,
                    className: "text-red-500 font-bold"
                };
            } else {
                return {
                    text: `${daysLeft} day(s) left`,
                    className: "text-green-500 font-bold"
                };
            }
        }

        document.querySelectorAll('.expiration-date').forEach(cell => {
            const expirationDate = cell.getAttribute('data-expiration');
            const result = calculateDaysLeft(expirationDate);

            // Update text content
            cell.textContent = result.text;


            cell.className = `px-6 py-4 expiration-date ${result.className}`;
        });
    </script>

    <script>
        // Function to sort rows by name (alphabetically)
        function sortByName() {
            const tableBody = document.getElementById('tableBody');
            const rows = Array.from(tableBody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                const nameA = a.getAttribute('data-name');
                const nameB = b.getAttribute('data-name');
                return nameA.localeCompare(nameB);
            });

            // Re-append sorted rows to the table body
            rows.forEach(row => tableBody.appendChild(row));
        }

        // Function to sort rows by quantity (ascending order)
        function sortByQuantity() {
            const tableBody = document.getElementById('tableBody');
            const rows = Array.from(tableBody.querySelectorAll('tr'));

            rows.sort((a, b) => {
                const quantityA = parseInt(a.getAttribute('data-quantity'));
                const quantityB = parseInt(b.getAttribute('data-quantity'));
                return quantityA - quantityB;
            });

            // Re-append sorted rows to the table body
            rows.forEach(row => tableBody.appendChild(row));
        }

        // Add event listeners to buttons
        document.getElementById('sortByName').addEventListener('click', sortByName);
        document.getElementById('sortByQuantity').addEventListener('click', sortByQuantity);
    </script>

    {{-- script for filtration --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all header elements by ID
            const itemHeader = document.getElementById('item-header');
            const supplierHeader = document.getElementById('supplier-header');
            const expirationHeader = document.getElementById('expiration-header');

            // Initialize sort directions
            let itemSortDirection = 1; // 1 for A-Z, -1 for Z-A
            let supplierSortDirection = 1;
            let expirationSortDirection = 1; // 1 for Expired first, -1 for Good first

            // Add click event listeners
            itemHeader.addEventListener('click', () => sortItems('item', itemSortDirection = -itemSortDirection));
            supplierHeader.addEventListener('click', () => sortItems('supplier', supplierSortDirection = -
                supplierSortDirection));
            expirationHeader.addEventListener('click', () => sortItems('expiration', expirationSortDirection = -
                expirationSortDirection));

            function sortItems(sortBy, direction) {
                const container = document.getElementById('filteredItems');
                const items = Array.from(container.querySelectorAll('div.flex.items-center.border-b'));

                items.sort((a, b) => {
                    let aValue, bValue;

                    switch (sortBy) {
                        case 'item':
                            aValue = a.querySelector('p[id="item_res"]').textContent.toLowerCase();
                            bValue = b.querySelector('p[id="item_res"]').textContent.toLowerCase();
                            return direction * aValue.localeCompare(bValue);

                        case 'supplier':
                            aValue = a.querySelector('p[id="supplier_res"]').textContent.toLowerCase();
                            bValue = b.querySelector('p[id="supplier_res"]').textContent.toLowerCase();
                            return direction * aValue.localeCompare(bValue);

                        case 'expiration':
                            // Get the expiration status text (includes the date and status)
                            aValue = a.querySelector('p.expiration-status').textContent.toLowerCase();
                            bValue = b.querySelector('p.expiration-status').textContent.toLowerCase();


                            // Sort logic for expiration:
                            // 1. Expired items first/last
                            // 2. Nearly expired next
                            // 3. Good condition last/first

                            // Check if expired
                            const aExpired = aValue.includes('expired') && !aValue.includes('nearly');
                            const bExpired = bValue.includes('expired') && !bValue.includes('nearly');

                            // Check if nearly expired
                            const aNearly = aValue.includes('nearly expired');
                            const bNearly = bValue.includes('nearly expired');

                            // Check if good condition
                            const aGood = aValue.includes('good condition');
                            const bGood = bValue.includes('good condition');

                            // No expiration date
                            const aNoDate = aValue.includes('no expiration date');
                            const bNoDate = bValue.includes('no expiration date');

                            // Sort order based on direction
                            if (direction === 1) {
                                // Expired -> Nearly -> Good -> No date
                                if (aExpired && !bExpired) return -1;
                                if (!aExpired && bExpired) return 1;
                                if (aNearly && !bNearly && !bExpired) return -1;
                                if (!aNearly && bNearly && !aExpired) return 1;
                                if (aGood && !bGood && !bNearly && !bExpired) return -1;
                                if (!aGood && bGood && !aNearly && !aExpired) return 1;
                                return 0;
                            } else {
                                // Good -> Nearly -> Expired -> No date
                                if (aGood && !bGood) return -1;
                                if (!aGood && bGood) return 1;
                                if (aNearly && !bNearly && !bGood) return -1;
                                if (!aNearly && bNearly && !aGood) return 1;
                                if (aExpired && !bExpired && !bNearly && !bGood) return -1;
                                if (!aExpired && bExpired && !aNearly && !aGood) return 1;
                                return 0;
                            }
                    }
                });

                // Clear the container
                container.innerHTML = '';

                // Append sorted items
                items.forEach(item => container.appendChild(item));

                // Update UI to show sort direction (optional)
                updateSortIndicators(sortBy, direction);
            }

            function updateSortIndicators(sortBy, direction) {
                // Reset all indicators
                document.querySelectorAll('.sort-indicator').forEach(el => el.remove());

                // Add indicator to the clicked header
                let header;
                if (sortBy === 'item') header = itemHeader;
                else if (sortBy === 'supplier') header = supplierHeader;
                else if (sortBy === 'expiration') header = expirationHeader;

                const indicator = document.createElement('span');
                indicator.className = 'sort-indicator ml-1';
                indicator.textContent = direction === 1 ? '↑' : '↓';
                header.appendChild(indicator);
            }
        });
    </script>
</body>

</html>
