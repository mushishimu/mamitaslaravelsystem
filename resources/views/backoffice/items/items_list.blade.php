<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5bf9be4e76.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <title>Back Office</title>
</head>

<body class="w-full h-screen bg-[#fefefe] items-list">
    <div id="coverup" class="hidden w-full bg-main h-screen absolute z-50 opacity-30"></div>
    <form id="filterForm">
        <div id="filterModal"
            class="hidden py-1 w-1/3 bg-[#f0f0f0] shadow-3xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 rounded-2xl">
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
                            @foreach ($color as $item)
                                <option value="{{ $item->color }}">{{ $item->color }}</option>
                            @endforeach
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
                            @foreach ($category as $item)
                                <option value="{{ $item->category }}">{{ $item->category }}</option>
                            @endforeach
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

                <div class="w-full flex gap-4">
                    <div class="w-1/2 flex flex-col gap-1">
                        <label for="">Supplier</label>
                        <select name="supplier" id="supplier"
                            class="
                        w-full py-2 px-3 rounded-xl outline-none">
                            <option value="" selected disabled></option>
                            @foreach ($supplier as $item)
                                <option value="{{ $item->supplier }}">{{ $item->supplier }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-end py-3 px-4">
                <button type="button" id="applyFilterButton"
                    class="px-8 py-2 bg-main text-white text-sm rounded-xl">Apply</button>
            </div>
        </div>
    </form>
    <div class="w-full flex items-center h-[7%] bg-main px-10">
        <p class="text-lg text-white">Items List</p>
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
                        <a href="{{ route('office.sales_by_item') }}" class="hover:bg-[#e6e6e6] p-2">Sales by item</a>
                        <a href="{{ route('office.sales_history') }}" class="hover:bg-[#e6e6e6] p-2">Sales history</a>
                    </div>
                </div>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.items_list') }}"
                    class="w-full flex items-center justify-center h-auto py-4 bg-[#f5a7a4]">
                    <img src="{{ asset('images/prod-red.png') }}" alt="" class="w-[30px] h-auto">
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
        <div id="main" class="w-[95%] bg-[#f2f2f2] z-0 p-7">
            <div class="w-full bg-slate-50 shadow-md p-6">
                <div class="w-full flex gap-4 px-5">
                    <input id="item_search" class="w-1/4 border-2 rounded-lg outline-none px-6 py-2" type="search"
                        name="key" placeholder="Search for item name">
                    <button onclick="openFilter()"
                        class="px-10 py-2 rounded-lg text-center bg-main text-white font-medium uppercase text-xs">Advance
                        filter</button>
                    <button onclick="window.location.href='{{ route('office.create_item') }}'"
                        class="px-5 bg-[#4d4d4d] font-medium uppercase text-xs py-2 text-white">Add Item</button>
                    <div class="w-[120px] flex items-center relative">
                        <button onclick="window.location.href='{{ route('office.pending_items') }}'"
                            class="w-full font-medium uppercase text-xs py-2 text-main">Pending Items</button>
                        <div
                            class="w-[25px] h-[25px] flex items-center justify-center rounded-full bg-main border border-white absolute -top-2 -right-2">
                            <p class="text-xs font-semibold text-white">{{ $pending ?? 0 }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-full flex items-center text-sm py-4 px-5 text-gray-500 border-b border-[#dadada]">
                    <p class="w-[20%]">Item</p>
                    <p class="w-[25%]">Description</p>
                    <p class="w-[15%]">SKU</p>
                    <p class="w-[10%]">Barcode</p>
                    <p class="w-[10%]">Category</p>
                    <p class="w-[10%]">In Stock</p>
                    <p class="w-[10%]">Cost</p>
                    <p class="w-[10%]">Retail value</p>
                    <p class="w-[10%]">Supplier</p>
                </div>
                <div id="displayDiv" class="w-full" id="filteredItems">
                    @foreach ($items as $item)
                        @php
                            $quantity = $item->quantity;
                            $cost = $item->cost * $quantity;
                            $retail = $item->retail * $quantity;
                            $profit = $retail - $cost;
                        @endphp
                        <a href="{{ route('office.view_item', ['sku' => $item->id]) }}">
                            <div
                                class="w-full flex items-center text-sm py-4 px-5 text-gray-700 border-b border-[#dadada]">
                                <p class="w-[20%] underline">{{ $item->item }}</p>
                                <p class="w-[25%] truncate">{{ $item->description }}</p>
                                <p class="w-[15%] text-blue-400 ml-2">{{ $item->sku }}</p>
                                <p class="w-[10%]">{{ $item->barcode }}</p>
                                <p class="w-[10%]">{{ $item->category }}</p>
                                <p class="w-[10%]">{{ $item->quantity }}</p>
                                <p class="w-[10%]">
                                    @php
                                        echo '&#8369;' . $item->cost;
                                    @endphp
                                </p>
                                <p class="w-[10%]">
                                    @php
                                        echo '&#8369;' . $item->retail;
                                    @endphp
                                </p>
                                <p class="w-[10%]">{{ $item->supplier }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination links -->


                <!-- Your existing pagination UI -->
                <div class="w-full flex items-center gap-10 pt-2 px-6 text-sm text-gray-500">
                    {{ $items->links() }}
                    <div class="flex items-center gap-1 w-[8%]">
                        <p>Page: {{ $items->currentPage() }}</p>
                        <p>of {{ $items->lastPage() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var main = document.getElementById('main')

        $(document).ready(function() {
            $('#item_search').on('keyup', function() {
                var key = $(this).val();
                var url = '{{ route('office.item_list_search', ['key' => ':key']) }}';
                url = url.replace(':key', key);
                // console.log(url)

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data) {
                        // Assuming the response structure is like: { menus: [...] }
                        var menus = data.menus;

                        // Clear the existing content
                        $('#displayDiv').empty();

                        // Loop through the returned menus array and generate HTML
                        menus.forEach(function(menu) {
                            var itemList = `
                                <a href="/back-office/view_item/${menu.id}">
                                    <div class='w-full flex items-center text-sm py-4 px-5 text-gray-700 border-b border-[#dadada]'>
                                        <p class='w-[20%]'>${menu.item}</p>
                                        <p class='w-[25%]'>${menu.description}</p>
                                        <p class='w-[15%]'>${menu.sku}</p>
                                        <p class='w-[10%]'>${menu.barcode}</p>
                                        <p class='w-[10%]'>${menu.category}</p>
                                        <p class='w-[10%]'>${menu.quantity}</p>
                                        <p class='w-[10%]'>&#8369;${menu.cost}</p>
                                        <p class='w-[10%]'>&#8369;${menu.retail}</p>
                                        <p class='w-[10%]'>${menu.supplier}</p>
                                    </div>
                                </a>
                            `;

                            $('#displayDiv').append(itemList);
                        });
                    },
                    error: function() {

                    }
                })
            })
        });

        $(document).ready(function() {
            $('#applyFilterButton').click(function() {
                $.ajax({
                    url: "{{ route('office.filter_items') }}",
                    type: 'GET',
                    data: $('#filterForm').serialize(),
                    success: function(data) {
                        // console.log(data);
                        $('#displayDiv').empty();
                        if (data.length > 0) {
                            $.each(data, function(index, item) {
                                let itemRow =
                                    `<a href="/back-office/view_item/${item.id}">
                                    <div class='w-full flex items-center text-sm py-4 px-5 text-gray-700 border-b border-[#dadada]'>
                                         <p class='w-[20%]'>${item.item}</p>
                                        <p class='w-[25%]'>${item.description}</p>
                                        <p class='w-[15%]'>${item.sku}</p>
                                        <p class='w-[10%]'>${item.barcode}</p>
                                        <p class='w-[10%]'>${item.category}</p>
                                        <p class='w-[10%]'>${item.quantity}</p>
                                        <p class='w-[10%]'>&#8369;${item.cost}</p>
                                        <p class='w-[10%]'>&#8369;${item.retail}</p>
                                        <p class='w-[10%]'>${item.supplier}</p>
                                    </div>
                                </a>`;
                                $('#displayDiv').append(itemRow);
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
        })

        function openInventoryOptions() {
            var inventoryOptions = document.getElementById('inventory_options')
            inventoryOptions.classList.toggle('hidden')
            main.classList.toggle('blur-5px')
        }

        function openDashboard() {
            var inventoryOptions = document.getElementById('dash_options')
            inventoryOptions.classList.toggle('hidden')
            main.classList.toggle('blur-5px')
        }

        function openItems() {
            var inventoryOptions = document.getElementById('items_options')
            inventoryOptions.classList.toggle('hidden')
            main.classList.toggle('blur-5px')
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
    </script>
</body>

</html>
